<?php 
session_start();
require 'connect.php';
if (!empty($_SESSION['id'])){
    $idUser = $_SESSION['id'];
    $result = $link->query("SELECT * FROM good WHERE id_user='$idUser'");  
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
            <h1 class="zagolovok">Мои Объявления</h1>
                <div class="profileContent">
                <?php
                if (!empty($_SESSION['id'])){
                   $i = 0;
                while($row = $result->fetch_assoc())
                    {   
                        $i++;
                        echo "
                        <div class='good'>
                        <div class='divGood'> <img class='imgGood' src=" . $row['filePath'] . "></div>
                        <div class='nameGood'>" . $row['name'] . "</div>
                        <div class='prizeGood'>" . $row['prize'] . "</div></div>";  
                    }
                    }  else {
                        echo "<a href='login.php'>Чтобы просмотреть свои размещенные объявления авторизуйтесь.";
                }
                ?>
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