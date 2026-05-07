<?php
// login_secure.php
// This page does NOT accept sid via GET. It demonstrates secure handling.
session_start();
if (!empty($_SESSION['username'])) {
header("Location: protected_secure.php");
exit();
}
?>
<!doctype html>
<html>
<body>
<h3>Login (secure demo)</h3>
<form action="process_login_secure.php" method="post">
Username: <input name="username"><br>
Password: <input name="password" type="password"><br>
<input type="submit" value="Login">
</form>
<p>Current PHPSESSID (if set): <?php echo session_id(); ?></p>
</body>
</html>