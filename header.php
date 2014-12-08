<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="<?php bloginfo('template_directory');?>/img/favicon.png">
<title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>

<!-- Bootstrap core CSS -->
<link href="<?php bloginfo('template_directory');?>/css/bootstrap.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">
<link href="<?php bloginfo('template_directory');?>/css/prettyPhoto.css" rel="stylesheet">
<link href="<?php bloginfo('template_directory');?>/css/flexslider.css" rel="stylesheet">
<script src="<?php bloginfo('template_directory');?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/js/smoothscroll.js"></script> 
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/js/jquery.flexslider-min.js"></script> 
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
	<?php wp_head();?>
</head>

<body data-spy="scroll" data-offset="0" data-target="#nav">
<div class="headerwrap">
  <div class="topbar">
    <div class="container">
      <div class="row clearfix">
        <div class="col-md-6"> <a href="<?php echo home_url(); ?>" class="brand"><img src="<?php bloginfo('template_directory');?>/img/ms-logo.png" alt="ms-logo"></a> </div>
        <div class="col-md-6">
          <div class="call">
            <p>Call US today on<br>
              08 9303 2544 <span>or</span> 0419 199 144</p>
          </div>
        </div>
      </div>
      <!--/.row --> 
    </div>
    <!--/.container --> 
    
  </div>
  <!--/ #topbar-inner -->
  <div class="bottombar white-bg">
    <div class="container">
      <div class="row">
					<nav class="navbar clearfix" role="navigation">
				<div class="container">
					<div class="navbar-header navbar-default">
						<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="navbar-collapse collapse">
							<ul id="nav" class="nav">
          <li class="menu-item"><a class="smoothScroll" href="#about" title="About">About</a></li>
          <li class="menu-item"><a class="smoothScroll" href="#styles" title="Styles">Styles</a></li>
          <li class="menu-item"><a class="smoothScroll" href="#colours" title="Colours">Colours</a></li>
          <li class="menu-item"><a class="smoothScroll" href="#gallery" title="Gallery">Gallery</a></li>
          <li class="menu-item"><a class="smoothScroll" href="#enquiry" title="Enquiry">Enquiry</a></li>
          <li class="menu-item"><a class="smoothScroll" href="#contact" title="Contact">Contact</a></li>
        </ul>
					</div>
				</div>
			</nav>	
        <!--/ uL#nav --> 
		
      </div>
      <!--/.row --> 
    </div>
    <!--/.container -->
    
    <div class="clear"></div>
  </div>
  <!--/ #bottombar-inner --> 
</div>
<!--/.#headerwrap -->
