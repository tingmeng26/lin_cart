function refshowList(){
	$('a#refreshBtn').click();
}

function change_calendar(year, month,al_id){
	$.ajax({
		url : "change_calendar.php",
		type : "GET",
		data: { 
			year : year,
			month : month,
			al_id : al_id

		},
		success : function(data){				 
			//console.log(data.text);		
			$("div#calendar").html(data);
			//alert(response.list);	
			
			calendar_text();	
			
			$(".al_id").attr("month",$("#temp_month").val());
			$(".al_id").attr("year",$("#temp_year").val());
		},
		error : function(){
			alert('資料傳送錯誤!請在試一次!');
		}
	});
};

function calendar_text(){
	//行事曆
	$("td").on("mouseenter",".calendar_day", function(e) {
		  $(this).find(".calendar_text").show();
	}).on("mouseleave",".calendar_day", function(e) {
		  $(this).find(".calendar_text").hide();
	});
};
$(document).ready(function(){
	
	
	calendar_text();
	
	//上一頁按鈕
	$("div#calendar").on("click",".pre",(function() {	
		var year = $(".pre").attr("year");
		var month = $(".pre").attr("month");
		var al_id = $(".pre").attr("al_id");
		
		change_calendar(year, month,al_id);		
	}));
	
	//下一頁按鈕
	$("div#calendar").on("click",".next",(function() {	
		var year = $(".next").attr("year");
		var month = $(".next").attr("month");
		var al_id = $(".next").attr("al_id");
		
		change_calendar(year, month,al_id);
				
	}));
	
	//今天
	$("div#calendar").on("click",".today_btn",(function() {	
		var year = $(".today_btn").attr("year");
		var month = $(".today_btn").attr("month");
		var al_id = $(".today_btn").attr("al_id");
		
		change_calendar(year, month,al_id);
				
	}));
	
	//院別
	$("div#temp").on("click",".al_id",(function() {	
		var year = $(this).attr("year");
		var month = $(this).attr("month");
		var al_id = $(this).attr("al_id");
		
		change_calendar(year, month,al_id);
				
	}));
	
	/*function change_calendar(year, month,al_id){
		$.ajax({
			url : "change_calendar.php",
			type : "GET",
			data: { 
				year : year,
				month : month,
				al_id : al_id

			},
			success : function(data){				 
				//console.log(data.text);		
				$("div#calendar").html(data);
				//alert(response.list);	
				
				calendar_text();	
				
				$(".al_id").attr("month",$("#temp_month").val());
				$(".al_id").attr("year",$("#temp_year").val());
			},
			error : function(){
				alert('資料傳送錯誤!請在試一次!');
			}
		});
	};*/
	
	
	
});	