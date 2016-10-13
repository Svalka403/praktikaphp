<form method="post" action="">
    Логин: <input type="text" name="login" value="<?php echo (isset($_POST["login"])) ? $_POST["login"] : null; // Заполняем поле по умолчанию ?>" /><br/>
    Пароль: <input type="password" name="password" value="" /><br/>
	Фамилия:
	Имя:
	Отчество:
    <input type="submit" value="Войти" />
</form>
<button type="button" value="reg" onclick="location.href='reg.php'">РЕГА</button>