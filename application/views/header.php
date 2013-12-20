<!DOCTYPE html>
<html>
<head>
<title>Diary Control Panel</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url();?>assets/templates/css/reset.css" /> 
<link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url();?>assets/templates/css/main.css" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url();?>assets/templates/css/2col.css" title="2col" />
<link rel="alternate stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url();?>assets/templates/css/1col.css" title="1col" />
<!--[if lte IE 6]><link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url();?>assets/templates/css/main-ie6.css" /><![endif]-->
<link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url();?>assets/templates/css/style.css" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url();?>assets/templates/css/mystyle.css" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url();?>assets/css/menu.css" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url();?>assets/templates/css/validationEngine.jquery.css" />

<!--



<script type="text/javascript" src="<?php echo base_url();?>assets/templates/js/jquery.js"></script>



<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js'></script>



-->



<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>



<script type="text/javascript" src="<?php echo base_url();?>assets/templates/js/switcher.js"></script>



<script type="text/javascript" src="<?php echo base_url();?>assets/templates/js/toggle.js"></script>



<script type="text/javascript" src="<?php echo base_url();?>assets/templates/js/ui.core.js"></script>



<script type="text/javascript" src="<?php echo base_url();?>assets/templates/js/ui.tabs.js"></script>

<script type="text/javascript">

//variable for inclusion in js files

var base_url = '<?php echo base_url();?>';

$(document).ready(function()



{



	$(".tabs > ul").tabs();



});



</script>







</head>



















<body>



