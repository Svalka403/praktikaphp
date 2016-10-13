<?php

session_start(); //стартуем сессию
$link = mysql_connect('localhost', 'root', '');

if (!$link) die('Ошибка соединения: ' . mysql_error());

include "auth.php";//авторизация
include "template.php";//заготовка

$auth = new AuthClass();
		//echo("</br>"."пароль".$_POST['login']."пароль"."</br>");
		//echo("пароль".$_POST["password"]."пароль"."</br>");я человек простой ... дебажу эхами
		
if (isset($_POST['login']) && isset($_POST["password"])) 
	{ //Если логин и пароль были отправлены
		if (!$auth->auth($_POST["login"], $_POST["password"])) 
			{ //Если логин и пароль введен не правильно
				echo "<h2 style=\"color:blue;\">Логин и пароль введен не правильно!</h2>";
			}
	}
