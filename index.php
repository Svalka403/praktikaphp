<?php
session_start(); //��������� ������
$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('������ ����������: ' . mysql_error());
}
echo '������� �����������';

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
        header("Location: ?is_exit=0"); //�������� ����� ������
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