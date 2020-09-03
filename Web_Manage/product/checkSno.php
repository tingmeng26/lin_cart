<?php



include("_config.php");

$value = post('data', 1);
$id = post('id',1);
$db = Database::DB();
$table = coderDBConf::$product;

$sql = "select * from $table where product_sno = :sno and product_id !=:id and product_is_show = 1";
$data = $db->query_first($sql,[':sno'=>$value,':id'=>$id]);


$result = [
  'result'=>empty($data)?'true':'false'
];
echo $result['result'];
