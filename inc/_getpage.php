<?php
function getsql($sql, $page_size, $page_querystring) {
    global $page, $sql, $count, $page_count, $pre, $next, $querystring, $HS, $ID, $PW, $DB, $db;
    $querystring = clearPageStr($page_querystring);

    $page = get("page")!='' && get("page")>0 ? get("page") : 1;

    $count = $db -> queryCount($sql);
    $page_count = ceil($count / $page_size);
    if ($page > $page_count) {
        $page = $page_count;
    }
    if ($page <= 0) {
        $page = 1;
    }
    $start = number_format(($page-1)*$page_size,0,'.','');

    $pre = $page - 1;
    $next = $page + 1;
    $first = 1;
    $last = $page_count;
    $sql.= " limit $start,$page_size";
    return $count;
}

function postsql($sql, $page_size, $page_querystring) {
    global $page, $sql, $count, $page_count, $pre, $next, $querystring, $HS, $ID, $PW, $DB, $db;
    $querystring = clearPageStr($page_querystring);

    $page = post("page")!='' && post("page")>0 ? post("page") : 1;

    $count = $db -> queryCount($sql);
    $page_count = ceil($count / $page_size);
    if ($page > $page_count) {
        $page = $page_count;
    }
    if ($page <= 0) {
        $page = 1;
    }
    $start = number_format(($page-1)*$page_size,0,'.','');

    $pre = $page - 1;
    $next = $page + 1;
    $first = 1;
    $last = $page_count;
    $sql.= " limit $start,$page_size";
    return $count;
}

function pagesql() {
    global $sql;
    return $sql;
}
function showpage() {
    global $page, $page_count, $count, $pre, $next, $querystring;
    if ($querystring != "") {
        $querystring = $querystring . "&";
    }
    echo $page . ' / ' . $page_count . '&nbsp;&nbsp;共' . $count . '筆資料&nbsp;&nbsp;';
    if ($page != 1) {
        echo '<a href=?' . $querystring . 'page=1>首頁</a>&nbsp;&nbsp;
           <a href=?' . $querystring . 'page=' . $pre . '>上一頁</a>&nbsp;&nbsp;';
    }
    $viewpage = 5;

    if ($page_count > $viewpage) {
        if ($page - $viewpage < 0) {
            $s = 1;
            $j = $viewpage;
        }else {
            $s = (int)($page-$viewpage+1);
            if($s===0){$s++;}
            $j = $s + 5;
            if ($j >= $page_count) {
                $j = $page_count;
            }
            //$j = $page_count;
        }
    }else {
        $s = 1;
        $j = $page_count;
    }
    for ($i = $s; $i <= $j; $i++) {
        $num = $i;
        if ($page == $num) {
            echo $num . "&nbsp;";
        }else {
            echo '<a href=?' . $querystring . 'page=' . $num . '>' . $num . '</a>&nbsp;&nbsp;';
        }
    }
    if ($page < $page_count) {
        echo '<a href=?' . $querystring . 'page=' . ($page + 1) . '>下一頁</a>&nbsp;&nbsp;';
        echo '<a href=?' . $querystring . 'page=' . $page_count . '>末頁</a>&nbsp;';
    }
}

