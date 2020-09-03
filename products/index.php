<?php

include('../_config.php');
include(ROOT_DIR.'/do/getTypeList.php');
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
    <title><?php echo coderLang::t('menu_name',1)?></title>
    <script src="styles/jquery.min.js"></script>
    <script src="styles/bootstrap/js/bootstrap.min.js"></script>
    <script src="styles/style.js"></script>
    <link rel="shortcut icon" href="./images/favicon.png">
    <link rel="stylesheet" href="styles/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <?php include(ROOT_DIR.$lpath . 'header.php'); ?>
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
                  <a href="<?php echo empty($row['subtype'][0]['subtypeId']) ? './products/subtype.php' : './products/subtype.php?id=' . $row['subtype'][0]['subtypeId'] ?>">
                    <div><img class="products-top-img" src="<?php echo $row['pic'] ?>">
                    <span class="products-top-tittle " ><?php echo $row['name'] ?></span></div>
                  </a>
                </div>
                <hr class="green-hr">
                <i class="fas fa-shopping-cart fa-3x"></i>
              </div>
            </div>
          <?php } ?>

        </div>

    </div>
  </main>

    <?php include('../'.$lpath . 'footer.html'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.js"></script>


</body>

</html>

<script>
  function changeLanguage(to) {
      $.ajax({
        url: 'do/changeLanguage.php',
        data: {
          language:to
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
  function search(){
    var value = $('#search').val();
    if(value != ''){
      location.href='products/search.php?key='+value;
    }
  }

  
  </script>
