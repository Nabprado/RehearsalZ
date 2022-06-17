const div = document.getElementById('new_track');
const div2 = document.getElementById('new_track2');
const btn = document.getElementById('add_track');
let x = 0;

btn.onclick = showDiv

function showDiv(e){
    e.preventDefault();
    x++;
    if(x == 1){
        div.style.display = 'block';
    }
    else if(x == 2){
        div2.style.display = 'block';
        btn.style.display = 'none'
    }
}
