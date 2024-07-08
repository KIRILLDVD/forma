const phoneInput = document.querySelector(".phone");
const btn = document.querySelector(".btn");

const mask = new IMask(phoneInput, {
  mask: "+{7}(000)000-00-00",
});

function ValidMail() {
  var re = /^[\w-\.]+@[\w-]+\.[a-z]{2,4}$/i;
  var myMail = document.getElementById("email").value;
  var valid = re.test(myMail);
  if (valid) output = "";
  else {
    output = "Адрес электронной почты введен неправильно!";
    event.preventDefault();
  }
  document.getElementById("message").innerHTML = output;
  return valid;
}
function ValidPhone() {
  var re = /^[\d\+][\d\(\)\ -]{4,14}\d$/;
  var myPhone = document.getElementById("phone").value;
  var valid = re.test(myPhone);
  const lengnumber = document.querySelector("#phone");
  if (valid && lengnumber.value.length == 16) output = "";
  else {
    output = "Номер телефона введен неправильно!";
    event.preventDefault();
  }
  document.getElementById("mes").innerHTML = output;
  return valid;
}

var num;
function generate() {
  num = Math.floor(Math.random() * (9999 - 1000) + 1000);
  output = "Ваше число:" + num;
  document.getElementById("result").innerText = output;
  return num;
}

function ValidCaptcha() {
  var vvod = document.getElementById("captch").value;
  if (vvod == num) {
    output = "";
  } else {
    output = "Не верно введена капча";
    event.preventDefault();
  }
  document.getElementById("bbq").innerHTML = output;
}
