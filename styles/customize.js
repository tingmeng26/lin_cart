

 $(function(){
        $('#form').validate({
       onkeyup: function(element, event) {
         // 去除左側空白
         var value = this.elementValue(element).replace(/^\s+/g, "");
         $(element).val(value);
        },
        rules: {
          name: {
            required: true,
            maxlength:20
          },
          company: {
            maxlength: 30
          },
          address: {
            required: true,
            maxlength:80
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
          content:{
            required: true,
            maxlength:1000
          }
        },
        messages: {
          name: {
            required:'必填',
            maxlength:'最多20字'
          },
          company: {
            maxlength:'最多30字'
          },
          address: {
            required:'必填',
            maxlength:'最多80字'
          },
          email: {
            required:'必填',
            email:'Email格式不正確'
          },
          email2: {
            required:'必填',
            email:'Email格式不正確',
            equalTo:'email不一致'
          },
          content:{
            required:'必填',
            maxlength:'最多1000字'
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
            location.href='index.html';
          } else {
            alert('發送失敗');
          }
        }
      });
          
        }
  });

});

