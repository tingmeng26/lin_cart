<?php
include('../_config.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="林製作所は長年に渡り培った独自の品質基準のもと、小ロットから海外生産を行っています。製品の企画、デザイン、設計、品質管理、生産製造まで一貫して行います。">

  <title>ODM/OEMメーカー　林製作所 | 社会責任</title>
  <base href="<?php echo $web_root ?>">
  <script src="styles/jquery.min.js"></script>
  <script src="styles/bootstrap/js/bootstrap.min.js"></script>
  <script src="styles/style.js"></script>
  <link rel="stylesheet" href="styles/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="styles/style.css">
  <link rel="shortcut icon" href="images/favicon.png">
</head>
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

<body>
  <?php include(ROOT_DIR . $lpath . 'header.php'); ?>
  <?php include(ROOT_DIR . $lpath . 'company/csr.php'); ?>

  <?php include(ROOT_DIR . $lpath . 'footer.html'); ?>
</body>

</html>
