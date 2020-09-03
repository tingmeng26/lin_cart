<?php
include('_config.php');
$db = Database::DB();

$type=post('type',1);
switch ($type) {
	case 'lang':
		$lang=post('lang',1);
		$id = post('id',1);
		echo isDateNotExisit('lang',$lang,$id) ? 'true' : 'false';
		break;
	default:
		die('false');
		break;
}

$db->close();
?>