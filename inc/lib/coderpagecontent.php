<?php
/*
coder後台用page物件V1.0 2016/03/01 by Jane
*/
class coderpagecontent{
	public $leftboxid="leftpagehelp"; //left的boxid
	public $rightboxid="rightpagehelp"; //right的boxid
	public $leftbox="";
	public $inputname="";
	public $firstRemoveBtn="pageMenuRemoveFirst"; //第一層移除按鈕class
	public $firstAddBtn="pageMenuAddFirst"; //第一層新增按鈕class
	public $secondRemoveBtn="pageMenuRemoveSecond"; //第二層移除按鈕class
	public $secondAddBtn="pageMenuAddSecond"; //第二層新增按鈕class
	private $bindlist=null;
	private $binddata=array();
    public $canAdd = true;//可以新增

	public $delSrc="";

    public $sname="";
	public $sid="";
	public $smid="";
	public $im2_id="";

	public function __construct($leftboxid,$rightboxid)
	{
		if(trim($leftboxid)=="" || trim($rightboxid)=="" ){
			$this->oops("必須設定物件ID");
		}
		$this->leftboxid=$leftboxid;
		$this->rightboxid=$rightboxid;
		$this->leftbox='#'.$this->leftboxid.' .coderpageMenu';
	}

	public function Bind($bindlist) {
        if (is_array($bindlist) && count($bindlist) > 0) {
            $ary = array();
            foreach ($bindlist as $key => $item) {
                if ($item['status']=='id' || $item['status']=='pid' || $item['status']=='name') {
                	if (!isset($item['sql'])) {
                	    $item['sql'] = true;
                	}
                	$ary[$item['status']] = $item;
                }          
            }
            if(count($ary)!=3){$this->oops("繫結資料不足");}
            $this->inputname=$ary['name']['column'].'_column';
            $this->bindlist = $ary;
        } else {
            $this->oops("繫結資料不符合格式");
        }
    }
    public function BindData($data) {
        $bindlist = $this->bindlist;
		
        $ary = array();
        if (is_array($data) && is_array($bindlist) && count($bindlist) > 0) {
            foreach ($data as $key => $row) {
            	if(array_key_exists($bindlist['id']['column'], $row) && array_key_exists($bindlist['pid']['column'], $row) && array_key_exists($bindlist['name']['column'], $row)){
            		if($row[$bindlist['pid']['column']] == 0){
            			$ary[$row[$bindlist['id']['column']]]['name'] = $row[$bindlist['name']['column']];
            		}else{
            			//$ary[$row[$bindlist['pid']['column']]]['sub'][$row[$bindlist['id']['column']]] = $row[$bindlist['name']['column']];
						$ary[$row[$bindlist['id']['column']]]['name'] = $row[$bindlist['name']['column']];
						$ary[$row[$bindlist['id']['column']]]['sub'][$row['id_mt2']] = $row['name_mt2'];
            		}
            		
            	}
            }
        }
		
        $this->binddata = $ary;
    }

