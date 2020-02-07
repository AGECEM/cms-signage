document.addEventListener('DOMContentLoaded', (event) => {
    startDateTime()
});

function startDateTime() {
    setDateTime();
    setInterval(function () {
        setDateTime()
    }, 60000);
}

function setDateTime() {
    document.getElementById("time").innerHTML = currentTime();
    document.getElementById("date").innerHTML = currentDate();
}

function currentTime() {
    const date = new Date();
    const hours = date.getHours() < 10 ? "0" + date.getHours() : date.getHours();
    const minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();

    return hours + ":" + minutes;
}

function currentDate() {
    const d = new Date();
    const day = getDayOfWeek(d.getDay());
    const date = d.getDate();
    const month = getMonth(d.getMonth());

    return day + " " + date + " " + month;
}

function getDayOfWeek(day) {
    switch (day) {
        case 0:
            return "Dim";
        case 1:
            return "Lun";
        case 2:
            return "Mar";
        case 3:
            return "Mer";
        case 4:
            return "Jeu";
        case 5:
            return "Ven";
        case 6:
            return "Sam";
    }
}

function getMonth(month) {
    switch (month) {
        case 0:
            return "Jan";
        case 1:
            return "Fév";
        case 2:
            return "Mar";
        case 3:
            return "Avr";
        case 4:
            return "Mai";
        case 5:
            return "Juin";
        case 6:
            return "Juil";
        case 7:
            return "Août";
        case 8:
            return "Sep";
        case 9:
            return "Oct";
        case 10:
            return "Nov";
        case 11:
            return "Déc";
    }
}
