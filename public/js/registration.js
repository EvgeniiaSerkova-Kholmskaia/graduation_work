'use strict';

let form = document.querySelector('form');

var check = function() {
  if (document.getElementById('password').value !==  document.getElementById('repeat_password').value) {
      document.getElementById('message').style.color = 'red';
      document.getElementById('message').innerHTML = 'Пароль не совпадает!';
  } else {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Пароль совпадает!';

    let agr = form.elements.agree;
    agr.addEventListener("change", openBut);
    function openBut(){
      if (agr.checked){
        document.getElementById('subm').removeAttribute("disabled");
      } else {
        document.getElementById('subm').setAttribute("disabled", "true");
      }
    }
  }
}

// проверка на логин (буквы, цифры)
// проверка на дату

let answer = document.querySelector('#answer');

form.addEventListener('submit', async (event)=>{
  event.preventDefault();
  const response = await fetch(form.action, {
      method: form.method,
      body: new FormData(form)
});
  const answer = await response.json();
  responseHandler(answer)
});

function responseHandler(serverAnswer) {
    console.log(serverAnswer);
    if(serverAnswer['answer_state']=== 'error'){
      answer.innerText = serverAnswer['reason'];
    } else if (serverAnswer['answer_state']=== 'succcess'){
      answer.innerText = serverAnswer['reason'];
      location.href = 'user-login.html.twig';
    } else {
      console.log(serverAnswer['reason']);
    }

}
