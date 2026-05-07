// === login.php (VULNERABLE DEMO: accepts SID if valid chars) ===
<?php
// login.php (vulnerable demo)
// Accept a sid via GET only if it matches allowed characters. This avoids PHP errors but still demonstrates fixation.
if (!empty($_GET['sid'])) {
$incoming_sid = $_GET['sid'];
if (preg_match('/^[A-Za-z0-9,-]+$/', $incoming_sid)) {
// Accept this sid (vulnerable behavior for demo)
session_id($incoming_sid);
}
}


session_start();


// If already logged in, redirect
if (!empty($_SESSION['username'])) {
header("Location: protected.php");
exit();
}
?>
<!doctype html>
<html>
<body>
<h3>Login (vulnerable demo)</h3>
<form action="process_login.php" method="post">
Username: <input name="username"><br>
Password: <input name="password" type="password"><br>
<input type="submit" value="Login">
</form>
<p>Current PHPSESSID (if set): <?php echo session_id(); ?></p>
</body>
</html>


