<?php
function processForm($email, $phone) {
    $connection = new mysqli('localhost', 'root', '0000', 'registration');
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    
    $query = "SELECT * FROM users WHERE email = ? AND number = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param('ss', $email, $phone);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $last_insert_id = $row['id'];


$message = $_POST['texxt'];
$title =$_POST['select'];
$query = "INSERT INTO massages (id_user, message) VALUES (?, ?)";
$stmt = $connection->prepare($query);
$stmt->bind_param('is', $last_insert_id, $message);
$stmt->execute();
$stmt->close();
$query = "INSERT INTO selc (id_user, selectr) VALUES (?, ?)";
$stmt = $connection->prepare($query);
$stmt->bind_param('is', $last_insert_id, $title);
$stmt->execute();
$stmt->close();

    }



return true;
    } else {
   
        $username = $_POST['name'];
        $query = "INSERT INTO users (username, email, number) VALUES (?, ?, ?)";
        $stmt = $connection->prepare($query);
        $stmt->bind_param('sss',$username, $email, $phone);
        $stmt->execute();
        $stmt->close();

        $last_insert_id = $connection->insert_id;

        $message = $_POST['texxt'];
        $title =$_POST['select'];
        $query = "INSERT INTO massages (id_user, message) VALUES (?, ?)";
        $stmt = $connection->prepare($query);
        $stmt->bind_param('is', $last_insert_id, $message);
        $stmt->execute();
        $stmt->close();
        $query = "INSERT INTO selc (id_user, selectr) VALUES (?, ?)";
$stmt = $connection->prepare($query);
$stmt->bind_param('is', $last_insert_id, $title);
$stmt->execute();
$stmt->close();
        return true;
    }
    $connection->close();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['texxt'];
    $username = $_POST['name'];
    $title = $_POST['select'];

    if (processForm($email, $phone)) {
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

      
    } else {
        echo "Такой контакт уже существует.";
    }
}
?>