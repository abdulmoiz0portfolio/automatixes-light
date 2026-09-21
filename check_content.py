from PIL import Image

img_path = r'C:\Users\Moiz Baig\.gemini\antigravity\brain\26596035-7da0-4b63-9054-92fccbae5680\.user_uploaded\media_1787094518436.png'
img = Image.open(img_path)

w, h = img.size
min_y = h
max_y = 0

for y in range(h):
    for x in range(w):
        if img.getpixel((x, y))[3] > 10:
            if y < min_y: min_y = y
            if y > max_y: max_y = y

print(f"Content from y={min_y} to y={max_y}")
