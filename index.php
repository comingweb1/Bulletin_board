<?php 
session_start();
require 'connect.php';


$query = "SELECT * FROM goods";
$result = $link->query("SELECT * FROM good");
$i = 0;
		while($row = $result->fetch_assoc())
		{	
		    $rowname[$i] = $row['name'];
		    $rowprize[$i] = $row['prize'];
		    $rowfilePath[$i] = $row['filePath'];
		    $i++;
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
	<div class="wrapper"></div>
			<div class="header">
			<img class="logo-img" src="img/logo.jpg">
			<img class="logoMain" src="img/logoMain.png">
				<div class="login">
					<?php  if (!empty($_SESSION['login'])) 
						{
						echo $_SESSION['login'];
						echo "<a href='logout.php'>Выход</a>";						
						} else {
						echo "<a href='login.php'>Вход</a>";
						}
						?></br>
				</div>
			</div>
	<div class="container row ">
		<div class="content">
							<div class="good">
									<div class="divGood"><?php echo "<img class='imgGood' src=$rowfilePath[0]>" ?></div>
									<div class="nameGood"><?php echo $rowname[0]?></div>
									<div class="prizeGood"><?php echo $rowprize[0] . ' ₽'?></div>
								</div>
								<div class="good">
									<div class="divGood"><?php echo "<img class='imgGood' src=$rowfilePath[1]>" ?></div>
									<div class="nameGood"><?php echo $rowname[1]?></div>
									<div class="prizeGood"><?php echo $rowprize[1]  . ' ₽'?></div>
								</div>
								<div class="good">
									<div class="divGood"><?php echo "<img class='imgGood' src=$rowfilePath[2]>" ?></div>
									<div class="nameGood"><?php echo $rowname[2]?></div>
									<div class="prizeGood"><?php echo $rowprize[2]  . ' ₽'?></div>
								</div>
								<div class="good">
									<div class="divGood"><?php echo "<img class='imgGood' src=$rowfilePath[3]>" ?></div>
									<div class="nameGood"><?php echo $rowname[3]?></div>
									<div class="prizeGood"><?php echo $rowprize[3]  . ' ₽'?></div>
								</div>
									<div class="good">
									<div class="divGood"><?php echo "<img class='imgGood' src=$rowfilePath[4]>" ?></div>
									<div class="nameGood"><?php echo $rowname[4]?></div>
									<div class="prizeGood"><?php echo $rowprize[4]  . ' ₽'?></div>
								</div>
									<div class="good">
									<div class="divGood"><?php echo "<img class='imgGood' src=$rowfilePath[5]>" ?></div>
									<div class="nameGood"><?php echo $rowname[5]?></div>
									<div class="prizeGood"><?php echo $rowprize[5]  . ' ₽'?></div>
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