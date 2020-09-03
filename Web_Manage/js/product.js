$(document).ready(function(){
	$("input:checkbox[name='main_auth[]']").click(function(){
		var action=$(this).attr('data_action');
		var data_main=$(this).attr('data_main');
		var _checked=$(this).prop("checked");
		$("input:checkbox[name='fun_auth[]'][data_main="+data_main+"][data_action="+action+"]").each(function(){
			$(this).prop("checked",_checked);
		})
	})
	$("input:checkbox[name='fun_auth[]']").click(function(){
		var action=$(this).attr('data_action');
		var data_main=$(this).attr('data_main');
		var _checked=true;
		$("input:checkbox[name='fun_auth[]'][data_main="+data_main+"][data_action="+action+"]").each(function(){
			var _thischecked = $(this).is(':checked')?1:0;
			if(_thischecked!==1){
				_checked = false;
			}
			if(!_checked){
				return false;
			}
		})
		$("input:checkbox[name='main_auth[]'][data_main="+data_main+"][data_action="+action+"]").each(function(){
			$(this).prop("checked",_checked);
		});	
	})	
	$("a.tab").click(function(event) {
		event.preventDefault();
		var _this = $(this);
		if(_this.hasClass('tabclose')){
			_this.closest('tr').nextUntil('.maintr').css('display', 'table-row');
			_this.removeClass('tabclose').html();
			
			_this.addClass('icon-collapse-alt');
			_this.removeClass('icon-expand-alt');
		}else{
			_this.closest('tr').nextUntil('.maintr').css('display', 'none');
			_this.addClass('tabclose').html();
			
			_this.removeClass('icon-collapse-alt');
			_this.addClass('icon-expand-alt');
		}
	});

	$("input:checkbox[name='main_auth[]']:not(:checked)").each(function(){//如果子選單勾選不一樣就打開
		var _this = $(this);
		var _thisaction=_this.attr('data_action');
		var _thismain=_this.attr('data_main');
		var _prev_checkedstate = '';
		var _this_checkedstate = '';
		$("input:checkbox[name='fun_auth[]'][data_main="+_thismain+"][data_action="+_thisaction+"]").each(function(){
			_this_checkedstate = $(this).is(':checked')?1:0;
			if(_prev_checkedstate!=='' && _prev_checkedstate !== _this_checkedstate){
				_this.closest('tr').find('a.tab').removeClass('tabclose icon-expand-alt').addClass('icon-collapse-alt').closest('tr').nextUntil('.maintr').css('display', 'table-row');
			}
			_prev_checkedstate = _this_checkedstate;
		})
	})
})
