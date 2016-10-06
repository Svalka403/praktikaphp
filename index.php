<?php
session_start(); //Запускаем сессии
$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('Ошибка соединения: ' . mysql_error());
}
echo 'Успешно соединились';

/*mysql_select_db('40sgr', $link);

$result = mysql_query("select * from users ");
//$myrow = mysql_fetch_assoc($result);
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        print_r ($row);
    }

print_r($myrow);*/
include "auth.php";
include "template.php";
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
        header("Location: ?is_exit=0"); //Редирект после выхода
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