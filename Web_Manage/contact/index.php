<?php
include_once('_config.php');
include_once('filterconfig.php');

$listHelp = new coderListHelp('table1', $page_title);
$col = array();

$listHelp->editLink = "manage.php";
// $listHelp->addLink = "manage.php";
$listHelp->ajaxSrc = "service.php?type=".$type.'&status='.$status;
$listHelp->delSrc = "delservice.php";
// $listHelp->orderSrc = "orderservice.php";
$listHelp->orderColumn = $orderColumn;
$listHelp->orderDesc = $orderType;
$listHelp->mutileSelect = true;


  $col[] = array('column' => $colname['id'], 'name' => 'ID', 'order' => true, 'width' => '60', 'def_desc' => 'desc');
  $col[] = array('column' => $colname['reply'], 'name' => coderLang::t('reply',1), 'order' => true, 'width' => '60');
  $col[] = array('column' => $colname['name'], 'name' => coderLang::t('langdata2',1), 'order' => true, 'width' => '100');
  $col[] = array('column' => $colname['company'], 'name' => coderLang::t('company',1), 'order' => true, 'width' => '100');
  $col[] = array('column' => $colname['address'], 'name' => coderLang::t('langdata8',1), 'order' => true, 'width' => '100');
  $col[] = array('column' => $colname['phone'], 'name' => coderLang::t('langdata9',1), 'order' => true, 'width' => '100');
  $col[] = array('column' => $colname['email'], 'name' => 'Email', 'order' => true, 'width' => '100');
  $col[] = array('column' => $colname['updatetime'], 'name' => coderLang::t("index1", 1), 'order' => true, 'width' => '120');
  $col[] = array('column' => $colname['admin'], 'name' => coderLang::t("manage1", 1), 'order' => true, 'width' => '100');


$listHelp->Bind($col);
$listHelp->bindFilter($filterhelp);

// $db = Database::DB();
// coderAdminLog::insert($adminuser['username'], $logkey, 'view');
// $db->close();
?>
<!DOCTYPE html>
<html>

<head>
  <?php include('../head.php'); ?>
  <link rel="stylesheet" type="text/css" href="../assets/chosen-bootstrap/chosen_filterconfig.css" />

  <style>
    .ui-sortable-helper {
      background-color: white !important;
      border: none !important;
    }
  </style>
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
          <h1><i class="<?php echo $mainicon ?>"></i><?php echo $page_title ?></h1>
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


      <?php include('../footer.php'); ?>

      <a id="btn-scrollup" class="btn btn-circle btn-lg" href="#"><i class="icon-chevron-up"></i></a>
    </div>
    <!-- END Content -->
  </div>
  <!-- END Container -->
  <?php include('../js.php'); ?>

  <script type="text/javascript" src="../js/coderlisthelp.js"></script>
  <script type="text/javascript" src="../assets/bootstrap-switch/static/js/bootstrap-switch.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      /* ## coder [listRow] --> ## */
      $('#table1').coderlisthelp({
        debug: true,
        callback: function(obj, rows) {
          obj.html('');
          var count = rows.length;
          for (var i = 0; i < count; i++) {
            var row = rows[i];
            var $tr = $('<tr></tr>');
            $tr.attr("orderlink", "order_id=" + row["<?php echo $colname['id']; ?>"] + "&order_key=<?php echo $colname['id']; ?>");
            $tr.attr("editlink", "id=" + row["<?php echo $colname['id']; ?>"]);
            $tr.attr("delkey", row["<?php echo $colname['id']; ?>"]);
            $tr.attr("title", row["<?php echo $colname['id']; ?>"]);

            $tr.append('<td>' + row["<?php echo $colname['id']; ?>"] + '</td>');
            $tr.append('<td>' + row["<?php echo $colname['reply']; ?>"] + '</td>');
            $tr.append('<td>' + row["<?php echo $colname['name']; ?>"] + '</td>');
            $tr.append('<td>' + row["<?php echo $colname['company']; ?>"] + '</td>');
            $tr.append('<td>' + row["<?php echo $colname['address']; ?>"] + '</td>');
            $tr.append('<td>' + row["<?php echo $colname['phone']; ?>"] + '</td>');
            $tr.append('<td>' + row["<?php echo $colname['email']; ?>"] + '</td>');
            $tr.append('<td>' + row["<?php echo $colname['updatetime']; ?>"] + '</td>');
            $tr.append('<td>' + row["<?php echo $colname['admin']; ?>"] + '</td>');

            obj.append($tr);
          }
        },
        listComplete: function() {
          $('#table1').find('img').click(function() {
            $.colorbox({
              href: $(this).attr('src'),
              initialWidth: '100px',
              initialHeight: '100px',
              maxHeight: '100%'
            });
          });
        }
      });


      /* ## coder [listRow] <-- ## */
    });
  </script>
</body>

</html>
