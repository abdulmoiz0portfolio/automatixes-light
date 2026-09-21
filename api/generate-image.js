export default async function handler(req, res) {
  if (req.method !== 'POST') {
    return res.status(405).json({ error: 'Method Not Allowed' });
  }

  const { prompt } = req.body;
  if (!prompt) {
    return res.status(400).json({ error: 'Prompt is required' });
  }

  // Ensure HF_TOKEN is configured in Vercel
  if (!process.env.HF_TOKEN) {
      return res.status(500).json({ error: 'HF_TOKEN environment variable is missing.' });
  }

  try {
    const response = await fetch(
      "https://api-inference.huggingface.co/models/stabilityai/sdxl-turbo",
      {
        headers: {
          Authorization: `Bearer ${process.env.HF_TOKEN}`,
          "Content-Type": "application/json",
        },
        method: "POST",
        body: JSON.stringify({ inputs: prompt }),
      }
    );

    if (!response.ok) {
        const errorText = await response.text();
        console.error("Hugging Face API Error:", errorText);
        return res.status(response.status).json({ error: "Failed to generate image from AI provider. " + errorText });
    }

    // The API returns the raw image blob
    const imageBlob = await response.blob();
    const arrayBuffer = await imageBlob.arrayBuffer();
    const base64Image = Buffer.from(arrayBuffer).toString('base64');
    
    const mimeType = imageBlob.type || 'image/jpeg';
    const dataUri = `data:${mimeType};base64,${base64Image}`;

    res.status(200).json({ image: dataUri });
  } catch (error) {
    console.error("Server Error:", error);
    res.status(500).json({ error: 'Internal Server Error: ' + error.message });
  }
}
