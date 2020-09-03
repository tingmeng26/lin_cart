//RWD Slider
$(function(){
	var $item = $('.carousel .item'); 
	var $wHeight = $(window).height();
	$item.height($wHeight); 
	$item.addClass('full-screen');

	$('.carousel img').each(function() {
	  var $src = $(this).attr('src');
	  var $color = $(this).attr('data-color');
	  $(this).parent().css({
		'background-image' : 'url(' + $src + ')',
		'background-color' : $color
	  });
	  $(this).remove();
	});

	//下方自動加入控制圓鈕
	var total = $('.carousel .carousel-inner div.item').length;
	append_li();
	function append_li()
	{
		var li = "";
		var get_ac = $( ".carousel .active" );
		var ac =  $( ".carousel .carousel-inner div" ).index( get_ac );

		for (var i=0; i <= total-1; i++){
			if(i == (ac)/2){
				li += "<li data-target='#mycarousel' data-slide-to='"+i+"' class='active'></li>";					
			}else{
				li += "<li data-target='#mycarousel' data-slide-to='"+i+"' class=''></li>";						
				}
			}
			$(".carousel-indicators").append(li);
		}

	//單則隱藏控制鈕
	if ($('.carousel .carousel-inner div.item').length < 2 ) { 
			$('.carousel-indicators, .carousel-control').hide();
	}

	//縮放視窗調整視窗高度
	$(window).on('resize', function (){
	  $wHeight = $(window).height();
	  $item.height($wHeight);
	});
});
	

//Shrink
$(function(){
	$(window).scroll(function() {
		if ($(document).scrollTop() > 80) {
		  $('nav').addClass('shrink');
		} else {
		  $('nav').removeClass('shrink');
		}
	  });
	});

//小圖換大圖
$(function(){
	// 用來顯示大圖片用
	var $showImage = $('#show-img');
 
	// 當滑鼠移到 .small-ing 中的某一個超連結時
	$('.small-img a').click(function(){
		// 把 #show-image 的 src 改成被移到的超連結的位置
		$showImage.attr('src', $(this).attr('href'));
	}).click(function(){
		// 如果超連結被點擊時, 取消連結動作
		return false;
	});
});


