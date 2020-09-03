<?php
include_once('../do/getTypeFilter.php');
include('../_config.php');
$subtypeId = get('id', 1);
// $typeName = get('typeName',1);
// $subtypeName = get('subtypeName',1);
if (empty($subtypeId)) {
  $subtypeId = empty($result[0]['subtype'][0]['subtypeId']) ? 0 : $result[0]['subtype'][0]['subtypeId'];
  // $typeName = $result[0]['name'];
  // $subtypeName = $result[0]['subtype'][0]['subtypeName'];
}
$table = coderDBConf::$product;
$colname = coderDBConf::$colPorduct;
$subtype = coderDBConf::$productSubtype;
$colSubtype = coderDBConf::$colProductSubtype;
$type = coderDBConf::$productType;
$colType = coderDBConf::$colProductType;
// 根據 subtype id 取得產品資料
$sql = "select * from $table where {$colname['ispublic']} = 1 and {$colname['sid']} = :sid order by {$colname['ind']} desc";
$data = $db->fetch_all_array($sql, [':sid' => $subtypeId]);

// 取得　subtype en name for title

$sql = "select $type.pt_id as typeId,ps_name_en,ps_name_tw,ps_name_jp,pt_name_en,pt_name_tw,pt_name_jp from $subtype inner join $type on $type.{$colType['id']} = $subtype.{$colSubtype['tid']} where $subtype.ps_id = :subtypeId";
$subtypeNameData = $db->query_first($sql, [':subtypeId' => $subtypeId]);
$subtypeNameEn = $subtypeNameData['ps_name_en'] ?? '';
$typeName = $subtypeNameData['pt_name_' . $language];
$subtypeName = $subtypeNameData['ps_name_' . $language];
$typeId = $subtypeNameData['typeId'];

// var_dump($data);exit;
$new = [];
$sell = [];
$make = [];
$end = [];
$none = [];
foreach ($data as $row) {
  // 顯示 260*260 縮圖 後台已切好檔名 prefix 為list
  $image = empty($row[$colname['pic']]) ? '' : $weburl . $FRONT_PATH_PRODUCT . 'list' . $row[$colname['pic']];
  $name = $row['product_name_' . $language];
  // var_dump($name);exit;
  // 新上市
  if ($row[$colname['tag']] == 1) {
    array_push($new, ['image' => $image, 'sno' => $row[$colname['sno']], 'name' => $name, 'id' => $row[$colname['id']]]);
  }
  // 販售中
  if ($row[$colname['tag']] == 2) {
    array_push($sell, ['image' => $image, 'sno' => $row[$colname['sno']], 'name' => $name, 'id' => $row[$colname['id']]]);
  }
  // 下訂生產
  if ($row[$colname['tag']] == 3) {
    array_push($make, ['image' => $image, 'sno' => $row[$colname['sno']], 'name' => $name, 'id' => $row[$colname['id']]]);
  }
  // 生產結束
  if ($row[$colname['tag']] == 4) {
    array_push($end, ['image' => $image, 'sno' => $row[$colname['sno']], 'name' => $name, 'id' => $row[$colname['id']]]);
  }

  // 無
  if ($row[$colname['tag']] == 0) {
    array_push($none, ['image' => $image, 'sno' => $row[$colname['sno']], 'name' => $name, 'id' => $row[$colname['id']]]);
  }
}
// var_dump($new);exit;
// var_dump($result);exit;
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="林製作所は長年に渡り培った独自の品質基準のもと、小ロットから海外生産を行っています。製品の企画、デザイン、設計、品質管理、生産製造まで一貫して行います。">
  <base href="<?php echo $web_root ?>">
  <title><?php coderLang::t('menu_name') ?> | <?php coderLang::t('web_product_spec_info') ?> | <?php echo $typeName ?> | <?php echo $subtypeName ?></title>

  <script src="styles/jquery.min.js"></script>
  <script src="styles/bootstrap/js/bootstrap.min.js"></script>
  <script src="styles/style.js"></script>
  <link rel="stylesheet" href="styles/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="styles/style.css">
  <link rel="shortcut icon" href="images/favicon.png">
  <script type="text/javascript">
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
    // $(document).ready(function() {
    //   var footer = '<?php echo $footer; ?>';
    //   var header = '<?php echo $header; ?>';
    //   $(".headerPage").load(header);

    //   $(".footerPage").load(footer);
    // });
  </script>
