const wrapper = document.querySelector('.chat-wrapper');
if (wrapper) {
    const info = Array.from(wrapper.children).map(c => ({
        tag: c.tagName,
        className: c.className,
        isClickable: typeof c.click === 'function'
    }));
    console.log(JSON.stringify(info));
} else {
    console.log("No wrapper");
}
