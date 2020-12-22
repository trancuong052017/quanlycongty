<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Hocphp.info</title>

<meta name="robots" content="noindex, nofollow" />
<base href='{{asset("")}}'>
<link rel="shortcut icon" href="/public/source/asset_admin/admin/images/icon.png" type="image/x-icon"/>
<link rel="stylesheet" type="text/css" href="public/source/asset_admin/admin/crown/css/main.css" />
<link rel="stylesheet" type="text/css" href="public/source/asset_admin/admin/crown/css/css.css" media="screen" />
 



<script type="text/javascript" src="public/source/asset_admin/js/jquery.min.js"></script>
<script type="text/javascript" src="public/source/asset_admin/js/jquery-ui.min.js"></script>

<script type="text/javascript" src="public/source/asset_admin/admin/crown/js/plugins/spinner/jquery.mousewheel.js"></script>

<script type="text/javascript" src="public/source/asset_admin/admin/crown/js/plugins/forms/uniform.js"></script>
<script type="text/javascript" src="public/source/asset_admin/admin/crown/js/plugins/forms/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="public/source/asset_admin/admin/crown/js/plugins/forms/autogrowtextarea.js"></script>
<script type="text/javascript" src="public/source/asset_admin/admin/crown/js/plugins/forms/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="public/source/asset_admin/admin/crown/js/plugins/forms/jquery.inputlimiter.min.js"></script>

<script type="text/javascript" src="public/source/asset_admin/admin/crown/js/plugins/tables/datatable.js"></script>
<script type="text/javascript" src="public/source/asset_admin/admin/crown/js/plugins/tables/tablesort.min.js"></script>
<script type="text/javascript" src="public/source/asset_admin/admin/crown/js/plugins/tables/resizable.min.js"></script>

<script type="text/javascript" src="public/source/asset_admin/admin/crown/js/plugins/ui/jquery.tipsy.js"></script>
<script type="text/javascript" src="public/source/asset_admin/admin/crown/js/plugins/ui/jquery.collapsible.min.js"></script>
<script type="text/javascript" src="public/source/asset_admin/admin/crown/js/plugins/ui/jquery.progress.js"></script>
<script type="text/javascript" src="public/source/asset_admin/admin/crown/js/plugins/ui/jquery.timeentry.min.js"></script>
<script type="text/javascript" src="public/source/asset_admin/admin/crown/js/plugins/ui/jquery.colorpicker.js"></script>
<script type="text/javascript" src="public/source/asset_admin/admin/crown/js/plugins/ui/jquery.jgrowl.js"></script>
<script type="text/javascript" src="public/source/asset_admin/admin/crown/js/plugins/ui/jquery.breadcrumbs.js"></script>
<script type="text/javascript" src="public/source/asset_admin/admin/crown/js/plugins/ui/jquery.sourcerer.js"></script>

<script type="text/javascript" src="public/source/asset_admin/admin/crown/js/custom.js"></script>


<script type="text/javascript" src="public/source/asset_admin/../js/ckeditor/ckeditor.js"></script> 
<script type="text/javascript" src="public/source/asset_admin/../js/jquery/chosen/chosen.jquery.min.js"></script>
<script type="text/javascript" src="public/source/asset_admin/../js/jquery/scrollTo/jquery.scrollTo.js"></script>
<script type="text/javascript" src="public/source/asset_admin/../js/jquery/number/jquery.number.min.js"></script>
<script type="text/javascript" src="public/source/asset_admin/../js/jquery/formatCurrency/jquery.formatCurrency-1.4.0.min.js"></script>
<script type="text/javascript" src="public/source/asset_admin/../js/jquery/zclip/jquery.zclip.js"></script>

<script type="text/javascript" src="public/source/asset_admin/../js/jquery/colorbox/jquery.colorbox.js"></script>
<link rel="stylesheet" type="text/css" href="public/source/asset_admin/../js/jquery/colorbox/colorbox.css" media="screen" />

<script type="text/javascript" src="public/source/asset_admin/../js/custom_admin.js" type="text/javascript"></script>
</head>

<body class="nobg loginPage" style="min-height:100%;">

	<!-- Main content wrapper -->
	<div class="loginWrapper" style="top:45%;">
	 @if(count($errors)>0)
                    
        <div class='alert alert-danger'>
           @foreach($errors->all() as $err) 
           {{$err}}<br>
           @endforeach 
       </div> 
         @endif
          @if(session('thongbao'))
   
    <div class='alert alert-success'>
     
     {{session('thongbao')}}
     </div>
     @endif
     @if(session('loi'))
     <div class='alert alert-danger'style="text-align: center color:red">
     {{session('loi')}}
     </div>
     @endif          
        
	    <div class="widget" id="admin_login" style="height:auto; margin:auto;">
	        <div class="title"><img src="images/icons/dark/laptop.png" alt="" class="titleIcon" />
	        	<h6>Đang ky</h6>
	        </div>
	        
	        <form class="form" id="form" action="admin/dangky" method="post">
	           <fieldset>
	           	<input type ='hidden' name='_token' value = '{{csrf_token()}}'/>
	                <div class="formRow">
	                    <label for="param_username">Tên :</label>
	                    <div class="loginInput"><input type="text" name="name" id="param_username" /></div>
	                    <div class="clear"></div>
	                </div>
	                <div class="formRow">
	                    <label for="param_username">Email :</label>
	                    <div class="loginInput"><input type="text" name="email" id="param_username" /></div>
	                    <div class="clear"></div>
	                </div>
	                
	                <div class="formRow">
	                    <label for="param_password">Mật khẩu:</label>
	                    <div class="loginInput"><input type="password" name="password" id="param_password" /></div>
	                    <div class="clear"></div>
	                </div>
	                <div class="formRow">
	                    <label for="param_password">Nhập lại Mật khẩu:</label>
	                    <div class="loginInput"><input type="password" name="passwordAgain" id="param_password" /></div>
	                    <div class="clear"></div>
	                </div>
	                
	                <div class="loginControl">
	                    <input type='hidden' name="submit" value='1'/>
	                    <input type="submit"  value="Đăng ký" class="dredB logMeIn" />
	                    <div class="clear"></div>
	                </div>
	            </fieldset>
	        </form>
	    </div>
	    
	</div>    
	
	<!-- Footer line -->
	<div id="footer">
				<div class="wrapper">Bản quyền © 2012-2016 hocphp.info</div>
	</div>

</body>
</html>