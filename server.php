<?php
session_start();
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '0000';
$conn = new mysqli($dbhost, $dbuser, $dbpass, 'registration');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
  $username = $_POST['name'];
  $email = $_POST['email'];
  $numberp =  $_POST['phone'];
  $massage =  $_POST['texxt'];
  $select =  $_POST['select'];
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['username'] === $username) {
      if ($user['email'] === $email){
      echo "errrrrors:такой пользователь уже есть!!";
      exit();
      }
    }

    if ($user['email'] === $email) {
      if ($user['username'] === $username) {
        echo "errrrrors:такой пользователь уже есть!!";
        exit();
      }
    }
  }
  $query = "INSERT INTO users (username, email, number) 
                          VALUES('$username', '$email', '$numberp')";
     mysqli_query($conn, $query);
  $query1 = "INSERT INTO massages (message)
                          VALUES('$massage')";
                          
        mysqli_query($conn, $query1);
  $query2 = "INSERT INTO selc (selectr)
                          VALUES('$select')";
                          
        mysqli_query($conn, $query2);   
        $pdo = new PDO('mysql:host=localhost;dbname=registration', 'root', '0000');

        
        $stmt = $pdo->prepare("SELECT * FROM users ORDER BY id DESC LIMIT 1");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        foreach ($row as $key => $value) {
                echo '<p>'.$key.' : '.$value.'</p>';
            }
            $stmt = $pdo->prepare("SELECT * FROM massages ORDER BY id DESC LIMIT 1");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            foreach ($row as $key => $value) {
                    echo '<p>'.$key.' : '.$value.'</p>';
                }
                $stmt = $pdo->prepare("SELECT * FROM selc ORDER BY id DESC LIMIT 1");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        foreach ($row as $key => $value) {
                echo '<p>'.$key.' : '.$value.'</p>';
            }
        $pdo = null;
 
        $conn->close();
  ?>
