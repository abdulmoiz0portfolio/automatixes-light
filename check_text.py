from PIL import Image

img_path = r'C:\Users\Moiz Baig\.gemini\antigravity\brain\26596035-7da0-4b63-9054-92fccbae5680\.user_uploaded\media_1787094518436.png'
img = Image.open(img_path)

w, h = img.size
has_text = False
for y in range(h // 2, h):
    for x in range(w):
        r, g, b, a = img.getpixel((x, y))
        if a > 50 and (r > 200 and g > 200 and b > 200): # White text?
            has_text = True
            break
    if has_text: break

print("Has white pixels in bottom half:", has_text)
