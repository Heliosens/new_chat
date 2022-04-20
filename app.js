// get user entries
let userName = document.getElementById('user-name');
let userSay = document.getElementById('user-say');

// get buttons
let goBtn = document.getElementById('go');
let sendBtn = document.getElementById('send');

// get screen
let screen = document.getElementById('screen');

// listen btn
if(goBtn){
    goBtn.addEventListener('click', function (){
        if(userName.value === "") {
            alert('Veuillez entrer un nom');
        }
        else {
            updateDisplay();
        }
    });
}

if(sendBtn){
    sendBtn.addEventListener('click', function () {
        if(userSay.value.length > 0 ){
            nextSentence();
        }
        else {
            alert('Veuillez entrer un message');
        }
    });
}

// update display
setInterval(updateDisplay, 1000);

// create XML object
function updateDisplay (){
    const xhr = new XMLHttpRequest();
    xhr.onload = function (){
        screen.innerHTML = "";

        let text = JSON.parse(xhr.responseText);

        for(let sentence of text) {
            let item = document.createElement('p');
            let span1 = document.createElement('span');
            span1.innerHTML = sentence['author'] + " : ";
            let span2 = document.createElement('span');
            span2.innerHTML = sentence['sentence'];
            item.appendChild(span1);
            item.appendChild(span2);
            screen.prepend(item);
        }
    }
    xhr.open("GET", "/api/read.php");
    xhr.send();
}

// send answer to db
function nextSentence (){
    let sentence = userSay.value;
    userSay.value = "";
    let jsonText = JSON.stringify(sentence);

    let xhr = new XMLHttpRequest();
    xhr.open('POST', '/api/write.php');
    xhr.send(jsonText);
}
