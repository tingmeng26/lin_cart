<?php
include_once('../do/getTypeFilter.php');
include('../_config.php');
// product id
$id = get('id', 1);
if (empty($id)) {
  header('location: subtype.php');
  exit;
}


$table = coderDBConf::$product;
$colname = coderDBConf::$colPorduct;
$type = coderDBConf::$productType;
$typeColumn = coderDBConf::$colProductType;
$subtypeColumn = coderDBConf::$colProductSubtype;
$subtype = coderDBConf::$productSubtype;
$columnSubtypeName = 'ps_name_' . $language;
$columnSubtypeNameEn = 'ps_name_en';
$columnTypeName = 'pt_name_' . $language;
$sql = "select $table.*,$subtype.$columnSubtypeName as subtypeName,$columnSubtypeNameEn as subtypeNameEn,$type.$columnTypeName as typeName,$subtype.{$subtypeColumn['id']} as subtypeId from $table 
inner join $subtype on $table.{$colname['sid']} = $subtype.{$subtypeColumn['id']} 
inner join $type on $table.{$colname['tid']} = $type.{$typeColumn['id']}
where $table.{$colname['id']} =:id and $table.{$colname['ispublic']} = 1 and $subtype.{$subtypeColumn['ispublic']} = 1";
$data = $db->query_first($sql, [':id' => $id]);
if (empty($data)) {
  header('location: subtype.php');
  exit;
}
$description = $data['product_description_' . $language];

// 取得推薦產品
$sql = "select * from $table where {$colname['sid']} = :sid and {$colname['id']} !=:id and {$colname['ispublic']} = 1 order by rand() limit 6";
$suggestion = $db->fetch_all_array($sql, [':sid' => $data[$colname['sid']], ':id' => $id]);
$suggestionList = [];
foreach ($suggestion as $row) {
  $suggestionList[] = [
    'id' => $row[$colname['id']],
    'sno' => $row[$colname['sno']],
    'name' => $row['product_name_' . $language],
    'image' => empty($row[$colname['pic']]) ? '' : $weburl . $FRONT_PATH_PRODUCT  . 'list' . $row[$colname['pic']]
  ];
}
// 處理產品圖片 多圖 以 json 格式存
$image = [];
if (!empty($data[$colname['pics']])) {
  $data[$colname['pics']] = json_decode($data[$colname['pics']]);
  $image = array_column($data[$colname['pics']], 'product_pics_pic');
  foreach ($image as $key => $row) {
    $image[$key] = $weburl . $FRONT_PATH_PRODUCT  . 'm' . $row;
  }
}

// 處理尺吋圖 多圖 以 json 格式存
if (!empty($data[$colname['sizePic']])) {
  $data[$colname['sizePic']] = json_decode($data[$colname['sizePic']]);
  $sizeImage = array_column($data[$colname['sizePic']], 'product_size_pic_pic');
  foreach ($sizeImage as $key => $row) {
    $sizeImage[$key] = $weburl . $FRONT_PATH_PRODUCT  . $row;
  }
}

// 處理檔案
$file = empty($data[$colname['file']]) ? '' : $weburl . $FRONT_PATH_PRODUCT . 'b'.$data[$colname['file']];
// 介紹圖 1-4
$pic1 = empty($data[$colname['pic1']]) ? '' : $weburl . $FRONT_PATH_PRODUCT . 'b'.$data[$colname['pic1']];
// $pic1 = !file_exists($pic1)?'':$pic1;
$pic2 = empty($data[$colname['pic2']]) ? '' : $weburl . $FRONT_PATH_PRODUCT . 'b'.$data[$colname['pic2']];
// $pic2 = !file_exists($pic2)?'':$pic2;
$pic3 = empty($data[$colname['pic3']]) ? '' : $weburl . $FRONT_PATH_PRODUCT . 'b'.$data[$colname['pic3']];
// $pic3 = !file_exists($pic3)?'':$pic3;
$pic4 = empty($data[$colname['pic4']]) ? '' : $weburl . $FRONT_PATH_PRODUCT .'b'. $data[$colname['pic4']];
// $pic4 = !file_exists($pic4)?'':$pic4;
// var_dump($data);exit;
$tag3 = coderLang::t('web_product_tag3', 1);
$tag3 = mb_substr($tag3, 0, 2, 'utf-8') . '<br>' . mb_substr($tag3, 2, 2, 'utf-8');

