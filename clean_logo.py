from PIL import Image

def remove_black_halo(image_path, output_path):
    img = Image.open(image_path).convert("RGBA")
    data = img.getdata()
    
    new_data = []
    for item in data:
        r, g, b, a = item
        # If the pixel is dark (part of the black stroke) and has some opacity
        if a > 0:
            # Calculate brightness
            brightness = max(r, g, b)
            if brightness < 80:
                # Completely black or very dark gray -> make transparent
                new_data.append((r, g, b, 0))
            elif brightness < 150:
                # Transition edge (anti-aliasing)
                # Reduce opacity heavily for dark anti-aliased edges
                # Neon green is around 200+.
                factor = (brightness - 80) / 70.0 # 0 to 1
                new_data.append((r, g, b, int(a * factor * factor)))
            else:
                new_data.append((r, g, b, a))
        else:
            new_data.append(item)
            
    img.putdata(new_data)
    img.save(output_path)

remove_black_halo('assets/img/logo/automatixes-logo-new.png', 'assets/img/logo/automatixes-logo-clean.png')
print("Processed logo to remove black halo.")
