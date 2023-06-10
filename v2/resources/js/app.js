/* функция добавления ведущих нулей */
/* (если число меньше десяти, перед числом добавляем ноль) */
function zeroFirstFormat(value) {
    if (value < 10) {
        value = '0' + value;
    }
    return value;
}

/* функция получения текущей даты и времени на устройстве */
function currentTime() {
    var current_datetime = new Date();
    var date = zeroFirstFormat(current_datetime.getDate());
    var month = zeroFirstFormat(current_datetime.getMonth() + 1);
    var year = current_datetime.getFullYear();
    var hours = zeroFirstFormat(current_datetime.getHours());
    var minutes = zeroFirstFormat(current_datetime.getMinutes());
    var seconds = zeroFirstFormat(current_datetime.getSeconds());

    return `${date}.${month}.${year} ${hours}:${minutes}:${seconds}`;
}

function setCurrentTime() {
    document.getElementById('current_time').innerHTML = currentTime();
}

setCurrentTime();
setInterval(() => {
    setCurrentTime()
}, 1000);