function showpage2() {
    global $page, $page_count, $count, $pre, $next, $querystring, $str;
    if ($querystring != "") {
        $querystring = $querystring . "&";
    }
    $str .= $page . ' / ' . $page_count . '&nbsp;&nbsp;共' . $count . '筆資料&nbsp;&nbsp;';
    if ($page != 1) {
        $str .= '<div class="d_formInlineBox d_arrow_Btn d_arrow_first_Btn" page="1">
                    &nbsp;
                    <div class="d_formAbsoluteBox d_arrow_img_box">
                        <div class="d_formInnerBox d_arrow_img_box_inner">
                            <div class="d_formInline_before"></div>
                            <div class="d_formInlineBox d_arrow_first_img d_arrow_img">
                                <img src="/images/page-btn_hidden.png" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d_formInlineBox d_arrow_Btn d_arrow_pre_Btn" page="'.($page-1).'">
                    &nbsp;
                    <div class="d_formAbsoluteBox d_arrow_img_box">
                        <div class="d_formInnerBox d_arrow_img_box_inner">
                            <div class="d_formInline_before"></div>
                            <div class="d_formInlineBox d_arrow_pre_img d_arrow_img">
                                <img src="/images/page-btn_hidden.png" />
                            </div>
                        </div>
                    </div>
                </div>';
    }
    $viewpage = 5;

    if ($page_count > $viewpage) {
        if ($page - $viewpage < -1) {
            $s = 1;
            $j = $viewpage;
        }else {
            $s = (int)($page-$viewpage+3);
            if($s===0){$s++;}
            $j = $s + 4;
            if ($j >= $page_count) {
                $j = $page_count;
            }
            //$j = $page_count;
        }
    }else {
        $s = 1;
        $j = $page_count;
    }
    for ($i = $s; $i <= $j; $i++) {
        $num = $i;
        if ($page == $num) {
            $classActive = 'd_ChangePage_Btn_active';
        }else {
            $classActive = '';
        }
        if ($i == $j) {
            $str .= '<div class="d_formInlineBox d_ChangePage_Btn d_ChangePage_Btn_final '.$classActive.'" page="'.$j.'">'.$j.'</div>';
        }else{
            $str .= '<div class="d_formInlineBox d_ChangePage_Btn d_ChangePage_Btn_'.$num.' '.$classActive.'" page="'.$num.'">'.$num."</div>";
        }
    }
    if ($page < $page_count) {
        $str .= '<div class="d_formInlineBox d_arrow_Btn d_arrow_next_Btn" page="'.($page+1).'">
                    &nbsp;
                    <div class="d_formAbsoluteBox d_arrow_img_box">
                        <div class="d_formInnerBox d_arrow_img_box_inner">
                            <div class="d_formInline_before"></div>
                            <div class="d_formInlineBox d_arrow_next_img d_arrow_img">
                                <img src="/images/page-btn_hidden.png" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d_formInlineBox d_arrow_Btn d_arrow_end_Btn" page="'.$page_count.'">
                    &nbsp;
                    <div class="d_formAbsoluteBox d_arrow_img_box">
                        <div class="d_formInnerBox d_arrow_img_box_inner">
                            <div class="d_formInline_before"></div>
                            <div class="d_formInlineBox d_arrow_end_img d_arrow_img">
                                <img src="/images/page-btn_hidden.png" />
                            </div>
                        </div>
                    </div>
                </div>';
    }
    return $str;
}

function showpage3() {
    global $page, $page_count, $count, $pre, $next, $querystring, $str;
    if ($querystring != "") {
        $querystring = $querystring . "&";
    }

    // $str .= $page . ' / ' . $page_count . '&nbsp;&nbsp;共' . $count . '筆資料&nbsp;&nbsp;';
    if ($page != 1) {
        $str .= '<div class="d_formInlineBox d_arrow_Btn d_arrow_first_Btn" page="1">
                    &nbsp;
                    <div class="d_formAbsoluteBox d_arrow_img_box">
                        <div class="d_formInnerBox d_arrow_img_box_inner">
                            <div class="d_formInline_before"></div>
                            <div class="d_formInlineBox d_arrow_first_img d_arrow_img">
                                <img src="/images/page-btn_hidden.png" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d_formInlineBox d_arrow_Btn d_arrow_pre_Btn" page="'.($page-1).'">
                    &nbsp;
                    <div class="d_formAbsoluteBox d_arrow_img_box">
                        <div class="d_formInnerBox d_arrow_img_box_inner">
                            <div class="d_formInline_before"></div>
                            <div class="d_formInlineBox d_arrow_pre_img d_arrow_img">
                                <img src="/images/page-btn_hidden.png" />
                            </div>
                        </div>
                    </div>
                </div>';
    }
    $viewpage = 5;

    if ($page_count > $viewpage) {
        if ($page - $viewpage < -1) {
            $s = 1;
            $j = $viewpage;
        }else {
            $s = (int)($page-$viewpage+3);
            if($s===0){$s++;}
            $j = $s + 4;
            if ($j >= $page_count) {
                $j = $page_count;
            }
            //$j = $page_count;
        }
    }else {
        $s = 1;
        $j = $page_count;
    }
    for ($i = $s; $i <= $j; $i++) {
        $num = $i;
        if ($page == $num) {
            $classActive = 'd_ChangePage_Btn_active';
        }else {
            $classActive = '';
        }
        if ($i == $j) {
            $str .= '<div class="d_formInlineBox d_ChangePage_Btn d_ChangePage_Btn_final '.$classActive.'" page="'.$j.'">'.$j.'</div>';
        }else{
            $str .= '<div class="d_formInlineBox d_ChangePage_Btn d_ChangePage_Btn_'.$num.' '.$classActive.'" page="'.$num.'">'.$num."</div>";
        }
    }
    if ($page < $page_count) {
        $str .= '<div class="d_formInlineBox d_arrow_Btn d_arrow_next_Btn" page="'.($page+1).'">
                    &nbsp;
                    <div class="d_formAbsoluteBox d_arrow_img_box">
                        <div class="d_formInnerBox d_arrow_img_box_inner">
                            <div class="d_formInline_before"></div>
                            <div class="d_formInlineBox d_arrow_next_img d_arrow_img">
                                <img src="/images/page-btn_hidden.png" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d_formInlineBox d_arrow_Btn d_arrow_end_Btn" page="'.$page_count.'">
                    &nbsp;
                    <div class="d_formAbsoluteBox d_arrow_img_box">
                        <div class="d_formInnerBox d_arrow_img_box_inner">
                            <div class="d_formInline_before"></div>
                            <div class="d_formInlineBox d_arrow_end_img d_arrow_img">
                                <img src="/images/page-btn_hidden.png" />
                            </div>
                        </div>
                    </div>
                </div>';
    }
    return $str;
}

