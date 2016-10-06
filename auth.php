<?php
class AuthClass {
	
   // private $_login = "login"; //”станавливаем логин
   


    public function isAuth() {
        if (isset($_SESSION["is_auth"])) { //≈сли сесси€ существует
            return $_SESSION["is_auth"]; //¬озвращаем значение переменной сессии is_auth (хранит true если авторизован, false если не авторизован)
        }
        else return false; //ѕользователь не авторизован, т.к. переменна€ is_auth не создана
    }
    public function auth($login, $password) 
		{
			
		echo("</br>"."пароль".$login."пароль"."</br>");
		echo("пароль".$password."пароль"."</br>");
		$link = mysql_connect('localhost', 'root', '');
		mysql_select_db('403gr', $link);
		$_pass = mysql_query("select password from auth where login=".$login."");
		$passw = mysql_fetch_row($_pass);
		$pass=$passw[0];
		echo("</br>"."пароль".$login."пароль"."</br>");
		echo("пароль".$pass."пароль"."</br>");
        if ($password == $pass) { 
            $_SESSION["is_auth"] = true; //ƒелаем пользовател€ авторизованным
            $_SESSION["login"] = $login; //«аписываем в сессию логин пользовател€
            return true;
        }
        else { //Ћогин и пароль не подошел
            $_SESSION["is_auth"] = false;
            return false; 
        }
    }
    
    /**
     * ћетод возвращает логин авторизованного пользовател€ 
     */
    public function getLogin() {
        if ($this->isAuth()) { //≈сли пользователь авторизован
            return $_SESSION["login"]; //¬озвращаем логин, который записан в сессию
        }
    }
    
    
    public function out() {
        $_SESSION = array(); //ќчищаем сессию
        session_destroy(); //”ничтожаем
    }
}
