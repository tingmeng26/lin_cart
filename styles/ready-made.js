

$(function () {
 

  $('#type').change(function () {
    console.log($('#type').val());
    if ($('#type').val() > 0) {

      $.ajax({
        url: 'do/getSubtypeList.php',
        type: "POST",
        data: {
          typeId: $('#type').val(),
          language: 'tw'
        },
        dataType: 'json',
        success: function (r) {
          if (r.result) {
            console.log(r.data);
            $('#subtype').attr('disabled', false);
            $("#subtype").find("option").remove();
            $("#subtype").append($("<option></option>").attr("value", '').text('請選擇'));
            r.data.forEach(function (item) {
              $("#subtype").append($("<option></option>").attr("value", item.id).text(item.name));
            });

          } else {
            alert('取得品號/品名失敗');
          }
        }
      });
    }
  });

  $('#subtype').change(function () {
    if ($('#subtype').val() > 0) {

      $.ajax({
        url: 'do/getProductList.php',
        type: "POST",
        data: {
          subtypeId: $('#subtype').val(),
          language: language
        },
        dataType: 'json',
        success: function (r) {
          if (r.result) {
            console.log(r.data);
            $('#product').attr('disabled', false);
            $("#product").find("option").remove();
            $("#product").append($("<option></option>").attr("value", '').text('請選擇'));
            r.data.forEach(function (item) {
              $("#product").append($("<option></option>").attr("value", item.id).text(item.name));
            });

          } else {
            alert('取得品號/品名失敗');
          }
        }
      });
    }
  });

});

