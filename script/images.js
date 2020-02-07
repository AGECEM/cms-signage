const IMAGE_TIME = 12000;
let images = [];

document.addEventListener('DOMContentLoaded', (event) => {
    startImages()
});

function startImages() {
    fetchImages().then(() => {
        nextImage()
    });
    setInterval(function () {
        if (images.length > 0) {
            nextImage()
        }
    }, IMAGE_TIME)
}

function fetchImages() {
    return new Promise((resolve) => {
        fetch('getImages.php')
            .then(response => response.json())
            .then(json => {
                images = images.concat(Object.values(json));
                resolve()
            });
    });
}

function nextImage() {
    document.getElementById("image")
        .setAttribute("src", "contenu/" + images[0]);
    images.shift();
    if (images.length < 1) {
        fetchImages();
    }
}
