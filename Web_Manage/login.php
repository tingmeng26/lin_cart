<?php
$inc_path = "../inc/";
include($inc_path . '_config.php');

$cache_path = $cache_path_adminlogin;
include($inc_path . '_cache.php');
$db = Database::DB();
$m_lang_data = coderLang::getlang();
$user_lang = coderLang::get(); //語系
$now_lang_dic = coderLang::getDic(); //語系字典
$langary_jsall = coderLang::getDic_js(); //取得字典 - js使用

/*$ary_c = class_qcontrol_company::getList_mselect(); //公司別
$ary_f = class_qcontrol_factory::getList_mselect(); //廠別
$ary_w = class_qcontrol_work::getList_mselect2(); //工作中心代碼/名稱*/

$db->close();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo $webname ?><?php //coderLang::t( "manage_title"); //後台管理系統-Neptunus
                                    ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <!--base css styles-->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">


    <!--page specific css styles-->

    <!--flaty css styles-->
    <link rel="stylesheet" href="css/flaty.css">
    <link rel="stylesheet" href="css/flaty-responsive.css">

    <link rel="shortcut icon" href="img/favicon.png">
</head>

<body class="login-page">

    <!-- BEGIN Main Content -->

    <div id="loginform" class="login-wrapper">


        <!-- BEGIN Login Form -->
        <form id="myform">

            <img src="images/logo.png" style="width:100%">

            <hr />

            <div id="alertdiv" class="alert alert-info" style="display:none">
                <?php coderLang::t("alertdiv"); //<strong>登入中...</strong>請稍候 
                ?>
            </div>

            <div id="formcontent">
                <div class="form-group">
                    <div class="controls">
                        <input type="text" id="username" name="username" placeholder="<?php coderLang::t("username"); //請在此輸入您的帳號 
                                                                                        ?>" class="form-control" autocomplete="off" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="controls">
                        <input type="password" id="password" name="password" placeholder="<?php coderLang::t("password"); //請在此輸入您的密碼 
                                                                                            ?>" class="form-control" autocomplete="off" />
                    </div>
                </div>

                <div class="form-group">
                    <label style="margin-left: 5px"><?php coderLang::t("lang"); //語系 
                                                    ?></label>
                    <div class="controls">
                        <select id="loginlang" name="loginlang" required="yes" class="form-control" tabindex="1">
                            <?php
                            foreach ($m_lang_data as $_lang_k => $_lang_v) {
                            ?>
                                <option value="<?php echo $_lang_k ?>" <?php echo ($_lang_k == $user_lang) ? 'selected' : '' ?>><?php echo $_lang_v ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <?php /*?><div class="form-group">
                <label style="margin-left: 5px"><?php coderLang::t("admin8"); //公司別 [admin8] ?></label>
                <div class="controls">
                    <select id="company" name="company" class="form-control" tabindex="1">
                        <option value="0"><?php coderLang::t("coderfilterhelp2"); //請選擇 [coderfilterhelp2] ?></option>
                        <?php
                        foreach ($ary_c as $_c_v){
                            ?>
                            <option value="<?php echo $_c_v['value']?>"><?php echo $_c_v['name']?></option>
                        <?php }?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label style="margin-left: 5px"><?php coderLang::t("admin9"); //廠別[admin9] ?></label>
                <div class="controls">
                    <select id="factory" name="factory" class="form-control" tabindex="1">
                        <option value="0"><?php coderLang::t("coderfilterhelp2"); //請選擇 [coderfilterhelp2] ?></option>

                    </select>
                </div>
            </div>

            <div class="form-group">
                <label style="margin-left: 5px"><?php coderLang::t("admin23"); //工作中心代碼/名稱 [admin23] ?></label>
                <div class="controls">
                    <select id="work" name="work" class="form-control" tabindex="1">
                        <option value="0"><?php coderLang::t("coderfilterhelp2"); //請選擇 [coderfilterhelp2] ?></option>
                    </select>
                </div>
            </div><?php */ ?>

                <div class="form-group">
                    <div style="float:left;width:180px;">
                        <input type="text" id="code" name="code" placeholder="<?php coderLang::t("code"); //右圖數字 
                                                                                ?>" class="form-control" autocomplete="off" />
                    </div>
                    <a href="javascript:void(0)"><img id="codeimg" src="../showrandimg.php?time=<?php echo time() ?>" style="float:left" onClick="$(this).attr('src','../showrandimg.php?time='+getTimeStamp())" class="show-popover" data-trigger="hover" data-placement="top" data-content="<?php coderLang::t("codeimg2"); //點我就可以重新取得一組新的驗證圖片! 
                                                                                                                                                                                                                                                                                                ?>" data-original-title="<?php coderLang::t("codeimg1"); //看不清楚嗎? 
                                                                                                                                                                                                                                                                                                                                                                                ?>"></a>
                    <div style="clear:both"></div>
                </div>
                <?php /*?><div class="form-group">
                <div class="controls">
                    <label class="checkbox"><input type="checkbox" value="1" name="remember_me" id="remember_me"> <?php coderLang::t( "remember"); //記住我 ?>
                    </label>
                </div>
            </div><?php */ ?>
                <div class="form-group">
                    <div class="controls">
                        <button type="button" id="formbtn" class="btn btn-primary form-control"><?php coderLang::t("formbtn"); //登入 
                                                                                                ?></button>
                    </div>
                </div>
                <hr />
                <?php /*?>
            <p class="clearfix">
                <a href="#" class="goto-forgot pull-right"><?php coderLang::t( "forgetpwd"); //忘記密碼 ?></a>
            </p>
            <?php */ ?>
            </div>
        </form>
        <!-- END Login Form -->

        <!-- BEGIN Forgot Password Form -->
        <form id="forgot" style="display:none">
            <h3><?php coderLang::t("backpwd"); //取得密碼 
                ?></h3>
            <hr />
            <div id="alertdiv_email" class="alert alert-info" style="display:none">
                <strong><?php coderLang::t("forgot"); //驗證中... 
                        ?></strong><?php coderLang::t("forgot2"); //請稍候 
                                                                            ?>
            </div>
            <div id="formforgot">
                <div class="form-group">
                    <div class="controls">
                        <input type="text" id="forgotme_email" name="forgotme_email" placeholder="<?php coderLang::t("forgot3"); //請在此輸入您的Email 
                                                                                                    ?>" class="form-control" autocomplete="off" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="controls">
                        <button type="button" class="btn btn-primary form-control" id="sendauthemail"><?php coderLang::t("forgot4"); //寄出驗證信 
                                                                                                        ?></button>
                    </div>
                </div>
                <hr />
                <p class="clearfix">
                    <a href="#" class="goto-login pull-left"><?php coderLang::t("forgot5"); //← 回登入頁 
                                                                ?></a>
                </p>
            </div>
        </form>
        <!-- END Forgot Password Form -->


    </div>
    <!-- END Main Content -->

    <script type="text/javascript">
        var lang_path = '<?php echo $rootpath ?>';
        var langary_jsall = <?php echo $langary_jsall ?>;
        var select_text = '<option value="0">' + '<?php coderLang::t("coderfilterhelp2"); //請選擇 [coderfilterhelp2] 
                                                    ?>' + '</option>';
    </script>
    <!--basic scripts-->
    <script type="text/javascript" src="assets/jquery/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/nicescroll/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="assets/jquery-cookie/jquery.cookie.js"></script>
    <script type="text/javascript" src="assets/jquery-validation/dist/jquery.validate.js"></script>
    <script type="text/javascript" src="js/animatehelp.js"></script>
    <!--page specific plugin scripts-->
    <!--flaty scripts-->
    <script src="js/flaty.js"></script>
    <script src="js/public.js"></script>
    <script language="javascript" type="text/javascript" src="js/login.js"></script>

    <script type="text/javascript" src="js/cookie.js"></script>
    <script type="text/javascript" src="js/lang.js"></script>

</body>

</html>