function clearPageStr($querystring) {

    $pageind = strpos($querystring, '&page=');
    if ($pageind !== false) {

        $pageind2 = strpos(substr($querystring, $pageind + 6), '&');
        $querystring_ = substr($querystring, 0, $pageind);

        if ($pageind2 !== false) {
            $querystring_.= substr($querystring, $pageind + 6 + $pageind2);
        }
    }
    else {
        $querystring_ = $querystring;
    }
    return $querystring_;
}


function showpageForMom() {
    global $page, $page_count, $count, $pre, $next, $querystring;
    $showpage = "";
    if ($querystring != "") {
        $querystring = $querystring . "&";
    }
    $showpage.= '<span class="count">共' . $count . '件商品</span>';
    if ($page != 1) {
        $showpage.= '<a href=?' . $querystring . 'page=1 title="最前頁" class="number pre">最前頁</a>
        <a href=?' . $querystring . 'page=' . $pre . ' title="上頁" class="number pre">上頁</a>' . "\n";
    }
    $viewpage = 5;

    if ($page_count > $viewpage) {
        if ($page - $viewpage < 0) {
            $s = 1;
            $j = $viewpage;
        }
        else {
            $s = (int)($page-$viewpage+1);
            if($s===0){$s++;}
            $j = $s + 5;
            if ($j >= $page_count) {
                $j = $page_count;
            }

            //$j = $page_count;

        }
    }
    else {
        $s = 1;
        $j = $page_count;
    }
    for ($i = $s; $i <= $j; $i++) {
        $num = $i;
        if ($page == $num) {
            $showpage.= '<a href=?' . $querystring . 'page=' . $num . ' title="p' . $num . '" class="number down"><span>' . $num . '</span></a>' . "\n";
        }
        else {
            $showpage.= '<a href=?' . $querystring . 'page=' . $num . ' title="p' . $num . '" class="number"><span>' . $num . '</span></a>' . "\n";
        }
    }

    if ($page < $page_count) {
        $showpage.= '<a href=?' . $querystring . 'page=' . ($page + 1) . ' title="下頁" class="number next">下頁</a>
      <a href=?' . $querystring . 'page=' . $page_count . ' title="最後頁" class="number next">最後頁</a>';
    }
    return $showpage;
}




/*************************************************************************************************************************/
function showpage_new($url) {
	global $page, $page_count, $count, $pre, $next, $querystring;

    $pagedata = "";
    $viewpage = 10;//頁碼顯示數量
    if($querystring != ""){
        $querystring = $querystring."&";
    }
    if($page != 1){
	  $pagedata .= '<a class="prev" href="'.$url["left"].'"></a>';
    }
    if($page_count > $viewpage){
      if($page < ceil($viewpage/2)){
        $s = 1;$e = $viewpage;
      }else{
        $s = (int)($page-$viewpage+ceil($viewpage/2));
        if($s===0){$s++;}
        $e = $s+$viewpage-1;
        if($e >= $page_count){
          $e = $page_count;
        }
      }
    }else{
      $s = 1;
      $e = $page_count;
    }

	$pagedata .= '<ul>';
    for($i = $s;$i <= $e;$i++){
      $num = $i;
      if($page == $num){
        $pagedata .= '<li class="active"><a href="javascript:void(0)">'.$num.'</a></li>';
      }else{
        $pagedata .= '<li><a href="'.str_replace ('"0"',$num,$url["num"]).'">'.$num.'</a></li>';
      }
    }
	$pagedata .= '</ul>';

    if($page < $page_count){
      $pagedata .= '<a class="next" href="'.$url["right"].'"></a>';
    }
    return $pagedata;
}


function showPage_declaration(){//前端用顯示頁數 美麗專欄
    global $page, $page_count, $count, $pre, $next, $querystring,$keyword_bb;
	$url["left"] = 'declaration_'.($page-1)."_".$keyword_bb.'.html';//上一頁
	$url["num"] = 'declaration_"0"'.'_'.$keyword_bb.'.html'; //頁
	$url["right"] = 'declaration_'.($page+1)."_".$keyword_bb.'.html'; //下一頁
	echo showpage_new($url);
}

function showPage_news(){//前端用顯示頁數 最新消息
    global $page, $page_count, $count, $pre, $next, $querystring,$news_type;
	$url["left"] = 'news_'.($page-1)."_".$news_type.'.html';//上一頁
	$url["num"] = 'news_"0"'.'_'.$news_type.'.html'; //頁
	$url["right"] = 'news_'.($page+1)."_".$news_type.'.html'; //下一頁
	echo showpage_new($url);
}
?>
