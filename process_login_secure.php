// === process_login_secure.php (SECURE: regenerates session id) ===
<?php
// process_login_secure.php
session_start();
if (!empty($_POST['username'])) {
// Regenerate session id after login to prevent fixation
session_regenerate_id(true);
$_SESSION['username'] = $_POST['username'];
header("Location: protected_secure.php");
exit();
} else {
echo "Login failed. <a href='login_secure.php'>Try again</a>";
}
?>