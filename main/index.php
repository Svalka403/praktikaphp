<?php

session_start(); //�������� ������
$link = mysql_connect('localhost', 'root', '');

if (!$link) die('������ ����������: ' . mysql_error());

include "auth.php";//�����������
include "template.php";//���������

$auth = new AuthClass();
		//echo("</br>"."������".$_POST['login']."������"."</br>");
		//echo("������".$_POST["password"]."������"."</br>");� ������� ������� ... ������ �����
		
if (isset($_POST['login']) && isset($_POST["password"])) 
	{ //���� ����� � ������ ���� ����������
		if (!$auth->auth($_POST["login"], $_POST["password"])) 
			{ //���� ����� � ������ ������ �� ���������
				echo "<h2 style=\"color:blue;\">����� � ������ ������ �� ���������!</h2>";
			}
	}