<div id="main">



  <!-- Tray -->



 <!--  <div id="tray" class="box">



    <p class="f-left box">



      <!-- Switcher -->



    <!--    <span class="f-left" id="switcher"> <a href="javascript:void(0);" rel="1col" class="styleswitch ico-col1" title="Display one column"><img src="design/switcher-1col.gif" alt="1 Column" /></a> <a href="javascript:void(0)" rel="2col" class="styleswitch ico-col2" title="Display two columns"><img src="design/switcher-2col.gif" alt="" /></a> </span><strong>CancerKin</strong> </p>



    <p class="f-right">User: <strong><a href="http://www.free-css.com/">Administrator</a></strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong><a href="http://www.free-css.com/" id="logout">Log out</a></strong></p>



  </div> -->



  <!--  /tray -->



  <hr class="noscreen" />



  <!-- Menu -->
	<div class="header">
  	<div class="padding box">
        <!-- Logo (Max. width = 200px) 
        <p id="logo"><a href="http://www.free-css.com/"><img src="<?php //echo base_url(); ?>assets/images/logo.jpg" alt="" /></a></p>
        <!-- Search 
        <form action="http://www.free-css.com/" method="get" id="search">
          <fieldset>
          <legend>Search</legend>
          <p>
            <input type="text" size="17" name="" class="input-text" />
            &nbsp;
            <input type="submit" value="OK" class="input-submit-02" />
            <br />
            <a href="javascript:toggle('search-options');" class="ico-drop">Advanced search</a></p>
          <!-- Advanced search 
          <div id="search-options" style="display:none;">
            <p>
              <label>
              <input type="checkbox" name="" checked="checked" />
              Option I.</label>
              <br />
              <label>
              <input type="checkbox" name="" />
              Option II.</label>
              <br />
              <label>
              <input type="checkbox" name="" />
              Option III.</label>
            </p>
          </div>
       -->   
          
          <!-- /search-options -->
          </fieldset>
        </form>
        <!-- Create a new project -->
        <p id="btn-create" class="box"><a href='<?php echo base_url(); ?>index.php/admin/logout/'><span><strong><?php isset($_SESSION['username']) ? $text = "Log Out" : $text = "Log In";  echo $text ; ?> &raquo;</strong></span></a></p>
      </div>
    <div class="header_middle">
    	<div class="header_middle_inner"><a href="http://www.spinhalf.com/" style='float:left;'><img src="<?php echo base_url(); ?>assets/images/logo_design_2.jpg" alt="" style = 'max-height: 100px'/></a></div>
    </div>
    <div class="header_logo"></div>
  </div>
  	<div class="header-1">
  	<div class="header-1_right">
    RFH | ELP
    </div>
  </div>

	<div id="menu" class="box" > 
    
    <div id="container">
    
    <div id="nav">
    
    <div id="mainnav" >
        
    <ul id="navbar" >
    
    <?php
        
         if(!isset($currentsection))
         {
           	$currentsection = $currentview = "none";
         }        
        
       
        foreach($_SESSION['new_menu'] as $mitem)
        {    
            if($mitem->layer === 'head')        
            {  
                if($mitem->itemname === $currentsection)
                {
                    echo '<li class="active"><a href="'.base_url().$mitem->itemstring.'">'.$mitem->itemname.'</a>';
                } 
                else 
                {
                    echo '<li><a href="'.base_url().$mitem->itemstring.'">'.$mitem->itemname.'</a>';
                }
            }
        }
        
      ?> 
    
    </ul>
    
 
    
    </div>
    <div class="hrline"></div>
    <div id="subnav">
        <ul id="subnavbar">
        
      <?php
        
        foreach($_SESSION['new_menu'] as $mitem)
        {
			//echo $mitem->layer."==".$currentsection;  
            if($mitem->layer === $currentsection)        
            {  
                if($mitem->itemname === $currentview)
                {
                    echo '<li class="active"><a href="'.base_url().$mitem->itemstring.'">'.$mitem->itemname.'</a>';
                } 
                else 
                {
                    echo '<li><a href="'.base_url().$mitem->itemstring.'">'.$mitem->itemname.'</a>';
                }
            }
        } 
        
      ?> 
      </ul>
    </div>
    
    </div>
    
    </div>
    
    
    
    
    
        <ul class="box f-right">
    
          <li></li>
    
        </ul>
    
        <ul class="bo" style = 'float:left'>
    
        
    
        <!-- <li><a href="#" class="button" style="top: 226px; left: 175px;">Test Button</a></li>  -->
    
       
    
        <?php 
    
    
    
    	/*
    
        	$menu = null;
    
        	foreach($_SESSION['menu'] as $key => $hd)
    
        	{
    
        		$key 		== 'Switch' ? $qual = "class='styleswitch' rel = '1col'" : $qual = "class = '$key'" ;
    
        		$aref		= "a" . $key;
    
        		$menu 		.= "<li style = 'width:120px'><a href='#' $qual onmouseover = \"showOrHide('$aref','$key','block');\"  id = '$aref' ><span style='width:120px'>$key</span></a></li>";
    
        		if(!empty($hd))
    
        		{
    
        			$menu	.= "<div id = '$key'><ul>";
    
        			foreach ($hd as $k => $v)
    
        			{
    
        				$afr	= base_url() . $v;
    
        				$menu 	.= "<li class ='vli'><a href='$afr'   ><span style = 'width:120px'>$k</span></a></li>";
    
        			}
    
        			$menu	.= "</ul></div>";
    
        		}
    
        	}
    
        	echo $menu; */
    
        ?>
    
        
    
        
    
          <!-- Active 
    
          <li id="menu-active"><a href="http://www.free-css.com/"><span>Lorem ipsum</span></a></li>  
    
          
    
          
    
          <li style = 'width:150px'><a href="#" class="styleswitch" rel = '1col' ><span style = 'width:150px'>Switch</span></a></li>
    
          <li style = 'width:150px'><a href="#" class="main" id = 'home'><span style = 'width:150px'>Home</span></a></li>
    
          <li style = 'width:150px'><a href="#" class="main" id = 'cal'><span style = 'width:150px'>Calendars</span></a></li>
    
          <li class = 'pat' style = 'width:150px' onmouseover = "showOrHide('patients','pat','block');" ><a href="#" class="main" id = 'patients'><span style = 'width:150px'>Patients</span></a>
    
    
    
          </li>
    
          	<div id = 'pat'><ul>
    
          		<li class ='vli'><a href="#"><span style = 'width:150px'>Search</span></a></li>
    
          		<li class ='vli'><a href="#"><span style = 'width:150px'>Options</span></a></li>
    
          	</ul></div>
    
    
    
          
    
          <li style = 'width:150px'><a href="#" class="main" id = 'reports'><span style = 'width:150px'></span></a></li>
    
          <li style = 'width:150px'><a href="#" class="main" id = 'admin'><span style = 'width:150px'>Administration</span></a></li>
    
          -->
    
     
    
        </ul>
    
      </div>
  

	<!--<script type="text/javascript">
  	$(document).ready(function(){
		$("#navbar li").click(function(){
			$('li.current_item').removeClass('current_item');
			$(this).closest('li').addClass('current_item');	
			
		});	
		
	});
  </script>-->


  <!-- /header -->

