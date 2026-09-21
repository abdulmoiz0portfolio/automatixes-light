<?php $page_key = 'ai-image-generator'; include 'header.php'; ?>

<!-- Hero Section -->
<section class="subpage-hero text-center text-white">
    <div class="container">
        <span class="badge bg-brand-translucent text-accent-brand mb-3 font-monospace px-3 py-2 border border-brand-50">AI TOOLS</span>
        <h1 class="display-4 fw-extrabold text-white">Free AI Image Generator</h1>
        <div class="title-underline"></div>
        <p class="lead text-secondary mx-auto mt-4 max-w-700">
            Instantly generate high-quality images from text using advanced Cloud AI models. Type a prompt below to see the magic in seconds.
        </p>
    </div>
</section>

<!-- Generator Tool Section -->
<section class="section-padding bg-surface-1 text-white border-top border-secondary border-opacity-25">
    <div class="container max-w-800">
        <div class="card card-glass p-5 shadow-lg border-0 rounded-4">
            <h3 class="fw-bold mb-4 text-white">What do you want to create?</h3>
            <div class="mb-4">
                <textarea id="promptInput" class="form-control form-control-lg bg-surface-2 text-white border border-secondary border-opacity-25 shadow-sm" rows="3" placeholder="A cinematic shot of a futuristic city at sunset, neon lights..."></textarea>
            </div>
            <button id="generateBtn" class="btn btn-brand btn-lg w-100 rounded-pill fw-bold shadow-sm py-3" onclick="generateImage()">
                <i class="fa-solid fa-wand-magic-sparkles me-2"></i> Generate Image
            </button>
            
            <div id="loadingIndicator" class="text-center mt-5 d-none">
                <div class="spinner-border text-accent-brand" role="status" style="width: 3rem; height: 3rem;">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p class="mt-3 text-secondary fw-semibold">Generating your image... (This takes 1-2 seconds)</p>
            </div>

            <div id="resultContainer" class="mt-5 text-center d-none">
                <img id="generatedImage" src="" class="img-fluid rounded-4 shadow" alt="Generated AI Image">
                <a id="downloadBtn" href="#" download="ai-image.jpg" class="btn btn-outline-light mt-4 rounded-pill fw-bold px-4">
                    <i class="fa-solid fa-download me-2"></i> Download Image
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Lead Capture Section -->
<section class="section-padding bg-surface-1 text-white border-top border-secondary border-opacity-25">
    <div class="container text-center">
        <h2 class="display-6 fw-extrabold text-white mb-4">Ready to Transform Your Business?</h2>
        <p class="text-secondary fs-5 mb-5 max-w-700 mx-auto">
            This image generator is just a small example of what AI can do. We build custom AI chatbots, workflow automations, and AI tools tailored to your business needs to increase productivity by up to 300%.
        </p>
        <a href="contact" class="btn btn-brand btn-lg rounded-pill fw-bold px-5 py-3 shadow-lg">
            Get Your Free AI Consultation <i class="fa-solid fa-arrow-right ms-2"></i>
        </a>
    </div>
</section>

<script>
async function generateImage() {
    const prompt = document.getElementById('promptInput').value;
    const btn = document.getElementById('generateBtn');
    const loading = document.getElementById('loadingIndicator');
    const resultContainer = document.getElementById('resultContainer');
    const imgElement = document.getElementById('generatedImage');
    const downloadBtn = document.getElementById('downloadBtn');

    if (!prompt.trim()) {
        alert('Please enter a prompt first!');
        return;
    }

    // UI Updates
    btn.disabled = true;
    resultContainer.classList.add('d-none');
    loading.classList.remove('d-none');

    try {
        const response = await fetch('/api/generate-image', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ prompt: prompt })
        });

        const data = await response.json();

        if (response.ok) {
            imgElement.src = data.image;
            downloadBtn.href = data.image;
            resultContainer.classList.remove('d-none');
        } else {
            alert('Error generating image: ' + (data.error || 'Unknown error'));
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Failed to connect to the server.');
    } finally {
        btn.disabled = false;
        loading.classList.add('d-none');
    }
}
</script>

<?php include 'footer.php'; ?>


