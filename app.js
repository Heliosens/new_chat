let userSay = document.getElementById('user-say');
userSay.focus();
let sendBtn = document.getElementById('send');
// get user name
let screen = document.getElementById('screen');

// setInterval(updateDisplay, 1000);
updateDisplay();

sendBtn.addEventListener('click', nextSentence);

// create XML object
function updateDisplay (){
    const xhr = new XMLHttpRequest();
    xhr.onload = function (){
        let text = JSON.parse(xhr.responseText);
        for(let sentence of text) {
            let item = document.createElement('p');
            let span = document.createElement('span');
            span.innerHTML = sentence['author'] + " : ";
            item.appendChild(span);
            item.innerHTML += sentence['sentence'];
            screen.appendChild(item);
        }
    }
    // Ajax request
    xhr.open("GET", "/api/dialogue.php");
    xhr.send();
}

// send answer to db
function nextSentence (){
    let sentence = userSay.value;
    if(!sentence) {
        alert('Veuillez entrer un message')
    }
    else {
        let xhr = new XMLHttpRequest();
        xhr.onload = function (){
            console.log(xhr.responseText);
            screen.innerHTML += xhr.responseText;
            let newSentence = JSON.parse(xhr.responseText);
        }
        let dialogue = {
            'sentence' : sentence,
            'user_fk' : 1
        }
        xhr.open('POST', '/api/answer.php');
        xhr.send(JSON.stringify(dialogue));
    }
}
