// === protected_secure.php ===
<?php
// protected_secure.php
session_start();
if (empty($_SESSION['username'])) {
echo "Not logged in. <a href='login_secure.php'>Login</a>";
exit();
}
?>
<!doctype html>
<html>
<body>
<h3>Protected Page (secure)</h3>
<p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></p>
<p>Your session id: <?php echo session_id(); ?></p>
<p>Session contents:<pre><?php print_r($_SESSION); ?></pre></p>
</body>
</html>