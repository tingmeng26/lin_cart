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

  <title>ODM/OEMメーカー　林製作所 | お問い合わせ：OEM・ODM生産専用</title>

  <base href="<?php echo $web_root ?>">
  <script src="styles/jquery.min.js"></script>
  <script src="styles/bootstrap/js/bootstrap.min.js"></script>
  <script src="styles/style.js"></script>
  <!-- <script src="styles/customize.js"></script> -->
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <link rel="stylesheet" href="styles/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/error.css">
  <link rel="shortcut icon" href="images/favicon.png">
  <script>
    var message = '<?php coderLang::t('submitMessage') ?>';
    // 必填
    var required = '<?php coderLang::t('required')?>';
    // 最多20字
    var maxTwenty = '<?php coderLang::t('maxTwenty')?>';
    // 最多30字
    var maxThirty = '<?php coderLang::t('maxThirty')?>';
    // 最多80字
    var maxEighty = '<?php coderLang::t('maxEighty')?>';
    // 最多1000字
    var maxThousand = '<?php coderLang::t('maxThousand')?>';
    // Email格式不正確
    var email = '<?php coderLang::t('email')?>';
    // email不一致
    var notEqual = '<?php coderLang::t('notEqual')?>';
  </script>
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



    $(function() {
      $('#form').validate({
        onkeyup: function(element, event) {
          // 去除左側空白
          var value = this.elementValue(element).replace(/^\s+/g, "");
          $(element).val(value);
        },
        rules: {
          name: {
            required: true,
            maxlength: 20
          },
          company: {
            maxlength: 30
          },
          address: {
            required: true,
            maxlength: 80
          },
          email: {
            required: true,
            email: true
          },
          email2: {
            required: true,
            email: true,
            equalTo: "#email"
          },
          content: {
            required: true,
            maxlength: 1000
          }
        },
        messages: {
          name: {
            required: required,
            maxlength: maxTwenty
          },
          company: {
            maxlength: maxThirty
          },
          address: {
            required: required,
            maxlength: maxEighty
          },
          email: {
            required: required,
            email: email
          },
          email2: {
            required: required,
            email: email,
            equalTo: notEqual
          },
          content: {
            required: required,
            maxlength: maxThousand
          }
        },
        submitHandler: function(form) {
          $.ajax({
            url: 'contact/save.php',
            data: $('form').serialize(),
            type: "POST",
            dataType: 'json',
            success: function(r) {
              if (r.result) {
                alert(message);
                location.href = 'index.html';
              } else {
                alert('發送失敗');
              }
            }
          });

        }
      });

    });
  </script>

<body>
  <?php include(ROOT_DIR . $lpath . 'header.php'); ?>
  <?php include(ROOT_DIR . $lpath . 'contact/customize.php'); ?>

  <?php include(ROOT_DIR . $lpath . 'footer.html'); ?>
</body>

</html>
