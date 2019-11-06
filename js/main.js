let open = document.getElementById("open");
let close = document.getElementById("close");
let close_box = document.getElementById("close-box");
let black_box = document.getElementById("black-box");


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
    black_box.style.display = "none";
}

