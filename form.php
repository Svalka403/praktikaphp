<form method="post" action="">
    �����: <input type="text" name="login" value="<?php echo (isset($_POST["login"])) ? $_POST["login"] : null; // ��������� ���� �� ��������� ?>" /><br/>
    ������: <input type="password" name="password" value="" /><br/>
    <input type="submit" value="�����" />
</form>