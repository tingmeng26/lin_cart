<!--basic scripts-->

<script src="../assets/jquery/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="../assets/jquery-ui/jquery-ui.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.js"></script>
<script src="../assets/nicescroll/jquery.nicescroll.js"></script>
<script src="../assets/jquery-cookie/jquery.cookie.js"></script>
<script type="text/javascript" src="../assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="../assets/gritter/js/jquery.gritter.js"></script>
<!--page specific plugin scripts-->

<!--flaty scripts-->
<script src="../js/flaty.js"></script>
<script type="text/javascript" src="../assets/colorbox/jquery.colorbox.js"></script>

<script src="../js/public.js"></script>
<script type="text/javascript" src="../assets/jcrop/jquery.Jcrop.min.js"></script>
<!--select選單-->
<script type="text/javascript" src="../assets/chosen-bootstrap/chosen.jquery.min.js"></script>
<script type="text/javascript" src="../js/cookie.js"></script>
<script type="text/javascript" src="../js/lang.js"></script>
<script type="text/javascript" src="../js/jquery.count.js"></script>
<script>
    function isYouTubeURL(url) { //YouTubeURL 判斷
        var p = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
        return (url.match(p)) ? true : false;
    }
    var lang_path = '<?php echo $rootpath?>';
    var langary_jsall = <?php echo $langary_jsall?>;
</script>