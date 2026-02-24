export function djb2Hue(s: string) {
    let h = 5381;
    for (let i = 0; i < s.length; i++) {
        h = (h << 5) + h + s.charCodeAt(i);
        h = h | 0;
    }
    return Math.abs(h) % 360;
}

export function filterForTitle(title: string) {
    const hue = djb2Hue(title);
    return `grayscale(80%) sepia(100%) saturate(1000%) hue-rotate(${hue}deg)`;
}
