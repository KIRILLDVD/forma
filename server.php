<?php
session_start();

$username = "";
$email    = "";
$errors = array(); 

$db = mysqli_connect('localhost', 'root', '0000', 'registration');

if (isset($_POST['button'])) {
 
  $username = mysqli_real_escape_string($db, $_POST['name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $numberp = mysqli_real_escape_string($db, $_POST['phone']);
  $massage = mysqli_real_escape_string($db, $_POST['texxt']);
  $select = mysqli_real_escape_string($db, $_POST['select']);
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['username'] === $username) {
      if ($user['email'] === $email){
      array_push($errors, "xxx");
      }
    }

    if ($user['email'] === $email) {
      if ($user['username'] === $username) {
        array_push($errors, "yyy");
      }
    }
  }

  if (count($errors) == 0) {
        $query = "INSERT INTO users (username, email, number) 
                          VALUES('$username', '$email', '$numberp')";
        mysqli_query($db, $query);
        
        
        
  }
  $query1 = "INSERT INTO massages (message)
                          VALUES('$massage')";
                          
        mysqli_query($db, $query1);
  $query2 = "INSERT INTO selc (selectr)
                          VALUES('$select')";
                          
        mysqli_query($db, $query2);      
}
  ?>