</head>

<body>
  <?php include(ROOT_DIR . $lpath . 'header.php'); ?>

  <main>
    <div class="container">
      <p><a href="index.html"><?php coderLang::t('menu_home') ?> ></a><?php echo $typeName ?> > <?php echo $subtypeName ?></p>
    </div>
    <section class="container">
      <div class="text-center ">
        <h3 class="" style="width:300px;margin:0px auto"><?php echo $typeName ?></h3></span>
        <h4 class="sub-tittle"><?php echo $subtypeName ?></h4>
        <?php if ($language != 'en') { ?>
          <h4 class="odm-tittle"><?php echo $subtypeNameEn ?></h4>
        <?php } ?>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-4 col-sm-5">
            <nav class="navbar left-navbar">
              <div class="container-fluid">
                <!--按鈕-->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed btn-sider" data-toggle="collapse" data-target="#side-menu" aria-expanded="false">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                </div>
                <!-- 導航條內容 -->
                <div class="collapse navbar-collapse" id="side-menu">
                  <ul class="nav navbar-nav" id="side-item">
                    <?php foreach ($result as $key => $row) { ?>
                      <li class="dropdown">
                        <a href="#collapse<?php echo $key ?>" id="web-item" data-toggle="collapse" class="word" data-parent="#accordion" role="button" aria-haspopup="true" aria-expanded="<?php echo $row['id'] == $typeId ? 'true' : 'false'; ?>" style="<?php echo $row['id'] == $typeId ? 'background-color:#448e96;color:#fff' : '' ?>"><?php echo $row['name'] ?></a>
                        <!--下拉選單按鈕-->
                        <ul id="collapse<?php echo $key ?>" class="word <?php echo $row['id'] == $typeId ? 'panel-collapse collapse in' : 'panel-collapse collapse' ?>" aria-expanded="true">
                          <?php foreach ($row['subtype'] as $value) { ?>
                            <?php if (!empty($value['link'])) {?>
                              <li><a href="<?php echo 'products/'.$value['link'].'?typeId='.$row['id'].'&subtypeId='.$value['subtypeId'] ?>"><?php echo $value['subtypeName'] ?></a></li>
                            <?php } else {
                              $bgstyle = $value['subtypeId'] == $subtypeId ? "style='background-color:#448e96'" : "";
                            ?>
                              <li <?php echo $bgstyle ?>><a href="products/subtype.php?id=<?php echo $value['subtypeId'] ?>"><?php echo $value['subtypeName'] ?></a></li>

                            <?php } ?>
                          <?php } ?>
                        </ul>
                      </li>
                    <?php } ?>
                  </ul>
                </div>
              </div>
            </nav>
          </div>
          <div class="col-lg-9 col-md-8 col-sm-7">
            <?php if (!empty($new)) { ?>
              <h3><?php coderLang::t('web_product_tag1') ?></h3>
              <div class="row">
                <?php foreach ($new as $row) { ?>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="products-tag-new"><?php coderLang::t('web_product_tag1') ?></div>
                    <a href="products/detail_<?php echo $row['id'] ?>.php">
                      <div class="products-catalog">
                        <div class="square-box">
                          <div class="inner"><img class="img-rwd-full" src="<?php echo $row['image'] ?>"></div>
                          <!-- <div class="inner"><img class="img-rwd-full" src="images/products/around-desk/ys-k19.jpg"></div> -->
                        </div>
                        <p><?php echo $row['sno'] ?></p>
                        <h4><?php echo $row['name'] ?></h4>
                      </div>
                    </a>
                  </div>
                <?php } ?>
              </div>
            <?php } ?>
            <?php if (!empty($sell)) { ?>
              <h3><?php coderLang::t('web_product_tag2') ?></h3>
              <div class="row">
                <?php foreach ($sell as $row) { ?>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="products-tag"><?php coderLang::t('web_product_tag2') ?></div>
                    <a href="products/detail_<?php echo $row['id'] ?>.php">
                      <div class="products-catalog">
                        <div class="square-box">
                          <div class="inner"><img class="img-rwd-full" src="<?php echo $row['image'] ?>"></div>
                          <!-- <div class="inner"><img class="img-rwd-full" src="images/products/around-desk/ys-k19.jpg"></div> -->
                        </div>
                        <p><?php echo $row['sno'] ?></p>
                        <h4><?php echo $row['name'] ?></h4>
                      </div>
                    </a>
                  </div>
                <?php } ?>
              </div>
            <?php } ?>
            <?php if (!empty($make)) { ?>
              <h3><?php coderLang::t('web_product_tag3') ?></h3>
              <div class="row">
                <?php foreach ($make as $row) { ?>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="products-tag-order"><?php coderLang::t('web_product_tag3') ?></div>
                    <a href="products/detail_<?php echo $row['id'] ?>.php">
                      <div class="products-catalog">
                        <div class="square-box">
                          <div class="inner"><img class="img-rwd-full" src="<?php echo $row['image'] ?>"></div>
                          <!-- <div class="inner"><img class="img-rwd-full" src="images/products/around-desk/ys-k19.jpg"></div> -->
                        </div>
                        <p><?php echo $row['sno'] ?></p>
                        <h4><?php echo $row['name'] ?></h4>
                      </div>
                    </a>
                  </div>
                <?php } ?>
              </div>
            <?php } ?>
            <?php if (!empty($end)) { ?>
              <h3><?php coderLang::t('web_product_tag4') ?></h3>
              <div class="row">
                <?php foreach ($end as $row) { ?>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="products-tag-end"><?php coderLang::t('web_product_tag4') ?></div>
                    <a href="products/detail_<?php echo $row['id'] ?>.php">
                      <div class="products-catalog">
                        <div class="square-box">
                          <div class="inner"><img class="img-rwd-full" src="<?php echo $row['image'] ?>"></div>
                          <!-- <div class="inner"><img class="img-rwd-full" src="images/products/around-desk/ys-k19.jpg"></div> -->
                        </div>
                        <p><?php echo $row['sno'] ?></p>
                        <h4><?php echo $row['name'] ?></h4>
                      </div>
                    </a>
                  </div>
                <?php } ?>
              </div>
            <?php } ?>


            <!-- 無 -->
            <?php if (!empty($none)) { ?>
              <div class="row">
                <?php foreach ($none as $row) { ?>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <a href="products/detail_<?php echo $row['id'] ?>.php">
                      <div class="products-catalog">
                        <div class="square-box">
                          <div class="inner"><img class="img-rwd-full" src="<?php echo $row['image'] ?>"></div>
                          <!-- <div class="inner"><img class="img-rwd-full" src="images/products/around-desk/ys-k19.jpg"></div> -->
                        </div>
                        <p><?php echo $row['sno'] ?></p>
                        <h4><?php echo $row['name'] ?></h4>
                      </div>
                    </a>
                  </div>
                <?php } ?>
              </div>
            <?php } ?>



          </div>
        </div>
      </div>
    </section>




  </main>

  <?php include (ROOT_DIR. $lpath . 'footer.html'); ?>
</body>

</html>
<script>
  function search() {
    var value = $('#search').val();
    if (value != '') {
      location.href = 'products/search.php?key=' + value;
    }
  }
</script>
