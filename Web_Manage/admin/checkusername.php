<?php
include('_config.php');
$db = new Database($HS, $ID, $PW, $DB);
$db->connect();
$username=post('username',1);
if (strlen($username)<3)
{
	die('false');
}
echo isUsernameNotExisit($username) ? 'true' : 'false';
$db->close();
?>