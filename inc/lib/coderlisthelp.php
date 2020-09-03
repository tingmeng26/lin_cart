<?php
/*
coder後台用List物件V1.0 2013/11/10 by cully
//Jane 20141117 新增繪製按鈕 $listHelp->draw_otherbtn="按鈕id";
//Jane 20160121 新增可指定預設排序欄位與方式(可指定未繪製出的欄位)
//Jane 20160121 新增printLink預覽連結
*/
class coderListHelp
{
	public $id = "listhelp";
	public $atcion = true;
	public $page = true;
	public $pagesize = 10;
	public $pagelist = 10;
	private $bindlist = null;
	private $filterObj = null;
	public $mutileSelect = false; //多選核取方塊
	public $defaultOrderBy = ''; //預設排序欄位
	public $defaultOrderType = ''; //預設排序方式(desc || asc)
	public $printLink = "";
	public $pdfLink = ""; //匯出pdf
	public $ajaxSrc = "";
	public $delSrc = "";
	public $orderSrc = "";
	public $ordersortable = "";
	public $editLink = "";
	public $addLink = "";
	public $previewLink = ""; //預覽連結
	public $excelLink = "";
	public $draw_otherbtn = "";
	public $name = "";
	public $orderColumn = "";
	public $orderDesc = "";
	public $addexcelLink = ""; //匯入 excel
	public function __construct($id, $name)
	{
		if (trim($id) == "") {
			$this->oops("必須設定物件ID");
		}
		$this->id = $id;
		$this->name = $name;
	}

	/*
	  繫結要顯示的欄位
	  bind格式為array
	  column 資料庫欄位
	  name   顯示名稱
	  order  是否要排序
	  def_desc 預設排序方向
	  width  欄位寬度
	  visible-lg 視窗過小時是否隱藏
	*/
	public function Bind($bindlist)
	{
		if (is_array($bindlist) && count($bindlist) > 0) {
			$this->bindlist = $bindlist;
		} else {
			$this->oops("繫結資料不符合格式");
		}
	}

	//綁定搜尋欄位
	public function bindFilter(coderFilterHelp $bindobj)
	{
		$this->filterObj = $bindobj;
	}

