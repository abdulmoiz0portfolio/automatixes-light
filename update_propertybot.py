import re
import os

filepath = 'propertybot.php'
with open(filepath, 'r', encoding='utf-8') as f:
    content = f.read()

replacements = {
    'bg-slate-950': 'bg-slate-50',
    'bg-slate-900': 'bg-white',
    'bg-slate-800': 'bg-slate-100',
    'text-slate-200': 'text-slate-800',
    'text-slate-300': 'text-slate-700',
    'text-slate-400': 'text-slate-600',
    'border-slate-800': 'border-slate-200',
    'border-slate-700': 'border-slate-300',
    'hover:bg-emerald-950/60': 'hover:bg-emerald-50',
    'hover:border-emerald-500/50': 'hover:border-emerald-500/30',
    'text-emerald-300': 'text-emerald-700',
    'hover:text-emerald-300': 'hover:text-emerald-700'
}

for old, new in replacements.items():
    content = content.replace(old, new)

# Force the body background to be light gray instead of dark, actually it uses Bootstrap globals but Tailwind is mixed.
with open(filepath, 'w', encoding='utf-8') as f:
    f.write(content)

print("Updated propertybot.php.")
