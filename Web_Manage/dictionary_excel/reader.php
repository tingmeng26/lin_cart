<?php
//header('Content-length: 9999');
include('_config.php');
//引入函式庫
include '../../Classes/PHPExcel.php';
//設定要被讀取的檔案

$file = $_POST["file_path"];
//$file = "123456.xlsx";
//$file = '../../upload/temp/1509425086.xls';
try {

    $objPHPExcel = PHPExcel_IOFactory::load($file);
    /*$ary = explode(".",$file);

    $extension = $ary[(count($ary)-1)];
    if( $extension =='xlsx' )
    {
        $objReader = new PHPExcel_Reader_Excel2007();

    }
    else
    {
        $objReader = new PHPExcel_Reader_Excel5();

    }
    $objPHPExcel = $objReader->load($file);*/
} catch (Exception $e) {
    die('Error loading file "' . pathinfo($file, PATHINFO_BASENAME) . '": ' . $e->getMessage());
}

$db = Database::DB();
$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
//$sheetData = uniqueAssocArray($sheetData, "D") ;


?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<style type="text/css">
    .test {
        font-size: 16px;

    }
</style>

<div class="table-big">
    <table width="90%" border="0" align="center" class="test table table-striped table-hover fill-head">
        <thead>
            <tr>
                <?php
                echo '<th align="center">#</th>';
                echo '<th align="center">' . coderLang::t("langdata1", 1) . '</th>'; //語系代碼 [langdata1]
                echo '<th align="center">' . coderLang::t("langdictionary1", 1) . '</th>'; //英文描述[langdictionary1]
                echo '<th align="center">' . coderLang::t("langdictionary2", 1) . '</th>'; //key [langdictionary2]
                echo '<th align="center">' . coderLang::t("langdictionary3", 1) . '</th>'; //翻譯 [langdictionary3]
                ?>
            </tr>
        </thead>
        <?php
        $i = 1;
        $rowindex = 0;
        foreach ($sheetData as $key => $col) {
            if ($col['A'] == "" || $col['B'] == "" || $col['C'] == "" || $col['D'] == "") continue;
            $rowindex++;
            if ($rowindex <= 1) continue; //第一個迴圈跳掉

        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <?php
                foreach ($col as $colkey => $colvalue) {
                    //if(!in_array($colkey, array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P")))continue;
                    if (!in_array($colkey, array("A", "B", "C", "D"))) continue;
                ?>
                    <td>
                        <?php
                        echo $colvalue;

                        ?>
                    </td>
                <?php } ?>
            </tr>
        <?php
            $i++;
        }
        $db->close();
        ?>
    </table>
</div>