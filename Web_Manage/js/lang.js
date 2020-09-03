$(function(){
    function alllang(lang){
        var current_lang = get_cookie("user_lang");
        if(current_lang != lang)
        {
            set_cookie("user_lang",lang,"",lang_path);
            location.reload();
        }
    }

	$(document).on("click","a.lang",function(){
        var lang = $(this).attr("lang");
        alllang(lang);
		
	});

    $(document).on("change","#loginlang",function(){
        var lang = $(this).val();
        alllang(lang);

    });
});