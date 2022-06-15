<?php 
session_start();

require 'connect.php';
	if (!empty($_POST['password']) and !empty($_POST['login'])) {
		$login = $_POST['login'];
		$password = $_POST['password'];
		
		$query = "SELECT * FROM users WHERE login='$login' AND password='$password'";
		$result = mysqli_query($link, $query);
		$user = mysqli_fetch_assoc($result);
		if (!empty($user) && !empty($_POST['login']) && !empty($_POST['password'])) {
			$_SESSION['auth'] = true;
			$_SESSION['login'] = $login;
			$_SESSION['id'] = $user['id']; 
			header('Location: index.php');
			}
			 else {
			$err = "Введен неверно логин или пароль";
		}
	
}					
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <link rel="stylesheet" href="style.css">
	<title>Доска объявлений</title>
</head>
<body>

	<div class="wrapper">
		<div class="header">
		<img class="logo-img" src="img/logo.jpg">
		<img class="logoMain" src="img/logoMain.png">
		<div class="login"><?php  if (!empty($_SESSION['login'])) 
											{
												echo $_SESSION['login'];
												echo "<a href='logout.php'>Выход</a>";
											} else {
												echo "<a href='login.php'>Вход</a>";
											}

										
											?>
		</div>
		</div>
	<div class="container row ">
		<div class="content">
			<div class="regForm">
				<form action="" method="POST">
					<?php 
					if (!empty($err)) {
						echo $err;
						}
						
						
					?>
					<p>Введите логин<p>
					<input name="login" type='login'>
					<p>Введите ваш пароль</p>
					<input name="password" type='password'></br>
					<input type='submit' value="Войти"> </br>
					<a href="registration.php">Нету аккаунта? Регистрация</a>	

				</form>
			</div>
		</div>
	<div class="sidebar">
		<p>Категории</p>
		<p><a href="newgood.php">Подать объявление</a></p>
		<p><a href="profile.php">Мои Объявления</a></p>
	</div>
	</div>			
	<div class="footer">Developed By Vlad Ryzhov</div>
	</div>
</body>
</html>