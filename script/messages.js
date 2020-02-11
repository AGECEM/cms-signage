const VITESSE_DEFILEMENT = 20;
let elems = [];

document.addEventListener('DOMContentLoaded', () => {
    startMessages()
});

function startMessages() {

    fetchMessages();

    const parent = document.getElementById("text-content");

    setInterval(() => {
        for (const child of parent.children) {
            child.style.left = child.getBoundingClientRect().x - 1 + 'px';
            if (child.getBoundingClientRect().right < 0) {
                parent.removeChild(child);
                if (parent.childElementCount < 10) {
                    fetchMessages();
                }
            }
        }
    }, VITESSE_DEFILEMENT);
}

function fetchMessages() {
    return new Promise((resolve) => {
        fetch('getMessages.php')
            .then(response => response.json())
            .then(json => {
                Object.values(json).forEach((value) => {
                    addDiv(value)
                });
                resolve()
            });
    });
}

function addDiv(content) {
    const parent = document.getElementById("text-content");
    const lastChild = parent.lastChild;
    const elem = document.createElement("div");
    elem.appendChild(document.createTextNode(content));
    parent.appendChild(elem);
    if (lastChild != null) {
        elem.style.left = lastChild.getBoundingClientRect().right + 50 + "px";
    }
    return elem;
}
