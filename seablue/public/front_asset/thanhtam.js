$(document).ready(function(e) {
	$( "img" ).each(function() {
		var al = $(this).attr('alt');
		if (al == "" || !al) {
			$(this).attr('alt','Images') ;
		};
	});
    // Back top
	$('#back-top,.go-top').click(function(){
		$('html, body').animate({
			scrollTop:0	
		},800)	
	})

	// Menu mobile
	$('.i-menu').click(function(){
		$('#menu').slideToggle();	
	})

	$('.box-tab-tit div').click(function(event) {
		if(!$(this).hasClass('active'))
		{
			$(this).parent('.box-tab-tit').children('div').not($(this)).removeClass('active');
			$(this).addClass('active');
			var i=parseInt($(this).index())+1;
			$(this).parent('.box-tab-tit').next().find('.box-tab-con').hide();
			$(this).parent('.box-tab-tit').next().find('.box-tab-con:nth-child('+i+')').show();
		}
	});

	$('#change-lang').change(function(event) {
		window.location.href=$(this).val();
	});
	
});
$(document).ready(function(e) { 
	setTimeout(function(){$(".auto_click").click();}, 500);	  

	$('.giohang-cl').click(function(event) {
		$('#giohang').removeClass('active');
	});


	$('.sukienclick').on('click','.ajax_cart_tt', function(event) {
        /* Xu ly gio hang*/
        var id=$(this).attr('data-id');
        var q=$(this).attr('data-q');

        if (q > 0) {
        	var sl = q;
        }else{
        	var sl=$('#quality').val();
        }
      	
        $.ajax({
            url: 'http://andailoc.vn/js/ajax/giohang.php',
            type: 'POST',
            dataType: 'json',
            data: {id: id,sl:sl},
            success:function(res){
                window.location.href='http://andailoc.vn/js/thanh-toan.html';
            }
        });
        
    });

	$('.sukienclick').on('click','.ajax_cart', function(event) {
        /* Xu ly gio hang*/
        var id=$(this).attr('data-id');
        var q=$(this).attr('data-q');
        var sl=$('#quality').val();
        if (q > 0) {
        	sl = q;
        }
        //alert('text');
        $.ajax({
            url: 'http://andailoc.vn/js/ajax/giohang.php',
            type: 'POST',
            dataType: 'json',
            data: {id: id,sl:sl},
            success:function(res){
                //$('.ajax_cart').html('Giỏ hàng');
  
                $('.banner-ab-gh span,.giohang-tit span').html(res.soluong);
                $('.giohang-thanhtien span').html(res.tongtien);
                $('.tbl-giohang').html(res.giohang);
                $('#giohang').addClass('active');
                $('#qty_cart').html(res.soluong);
                $('#count_gh').html(res.soluong);
            }
        });
    });


    $('.tbl-giohang').on('change', '.ajax_soluong', function(event) {
		// ajax cap nhat so luong
		var id=$(this).attr('data-key');
		var sl=$(this).val();
		if(sl<1)
		{
			sl=1;
		}
		$this=$(this);
		$.ajax({
			url: 'http://andailoc.vn/js/ajax/soluong.php',
			type: 'POST',
			dataType: 'json',
			data: {id: id,sl:sl},
			success:function(res){
				$this.parent().next().html(res.thanhtien);
				$('.giohang-thanhtien span').html(res.tongtien);
			}
		})
	});

	$('.tbl-giohang').on('click', '.del-cart', function(event) {
		// Xoa san pham khoi gio hang
		var id=$(this).attr('data-key');
		$this=$(this);
		$.ajax({
			url: 'http://andailoc.vn/js/ajax/delcart.php',
			type: 'POST',
			dataType: 'json',
			data: {id: id},
			success:function(res){
				$('.giohang-thanhtien span').html(res.thanhtien);
				$('.giohang-tit span,.banner-ab-gh span').html(res.soluong);
				$this.parents('.tr').remove();
			}
		})
		return false;
	});
})

$(window).on('scroll',function(){
	$pageY=$(window).scrollTop();
	if($pageY>300)
	{
		$('#back-top').fadeIn();
	}
	else
	{
		$('#back-top').fadeOut();
	}
})


$(document).ready(function()  {
    var height = $(".box_scroll > div").height();
    var d_top = $(".box_scroll > div").offset().top;
    $(window).scroll(function() {
        var w_offset = $(window).scrollTop();
        if($(window).scrollTop()> d_top) {
            $('.box_scroll').css({
                position: 'relative'
            });
            $(".box_scroll").addClass('scroll-fix');     
        }else{
            $(".scroll-fix").removeClass('scroll-fix'); 
        }
    });
});



$(document).ready(function(){
	$(".search_open").click(function(){
        if($(".search_box_hide").hasClass('opening')){
            $(".search_box_hide").removeClass('opening');
            $(".search_box_hide").stop().slideUp();
        }else{
            $(".search_box_hide").addClass('opening');
            $(".search_box_hide").stop().slideDown();
        }
    }); 
});

/*
$(document).ready(function(){
	$( "#main-menu li.cap" ).on( "mouseenter", function( event ) {
		if ($(this).hasClass('open')) {

		}else{
			$(this).parent('ul').find('.open').children('ul').stop().slideUp();
			$(this).parent('ul').find('.open').removeClass('open');	 
			$(this).addClass('open');
			$(this).children('ul').stop().slideDown();
		}	  	
	});
	$( "#main-menu li.menu-line" ).on( "mouseleave", function( event ) {
		$(this).children('ul').stop().slideUp();
		$(this).children('open').removeClass('open');	  	
		$(this).removeClass('open');	  	
	});

});
*/
