<?php
class AuthClass {
	
   // private $_login = "login"; //������������� �����
   


    public function isAuth() {
        if (isset($_SESSION["is_auth"])) { //���� ������ ����������
            return $_SESSION["is_auth"]; //���������� �������� ���������� ������ is_auth (������ true ���� �����������, false ���� �� �����������)
        }
        else return false; //������������ �� �����������, �.�. ���������� is_auth �� �������
    }
    public function auth($login, $password) 
		{
			
		echo("</br>"."������".$login."������"."</br>");
		echo("������".$password."������"."</br>");
		$link = mysql_connect('localhost', 'root', '');
		mysql_select_db('403gr', $link);
		$_pass = mysql_query("select password from auth where login=".$login."");
		$passw = mysql_fetch_row($_pass);
		$pass=$passw[0];
		echo("</br>"."������".$login."������"."</br>");
		echo("������".$pass."������"."</br>");
        if ($password == $pass) { 
            $_SESSION["is_auth"] = true; //������ ������������ ��������������
            $_SESSION["login"] = $login; //���������� � ������ ����� ������������
            return true;
        }
        else { //����� � ������ �� �������
            $_SESSION["is_auth"] = false;
            return false; 
        }
    }
    
    /**
     * ����� ���������� ����� ��������������� ������������ 
     */
    public function getLogin() {
        if ($this->isAuth()) { //���� ������������ �����������
            return $_SESSION["login"]; //���������� �����, ������� ������� � ������
        }
    }
    
    
    public function out() {
        $_SESSION = array(); //������� ������
        session_destroy(); //����������
    }
}
