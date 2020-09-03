<?php
include('_config.php');

// include_once('filterconfig.php');
$listHelp = new coderListHelp('table1', coderLang::g("coderadmin4_product_noreply"));
$col = array();
$listHelp->editLink = "manage.php";
// $listHelp->addLink = "manage.php";
$listHelp->ajaxSrc = "service.php?type=product&status=noreply";
$listHelp->delSrc = "../contact/delservice.php";
// $listHelp->orderSrc = "orderservice.php";
$listHelp->orderColumn = $orderColumn;
$listHelp->orderDesc = $orderType;
$listHelp->mutileSelect = true;

$col[] = array('column' => $colname['id'], 'name' => 'ID', 'order' => true, 'width' => '60', 'def_desc' => 'desc');
// $col[] = array('column' => $colname['reply'], 'name' => coderLang::t('reply', 1), 'order' => true, 'width' => '60');
$col[] = array('column' => $colname['name'], 'name' => coderLang::t('langdata2', 1), 'order' => true, 'width' => '100');
$col[] = array('column' => $colname['company'], 'name' => coderLang::t('company', 1), 'order' => true, 'width' => '100');
$col[] = array('column' => $colname['address'], 'name' => coderLang::t('langdata8', 1), 'order' => true, 'width' => '100');
$col[] = array('column' => $colname['phone'], 'name' => coderLang::t('langdata9', 1), 'order' => true, 'width' => '100');
$col[] = array('column' => $colname['email'], 'name' => 'Email', 'order' => true, 'width' => '100');
$col[] = array('column' => $colname['updatetime'], 'name' => coderLang::t("index1", 1), 'order' => true, 'width' => '120');
$col[] = array('column' => $colname['admin'], 'name' => coderLang::t("manage1", 1), 'order' => true, 'width' => '100');

$listHelp->Bind($col);
$listHelp1 = new coderListHelp('table2', coderLang::g("coderadmin4_oemodm_noreply"));
$listHelp1->editLink = "manage.php";
// $listHelp1->addLink = "manage.php";
$listHelp1->ajaxSrc = "service.php?type=oemodm&status=noreply";
$listHelp1->delSrc = "delservice.php";
// $listHelp1->orderSrc = "orderservice.php";
$listHelp1->orderColumn = $orderColumn;
$listHelp1->orderDesc = $orderType;
$listHelp1->mutileSelect = true;

$listHelp1->Bind($col);

// $listHelp->bindFilter($filterhelp);
?>
<!DOCTYPE html>
<html>

