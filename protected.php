// === protected.php (VULNERABLE) ===
<?php
// protected.php (vulnerable)
if (!empty($_GET['sid'])) {
$incoming_sid = $_GET['sid'];
if (preg_match('/^[A-Za-z0-9,-]+$/', $incoming_sid)) {
session_id($incoming_sid);
}
}


session_start();
if (empty($_SESSION['username'])) {
echo "Not logged in. <a href='login.php'>Login</a>";
exit();
}
?>
<!doctype html>
<html>
<body>
<h3>Protected Page (vulnerable)</h3>
<p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></p>
<p>Your session id: <?php echo session_id(); ?></p>
<p>Session contents:<pre><?php print_r($_SESSION); ?></pre></p>
</body>
</html>