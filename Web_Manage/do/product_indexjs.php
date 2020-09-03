<?php if ($adminuser['isadmin'] == 1) { //是管理員才需要 
?>
    $("#<?php echo $colname_qf['qc_id']; ?>").change(function () {
    $("#<?php echo $colname['qp_id']; ?>,#<?php echo $colname['qm_id']; ?>").html('<?php echo '<option value="">' . coderLang::t("coderfilterhelp2", 1) . '</option>'; //請選擇 [coderfilterhelp2]
                                                                                    ?>');


    });

    $("#<?php echo $colname_qw['qf_id']; ?>").change(function () {
    var _val = $(this).val();

    $.ajax({
    url: "../do/productdata.php",
    type: "POST",
    async: false,
    dataType: 'json',
    data: {
    qf_id: _val,
    change_num: 1,
    dselect:0,
    method: '',
    substr: 1
    },
    success: function (data) {
    if (data.re) {
    $("#<?php echo $colname['qp_id']; ?>").html(data.list_qp);

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
<?php } ?>

<?php if ($adminuser['isadmin'] == 0) { //不是管理員 
?>
    function product_check() {
    $.ajax({
    url: "../do/productdata.php",
    type: "POST",
    async: false,
    dataType: 'json',
    data: {
    qf_id: <?php echo $adminuser['factory_login'] ?>,
    change_num: 1,
    dselect:0,
    method: '',
    substr: 1
    },
    success: function (data) {
    if (data.re) {
    $("#<?php echo $colname['qp_id']; ?>").html(data.list_qp);

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
    product_check();
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