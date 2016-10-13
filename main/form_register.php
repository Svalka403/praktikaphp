<form method="post" action="">
    Логин: <input type="text" name="login" value="<?php echo (isset($_POST["login"])) ? $_POST["login"] : null; // Заполняем поле по умолчанию ?>" /><br/>
    Пароль: <input type="password" name="password" value="" /><br/> 
	Повторить пароль: <input type="password" name="password_confirm" value="" /><br/>
    <input type="submit" value="Зарегистрироваться" />
</form>
