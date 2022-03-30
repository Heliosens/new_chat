let userSay = document.getElementById('user-say');
userSay.focus();
// get user name
let name = document.getElementById('user-name');
let connect = document.getElementById('connect');

let screen = document.getElementById('screen');
let say = document.getElementById('user-say');

// create XML object
let xhr = new XMLHttpRequest();

// Ajax request
xhr.open("GET", "/api/dialogue.php", false); // synchronus

xhr.send();
console.log(xhr);

if(xhr.status === 200){
    console.log("oui");
}
else {
    console.log("error");
}
