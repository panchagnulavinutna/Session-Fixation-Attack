// === process_login.php (VULNERABLE: does NOT regenerate session id) ===
<?php
// process_login.php (vulnerable)
if (!empty($_GET['sid'])) {
$incoming_sid = $_GET['sid'];
if (preg_match('/^[A-Za-z0-9,-]+$/', $incoming_sid)) {
session_id($incoming_sid);
}
}


session_start();


// authentication
if (!empty($_POST['username'])) {
$_SESSION['username'] = $_POST['username'];
header("Location: protected.php");
exit();
} else {
echo "Login failed. <a href='login.php'>Try again</a>";
}


?>