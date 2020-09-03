<?php
include('../_config.php');
include_once(ROOT_DIR.'/do/getTypeFilter.php');
$typeId= get('typeId',1);
$subtypeId = get('subtypeId',1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="日本林製作所秉持日本國內對品質的堅持，把關製造高品質的產品。">
  <base href="<?php echo $web_root ?>">
  <title>ODM/OEM製造　日本林製作所 | ZIP LINK拉鍊連結屏風</title>

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
  </script>
</head>

<body>
  <?php include(ROOT_DIR . $lpath . 'header.php'); ?>
  <?php include(ROOT_DIR . $lpath . 'products/partition/ziplink/product.php'); ?>

  <?php include(ROOT_DIR . $lpath . 'footer.html'); ?>
</body>

</html>
