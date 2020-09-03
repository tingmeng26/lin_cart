<?php
include('_config.php');
include_once('formconfig.php');
$username = get('username', 1);
$manageinfo = "";
$pic = "";
$showAuth = false;
$type_val = array();
$change_num = 2;
if ($username != "") {
	if ($username != $adminuser['username']) {
		coderAdmin::vaild($auth, 'edit');
		$showAuth = true;
	}
	$db = new Database($HS, $ID, $PW, $DB);
	$db->connect();

	$row = $db->query_prepare_first(
		" SELECT $table.* 
									FROM $table 
									WHERE username=:username",
		array(':username' => $username)
	);

	//$row['auth']=coderAdmin::getAuthListAryByInt($row['auth']);
	//編輯時,password預設為空白
	unset($row['password']);
	if ($row['company'] > 0) {
		$type_val = array('type1_' . $row['company'], $row['factory']);
	}

	//$fhelp->setAttr('work','ary',class_qcontrol_work::getList_qfid($row['factory']));
	$fhelp->bindData($row);

	$pic = $row['pic'];
	$fhelp->setAttr('username', 'readonly', true);


	$method = 'edit';
	$active = coderLang::t("edit", 1); //編輯
	$manageinfo = '  ' . coderLang::t("manage1", 1) . ' : ' . $row['admin'] . ' | ' . coderLang::t("manage2", 1) . ' : ' . $row['createtime'] . ' | ' . coderLang::t("manage3", 1) . ' : ' . $row['updatetime'] . ' | ' . coderLang::t("navbar1", 1) . ' : ' . $row['logintime'] . ' | ' . coderLang::t("manage8", 1) . ' : ' . $row['ip']; //管理者[manage1] 建立時間[manage2] 上次修改時間[manage3]　最後登入IP[manage8]


	$row_history = coderAdminLog::getLogByUser($row['username'], 5);

	if ($row['company'] != null) {
		$change_num += 1;
	}
	if ($row['factory'] != null) {
		$change_num += 1;
	}

	$db->close();
} else {
	coderAdmin::vaild($auth, 'add');
	$method = 'add';
	$active = coderLang::t("add", 1); //編輯
	$fhelp->setAttr('password', 'validate', array('required' => 'yes', 'maxlength' => '20', 'minlength' => 6));
	$fhelp->setAttr('repassword', 'validate', array('required' => 'yes', 'maxlength' => '20', 'minlength' => 6, 'equalto' => '#password', 'data-msg-equalto' => '請重新輸入管理員密碼'));
	$showAuth = true;
}


?>
<!DOCTYPE html>
<html>

<head>
	<?php include('../head.php'); ?>
	<script language="javascript" type="text/javascript">
		<?php
		coderFormHelp::drawPicScript($method, $file_path, $pic, 'org_pic');
		?>
	</script>
</head>

