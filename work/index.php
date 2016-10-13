<?php
session_start(); //Запускаем сессии
$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('Ошибка соединения: ' . mysql_error());
}
echo 'Успешно соединились';


include "auth.php";
include "template.php";
include "reg.php";
$auth = new AuthClass();
		echo("</br>"."пароль".$_POST['login']."пароль"."</br>");
		echo("пароль".$_POST["password"]."пароль"."</br>");
		
if (isset($_POST['login']) && isset($_POST["password"])) { //Если логин и пароль были отправлены
    if (!$auth->auth($_POST["login"], $_POST["password"])) { //Если логин и пароль введен не правильно
        echo "<h2 style=\"color:blue;\">Логин и пароль введен не правильно!</h2>";
    }
}

if (isset($_GET["is_exit"])) { //Если нажата кнопка выхода
    if ($_GET["is_exit"] == 1) {
        $auth->out(); //Выходим
        //Редирект после выхода
		header("Location: index1.php");
		
    }
}
?>

<?php if ($auth->isAuth()) { // Если пользователь авторизован, приветствуем:  

    echo "Здравствуйте, " . $auth->getLogin() ;
    echo "<br/><br/><a href=\"?is_exit=1\">Выйти</a>"; //Показываем кнопку выхода
} 
else { //Если не авторизован, показываем форму ввода логина и пароля

$p = new RenderTemplate();
$p->setTpl('form.php');
$p->setVar(array());
$content=$p->render(); 

}
$p = new RenderTemplate();
$p->setTpl('temp.php');
$p->setVar(array("content"=>$content));
$html=$p->render(); 
echo $html;
 ?>