$tag4 = coderLang::t('web_product_tag4', 1);
$tag4 = mb_substr($tag4, 0, 2, 'utf-8') . '<br>' . mb_substr($tag4, 2, 2, 'utf-8');
// var_dump($tag3);exit;
// var_dump(coderLang::t('web_product_tag3'));exit;

$showDescription = false;
if ((!empty($data['product_content_text4_' . $language]) && !empty($pic4)) || (!empty($data['product_content_text3_' . $language]) && !empty($pic3)) || (!empty($data['product_content_text2_' . $language]) && !empty($pic2)) || (!empty($data['product_content_text1_' . $language]) && !empty($pic1))){
  $showDescription  = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="林製作所は長年に渡り培った独自の品質基準のもと、小ロットから海外生産を行っています。製品の企画、デザイン、設計、品質管理、生産製造まで一貫して行います。">
  <meta name="description" content="<?php echo $description ?>">
  <title><?php coderLang::t('menu_name') ?> | <?php coderLang::t('web_product_spec_info') ?> | <?php echo $data['typeName'] ?> | <?php echo $data['subtypeName'] ?> | <?php echo $data['product_name_' . $language] ?></title>
  <base href="<?php echo $web_root ?>">
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
    function search() {
    var value = $('#search').val();
    if (value != '') {
      location.href = 'products/search.php?key=' + value;
    }
  }
  </script>
</head>

<body>
  <?php include(ROOT_DIR . $lpath . 'header.php'); ?>

  <main>
    <div class="container">
      <p><a href="index.html"><?php coderLang::t('menu_home') ?></a>> <?php coderLang::t('web_product_spec_info') ?> >
        <?php echo $data['typeName'] ?> >
        <!--カテゴリ--><?php echo $data['subtypeName'] ?> >
        <!--サブ-カテゴリ--><?php echo $data['product_name_' . $language] ?></p>
    </div>
    <section class="odm-top container">
      <div class="text-center">
        <h3><?php echo $data['subtypeName'] ?></h3>
        <?php if ($language != 'en') { ?>
          <h4 class="odm-tittle"><?php echo $data['subtypeNameEn'] ?></h4>
        <?php } ?>
      </div>
    </section>
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
                    <li class="dropdown ">
                      <a class="word" href="#collapse<?php echo $key ?>" id="web-item" data-toggle="collapse" data-parent="#accordion" role="button" aria-haspopup="true" aria-expanded="<?php echo $data['pt_id'] == $row['id'] ? 'true' : 'false' ?>" style="<?php echo $data['pt_id'] == $row['id'] ? 'background-color:#448e96;color:#fff' : '' ?>"><?php echo $row['name'] ?></a>
                      <!--下拉選單按鈕-->
                      <ul id="collapse<?php echo $key ?>" class="<?php echo $data['pt_id'] == $row['id'] ? 'panel-collapse collapse in' : 'panel-collapse collapse' ?>" aria-expanded="<?php echo $data['pt_id'] == $row['id'] ? 'true' : 'false' ?>">
                        <?php foreach ($row['subtype'] as $value) { ?>
                          <?php if (!empty($value['link'])) {  ?>
                           
                            <li class="word"><a href="<?php echo 'products/'.$value['link'] ?>"><?php echo $value['subtypeName'] ?></a></li>
                          <?php } else {
                            $bgstyle = $value['subtypeId'] == $data['ps_id'] ? "style='background-color:#448e96'" : "";
                          ?>
                            <li class="word" <?php echo $bgstyle ?>><a href="products/subtype.php?id=<?php echo $value['subtypeId'] ?>"><?php echo $value['subtypeName'] ?></a></li>

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
          <!--商品写真-->
          <div class="col-lg-5 img-switch">
            <div class="center square-box">
              <!-- <div class="inner"><img id="show-img" class="main-products-photos" src="images/products/around-desk/ysk-016/1.jpg"></div> -->
              <div class="inner"><img id="show-img" class="main-products-photos" src="<?php echo $image[0] ?>"></div>
            </div>

            <div class="inline small-img">
              <!--商品写真1-->
              <!-- <a href="images/products/around-desk/ysk-016/1.jpg">
                <div class="img-border img-rounded small-products-photos"><img class="img-rounded img-rwd-full" src="images/products/around-desk/ysk-016/1.jpg"></div>
              </a> -->
              <?php
              foreach ($image as $row) { ?>
                <a href="<?php echo $row ?>">
                  <div class="img-border img-rounded small-products-photos"><img class="img-rounded img-rwd-full" src="<?php echo $row ?>"></div>
                </a>
              <?php } ?>
            </div>
          </div>

          <div class="products-info col-lg-7">
            <div class="row">
              <div class="col-md-5 col-xs-12 products-tittle ">
                <!--品番-->
                <p><?php echo $data[$colname['sno']] ?></p>
                <!--商品名-->
                <h4><?php echo $data['product_name_' . $language] ?></h4>
              </div>
              <!--タグ種類-->
              <div class="col-md-7 col-xs-12 inline ">
                <div class="square-button<?php echo $data['product_tag'] == 1 ? '-active' : '' ?>"><?php coderLang::t('web_product_tag1') ?></div>
                <div class="square-button<?php echo $data['product_tag'] == 2 ? '-active' : '' ?>"><?php coderLang::t('web_product_tag2') ?></div>
                <div class="square-button<?php echo $data['product_tag'] == 3 ? '-active' : '' ?>"><?php echo $tag3 ?></div>
                <div class="square-button<?php echo $data['product_tag'] == 4 ? '-active' : '' ?>"><?php echo $tag4 ?></div>
              </div>
            </div>
            <!--商品特徴-->
            <div>
              <p><?php echo $data['product_description_' . $language] ?></p>
            </div>
            <!--如有上傳組立説明書PDF時顯示PDF按鈕-->
            <?php if (!empty($file)) { ?>
              <div class="center">
                <div class="pdf-botton inline">

                  <div><i class="far fa-file-pdf pdf-icon"></i></div>
                  <div class="pdf-botton-text center"> <a href="<?php echo $file ?>" style="color:#fff"><?php coderLang::t('web_txt_download_pdf')  ?></a></div>

                </div>
              </div>
            <?php } ?>
            <!--組立説明書PDF按鈕結束-->

            <div>
              <table class="products-table">
                <!--寸法-->
                <?php if (!empty($data['product_size_' . $language])) { ?>
                  <tr>
                    <td class="products-table-1">
                      <h4><?php coderLang::t('web_product_spec_size') ?></h4>
                    </td>
                    <td><?php echo $data['product_size_' . $language] ?></td>
                  </tr>
                <?php } ?>
                <!--材質-->
                <?php if (!empty($data['product_material_' . $language])) { ?>
                  <tr>
                    <td>
                      <h4><?php coderLang::t('web_product_spec_material') ?></h4>
                    </td>
                    <td><?php echo $data['product_material_' . $language] ?></td>
                  </tr>
                <?php } ?>
                <!--耐荷重-->
                <?php if (!empty($data['product_heavy_' . $language])) { ?>
                  <tr>
                    <td>
                      <h4><?php coderLang::t('web_product_spec_weight') ?></h4>
                    </td>
                    <td><?php echo $data['product_heavy_' . $language] ?></td>
                  </tr>
                <?php } ?>
                <!--色-->
                <?php if (!empty($data['product_color_' . $language])) { ?>
                  <tr>
                    <td>
                      <h4><?php coderLang::t('web_product_spec_color') ?></h4>
                    </td>
                    <td> <?php echo $data['product_color_' . $language] ?></td>
                  </tr>
                <?php } ?>
                <!--ストレージ-->
                <?php if (!empty($data['product_capacity_' . $language])) { ?>
                  <tr>
                    <td>
                      <h4><?php coderLang::t('web_product_spec_capacity') ?></h4>
                    </td>
                    <td> <?php echo $data['product_capacity_' . $language] ?></td>
                  </tr>
                <?php } ?>
                <!--備考-->
                <?php if (!empty($data['product_comment_' . $language])) { ?>
                  <tr>
                    <td>
                      <h4><?php coderLang::t('web_product_spec_note') ?></h4>
                    </td>
                    <td><?php echo $data['product_comment_' . $language] ?></td>
                  </tr>
                <?php } ?>
                <!--受注生産の説明文-->
                <?php if (!empty($data['product_status_' . $language])) { ?>
                  <tr>
                    <td>
                      <h4><?php coderLang::t('web_product_spec_status') ?></h4>
                    </td>
                    <td><?php echo $data['product_status_' . $language] ?></td>
                  </tr>
                <?php } ?>
              </table>
            </div>
            <!--如有輸入販売サイト時顯示購入按紐-->
            <?php if (!empty($data['product_link_'.$language])) { ?>
              <div class="center">
                <input type="button" class="button-main" value="<?php coderLang::t('web_txt_shopping') ?>" onclick="window.open('<?php echo $data['product_link_'.$language] ?>', '_blank')">
              </div>
            <?php } ?>
            <!--購入按紐結束-->
            <div class="center">
              <input type="button" class="button-main" value="<?php coderLang::t('web_txt_contactus') ?>" onclick="location.href='contact/ready-made.php?id=<?php echo $data[$colname['id']] ?>&name=<?php echo $data['product_name_' . $language] ?>'">
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="container">
      <?php if($showDescription){?>
      <h3 class="text-center"><?php coderLang::t('web_product_spec_introduct') ?></h3>
      <?php if ($language != 'en') { ?>
        <h4 class="text-center"><?php echo  coderLang::getSpecificLanguage('en', 'web_product_spec_introduct') ?></h4>
      <?php } ?>
      <hr class="green-hr">
      <?php }?>
      <!--如有上傳説明写真1/商品說明1時顯示-->
      <?php if (!empty($data['product_content_text1_' . $language]) && !empty($pic1)) { ?>
        <div class="col-md-6 col-sm-6 col-xs-12 center-col products-info-margin" style="height:600px">
          <?php if (!empty($pic1)) { ?>
            <img class="col-md-6 col-sm-6 col-xs-12 img-rwd img-rounded" src="<?php echo $pic1 ?>">
          <?php } ?>
          <p><?php echo $data['product_content_text1_' . $language] ?></p>
        </div>
      <?php } ?>
      <!--如有上傳説明写真2/商品說明2時顯示-->
      <?php if (!empty($data['product_content_text2_' . $language]) && !empty($pic2)) { ?>
        <div class="col-md-6 col-sm-6 col-xs-12 center-col products-info-margin" style="height:600px">
          <?php if (!empty($pic2)) { ?>
            <img class="col-md-6 col-sm-6 col-xs-12 img-rwd img-rounded" src="<?php echo $pic2 ?>">
          <?php } ?>
          <p><?php echo $data['product_content_text2_' . $language] ?></p>
        </div>
      <?php } ?>
      <!--如有上傳説明写真3/商品說明3時顯示-->
      <?php if (!empty($data['product_content_text3_' . $language]) && !empty($pic3)) { ?>
        <div class="col-md-6 col-sm-6 col-xs-12 center-col products-info-margin" style="height:600px">
          <?php if (!empty($pic3)) { ?>
            <img class="col-md-6 col-sm-6 col-xs-12 img-rwd img-rounded" src="<?php echo $pic3 ?>">
          <?php } ?>
          <p><?php echo $data['product_content_text3_' . $language] ?></p>
        </div>
      <?php } ?>
      <!--如有上傳説明写真4/商品說明4時顯示-->
      <?php if (!empty($data['product_content_text4_' . $language]) && !empty($pic4)) { ?>
        <div class="col-md-6 col-sm-6 col-xs-12 center-col products-info-margin" style="height:600px">
          <?php if (!empty($pic4)) { ?>
            <img class="col-md-6 col-sm-6 col-xs-12 img-rwd img-rounded" src="<?php echo $pic4 ?>">
          <?php } ?>
          <p><?php echo $data['product_content_text4_' . $language] ?></p>
        </div>
      <?php } ?>
    </section>
    <section class="container">
      <!--如有上傳寸法図時顯示-->
      <?php if (!empty($sizeImage)) { ?>
        <h4 class="text-center"><?php coderLang::t('web_product_spec_size_pic') ?></h4>
        <?php if ($language != 'en') { ?>
          <h4 class="text-center"><?php echo  coderLang::getSpecificLanguage('en', 'web_product_spec_size_pic') ?></h4>
        <?php } ?>
        <hr>
        <?php foreach ($sizeImage as $row) { ?>
          <div class="col-md-12 col-sm-12 col-xs-12 products-info-margin center">
            <img class="col-md-12 col-sm-12 col-xs-12 img-rwd" src="<?php echo $row ?>">
          </div>
        <?php } ?>
      <?php } ?>
      <!--寸法図結束-->
      <!--如有輸入說明html式時顯示-->
      <?php if (!empty($data['product_content_' . $language])) { ?>
        <h3 class="text-center"><?php coderLang::t('web_product_spec_info') ?></h4>
        <?php if ($language != 'en') { ?>
          <h4 class="text-center"><?php echo  coderLang::getSpecificLanguage('en', 'web_product_spec_info') ?></h4>
        <?php } ?>
        <hr>
        <div class="col-lg-12">
          <?php echo $data['product_content_' . $language] ?>
        </div>
      <?php } ?>
      <!--說明html式結束-->
    </section>
    <?php if (!empty($suggestionList)) { ?>
      <section class="container">
        <h3 class="text-center"><?php coderLang::t('web_product_spec_relate') ?></h3>
        <?php if ($language != 'en') { ?>
          <h4 class="text-center"><?php echo  coderLang::getSpecificLanguage('en', 'web_product_spec_relate') ?> </h4>
        <?php } ?>
        <hr class="green-hr">
        <div class="products-info-img">
          <?php foreach ($suggestionList as $row) { ?>
            <!-- <a href="detail.php?id=<?php //echo $row['id'] ?>"> -->
            <a href="products/detail_<?php echo $row['id'] ?>.php">
              <div class="col-lg-2 col-md-4 col-xs-6 products-related">
                <div class="square-box">
                  <div class="inner"><img class="img-rwd-full" src="<?php echo $row['image'] ?>"></div>
                </div>
                <p><?php echo $row['sno'] ?></p>
                <h4 class="word"><?php echo $row['name'] ?></h4>
              </div>
            </a>
          <?php } ?>
        </div>
      </section>
    <?php } ?>
    <div class="grey-background">
      <section class="container">
        <div class="row">
          <div class="col-md-6 col-sm-12 col-xs-12 center"><img class="img-responsive" src="images/meeting.jpg"></div>
          <div class="col-md-6 col-sm-12 col-xs-12 center-text">
            <div class="products-info-contact">
              <h4><?php coderLang::t('web_product_odm_t1') ?>
              </h4>
              <br><?php coderLang::t('web_product_odm_t2') ?></p>
              <br>
              <input type="button" class="button-main" value="<?php coderLang::t('web_txt_contact_now') ?>" onclick="location.href='contact/ready-made.php?id=<?php echo $data[$colname['id']] ?>&name=<?php echo $data['product_name_' . $language] ?>'">

              <input type="button" class="button-main" value="ODM/<?php coderLang::t('web_txt_contact_w_odm') ?>" onclick="location.href='odmoem/odmoem.php'">
            </div>
          </div>
        </div>

      </section>
    </div>

  </main>

  <?php include(ROOT_DIR . $lpath . 'footer.html'); ?>


</body>

</html>
