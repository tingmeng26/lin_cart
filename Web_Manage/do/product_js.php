var change_num = 0;
<?php if ($adminuser['isadmin'] == 1) { //是管理員才需要 
?>
    <?php if ($method == 'add') { ?>
        $("#<?php echo $colname_qf['qc_id']; ?>").change(function () {
        $("#<?php echo $colname['qp_id']; ?>,#<?php echo $colname['qm_id']; ?>").html('<?php echo '<option value="">' . coderLang::t("coderfilterhelp2", 1) . '</option>'; //請選擇 [coderfilterhelp2]
                                                                                        ?>');
        $("#qmid_size").html('');
        $("#<?php echo $colname['size']; ?>").val('');

        <?php if ($fun_auth_key == 'qcontrol_producttest') { ?>
            $("#qmid_name").html('');
            $("#<?php echo $colname['name']; ?>").val('');
        <?php } ?>

        });
    <?php } ?>

    $("#<?php echo $colname_qw['qf_id']; ?>").change(function () {
    change_num += 1;
    if (change_num > <?php echo $change_num ?>) {

    var _val = $(this).val();
    //if(_val!=''){
    $.ajax({
    url: "../do/productdata.php",
    type: "POST",
    async: false,
    dataType: 'json',
    data: {
    qf_id: _val,
    change_num: change_num,
    dselect:<?php echo (isset($row[$colname['qp_id']]) ? $row[$colname['qp_id']] : 0); ?>,
    method: '<?php echo $method ?>',
    substr: 1
    },
    success: function (data) {
    if (data.re) {
    $("#<?php echo $colname['qp_id']; ?>").html(data.list_qp);
    if(change_num > 2){
    $("#<?php echo $colname['qm_id']; ?>").html('<?php echo '<option value="">' . coderLang::t("coderfilterhelp2", 1) . '</option>'; //請選擇 [coderfilterhelp2]
                                                ?>');
    }



    if (change_num == 2) {
    <?php /*?>$( "#<?php echo $colname['qm_id'];?>" ).change(); <?php */ ?>

    <?php if ($method == 'edit') { ?>
        $("#<?php echo $colname_qf['qc_id']; ?>").attr("disabled", "disabled");
        $("#<?php echo $colname_qw['qf_id']; ?>").attr("disabled", "disabled");
        $("#<?php echo $colname['qw_id']; ?>").attr("disabled", "disabled");
    <?php } ?>
    }
    }
    else {
    alert(data.msg);
    }
    },
    error: function (xhr, ajaxOptions, thrownError) {
    showNotice('alert', 'Error', thrownError);
    }
    });
    //}
    }

    });
<?php } ?>

$("#<?php echo $colname['qp_id']; ?>").change(function () {
var _val = $(this).val();

$.ajax({
url: "../do/modeldata.php",
type: "POST",
async: false,
dataType: 'json',
data: {
qf_id: $("#<?php echo $colname_qw['qf_id']; ?>").val(),
qp_id: _val,
change_num: 0,
dselect:'',
method: '',
substr: 1
},
success: function (data) {
if (data.re) {
$("#<?php echo $colname['qm_id']; ?>").html(data.list_qm);

$("#qmid_size").html('');
$("#<?php echo $colname['size']; ?>").val('');

<?php if ($fun_auth_key == 'qcontrol_producttest') { ?>
    $("#qmid_name").html('');
    $("#<?php echo $colname['name']; ?>").val('');
<?php } ?>
}
else {
alert(data.msg);
}
},
error: function (xhr, ajaxOptions, thrownError) {
showNotice('alert', 'Error', thrownError);
}
});



});