<head>
  <?php include('../head.php'); ?>
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
          <h1><i class="icon-home"></i> <?php coderLang::t("home1"); //首頁資訊[home1] 
                                        ?></h1>
          <h4><?php echo $page_desc ?></h4>
        </div>
      </div>
      <!-- END Page Title -->

      <!-- BEGIN Breadcrumb -->
      <div id="breadcrumbs">
        <ul class="breadcrumb">
          <li class="active"><i class="icon-home"></i> Home</li>
        </ul>
      </div>
      <!-- END Breadcrumb -->

      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <div class="tile">
                    <p class="title"><?php echo $adminuser['name'] ?> - <?php coderLang::t("home2"); //歡迎使用本系統[home2] 
                                                                        ?></p>
                    <p style="margin-top:10px"><img src="<?php echo $adminuser['pic'] ?>" style="float:left">
                      <div style="float:left;margin:5px"><?php echo coderLang::t("home3", 1) . ':' . $adminuser['time'] . '<br>' . coderLang::t("formbtn", 1) . 'IP:' . request_ip(); //.'<br><li class="icon-smile"> '.coderAdmin::sayHello().'</li>' 登入[formbtn] 您本次登入時間為[home3]   
                                                          ?></div>
                      <div class="clearfix"></div>
                    </p>
                    <div class="img img-bottom">
                      <i class="icon-desktop"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- END Tiles -->


      <!-- contact us product noply-->
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-title">
              <h3 style="float:left"><i class="icon-table"></i> <?php echo coderLang::g("coderadmin4_product_noreply") ?></h3>
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
      <!-- contact us product noreply end -->

      <!-- contact us odmoem noreply -->
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-title">
              <h3 style="float:left"><i class="icon-table"></i> <?php echo coderLang::g("coderadmin4_oemodm_noreply") ?></h3>
              <div class="box-tool">
                <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                <a data-action="close" href="#"><i class="icon-remove"></i></a>
              </div>
              <div style="clear:both"></div>
            </div>
            <div class="box-content">
              <?php echo $listHelp1->drawTable() ?>
            </div>
          </div>
        </div>
      </div>
      <!-- contact us odmoem noreply end -->


      <!-- BEGIN Main Content -->

      <!-- END Main Content -->

      <?php include('../footer.php'); ?>

      <a id="btn-scrollup" class="btn btn-circle btn-lg" href="#"><i class="icon-chevron-up"></i></a>
    </div>
    <!-- END Content -->

  </div>
  <!-- END Container -->


  <?php include('../js.php'); ?>


  <script src="../assets/flot/jquery.flot.js"></script>
  <script src="../assets/flot/jquery.flot.resize.js"></script>
  <script src="../assets/flot/jquery.flot.pie.js"></script>
  <script src="../assets/flot/jquery.flot.stack.js"></script>
  <script src="../assets/flot/jquery.flot.crosshair.js"></script>
  <script src="../assets/sparkline/jquery.sparkline.min.js"></script>
  <script type="text/javascript" src="../js/coderlisthelp.js"></script>

  <script>
    function showplot() {

      //define placeholder class
      var placeholder = $("#visitors-chart");

      if ($(placeholder).size() == 0) {
        return;
      }
      //some data
      var d1 = [
        [1, 35],
        [2, 48],
        [3, 34],
        [4, 54],
        [5, 46],
        [6, 37],
        [7, 40],
        [8, 55],
        [9, 43],
        [10, 61],
        [11, 52],
        [12, 57],
        [13, 64],
        [14, 56],
        [15, 48],
        [16, 53],
        [17, 50],
        [18, 59],
        [19, 66],
        [20, 73],
        [21, 81],
        [22, 75],
        [23, 86],
        [24, 77],
        [25, 86],
        [26, 85],
        [27, 79],
        [28, 83],
        [29, 95],
        [30, 92]
      ];
      var d2 = [
        [1, 9],
        [2, 15],
        [3, 16],
        [4, 21],
        [5, 19],
        [6, 15],
        [7, 22],
        [8, 29],
        [9, 20],
        [10, 27],
        [11, 32],
        [12, 37],
        [13, 34],
        [14, 30],
        [15, 28],
        [16, 23],
        [17, 28],
        [18, 35],
        [19, 31],
        [20, 28],
        [21, 33],
        [22, 25],
        [23, 27],
        [24, 24],
        [25, 36],
        [26, 25],
        [27, 39],
        [28, 28],
        [29, 35],
        [30, 42]
      ];
      var chartColours = ['#88bbc8', '#ed7a53', '#9FC569', '#bbdce3', '#9a3b1b', '#5a8022', '#2c7282'];
      //graph options
      var options = {
        grid: {
          show: true,
          aboveData: true,
          color: "#3f3f3f",
          labelMargin: 5,
          axisMargin: 0,
          borderWidth: 0,
          borderColor: null,
          minBorderMargin: 5,
          clickable: true,
          hoverable: true,
          autoHighlight: true,
          mouseActiveRadius: 20
        },
        series: {
          grow: {
            active: false,
            stepMode: "linear",
            steps: 50,
            stepDelay: true
          },
          lines: {
            show: true,
            fill: true,
            lineWidth: 3,
            steps: false
          },
          points: {
            show: true,
            radius: 4,
            symbol: "circle",
            fill: true,
            borderColor: "#fff"
          }
        },
        legend: {
          position: "ne",
          margin: [0, -25],
          noColumns: 0,
          labelBoxBorderColor: null,
          labelFormatter: function(label, series) {
            // just add some space to labes
            return label + '&nbsp;&nbsp;';
          }
        },
        yaxis: {
          min: 0
        },
        xaxis: {
          ticks: 11,
          tickDecimals: 0
        },
        colors: chartColours,
        shadowSize: 1,
        tooltip: true, //activate tooltip
        tooltipOpts: {
          content: "%s : %y.0",
          defaultTheme: false,
          shifts: {
            x: -30,
            y: -50
          }
        }
      };
      $.plot(placeholder, [{
          label: "Visits",
          data: d1,
          lines: {
            fillColor: "#f2f7f9"
          },
          points: {
            fillColor: "#88bbc8"
          }
        },
        {
          label: "Unique Visits",
          data: d2,
          lines: {
            fillColor: "#fff8f2"
          },
          points: {
            fillColor: "#ed7a53"
          }
        }

      ], options);

    }
    if (jQuery.plot) {

      showplot();
    }
    if (jQuery().sparkline) {
      $('.inline-sparkline').sparkline(
        'html', {
          width: '70px',
          height: '26px',
          lineWidth: 2,
          spotRadius: 3,
          lineColor: '#88bbc8',
          fillColor: '#f2f7f9',
          spotColor: '#14ae48',
          maxSpotColor: '#e72828',
          minSpotColor: '#f7941d'
        }
      );
    }
  </script>
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

      $('#table2').coderlisthelp({
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