<body>
	<!-- BEGIN Container -->
	<div class="container" id="main-container">
		<!-- BEGIN Content -->
		<div id="main-content">
			<!-- BEGIN Page Title -->
			<div class="page-title">
				<div>
					<h1><i class="<?php echo $mainicon ?>"></i> <?php echo $page_title . coderLang::t("configmsg2", 1); //管理
																?></h1>
					<h4><?php echo $page_desc ?></h4>
				</div>
			</div>
			<!-- END Page Title -->
			<?php if ($manageinfo != '') { ?>
				<div class="alert alert-info">
					<button class="close" data-dismiss="alert">&times;</button>
					<strong><?php coderLang::t("manage4"); //系統資訊
							?> : </strong> <?php echo $manageinfo ?>
				</div>
			<?php } ?>
			<!-- BEGIN Main Content -->
			<div class="row">
				<div class="col-md-12">
					<div class="box">
						<div class="box-title">
							<h3><i class="<?php echo getIconClass($method) ?>"></i> <?php echo $page_title . $active ?></h3>
							<div class="box-tool">
								<a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
								<a data-action="close" href="#"><i class="icon-remove"></i></a>
							</div>
						</div>
						<div class="box-content">
							<form class="form-horizontal" action="save.php" id="myform" name="myform" method="post">
								<?php echo $fhelp->drawForm('id') ?>
								<div class="row">
									<!--right start-->
									<div class="col-md-6">
										<?php if (coderAdmin::isAuth($auth)) { ?>
											<div class="form-group">
												<label class="col-sm-3 col-lg-2 control-label">
													<?php echo $fhelp->drawLabel('ispublic') ?>
												</label>
												<div class="col-sm-8 controls">
													<?php echo $fhelp->drawForm('ispublic') ?>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-3 col-lg-2 control-label">
													<?php echo $fhelp->drawLabel('isadmin') ?>
												</label>
												<div class="col-sm-8 controls">
													<?php echo $fhelp->drawForm('isadmin') ?>
												</div>
											</div>
										<?php } ?>
										<div class="form-group">
											<label class="col-sm-3 col-lg-2 control-label">
												<?php echo $fhelp->drawLabel('username') ?>
											</label>
											<div class="col-sm-8  controls">
												<?php echo $fhelp->drawForm('username') ?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 col-lg-2 control-label">
												<?php echo $fhelp->drawLabel('password') ?>
											</label>
											<div class="col-sm-8 controls">
												<?php echo $fhelp->drawForm('password') ?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 col-lg-2 control-label">
												<?php echo $fhelp->drawLabel('repassword') ?>
											</label>
											<div class="col-sm-8 controls">
												<?php echo $fhelp->drawForm('repassword') ?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 col-lg-2 control-label">
												<?php echo $fhelp->drawLabel('name') ?>
											</label>
											<div class="col-sm-8  controls">
												<?php echo $fhelp->drawForm('name') ?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 col-lg-2 control-label">
												<?php echo $fhelp->drawLabel('email') ?>
											</label>
											<div class="col-sm-8  controls">
												<?php echo $fhelp->drawForm('email') ?>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 col-lg-2 control-label">
												<?php echo $fhelp->drawLabel('email_backup') ?>
											</label>
											<div class="col-sm-8  controls">
												<?php echo $fhelp->drawForm('email_backup') ?>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 col-lg-2 control-label">
												<?php echo $fhelp->drawLabel('r_id') ?>
											</label>
											<div class="col-sm-8  controls">
												<?php echo $fhelp->drawForm('r_id') ?>
											</div>
										</div>

										<?php /*?><div class="form-group">
												<label class="col-sm-3 col-lg-2 control-label" >
													<?php echo $fhelp->drawLabel('loginout_time')?>
												</label>
												<div class="col-sm-8  controls" >
													<?php echo $fhelp->drawForm('loginout_time')?>
												</div>
											</div><?php */ ?>
									</div>
									<!--left end-->
									<!--right start-->
									<div class="col-md-6 ">
										<?php /*?><div class="form-group">
                                                <label class="col-sm-3 col-lg-2 control-label" >
                                                    <?php echo $fhelp->drawLabel('company')?>
                                                </label>
                                                <div class="col-sm-8  controls" >
                                                    <?php echo $fhelp->drawForm('company')?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 col-lg-2 control-label" >
                                                    <?php echo $fhelp->drawLabel('factory')?>
                                                </label>
                                                <div class="col-sm-8  controls" >
                                                    <?php echo $fhelp->drawForm('factory')?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 col-lg-2 control-label" >
                                                    <?php echo $fhelp->drawLabel('work')?>
                                                </label>
                                                <div class="col-sm-8  controls" >
                                                    <?php echo $fhelp->drawForm('work')?>
                                                </div>
                                            </div> <?php*/ ?>

										<div class="form-group">
											<label class="col-sm-3 col-lg-2 control-label">
												<?php echo $fhelp->drawLabel('info') ?>
											</label>
											<div class="col-sm-8  controls">
												<?php echo $fhelp->drawForm('info') ?>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 col-lg-2 control-label">
												<span class="red">*</span>
												<?php echo $fhelp->drawLabel('pic') ?>
											</label>
											<div class="col-sm-8  controls">
												<div id="picupload"></div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
												<button type="submit" class="btn btn-primary"><i class="icon-ok"></i><?php coderLang::t("manage5"); //完成[manage5]
																														?><?php echo $active ?></button>
												<button type="button" class="btn" onclick="if(confirm('<?php echo coderLang::t("manage6", 1) . $active; //確定要取消[manage6] 
																										?>?')){parent.closeBox();}"><i class="icon-remove"></i><?php echo coderLang::t("manage7", 1) . $active; //取消[manage7]
																																																								?></button>
											</div>
										</div>
									</div>
									<!--right end-->
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- END Main Content -->

			<?php include('../footer.php'); ?>
			<a id="btn-scrollup" class="btn btn-circle btn-lg" href="#"><i class="icon-chevron-up"></i></a>
		</div>
		<!-- END Content -->
	</div>
	<!-- END Container -->


	<?php include('../js.php'); ?>
	<script type="text/javascript" src="../assets/jquery-validation/dist/jquery.validate.js"></script>
	<script type="text/javascript" src="../assets/jquery-validation/dist/additional-methods.js"></script>
	<script type="text/javascript" src="../js/coderpicupload.js"></script>
	<script type="text/javascript" src="../ui/selectboxes/jquery.selectboxes.js"></script>
	<script type="text/javascript" src="../js/coderselectBoxManipulation.js"></script>
	<link rel="stylesheet" type="text/css" href="../assets/chosen-bootstrap/chosen.min.css" />
	<script type="text/javascript" src="../assets/chosen-bootstrap/chosen.jquery.min.js"></script>
	<?php
	$ary_selectbox = array(0 => 'company', 1 => 'factory');
	//print_r($ary_type);
	//echo coderFormHelp::selectBoxManipulation($ary_selectbox,$ary_type,$type_val);
	?>
	<script type="text/javascript">
		$('#picupload').coderpicupload({
			pics: [{
				name: '縮圖',
				type: 5,
				tag: 's',
				width: 60,
				height: 60
			}],
			width: '100',
			height: '100',
			s_width: '60px',
			s_height: '60px',
			org_pic: org_pic
		});
		<?php echo coderFormHelp::drawVaildScript(); ?>
		<?php if ($method == 'add') { ?>
			$("#username").rules("add", {
				messages: {
					remote: "<?php coderLang::t("adminjs1"); //此帳號己被使用,請重新輸入! [adminjs1]
								?>",
				},
				remote: {
					url: "checkusername.php",
					type: "post",
					data: {
						username: function() {
							return $('#username').val()
						}
					}
				}
			});
		<?php
		} ?>
		$("#pic").rules("add", {
			required: true,
			messages: {
				required: "<?php coderLang::t("adminjs2"); //請上傳圖片! [adminjs2]
							?>",
			}
		});

		var change_num = 0;
		$(document).ready(function() {
			<?php /*?>
                $(document).on("change","#company,#factory",function () {
                    change_num += 1;
                    if(change_num > <?php echo $change_num?>) {
                        //alert(change_num);
                        var company = $("#company").val();
                        var factory = $("#factory").val();
                        if(company != "" && factory!="") {
                            $.ajax({
                                url: "../do/workdata.php",
                                type: "POST",
                                async: false,
                                dataType: 'json',
                                data: {
                                    factory: factory
                                },
                                success: function (data) {
                                    if (data.re) {
                                        $("select[name='work[]']").removeAttr('selected');
                                        //var newOption = $('<option value="1">test</option>');
                                        var newOption = data.list;
                                        $("select[name='work[]']").html(newOption);
                                        $("select[name='work[]']").trigger("liszt:updated");
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
                        else if(company != "" && factory=="") {
                            $("select[name='work[]']").removeAttr('selected');
                            var newOption = $('');
                            $("select[name='work[]']").html(newOption);
                            $("select[name='work[]']").trigger("liszt:updated");
                        }


                    }
                });
                <?php */ ?>
		});
	</script>
</body>

</html>