<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title> CSS Login Screen Tutorial </title>
</head>
<body>
  <body>
    <div class="login-page">
      <div class="form">
        <div class="login">
          <div class="login-header">
            <h3>LOGIN</h3>
            <p>Please enter your credentials to login.</p>
          </div>
        </div>
        <form action="daftar.php" method="post">
          <input type="text" name="username" placeholder="username"/>
          <input type="password" name="password" placeholder="password"/>
          <input type="text" name="nomer_hp" placeholder="nomer"/>
          <input type="email" name="email" placeholder="email"/>
          <input type="text" name="alamat" placeholder="alamat"/>
          <input type="number" name="umur" placeholder="umur"/>
          <input type="submit" class="btn" name="submit" value="register"></input>
          <p class="message">Sudah punya akun? <a href="masuk.php">gasken</a></p>
        </form>
      </div>
    </div>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:300);
header .header{
  background-color: #fff;
  height: 45px;
}
header a img{
  width: 134px;
margin-top: 4px;
}
.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.login-page .form .login{
  margin-top: -31px;
margin-bottom: 26px;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background-color: #328f8a;
  background-image: linear-gradient(45deg,#328f8a,#08ac4b);
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}

.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}

body {
  background-color: #328f8a;
  background-image: linear-gradient(45deg,#328f8a,#08ac4b);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
    </style>
</body>
</body>
</html>
<?php
include "koneksi.php";
if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email=$_POST['email'];
  $umur=$_POST['umur'];
  $alamat=$_POST['alamat'];
  $nomer_hp=$_POST['nomer_hp'];

  $result = mysqli_query($koneksi, "INSERT INTO pembeli(username,password,email,umur,alamat,nomer_hp)
  VALUES('$username','$password','$email','$umur','$alamat','$nomer_hp')");
}
?>