	public function drawTable()
	{
		global $now_lang_dic;
		$this->checkauth();
		if ($this->bindlist) {
			$actionlist = coderAdminLog::$action;
			$this->drawMainDiv();

			$this->drawButton();

			if ($this->filterObj != null) {
				$this->filterObj->drawForm();
			}



			echo '<div class="table-big" ><table class="table table-advance" ><thead><tr class="' . ($this->defaultOrderType != '' && $this->defaultOrderType == 'desc' ? ' sort-desc' : ' sort-asc') . '"' . ($this->defaultOrderBy != '' ? ' sortkey="' . $this->defaultOrderBy . '"' : '') . '>';
			if ($this->mutileSelect) {
				echo '<th style="width:18px" attr="mutileselect"><input type="checkbox" /></th>';
			}

      foreach ($this->bindlist as $item) {
        $sorttag = $this->getColumnDescTag($item);
        $thclass = '';
        if (isset($item['visible-lg']) && $item['visible-lg'] == false) {
          $thclass = ' visible-lg  ';
        }
        if (isset($item['classname'])) {
          $thclass .= ' ' . $item['classname'] . ' ';
        }
        echo '<th width="100px"' . $this->getColumnAttr($item) . ' class="' . $thclass . '"><a class="' . $sorttag . '"  sortkey="' . $item["column"] . '">' . $item["name"] . '</a></th>';
      }
      if ($this->orderSrc != "") {
        echo '<th class=" text-center" width="85px" attr="order" desc="' . $this->orderDesc . '"><a class="' . ($this->orderDesc == 'desc' ? ' sort-desc ' : ' sort-asc ') . ' sort-active"  sortkey="' . $this->orderColumn . '">' . coderLang::t("coderlisthelp1", 1) . '</a></th>'; //排序 [coderlisthelp1]
      }
			if ($this->editLink != "" || $this->delSrc != "" || $this->previewLink != "") {
				$manage_width = 0;
				if ($this->delSrc != '') {
					$manage_width += 55;
				}
				if ($this->editLink != '') {
					$manage_width += 55;
				}
				if ($this->previewLink != '') {
					$manage_width += 55;
				}
				echo '<th class="text-center" style="width:' . $manage_width . 'px" attr="manage">' . coderLang::t("coderlisthelp2", 1) . '</th>'; //操作 [coderlisthelp2]
			}


			echo '</tr></thead><tbody></tbody></table><div id="listtable_page"></div><div style="clear:both"></div></div></div>';
		}
	}
	private function drawMainDiv()
	{
		$this->checkauth();
		echo '<div id=' . $this->id . ' ' . ($this->ajaxSrc != "" ? ' ajaxsrc="' . $this->ajaxSrc . '" ' : '') . ($this->delSrc != "" ? ' delsrc="' . $this->delSrc . '" ' : '') . ($this->editLink != "" ? ' editlink="' . $this->editLink . '" ' : '') . ($this->previewLink != "" ? ' previewLink="' . $this->previewLink . '" ' : '') . ($this->orderSrc != "" ? ' ordersrc="' . $this->orderSrc . '" ' : '') . ($this->ordersortable != "" ? ' ordersortable="' . $this->ordersortable . '" ' : '') . ($this->excelLink != "" ? ' excelLink="' . $this->excelLink . '" ' : '') . ($this->addexcelLink != "" ? ' addexcelLink="' . $this->addexcelLink . '" ' : '') . '>';
	}
	private function checkauth()
	{
		global $auth;
		$actionlist = coderAdminLog::$action;
		if (!coderAdmin::isAuth($auth, $actionlist['edit']['key'])) {
			$this->editLink = '';
			$this->orderSrc = '';
		}
		if (!coderAdmin::isAuth($auth, $actionlist['view']['key'])) {
			$this->ajaxSrc = '';
			$this->previewLink = '';
		}
		if (!coderAdmin::isAuth($auth, $actionlist['del']['key'])) $this->delSrc = '';
		if (!coderAdmin::isAuth($auth, $actionlist['add']['key'])) $this->addLink = '';
		//if(!coderAdmin::isAuth($auth,$actionlist['copy']['key']))$this->editLink='';
		if (!coderAdmin::isAuth($auth, $actionlist['export']['key'])) $this->excelLink = '';
		if (!coderAdmin::isAuth($auth, $actionlist['import']['key'])) $this->addexcelLink = ''; //匯入的連結
	}
	private function drawButton()
	{
		$this->checkauth();
		echo  '<div class="btn-toolbar pull-right" style="margin:5px;">
		<img src="../images/loading.gif" width="23" id="filterloading" style="float:left;margin-right:10px;">
                   <div class="btn-group">';
		echo ($this->addLink != "") ? '<a class="btn btn-circle show-tooltip" title="新增' . $this->name . '" href="' . $this->addLink . '" id="addBtn"><i class="icon-plus"></i></a>' : '';
		echo ($this->delSrc != "" && $this->mutileSelect) ? '<a class="btn btn-circle show-tooltip" title="刪除被選擇取的' . $this->name . '" href="#" id="mutileDelBtn"><i class="icon-trash"></i></a>' : '';
		echo '</div>';

		echo '<div class="btn-group">';
		echo ($this->addexcelLink != "") ? '<a class="btn btn-circle show-tooltip" title="匯入Excel' . $this->name . '資料" href="' . $this->addexcelLink . '"" id="addexcelBtn"><i class="glyphicon glyphicon-import" style="top:0px;"></i></a>' : '';
		echo '</div>';

		echo '<div class="btn-group">';
		echo ($this->printLink != "") ? '<a class="btn btn-circle show-tooltip" title="列印' . $this->name . '" href="#" id="printBtn"><i class="icon-print"></i></a>' : '';
		echo ($this->pdfLink != "") ? '<a class="btn btn-circle show-tooltip" title="匯出' . $this->name . '至PDF" href="#" id="pdfBtn"><i class="icon-file-text-alt"></i></a>' : '';
		echo ($this->excelLink != "") ? '<a class="btn btn-circle show-tooltip" title="匯出' . $this->name . '至Excel" href="#" id="excelBtn"><i class="icon-table"></i></a>' : '';
		echo '</div>';
		echo '<div class="btn-group">
              	 <a class="btn btn-circle show-tooltip" title="重整" href="#" id="refreshBtn"><i class="icon-repeat"></i></a>
                 </div>';
		if ($this->draw_otherbtn != "") {
			$draw_otherbtns = explode(',', $this->draw_otherbtn);
			foreach ($draw_otherbtns as $draw_otherbtn) {
				echo '<div class="btn-group"><a class="btn btn-circle show-tooltip" id="' . $draw_otherbtn . '" href="javascript:void(0)"></a></div>';
			}
		}

		echo '</div>';
		if ($this->filterObj == null) {
			echo '<br><br>';
		}
	}

	private function getColumnAttr($item)
	{
		$attr = ((isset($item["width"]) && (int) $item["width"] > 0) ? 'width="' . $item["width"] . '"' : "");
		return $attr;
	}
	private function getColumnDescTag($item)
	{
		if (isset($item["order"]) && $item["order"] == true) {
			if (isset($item["def_desc"])) {
				if ($item["def_desc"] == "asc") {
					return "sort-asc sort-active";
				} else {
					return "sort-active sort-desc";
				}
			} else {
				return "sort-asc sort-desc";
			}
		}
	}
	private function oops($msg)
	{
		throw new Exception('coderListHelp:' . $msg);
	}
}
