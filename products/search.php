<?php
include('../_config.php');
include('../do/getTypeList.php');
// 找符合key word 的大類id 與分類頁資料 mapping
$keyword = get('key', 1);
if (!empty($keyword)) {
  $table = coderDBConf::$product;
  $colname = coderDBConf::$colPorduct;
  $type = coderDBConf::$productType;
  $subtype = coderDBConf::$productSubtype;
  $query1= coderSQLStr::equal($colname['sno'], '%' . $keyword . '%', 'like');
  $query2= coderSQLStr::equal('product_name_'.$language, '%' . $keyword . '%', 'like');
  $productName = 'product_name_'.$language;
  $sql = "select $table.{$colname['id']},$table.{$colname['sno']},$table.$productName as productName,$table.{$colname['pic']},$table.{$colname['tag']} from $table inner join $type on $type.pt_id = $table.pt_id inner join $subtype on $subtype.ps_id = $table.ps_id where ($query1 or $query2) and $table.{$colname['ispublic']} =1 and $type.pt_ispublic = 1 and $subtype.ps_ispublic =1 order by {$colname['tag']} asc";
  // var_dump($key);exit;
  $data = $db->fetch_all_array($sql);

  $css = [
    1=>'products-tag-new',
    2=>'products-tag',
    3=>'products-tag-order',
    4=>'products-tag-end'
  ];
  foreach ($data as $key => $row) {
    $data[$key][$colname['pic']] = empty($row[$colname['pic']]) ? '' : $weburl . $FRONT_PATH_PRODUCT . 'list' . $row[$colname['pic']];
    $data[$key]['class'] = $css[$row[$colname['tag']]];
  }

  $total = count($data);
  


}
// var_dump($footer);exit;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="滿足客戶企劃提案產品的製造商。從開發、製造至交貨，整個流程皆致力於符合客戶的希望與要求，以長年培養出的高品質生產基準，來承接小量或大量的生產。">
  <title><?php coderLang::t('menu_name') ?> | <?php coderLang::t('menu_txt_search') ?></title>
  <base href="<?php echo $web_root ?>">
  <script src="styles/jquery.min.js"></script>
  <script src="styles/bootstrap/js/bootstrap.min.js"></script>
  <script src="styles/style.js"></script>
  <link rel="stylesheet" href="styles/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="styles/style.css">
  <link rel="shortcut icon" href="images/favicon.png">
  <script type="text/javascript">
    function search() {
      var value = $('#search').val();
      if (value != '') {
        location.href = 'products/search.php?key=' + value;
      }
    }

    function changeLanguage(to) {
      $.ajax({
        url: 'do/changeLanguage.php',
        data: {
          language: to
        },
        type: "POST",
        dataType: 'json',
        success: function(r) {
          if (r.result) {
            window.location.reload();
          } else {
            alert('變更失敗');
          }
        }
      });
      // location.href = './company_' + to + '.html';
    }
  </script>
</head>

<body>
<?php include(ROOT_DIR . $lpath . 'header.php'); ?>

  <main>
    <div class="container">
      <p><a href="index.html"><?php coderLang::t('menu_home') ?> > </a> <?php coderLang::t('menu_txt_search') ?></p>
    </div>
    <section class="container">
      <div class="row">
        <div class="col-md-6">
          <div>
            <h3 class="searchresults"><?php coderLang::t('search')?>「<div class="text-complementary"> <?php echo $keyword ?></div>」</h3>
          </div>
        </div>

        <div clsaa="col-md-6">
          <div class="flex-end">
            <h4 class="searchresults"><?php coderLang::t('total')?> <div class="text-complementary"> <?php echo $total?> </div> <?php coderLang::t('result')?></h4>
          </div>
        </div>
      </div>
      </div>
      <hr>
      <div class="row">
        <?php foreach($data as $row){ ?>
          <div class="col-md-3 col-sm-4 col-xs-6">
          <div class="<?php echo $row['class']?>"><?php echo coderLang::g('web_product_tag'.$row[$colname['tag']])?></div>
          <a href="products/detail_<?php echo $row[$colname['id']]?>.php">
            <div class="products-catalog">
              <div class="square-box">
                <div class="inner"><img class="img-rwd-full" src="<?php echo empty($row[$colname['pic']])?'':$row[$colname['pic']]?>"></div>
              </div>
              <p><?php echo $row[$colname['sno']]?></p>
              <h4><?php echo $row['productName']?></h4>
            </div>
          </a>
        </div>
          <?php }?>
        <!-- <div class="col-md-3 col-sm-4 col-xs-6">
          <div class="products-tag-new">新上市</div>
          <a href="#">
            <div class="products-catalog">
              <div class="square-box">
                <div class="inner"><img class="img-rwd-full" src="images/products/around-desk/10-006mh-1.jpg"></div>
              </div>
              <p>10-006MH-1 </p>
              <h4>重量物対応ファイルワゴン<br>
                ３段</h4>
            </div>
          </a>
        </div> -->
        <!-- <div class="col-md-3 col-sm-4 col-xs-6">
          <div class="products-tag">販售中</div>
          <a href="#">
            <div class="products-catalog">
              <div class="square-box">
                <div class="inner"><img class="img-rwd-full" src="images/products/around-desk/ys-k19.jpg"></div>
              </div>
              <p>YS-K19</p>
              <h4>カルテワゴン 2段</h4>
            </div>
          </a>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-6">
          <div class="products-tag">販售中</div>
          <a href="#">
            <div class="products-catalog">
              <div class="square-box">
                <div class="inner"><img class="img-rwd-full" src="images/products/around-desk/ysk-015.jpg"></div>
              </div>
              <p>YSK-015</p>
              <h4>カルテワゴン 2段</h4>
            </div>
          </a>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-6">
          <div class="products-tag-order">下訂生產</div>
          <a href="file-wagon/ysk-016.html">
            <div class="products-catalog">
              <div class="square-box">
                <div class="inner"><img class="img-rwd-full" src="images/products/around-desk/ysk-016.jpg"></div>
              </div>
              <p>YSK-016</p>
              <h4>木製ファイルワゴン</h4>
            </div>
          </a>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-6">
          <div class="products-tag-order">下訂生產</div>
          <a href="#">
            <div class="products-catalog">
              <div class="square-box">
                <div class="inner"><img class="img-rwd-full" src="images/products/around-desk/10-007mh.jpg"></div>
              </div>
              <p>10-007MH</p>
              <h4>重量物対応ファイルワゴン<br>
                天板付き２段</h4>
            </div>
          </a>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-6">
          <div class="products-tag-end">生產結束</div>
          <a href="#">
            <div class="products-catalog">
              <div class="square-box">
                <div class="inner"><img class="img-rwd-full" src="images/products/around-desk/ys-k14.jpg"></div>
              </div>
              <p>YS-K14</p>
              <h4>スタンダードファイルラックワゴン</h4>
            </div>
          </a>
        </div> -->
      </div>
    </section>




  </main>

  <?php include('../' . $lpath . 'footer.html'); ?>
</body>

</html>
