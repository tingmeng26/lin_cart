<?php
class coderDBConf{
	public static $admin         = 'admin';             //後台管理者
    public static $admin_log     = 'admin_log';	        //後台管理者操作紀錄
	public static $rules         = 'rules';             //角色
    public static $rules_auth    = 'rules_auth';        //角色權限
    public static $col_rules = array('id'=>'r_id','name'=>'r_name','depiction'=>'r_depiction','superadmin'=>'r_superadmin','system'=>'r_system','admin'=>'r_admin','updatetime'=>'r_updatetime','createtime'=>'r_createtime'); //角色
    public static $col_rules_auth = array('id'=>'ra_id','r_id'=>'r_id','main_key'=>'ra_main_key','fun_key'=>'ra_fun_key','auth'=>'ra_auth','admin'=>'ra_admin','updatetime'=>'ra_updatetime','createtime'=>'ra_createtime'); //角色權限


    /* 以下自行新增的資料表 */
    public static $lang_data = 'lang_data'; //語系資料
    public static $col_lang_data = array('id'=>'ld_id','lang'=>'ld_lang','name'=>'ld_name','remark'=>'ld_remark','ispublic'=>'ld_ispublic','admin'=>'ld_admin','ind'=>'ld_ind','updatetime'=>'ld_updatetime','createtime'=>'ld_createtime');

    public static $lang_dictionary = 'lang_dictionary'; //語系字典
    public static $col_lang_dictionary = array('id'=>'ldic_id','ld_lang'=>'ldic_ld_lang','key'=>'ldic_key','english'=>'ldic_english','val'=>'ldic_val','admin'=>'ldic_admin','updatetime'=>'ldic_updatetime','createtime'=>'ldic_createtime');

    public static $acct_summons = 'acct_summons'; //多語系明細-主檔
    public static $acct_summons_del = 'acct_summons_del'; //多語系明細-主檔 - 刪除的會寫來這裡
    public static $col_acct_summons = array('id'=>'as_id','company'=>'as_company','day'=>'as_day','no'=>'as_no','type'=>'as_type','login'=>'as_login','reviewer'=>'as_reviewer','remark'=>'as_remark','langremark'=>'as_langremark','admin'=>'as_admin','updatetime'=>'as_updatetime','createtime'=>'as_createtime','createtime_del'=>'as_createtime_del');

    public static $acct_summonsdetail = 'acct_summonsdetail'; //多語系明細-明細
    public static $acct_summonsdetail_del = 'acct_summonsdetail_del'; //多語系明細-明細 - 刪除的會寫來這裡
    public static $col_acct_summonsdetail = array('id'=>'asd_id','as_id'=>'asd_as_id','as_no'=>'asd_as_no','as_company'=>'asd_as_company','as_type'=>'asd_as_type','serial_number'=>'asd_serial_number','subject1'=>'asd_subject1','subject2'=>'asd_subject2','summary'=>'asd_summary','langsummary'=>'asd_langsummary','dc'=>'asd_dc','price'=>'asd_price','department'=>'asd_department','cm'=>'asd_cm','client'=>'asd_client','firm'=>'asd_firm','arap'=>'asd_arap','projectno'=>'asd_projectno','admin'=>'asd_admin','updatetime'=>'asd_updatetime','createtime'=>'asd_createtime','createtime_del'=>'asd_createtime_del');

    public static $api_error = 'api_error'; //API錯誤訊息
    public static $col_api_error = array('id'=>'ae_id','api_type'=>'ae_api_type','type'=>'ae_type','error'=>'ae_error','createtime'=>'ae_createtime');

    // 產品分類
    public static $productType = 'product_type';
    public static $colProductType = ['id'=>'pt_id','nameEn'=>'pt_name_en','nameTw'=>'pt_name_tw','nameJp'=>'pt_name_jp','ispublic'=>'pt_ispublic','ind'=>'pt_ind','pic'=>'pt_pic','admin'=>'pt_admin','updatetime'=>'pt_updatetime','createtime'=>'pt_createtime'];

    // 分類子項
    public static $productSubtype = 'product_stype';
    public static $colProductSubtype = ['id'=>'ps_id','tid'=>'pt_id','nameEn'=>'ps_name_en','nameTw'=>'ps_name_tw','nameJp'=>'ps_name_jp','ispublic'=>'ps_ispublic','ind'=>'ps_ind','link'=>'ps_link','admin'=>'ps_admin','updatetime'=>'ps_updatetime','createtime'=>'ps_createtime'];

    // 聯絡我們
    public static $contact = 'contacts';
    public static $colContact = ['id'=>'contact_id','type'=>'contact_type','p_id'=>'product_id','name'=>'contact_name','company'=>'contact_company','address'=>'contact_address','phone'=>'contact_phone','email'=>'contact_email','content'=>'contact_content','reply'=>'contact_reply','notice'=>'contact_notice','createtime'=>'contact_createtime','updatetime'=>'contact_updatetime','admin'=>'contact_admin'];

    // 產品
    public static $product = 'products';
    public static $colPorduct = ['id'=>'product_id','ind'=>'product_ind','sid'=>'ps_id','tid'=>'pt_id','tag'=>'product_tag','sno'=>'product_sno','nameJp'=>'product_name_jp','nameEn'=>'product_name_en','nameTw'=>'product_name_tw','descriptionJp'=>'product_description_jp','descriptionEn'=>'product_description_en','descriptionTw'=>'product_description_tw','pics'=>'product_pics','pic'=>'product_pic','sizeJp'=>'product_size_jp','sizeEn'=>'product_size_en','sizeTw'=>'product_size_tw','materialJp'=>'product_material_jp','materialEn'=>'product_material_en','materialTw'=>'product_material_tw','heavyJp'=>'product_heavy_jp','heavyEn'=>'product_heavy_en','heavyTw'=>'product_heavy_tw','colorJp'=>'product_color_jp','colorEn'=>'product_color_en','colorTw'=>'product_color_tw','capacityJp'=>'product_capacity_jp','capacityEn'=>'product_capacity_en','capacityTw'=>'product_capacity_tw','commentJp'=>'product_comment_jp','commentEn'=>'product_comment_en','commentTw'=>'product_comment_tw','statusJp'=>'product_status_jp','statusEn'=>'product_status_en','statusTw'=>'product_status_tw','link'=>'product_link','linkTw'=>'product_link_tw','linkEn'=>'product_link_en','linkJp'=>'product_link_jp','file'=>'product_file','pic1'=>'product_content_pic1','pic2'=>'product_content_pic2','pic3'=>'product_content_pic3','pic4'=>'product_content_pic4','textJp1'=>'product_content_text1_jp','textJp2'=>'product_content_text2_jp','textJp3'=>'product_content_text3_jp','textJp4'=>'product_content_text4_jp','textEn1'=>'product_content_text1_en','textEn2'=>'product_content_text2_en','textEn3'=>'product_content_text3_en','textEn4'=>'product_content_text4_en','textTw1'=>'product_content_text1_tw','textTw2'=>'product_content_text2_tw','textTw3'=>'product_content_text3_tw','textTw4'=>'product_content_text4_tw','sizePic'=>'product_size_pic','contentJp'=>'product_content_jp','contentEn'=>'product_content_en','contentTw'=>'product_content_tw','ispublic'=>'product_is_show','createtime'=>'product_create_time','updatetime'=>'product_update_time','admin'=>'product_admin','picgroup'=>'product_size_pic'];















}
