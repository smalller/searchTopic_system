let open = document.getElementById("open");
let close = document.getElementById("close");
let close_box = document.getElementById("close-box");
let black_box = document.getElementById("black-box");

let choice_topic = document.getElementById("choice-topic");
let alert_topic = document.getElementById("alert-topic");
let close_topic = document.getElementById("close-topic");

open.onclick = function() {
    close_box.style.display = "block";
    black_box.style.display = "block";
}

close.onclick = function() {
    close_box.style.display = "none";
    black_box.style.display = "none";
}

black_box.onclick = function() {
    close_box.style.display = "none"
    black_box.style.display = "none";
    alert_topic.style.display = "none";
    black_box.style.display = "none";
}



// choice_topic.onclick = function() {
//     alert_topic.style.display = "block";
//     black_box.style.display = "block";
// }

// close_topic.onclick = function() {
//     alert_topic.style.display = "none";
//     black_box.style.display = "none";
// }