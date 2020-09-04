<?php

include('../_config.php');
include(ROOT_DIR . '/do/getTypeList.php');
// var_dump($lpath);exit;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="林製作所は長年に渡り培った独自の品質基準のもと、小ロットから海外生産を行っています。製品の企画、デザイン、設計、品質管理、生産製造まで一貫して行います。">
  <base href="<?php echo $web_root ?>">
  <title><?php echo coderLang::t('menu_name', 1) ?></title>
  <script src="styles/jquery.min.js"></script>
  <script src="styles/bootstrap/js/bootstrap.min.js"></script>
  <script src="styles/style.js"></script>
  <link rel="shortcut icon" href="./images/favicon.png">
  <link rel="stylesheet" href="styles/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="styles/style.css">
</head>

<body>
  <?php include(ROOT_DIR . $lpath . 'header.php'); ?>
  <main>

    <div>
      <div class="container">
        <p><a href="index.html"><?php coderLang::t('menu_home') ?> > </a><?php coderLang::t('web_product_spec_info') ?></p>
      </div>
      <section class="container">

        <div class="text-center">
          <h3><?php coderLang::t('web_product_spec_info') ?></h3>
          <?php if ($language != 'en') { ?>
            <h4 class="odm-tittle">Products</h4>
          <?php } ?>
        </div>
        <div class="row">
          <?php foreach ($result as $row) { ?>
            <div class="col-md-4 col-sm-6 col-xs-12 cards">
              <div class="whitecard-none">
                <div class="products-top">

                  <div><img class="products-top-img" src="<?php echo $row['pic'] ?>">
                    <span class="products-top-tittle "><?php echo $row['name'] ?></span></div>

                </div>
                <hr class="green-hr">
                <a href="<?php echo empty($row['subtype'][0]['subtypeId']) ? './products/subtype.php' : './products/subtype.php?id=' . $row['subtype'][0]['subtypeId'] ?>">
                  <div><span class="fas fa-book-reader fa-3x"></span>詳細資料
                </a>
                <span onclick="addToCart('<?php echo $row['subtype'][0]['subtypeId'] ?>')"><span class="fas fa-shopping-cart fa-3x"></span>加入購物車</span>
              </div>
            </div>
        </div>
      <?php } ?>

    </div>

    </div>
    <div id="dialog" title="基本的对话框" style="display: none;">
      <p>这是一个默认的对话框，用于显示信息。对话框窗口可以移动，调整尺寸，默认可通过 'x' 图标关闭。</p>
    </div>
  </main>

  <?php include('../' . $lpath . 'footer.html'); ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.js"></script>

  <link rel="stylesheet" href="//apps.bdimg.com/libs/jqueryui/1.10.4/css/jquery-ui.min.css">
  <script src="//apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="//apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

</body>

</html>

<script>
  // $("#dialog").dialog();

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

  function addToCart(value) {
    if (value > 0) {
      $.ajax({
        url: 'products/cart.php',
        data: {
          value: value
        },
        type: "POST",
        dataType: 'json',
        success: function(r) {
          if (r.result) {
            window.location.reload();
          } else {
            alert('增加失敗');
          }
        }
      });
    }
  }
</script>
