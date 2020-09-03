$(document).ready(function () {
    if (jQuery().validate) {
        var removeSuccessClass = function (e) {
            $(e).closest('.form-group').removeClass('has-success');
        }

        /*$("#username").blur(function () { //工作中心

            var _val = $(this).val();
            if(_val != "") {
                $.ajax({
                    url: "do/workadmindata.php",
                    type: "POST",
                    async: false,
                    dataType: 'json',
                    data: {
                        user: _val
                    },
                    success: function (data) {
                        if (data.re) {
                            var newOption = select_text+data.list;
                            $("select[name='work']").html(newOption);
                        }
                        else {
                            alert(data.msg);
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        showNotice('alert', 'Error', thrownError);
                    }
                });
            }
            else {
                $("select[name='work']").html(select_text);

            }

        });*/

        /**/
        /*
        $(document).on("change","#factory",function () { //連動

            var company = $("#company").val();
            var factory = $("#factory").val();
            if(company >0 && factory>0) {
                $.ajax({
                    url: "do/workdata.php",
                    type: "POST",
                    async: false,
                    dataType: 'json',
                    data: {
                        factory: factory
                    },
                    success: function (data) {
                        if (data.re) {
                            var newOption = select_text+data.list;
                            $("select[name='work']").html(newOption);
                        }
                        else {
                            alert(data.msg);
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        showNotice('alert', 'Error', thrownError);
                    }
                });
            }
            else if(company >0 && (factory==0||factory=="")) {
                $("select[name='work']").html(select_text);

            }

        });

        $(document).on("change","#company",function () { //連動

            var company = $("#company").val();
            if(company >0) {
                $("select[name='work']").html(select_text);
                $.ajax({
                    url: "do/factorydata.php",
                    type: "POST",
                    async: false,
                    dataType: 'json',
                    data: {
                        company: company
                    },
                    success: function (data) {
                        if (data.re) {
                            var newOption = select_text+data.list;
                            $("select[name='factory']").html(newOption);
                        }
                        else {
                            alert(data.msg);
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        showNotice('alert', 'Error', thrownError);
                    }
                });
            }


        });*/

        function login_check(_type) {
            var re = false;
            var obj ={};
            var company = $("#company").val();
            var factory = $("#factory").val();
            //var work = $("#work").val();
            var username = $("#username").val();
            var msg = "";

            if(username!="") {
                $.ajax({
                    url: "do/logincheckdata.php",
                    type: "POST",
                    async:false,
                    dataType:'json',
                    data: {
                        type:_type,
                        username:username,
                        company: company,
                        factory: factory
                        //work: work
                    },
                    success: function (data) {
                        re = data.re;
                        msg = data.msg;
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        showNotice('alert', 'Error', thrownError);
                    }
                });
            }
            else{
                re = true;
            }
            obj['re'] = re;
            obj['msg'] = msg;
            return obj;
        }

        var msgck = "";
        jQuery.validator.addMethod("login_check", function(value, element) {
            var obj = login_check(element.id);
            //msgck = obj['msg'];
            return obj['re'];
        }, "Please input work center");
        /**/
        $('#myform').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                username: {
                    required: true,
                    minlength: 3,
                    //login_check:true
                },
                password: {
                    required: true,
                    minlength: 6
                },
                code: {
                    required: true,
                    minlength: 5,
                    maxlength: 5
                },
                /*company: {
                    login_check:true
                },
                factory: {
                    login_check:true
                },*/
                /*work: {
                    login_check:true
                }*/
            },
            messages: {
                username: {
                    required: "Please input account.",
                    //login_check:"Error :: Please check Company or Factory or Work Center"
                },
                password: {
                    required: "Please input password."
                },
                code: {
                    required: "Please input image code."
                },
            },
            invalidHandler: function (event, validator) { //display error alert on form submit

            },

            highlight: function (element) { // hightlight error inputs
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change dony by hightlight
                $(element).closest('.form-group').removeClass('has-error'); // set error class to the control group
                setTimeout(function () {
                    removeSuccessClass(element);
                }, 3000);
            },

            success: function (label) {
                label.closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
            }
        });
        $('#forgot').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                forgotme_email: {
                    required: true,
                    minlength: 3
                },
            },
            messages: {
                forgotme_email: {
                    required: "Please input E-mail."
                },
            },
            highlight: function (element) { // hightlight error inputs
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
            },
            unhighlight: function (element) { // revert the change dony by hightlight
                $(element).closest('.form-group').removeClass('has-error'); // set error class to the control group
                setTimeout(function () {
                    removeSuccessClass(element);
                }, 3000);
            },
            success: function (label) {
                label.closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
            }
        });
    }
    $('#formbtn').click(function () {
        var $this = $(this);
        var $form = $('#myform');
        var $alert = $form.find('#alertdiv');
        $alert.removeClass('alert-danger').addClass('alert-info').html('<strong>Login...</strong>');
        if ($form.valid()) {
            $('#formcontent').hide();
            startFadeInOut($alert);
            $.ajax({
                url: 'chklogin.php',
                cache: false,
                type: "POST",
                data: {
                    username: $('#username').val(),
                    password: $('#password').val(),
                    company: $('#company').val(),
                    factory: $('#factory').val(),
                    work: $('#work').val(),
                    code: $('#code').val(),
                    remember_me: $('#remember_me:checked').val()
                },
                dataType: "json",
                success: function (data) {
                    setTimeout(function () {
                        vaildResult($alert, data, 'formcontent');
                    }, 1000);
                }
                , error: function (xhr, ajaxOptions, thrownError) {
                    var data = new Array();
                    data['result'] = false;
                    data['msg'] = "Error :: " + thrownError;
                    vaildResult($alert, data, 'formcontent');
                }
            });


        }

    });
    $("#forgot").submit(function () {
        return false;
    })
    $('#sendauthemail').click(function () {
        var $this = $(this);
        var $form = $('#forgot');
        var $alert = $form.find('#alertdiv_email');
        $alert.removeClass('alert-danger').addClass('alert-info').html('<strong>loading...</strong>');
        if ($form.valid()) {
            $('#formforgot').hide();
            startFadeInOut($alert);
            $.ajax({
                url: 'forgetpw_email/sendauthemail.php',
                cache: false,
                type: "POST",
                data: {forgotme_email: $('#forgotme_email').val()},
                dataType: "json",
                success: function (data) {
                    setTimeout(function () {
                        vaildResult($alert, data, 'formforgot', 'login.php', 'System has send the new password to your e-mail.');
                    }, 2000);
                }
                , error: function (xhr, ajaxOptions, thrownError) {
                    var data = new Array();
                    data['result'] = false;
                    data['msg'] = "Error :: " + thrownError;
                    vaildResult($alert, data, 'formforgot', 'login.php');
                }
            });


        }

    });

    function vaildResult(obj, data, formid, targethref, targettext) {
        targethref = targethref || 'home/index.php';
        targettext = targettext || '<strong> Verification completed! </strong> loading...';
        stopFadeInOut(obj);
        obj.removeClass('alert-info');
        if (data['result'] == true) {
            obj.addClass('alert-success');
            obj.html(targettext);
            setTimeout(function () {
                $('body').fadeOut(function () {
                    location.href = targethref;
                })
            }, 1000);
        }
        else {
            obj.addClass('alert-danger');
            obj.html('<strong> verification failed! </strong>' + data['msg']);
            $('#' + formid).show();
        }
    }

    function goToForm(form) {
        $('.login-wrapper > form:visible').fadeOut(500, function () {
            $('#' + form).fadeIn(500);
        });
    }

    $(function () {
        $('.goto-login').click(function () {
            goToForm('myform');
        });
        $('.goto-forgot').click(function () {
            goToForm('forgot');
        });
    });
});