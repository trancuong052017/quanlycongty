<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>An Đại Lộc </title>

<meta name="robots" content="noindex, nofollow">
<base href='{{asset("")}}'>
<link rel="shortcut icon" href="public/admin_asset1/images/icon.png" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="public/admin_asset1/crown/css/main.css">
<link rel="stylesheet" type="text/css" href="public/admin_asset1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="public/admin_asset1/css/css.css" media="screen">

<script type="text/javascript" src="public/admin_asset1/js1/jquery/jquery.min.js"></script>
<script type="text/javascript" src="public/admin_asset1/js1/jquery/jquery-ui.min.js"></script>

<script type="text/javascript" src="public/admin_asset1/crown/js/plugins/spinner/jquery.mousewheel.js"></script>

<script type="text/javascript" src="public/admin_asset1/crown/js/plugins/forms/uniform.js"></script>
<script type="text/javascript" src="public/admin_asset1/crown/js/plugins/forms/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="public/admin_asset1/crown/js/plugins/forms/autogrowtextarea.js"></script>
<script type="text/javascript" src="public/admin_asset1/crown/js/plugins/forms/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="public/admin_asset1/crown/js/plugins/forms/jquery.inputlimiter.min.js"></script>

<script type="text/javascript" src="public/admin_asset1/crown/js/plugins/tables/datatable.js"></script>
<script type="text/javascript" src="public/admin_asset1/crown/js/plugins/tables/tablesort.min.js"></script>
<script type="text/javascript" src="public/admin_asset1/crown/js/plugins/tables/resizable.min.js"></script><style type="text/css">.CRZ{table-layout:fixed;}.CRZ td,.CRZ th{overflow:hidden}.CRC{height:0px;position:relative;}.CRG{margin-left:-5px;position:absolute;z-index:5;}.CRG .CRZ{position:absolute;background-color:red;filter:alpha(opacity=1);opacity:0;width:10px;height:100%;top:0px}.CRL{position:absolute;width:1px}.CRD{ border-left:1px dotted black}</style>

<script type="text/javascript" src="public/admin_asset1/crown/js/plugins/ui/jquery.tipsy.js"></script>
<script type="text/javascript" src="public/admin_asset1/crown/js/plugins/ui/jquery.collapsible.min.js"></script>
<script type="text/javascript" src="public/admin_asset1/crown/js/plugins/ui/jquery.progress.js"></script>
<script type="text/javascript" src="public/admin_asset1/crown/js/plugins/ui/jquery.timeentry.min.js"></script>
<script type="text/javascript" src="public/admin_asset1/crown/js/plugins/ui/jquery.colorpicker.js"></script>
<script type="text/javascript" src="public/admin_asset1/crown/js/plugins/ui/jquery.jgrowl.js"></script>
<script type="text/javascript" src="public/admin_asset1/crown/js/plugins/ui/jquery.breadcrumbs.js"></script>
<script type="text/javascript" src="public/admin_asset1/crown/js/plugins/ui/jquery.sourcerer.js"></script>

<script type="text/javascript" src="public/admin_asset1/crown/js/custom.js"></script>




<script type="text/javascript" src="public/admin_asset1/js1/ckeditor/ckeditor.js"></script> 
 
<script type="text/javascript" src="public/admin_asset1/js1/jquery/zclip/jquery.zclip.js"></script>

<script type="text/javascript" src="public/admin_asset1/js1/jquery/colorbox/jquery.colorbox.js"></script>
<link rel="stylesheet" type="text/css" href="public/admin_asset1/js1/jquery/colorbox/colorbox.css" media="screen">
<!-- <script type="text/javascript" src="public/admin_asset1/js1/ckeditor/ckeditor.js"></script>  -->
<script type="text/javascript" src="public/admin_asset1/js1/jquery/chosen/chosen.jquery.min.js"></script>
<script type="text/javascript" src="public/admin_asset1/js1/jquery/scrollTo/jquery.scrollTo.js"></script>
<script type="text/javascript" src="public/admin_asset1/js1/jquery/number/jquery.number.min.js"></script>
<script type="text/javascript" src="public/admin_asset1/js1/jquery/formatCurrency/jquery.formatCurrency-1.4.0.min.js"></script>
<!-- <script type="text/javascript" src="public/admin_asset1/js1/jquery/zclip/jquery.zclip.js"></script>
 -->
<!-- <script type="text/javascript" src="public/admin_asset1/js1/jquery/colorbox/jquery.colorbox.js"></script> -->
<!-- <link rel="stylesheet" type="text/css" href="public/admin_asset1/js1/jquery/colorbox/colorbox.css" media="screen" /> -->

<script type="text/javascript" src="public/admin_asset1/js1/custom_admin.js" type="text/javascript"></script>
<!-- <script type="text/javascript" src="public/admin_asset1/js1/custom_admin.js"></script> -->
    </head>
<body>
<section class= "box-full-zoom">
    <article>
      <img src="" id="imageszoom"/>  
    </article>
</section>
<style>
  .box-full-zoom{
    position: relative;
    background-color: rgba(125,125,125,0.8); 
    width: 100%;
    height: 100%; 
    display: none;
    
  } 
  .box-full-zoom article{
  	border: 1px solid black ;width: 450px;
  	height: 850px;
  	margin-left:  400px;
  	margin-top:1em;
  	background: white;
  } 
  .box-full-zoom article img{
  	width: 100%;
  	height: 100%;
  }
</style>   

        <!-- Navigation -->
        @include('admin.layout1.header')

        @include('admin.layout1.header_1')

        
         <!-- Page Content -->
        @yield('content')
        <!-- /#page-wrapper -->


<div class="clear mt30"></div>
		
	    <!-- Footer -->
	    <div id="footer">
	    <div class="wrapper">

	       
	        </div>
	     </div>
	</div>
	<div class="clear"></div>
	 @yield('script') 
</body>
</html>