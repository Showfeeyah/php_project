<?php
session_start();
if(isset($_SESSION['username']))
{
header('Location: home.php');
}else{
  include('login.php');
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP Login Form with Session</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>
<h1>PHP Login Form with Session</h1>
<div class="loginBox">
<h3>Login Form</h3>
<br><br>
<form method="post" action="home.php">
<label>Username:</label><br>
<input type="text" name="username" placeholder="username" /><br><br>
<label>Password:</label><br>
<input type="password" name="password" placeholder="password" />  <br><br>
<input type="submit" name="dologin" value="Login" /> 
</form>
<div class="error"><?php echo $error;?></div>
<?php
$db=mysqli_connect('localhost','root','','php_project');
$sql = mysqli_query($db,"SELECT username,password FROM users WHERE username='sophiya' ");

$row=mysqli_fetch_array($sql,MYSQLI_ASSOC);

$login_user=$row['username'];
$login_password=$row['password'];
 echo "Default : <br> username:$login_user";
 echo "<br>";
 echo "password:$login_password";?>
</div>
</body>
</html>
