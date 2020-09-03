<?php
class class_product
{
  public static function getProductTypeList()
  {
    global $db;
    $table = coderDBConf::$productType;
    $colname = coderDBConf::$colProductType;
    $name = $colname['name' . coderLang::getAbbreviation()];
    $sql = "select {$name} as name,{$colname['id']} as value 
                from $table ORDER BY `{$colname['ind']}` DESC";

    return $db->fetch_all_array($sql);
  }

  public static function getSubtypeList($typeId = 0)
  {
    global $db;
    $table = coderDBConf::$productSubtype;
    $colname = coderDBConf::$colProductSubtype;
    $name = $colname['name' . coderLang::getAbbreviation()];
    $sql = "select {$name} as name,{$colname['id']} as value 
                from $table where 1 ";
    // $condition[':status'] = 1;
    $condition = [];
    if ($typeId > 0) {
      $sql .= " and {$colname['tid']} = :tid";
      $condition[':tid'] = $typeId;
    }
    $sql .= " ORDER BY `{$colname['ind']}` DESC";
    return  $db->fetch_all_array($sql, $condition);
  }

  public static function getPorducImageSize()
  {
    $temp = ["width" => 330, "height" => 330];
    $temp['tag'] = 'm';
    $temp['type'] = 6;
    $temp['name'] = "縮圖";
    $ary[] = $temp;
    return json_encode($ary);
  }


  /**
   * 透過產品 id 取得 大類及子分類名稱
   * @param integer id product id
   */
  public static function getTypeAndSubtypeNameById($id)
  {
    global $db;
    $table = coderDBConf::$product;
    $type = coderDBConf::$productType;
    $subtype = coderDBConf::$productSubtype;
    $language = coderLang::get();
    $language = $language == 'zh-cht' ? 'tw' : $language;
    $sql = "select $type.pt_name_{$language} as typeName,$type.pt_id as typeId, $subtype.ps_name_{$language} as subtypeName,$subtype.ps_id as subtypeId, $table.product_name_{$language} as productName from $table inner join $type on $type.pt_id = $table.pt_id inner join $subtype on $subtype.ps_id = $table.ps_id where $table.product_id = :id";
    $data = $db->query_first($sql, [':id' => $id]);
    return $data;
  }
}
