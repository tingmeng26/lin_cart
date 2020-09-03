<?php
include_once('_config.php');
include_once('filterconfig.php');

$listHelp = new coderListHelp('table1', $page_title);
$col = array();
$tid = empty(get('tid', 1)) ? 0 : get('tid', 1);
$sid = empty(get('sid', 1)) ? 0 : get('sid', 1);
$listHelp->editLink = "manage.php";
$listHelp->addLink = "manage.php?tid=" . $tid . '&sid=' . $sid;
$listHelp->ajaxSrc = "service.php";
$listHelp->delSrc = "delservice.php";
$listHelp->orderSrc = "orderservice.php";
$listHelp->orderColumn = $orderColumn;
$listHelp->orderDesc = $orderType;
$listHelp->mutileSelect = true;
$col[] = array('column' => $colname['id'], 'name' => 'ID', 'order' => true, 'width' => '60px');
$col[] = array('column' => 'typeName', 'name' => coderLang::t('coderadmin3_class1', 1), 'order' => true, 'width' => '100px');
$col[] = array('column' => 'subtypeName', 'name' => coderLang::t('coderadmin3_class2', 1), 'order' => true, 'width' => '100px');
$col[] = array('column' => $colname['ispublic'], 'name' => coderLang::t('public', 1), 'order' => true, 'width' => '60px');
$col[] = array('column' => $colname['pic'], 'name' => coderLang::t('Thumbnail', 1), 'order' => true, 'width' => '60px');
$col[] = array('column' => $colname['name' . coderLang::getAbbreviation()], 'name' => coderLang::t("langdata2", 1), 'order' => true, 'width' => '300px');
$col[] = array('column' => $colname['sno'], 'name' =>  coderLang::t('sno', 1), 'order' => true, 'width' => '100px');
$col[] = array('column' => $colname['tag'], 'name' => coderLang::t('tag', 1), 'order' => true);
$col[] = array('column' => $colname['updatetime'], 'name' => coderLang::t("index1", 1), 'order' => true, 'width' => '120px');
$col[] = array('column' => $colname['admin'], 'name' => coderLang::t("manage1", 1), 'order' => true, 'width' => '100px');

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
  <?php if (empty($tid) && empty($sid)) {
    include('../navbar.php');
  } ?>
  <!-- BEGIN Container -->
  <div class="container" id="main-container">
    <?php if (empty($tid) && empty($sid)) {
      include('../left.php');
    } ?>
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
            $tr.append('<td style="width:100px">' + row["typeName"] + '</td>');
            $tr.append('<td>' + row["subtypeName"] + '</td>');
            $tr.append('<td>' + row["<?php echo $colname['ispublic']; ?>"] + '</td>');
            $tr.append('<td>' + row["<?php echo $colname['pic']; ?>"] + '</td>');
            $tr.append('<td style="width:100px">' + row["<?php echo $colname['name' . coderLang::getAbbreviation()]; ?>"] + '</td>');
            $tr.append('<td>' + row["<?php echo $colname['sno']; ?>"] + '</td>');
            $tr.append('<td>' + row["<?php echo $colname['tag']; ?>"] + '</td>');
            $tr.append('<td>' + row["<?php echo $colname['updatetime']; ?>"] + '</td>');
            $tr.append('<td>' + row["<?php echo $colname['admin']; ?>"] + '</td>');

            obj.append($tr);
          }
        },
        pt_id: <?php echo $tid ?>,
        ps_id: <?php echo $sid ?>,
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
      var tid = '<?php echo $tid ?>';
      var sid = '<?php echo $sid ?>';

      $.ajax({
        type: "POST",
        url: 'getType.php',
        dataType: 'json',
        success: function(result) {
          if (result.result) {
            $('#pt_id').html(result.data);

            if (tid > 0) {
              $('#pt_id').val(tid);
              $.ajax({
                type: "POST",
                url: 'getFilterSubtype.php',
                dataType: 'json',
                data: {
                  value: tid
                },
                success: function(result) {
                  if (result.result) {
                    $('#ps_id').html(result.data);
                  }

                }
              });
              $('#refreshBtn').click();
            }
          }

        }
      });
      $.ajax({
        type: "POST",
        url: 'getFilterSubtype.php',
        dataType: 'json',
        success: function(result) {
          if (result.result) {
            $('#ps_id').html(result.data);
            if (sid > 0) {
              $('#ps_id').val(sid);
              $('#refreshBtn').click();
            }
          }

        }
      });
    });

    $('#pt_id').change(function() {
      var id = $('#pt_id').val();
      jQuery.ajax({
        type: "POST",
        url: 'getFilterSubtype.php',
        dataType: 'json',
        data: {
          value: id
        },
        success: function(result) {
          if (result.result) {
            $('#ps_id').html(result.data);
          }

        }
      });
      // location.href = './company_' + to + '.html';

    })
  </script>
</body>

</html>