	public function drawLeftContent(){
		echo ' <div id="'.$this->leftboxid.'">';
					$this->drawLeftMenu();
		echo ' </div>';
	}
	public function drawLeftMenu(){
		$data = $this->binddata;
		echo '<div class="well coderpageMenu">';
		foreach ($data as $key => $item) {
			echo $this->drawFirstMenu('edit',$item,$key);
		} 
		echo $this->drawAddMenu('first').'</div>';
	}
    public function getHref($smid='',$im2_id=0){
        return 'manage.php?im_name='.$this->sname.'&im_id='.$this->sid.'&im1_id='.$smid.'&im2_id='.$im2_id;
    }
	public function drawFirstMenu($type="add",$item=array(),$pid=''){
		$name = '';
		$arytemp = array();
		$sub = array();
		switch ($type) {
			case 'add':
				$drawsmenu=false;
				$ableedit = true;
				break;
			case 'edit':
				$drawsmenu=true;
				$ableedit = false;
				if(isset($item['name']))$name=$item['name'];
				if(isset($item['sub']))$sub=$item['sub'];
				break;
			default:
				echo 'Error!';
			break;
		}
		return '<ul class="list-unstyled"><li><h4 class="'.($pid!='' && $pid==$this->smid?"focalpoint":"").'">&nbsp;<a href="'.$this->getHref($pid).'" class="pagelink"><i class="icon-paper-clip"></i></a><span class="cursorpointer">'.$name.'</span>'.($this->drawForm('name',($ableedit?'text':'hidden'),array("value"=>$name,"data-id"=>$pid,"data-pid"=>"0"))).'<i class="icon-minus '.$this->firstRemoveBtn.' red"></i></h4></li><li><blockquote>'.($drawsmenu?$this->drawSecondMenu($type,$sub,$pid):'').$this->drawAddMenu('second').'</blockquote></li></ul>';
	}
	public function drawSecondMenu($type="add",$subitem=array(),$pid=''){
		if($type=="add"){
			return '<p><a href="'.$this->getHref().'" class="pagelink"><i class="icon-paper-clip"></i></a><span class="cursorpointer"></span>'.$this->drawForm('name','text',array("value"=>"","data-id"=>"","data-pid"=>"")).'<i class="icon-minus-sign '.$this->secondRemoveBtn.' red"></i></p>';
		}else if($type=="edit"){
			$str = '';
			ksort($subitem);
			foreach ($subitem as $key => $val) {
				$str .= '<p class="'.($key==$this->smid?"focalpoint":"").'"><a href="'.$this->getHref($pid,$key).'" class="pagelink"><i class="icon-paper-clip"></i></a><span class="cursorpointer">'.$val.'</span>'.$this->drawForm('name','hidden',array("value"=>$val,"data-id"=>$key,"data-pid"=>$pid)).'<i class="icon-minus-sign '.$this->secondRemoveBtn.' red"></i></p>';
			}
			return $str;
		}
	}
	public function drawAddMenu($type){
        if(!$this->canAdd) return false;
		if($type=="first"){
			return '<div><h4><i class="icon-plus '.$this->firstAddBtn.' blue"></i>新增第一階段</h4></div>';
		}else if($type=="second"){
			return '<p><i class="icon-plus-sign '.$this->secondAddBtn.' blue"></i>新增第二階段</p>';
		}
	}

	public function getFirstId(){
		$data = $this->binddata;
		$id = key($data);
		return $id;
	}
	public function getNameById($id){
		$data = $this->binddata;
		if(isset($data[$id])){
			return $data[$id]['name'];
		}else{
			foreach ($data as $row) {
				if(isset($row['sub'][$id])){
					return $row['sub'][$id];
				}
			}
		}
		return false;
	}

    public function drawForm($key,$type, $attr = array()) {
        $items = $this->bindlist;
        if ($items[$key]) {
        	$name = '';
        	switch ($key) {
        		case 'name':
        			$name = $this->inputname;
        			break;
        		
        		default:
        			# code...
        			break;
        	}
            $attr['class'] = '';
            $item = $items[$key];

            if (isset($item["placeholder"]) && $item["placeholder"] != "") {
                $attr["placeholder"] = $item["placeholder"];
            }
            if (isset($item["validate"]) && is_array($item["validate"])) {
                $attr = array_merge($attr, $item["validate"]);
            }
            $str = '';

            switch ($type) {
                case "text": //文字欄位
                    $str .= self::drawForm_Text($name, $attr);
                    break;
                case "hidden": //隱藏欄位
                    $str .= self::drawForm_Hidden($name, $attr);
                    break;
            }
            return $str;
        }
    }
    public static function drawForm_Text($id, $attr = array()) {
        return '<input type="text" id="' . $id. '" name="' . $id . '" ' . self::getAttrStr($attr) . '>';
    }

    public static function drawForm_Hidden($id, $attr = array()) {
        return '<input type="hidden" id="' . $id . '" name="' . $id . '" ' . self::getAttrStr($attr) . '>';
    }

    public static function getAttrStr($attr = array()) {
        $str = "";
        if ($attr && is_array($attr) && count($attr) > 0) {

            foreach ($attr as $key => $value) {
                if($value!=''){
                    $str.= $key . '="' . $value . '" ';
                }
            }
        }

        return $str;
    }

