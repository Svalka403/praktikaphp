<?php
session_start(); //��������� ������
$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('������ ����������: ' . mysql_error());
}
echo '������� �����������';


include "auth.php";
include "template.php";
include "reg.php";
$auth = new AuthClass();
		echo("</br>"."������".$_POST['login']."������"."</br>");
		echo("������".$_POST["password"]."������"."</br>");
		
if (isset($_POST['login']) && isset($_POST["password"])) { //���� ����� � ������ ���� ����������
    if (!$auth->auth($_POST["login"], $_POST["password"])) { //���� ����� � ������ ������ �� ���������
        echo "<h2 style=\"color:blue;\">����� � ������ ������ �� ���������!</h2>";
    }
}

if (isset($_GET["is_exit"])) { //���� ������ ������ ������
    if ($_GET["is_exit"] == 1) {
        $auth->out(); //�������
        //�������� ����� ������
		header("Location: index1.php");
		
    }
}
?>

<?php if ($auth->isAuth()) { // ���� ������������ �����������, ������������:  

    echo "������������, " . $auth->getLogin() ;
    echo "<br/><br/><a href=\"?is_exit=1\">�����</a>"; //���������� ������ ������
} 
else { //���� �� �����������, ���������� ����� ����� ������ � ������

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