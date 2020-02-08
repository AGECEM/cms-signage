const VITESSE_DEFILEMENT = 15;

document.addEventListener('DOMContentLoaded', (event) => {
    startMessages()
});

function startMessages() {
    const elem = document.getElementById("text-content");
    console.log(elem.offsetLeft);
    let pos = elem.offsetWidth;
    setInterval(move, VITESSE_DEFILEMENT);

    function move() {
        pos--;
        elem.style.left = pos + 'px';
    }
}

function fetchMessages() {
    return new Promise((resolve) => {
        fetch('getMessages.php')
            .then(response => response.json())
            .then(json => {
                console.log(Object.values(json));
                resolve()
            });
    });
}
