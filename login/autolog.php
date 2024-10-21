<?php
require_once('connexion.php');

if (isset($_COOKIE["user_id"])) {

$userid = $_COOKIE["user_id"];
$email = $_COOKIE["user_email"];
$st = $db->prepare("SELECT * FROM users WHERE id = :id AND email = :email");
$st->execute(['id' => $userid, 'email' => $email]);
$user = $st->fetch();
if ($user) {

  $_SESSION["password"] = $user['password'];
  $_SESSION["id"] = $user['id'];
  $_SESSION["photo"] = $user['photo'];
  $_SESSION["username"] = $user['username'];
  $_SESSION["email"] = $user['email'];
  $_SESSION['role'] = $user['role'];
  $_SESSION["first_name"] = $user['first_name'];
  $_SESSION['last_name'] = $user['last_name'];
  $_SESSION["phone"] = $user['phone'];
  $_SESSION['created_at'] = $user['created_at'];
  
}



}

