<?php
// index.php
echo "<h2>Demo App - Session Fixation</h2>";
echo "<a href='login.php'>Login (vulnerable)</a> | ";
echo "<a href='login_secure.php'>Login (secure)</a> | ";
echo "<a href='attacker_setup.php'>Attacker setup</a> | ";
echo "<a href='protected.php'>Protected (vulnerable)</a> | ";
echo "<a href='protected_secure.php'>Protected (secure)</a>";


?>