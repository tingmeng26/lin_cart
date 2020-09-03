<?php
include_once('_config.php');
include_once('filterconfig.php');
coderAdmin::vaild($auth, 'view');

$listHelp = new coderListHelp('table1', $page_title);
$listHelp->mutileSelect = true;
$listHelp->editLink = "manage.php";
$listHelp->addLink = "manage.php?{$colname['ld_lang']}=$_lang_get";
$listHelp->ajaxSrc = "service.php";
$listHelp->delSrc = "delservice.php";
//$listHelp->orderSrc="orderservice.php";
//$listHelp->ordersortable="orderservice.php";//拖曳排序
//$listHelp->orderColumn=$orderColumn;
//$listHelp->orderDesc=$orderDesc;
$listHelp->excelLink = "savetoexcel.php"; //匯出 excel
$listHelp->addexcelLink = "../dictionary_excel/manage.php"; //匯入 excel



$col = array();
$col[] = array('column' => $colname['id'], 'name' => 'ID', 'order' => true, 'width' => '60', 'def_desc' => 'desc');
//$col[]=array('column'=>$colname['ispublic'],'name'=>'啟用','order'=>true,'width'=>'60');
$col[] = array('column' => $colname_ld['lang'], 'name' => coderLang::t("langdata1", 1), 'order' => true, 'width' => '100'); //國家代碼 [langdata1]
$col[] = array('column' => $colname_ld['name'], 'name' => coderLang::t("langdata2", 1), 'order' => true, 'width' => '100'); //名稱 [langdata2]
$col[] = array('column' => $colname['english'], 'name' => coderLang::t("langdictionary1", 1), 'order' => true, 'width' => '180'); //英文描述 [langdictionary1]
$col[] = array('column' => $colname['key'], 'name' => coderLang::t("langdictionary2", 1), 'order' => true, 'width' => '100'); //key [langdictionary2]
$col[] = array('column' => $colname['val'], 'name' => coderLang::t("langdictionary3", 1)); //翻譯 [langdictionary3]





$col[] = array('column' => $colname['admin'], 'name' => coderLang::t("manage1", 1), 'order' => true, 'width' => '90'); //管理員 [manage1]
$col[] = array('column' => $colname['updatetime'], 'name' => coderLang::t("index1", 1), 'order' => true, 'width' => '150'); //最後更新時間 [index1]
$listHelp->Bind($col);

$listHelp->bindFilter($filterhelp);

//$db = Database::DB();

?>
<!DOCTYPE html>
<html>

<head>
    <?php include('../head.php'); ?>
    <link href="../assets/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php include('../navbar.php'); ?>
    <!-- BEGIN Container -->
    <div class="container" id="main-container">
        <?php include('../left.php'); ?>
        <!-- BEGIN Content -->
        <div id="main-content">
            <!-- BEGIN Page Title -->
            <div class="page-title">
                <div>
                    <h1><i class="<?php echo $mainicon ?>"></i> <?php echo $page_title . coderLang::t("configmsg2", 1); //管理[configmsg2] 
                                                                ?></h1>
                    <h4><?php echo $page_desc ?></h4>
                </div>
            </div>
            <!-- END Page Title -->

            <!-- BEGIN Breadcrumb -->
            <div id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="icon-home"></i>
                        <a href="../home/index.php">Home</a>
                        <span class="divider"><i class="icon-angle-right"></i></span>
                    </li>
                    <?php echo $mtitle ?>

                </ul>
            </div>
            <!-- END Breadcrumb -->

            <!-- BEGIN Main Content -->
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-title">
                            <h3 style="float:left"><i class="icon-table"></i> <?php echo $page_title ?></h3>
                            <div class="box-tool">
                                <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                <a data-action="close" href="#"><i class="icon-remove"></i></a>
                            </div>
                            <div style="clear:both"></div>
                        </div>
                        <div class="box-content">
                            <?php echo $listHelp->drawTable() ?>
                        </div>
                    </div>
                </div>
            </div>


            <?php include('../footer.php');
            $db->close(); ?>

            <a id="btn-scrollup" class="btn btn-circle btn-lg" href="#"><i class="icon-chevron-up"></i></a>
        </div>
        <!-- END Content -->
    </div>
    <!-- END Container -->


    <?php
    include('../js.php');
    ?>
    <script type="text/javascript" src="../js/coderlisthelp.js"></script>
    <script type="text/javascript" src="../assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table1').coderlisthelp({
                debug: true,
                callback: function(obj, rows) {
                    obj.html('');
                    var count = rows.length;
                    for (var i = 0; i < count; i++) {
                        var row = rows[i];
                        var $tr = $('<tr></tr>');
                        $tr.attr("orderlink", "order_id=" + row["<?php echo $colname['id']; ?>"] + "&order_key=<?php echo $colname['id']; ?>");
                        $tr.attr("order_id", row["<?php echo $colname['id']; ?>"]);
                        $tr.attr("order_key", "<?php echo $colname['id']; ?>");
                        $tr.attr("editlink", "id=" + row["<?php echo $colname['id'] ?>"]);
                        $tr.attr("delkey", row["<?php echo $colname['id'] ?>"]);
                        $tr.attr("title", row["<?php echo $colname['val'] ?>"]);

                        $tr.append('<td>' + row["<?php echo $colname['id'] ?>"] + '</td>');
                        //$tr.append('<td>'+row["<?php //echo $colname['ispublic']
                                                    ?>"]+'</td>');
                        $tr.append('<td>' + row["<?php echo $colname_ld['lang'] ?>"] + '</td>');
                        $tr.append('<td>' + row["<?php echo $colname_ld['name'] ?>"] + '</td>');
                        $tr.append('<td>' + row["<?php echo $colname['english'] ?>"] + '</td>');
                        $tr.append('<td>' + row["<?php echo $colname['key'] ?>"] + '</td>');
                        $tr.append('<td>' + row["<?php echo $colname['val'] ?>"] + '</td>');





                        $tr.append('<td>' + row["<?php echo $colname['admin'] ?>"] + '</td>');
                        $tr.append('<td>' + row["<?php echo $colname['updatetime'] ?>"] + '</td>');
                        obj.append($tr);
                    }
                }
            });
        });
    </script>

</body>

</html>