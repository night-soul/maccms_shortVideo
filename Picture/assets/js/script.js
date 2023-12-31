document.addEventListener('DOMContentLoaded', (event) => {
    let touchstartX = 0;
    let touchendX = 0;
    let touchstartY = 0;
    let touchendY = 0;

    const imageContainer = document.getElementById('randomImage');

    function handleGesture() {
        if (touchendX > touchstartX) {
            window.location.href = '../';
        }
        if (touchendX < touchstartX) {
            fetchRandomImage();
        }
    }

    function fetchRandomImage() {
        fetch('index.php')
            .then(response => response.text())
            .then(html => {
                const doc = new DOMParser().parseFromString(html, 'text/html');
                const newImageUrl = doc.getElementById('randomImage').src;
                imageContainer.src = newImageUrl;
            });
    }

    document.addEventListener('touchstart', e => {
        touchstartX = e.changedTouches[0].screenX;
        touchstartY = e.changedTouches[0].screenY;
    });

    document.addEventListener('touchend', e => {
        touchendX = e.changedTouches[0].screenX;
        touchendY = e.changedTouches[0].screenY;
        handleGesture();
    });
});