	public function getSendData() {
	    $bindlist = $this->bindlist;
	    if (is_array($bindlist) && count($bindlist) > 0) {
	        $data = array();

	        foreach ($bindlist as $key => $item) {
	            if ($item['sql'] != false) {
	                $data[$key] = self::getSendDataValue($key);
	            }
	        }

	        return $data;
	    } else {
	        $this->oops("繫結資料不符合格式");
	    }
	}
	public static function getSendDataValue($key) {
	    return post($key, 4);
	}

    //表單驗證相關function
    public function vaild($data) {
        $bindlist = $this->bindlist;
        if (is_array($bindlist) && count($bindlist) > 0) {
            $err = array();

            foreach ($bindlist as $key => $item) {
                if (isset($item['validate']) && $item['sql'] != false) {
                    $this->chkValid($err, $data[$item['column']], $item,$data);
                }
            }

            return $err;
        } else {
            $this->oops("繫結資料不符合格式");
        }
    }
    public function chkValid(&$err, $value, $item ,$data) {
        $isnum = false;
		$isrequired=isset($item['validate']['required']) && $item['validate']['required'] == 'yes' ? true :false ;

        if ($isrequired && trim($value) == "") {
            $err[] = '請輸入' . $item['name'];
            return;
        }
		if($isrequired==true || trim($value) != ""){ // 必填或值不為空時才檢查格式,非必填且沒值時不用檢查
			if (isset($item['validate']['email']) && $item['validate']['email'] == 'yes' && !self::isEmail(trim($value))) {
				$err[] = $item['name'] . '必須為email格式';
			}
			if (isset($item['validate']['number']) && $item['validate']['number'] == 'yes' && !is_numeric(trim($value))) {
				$err[] = $item['name'] . '必須為數值格式';
				$isnum = true;
			}
			if (isset($item['validate']['digits']) && $item['validate']['digits'] == 'yes' && !is_int(intval($value))) {
				$err[] = $item['name'] . '必須為整數格式';
				$isnum = true;
			}
            if (isset($item['validate']['taxid']) && $item['validate']['taxid'] == 'yes' && !is_taxid($value)){
                $err[] = $item['name'] . '必須為統一編號格式';
            }
			if (isset($item['validate']['url']) && $item['validate']['url'] == 'yes' && !filter_var(trim($value) , FILTER_VALIDATE_URL)) {
				$err[] = $item['name'] . '必須為URL格式';
			}
			if (isset($item['validate']['date']) && $item['validate']['date'] == 'yes' && !self::isDate(trim($value))) {
				$err[] = $item['name'] . '必須為日期格式';
			}
            if (isset($item['validate']['datetime']) && $item['validate']['datetime'] == 'yes' && !self::isdatetime(trim($value))) {
                $err[] = $item['name'] . '必須為日期與時間格式';
            }

			if ($isnum && isset($item['validate']['min']) && inval(trim($value)) < intval($item['validate']['min'])) {
				$err[] = $item['name'] . '不能小於' . $item['validate']['min'];
			}
			if ($isnum && isset($item['validate']['max']) && inval(trim($value)) > intval($item['validate']['max'])) {
				$err[] = $item['name'] . '不能大於' . $item['validate']['max'];
			}
			if (!$isnum && isset($item['validate']['minlength']) && mb_strlen(trim($value)) < intval($item['validate']['minlength'])) {
				$err[] = $item['name'] . '的長度不能小於' . $item['validate']['minlength'];
			}
			if (!$isnum && isset($item['validate']['maxlength']) && mb_strlen(trim($value)) > intval($item['validate']['maxlength'])) {
				$err[] = $item['name'] . '的長度不能大於' . $item['validate']['maxlength'];
			}
			if (!$isnum && isset($item['validate']['morethen']) && !self::ismorethen(trim($value),$data[$item['validate']['morethen']])) {
				$err[] = $item['name'] . '必須大於'.$item['validate']['morethen'].'欄位值';
			}
			if (!$isnum && isset($item['validate']['under']) && !self::isunder(trim($value),$data[$item['validate']['under']])) {
				$err[] = $item['name'] . '必須大於'.$item['validate']['under'].'欄位值';
			}
		}
    }

