<?php include('server.php') ?>
<!DOCTYPE html>
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
    
    <title>Forma</title>
  </head>
  <h1 class="head">Напишите нам</h1>
  <body class="main">
    <div class="container">
      <form  class="form" method="post" action="index.php">
      <?php include('errors.php'); ?>
        <div class="inp"><label >Ваше имя:</label>
          <img class="fa" src="user.png" alt="">
        <input id="name" name="name"  required type="text"  >
        
      </div>
        
        
        <div class="inp">
                <label  >Email:</label>
                <img src="mail.png" class="fa" alt="">
                <input  id="email" name="email" type="text" required  />
                <p class="error" id="message"></p>
            
        </div>
        
  

        <div class="inp">
            <label>Ваш телефон:</label>
            <img src="phon.png" class="fa" alt="">
            <input id="phone" class="phone" 
            placeholder="+7(___)___-__-__" name="phone" type="tel" required /><br />
            <p class="error" id="mes"></p></div>
            
            <div class="inp"><label>Тема:</label>
              <select name="select" id="select">
                  <option value="техподдержка">Техподдержка</option>
                  <option value="продажи">Продажи</option>
                   <option value="другое">Другое</option>
                  <option value="faq">FAQ</option>
              </select>
              
              </div>
            <div class="inp"><label for="text">Ваше сообщение:</label><textarea required  class="text" name="texxt" id="texxt" ></textarea></div>
        </div>
        <div class="cap">
          Цифры:
          <input id="captch" type="number" class="inpcap" required>
          

          <button class="newgen" type="button" onclick="generate()">NEW</button>
          
          <p class="capcha" id="result" >Ваше число: </p > 
          
        
          
        </div>

        <input class="btn" type="submit" value="Отправить"  name="button" onclick="ValidMail(); ValidPhone(); ValidCaptcha()" />
        <p class="bbq" id="bbq"></p>
        
        
      </form>
    </div>

    <script src="https://unpkg.com/imask"></script>
    <script src="app.js"></script>
  </body>
  </html>