	public function drawEventScript(){
		echo '
		$(document).ready(function(){
			$("'.$this->leftbox.'").on("dblclick","span",function(){
				var _this  = $(this);
				_this.siblings("input[type=hidden]").attr("type","text").focus();
				_this.html("");
			})
			$("'.$this->leftbox.'").on("keypress focusout","input[type=text]",function(e){
				var _this=$(this);
				var code = (e.keyCode ? e.keyCode : e.which);
				if ((e.type=="keypress" && code == 13) || e.type=="focusout"){
					if(!_this.val()){return false;}
					changeMenuData("update",_this,function(id){
						_this.siblings("span").html(_this.val());
						_this.siblings(".pagelink").attr("href","'.$this->getHref('+id+').'").show();
						_this.attr({"data-id":id,"type":"hidden"}).removeAttr("data-temp_id");
					});
					e.preventDefault();
					return false;
				}
			})
			$("'.$this->leftbox.' .'.$this->firstAddBtn.'").click(function(){
				$(this).closest("div").before(\''.$this->drawFirstMenu().'\');
				$("'.$this->leftbox.' ul:last .pagelink").hide();
				$("'.$this->leftbox.' ul:last input").attr("data-temp_id",$("'.$this->leftbox.' ul").length).focus();
			})
			$("'.$this->leftbox.'").on("click",".'.$this->firstRemoveBtn.'",function(){
				var _this = $(this);
				if(confirm("是否確定刪除")){
					if(_this.val()=="" && !_this.siblings("input[data-id]").attr("data-id")){
						_this.closest("ul").remove();
					}else{
						changeMenuData("del",_this,function(id){
							//_this.closest("ul").remove();
                            location.href = "'.$this->getHref().'";
						});
					}
				}
			})
			$("'.$this->leftbox.'").on("click",".'.$this->secondAddBtn.'",function(){
				$(this).closest("p").before(\''.$this->drawSecondMenu().'\');
				$(this).closest("p").prev().find(".pagelink").hide();
				$(this).closest("p").prev().find("input").attr({"data-pid":$(this).closest("ul").find("input[data-pid=0]").attr("data-id"),"data-temp_pid":$(this).closest("ul").find("input[data-pid=0]").attr("data-temp_id")}).focus();
			})
			$("'.$this->leftbox.'").on("click",".'.$this->secondRemoveBtn.'",function(){
				var _this = $(this);
				if(confirm("是否確定刪除")){
					if(_this.val()=="" && !_this.siblings("input[data-id]").attr("data-id")){
						_this.closest("p").remove();
					}else{
						changeMenuData("del",_this,function(id){
							//_this.closest("p").remove();
                            location.href = "'.$this->getHref('+id+').'";
						});
					}				
				}
			})
		})
		function changeMenuData(dotype,_this,_callback){
			if(dotype == "update"){
				var type = _this.attr("data-id")?"edit":"add",
					id = _this.attr("data-id"),
					pid = _this.attr("data-pid"),
					url = _this.closest("form").attr("action"),
					data;
				if(type == "add" && !id)id = _this.attr("data-temp_id");
				if(type == "add" && !pid)pid  = _this.attr("data-temp_pid");
				data = {
					"name":_this.val(),
                	"id":id,
                	"pid":pid,
                	"type":type
                };
			}else if(dotype == "del"){
				var url = "'.$this->delSrc.'",
					data;
				data = {
					"id[]":_this.siblings("input[data-id]").attr("data-id"),
					"pid":_this.siblings("input[data-pid]").attr("data-pid"),
					
				}
			}
			
			
			$.ajax({
			    url: url,
                data: data,
                type:"POST",
                async: false,
                dataType:"json",
                success: function(r){
                	if(r.result && ((dotype == "update" && r.id) || dotype == "del")){
                		_callback(r.id);
                	}else{
                		if(r.data)alert(r.data);
                	}
                },
            });
		}
		';
	}
	  
	public static function oops($msg) {
        echo 'coderpagecontent:' . $msg;
    }
}