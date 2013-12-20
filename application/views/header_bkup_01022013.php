<!DOCTYPE html>



<html>



<head>



<title>CancerKin Control Panel</title>



<meta http-equiv="content-type" content="text/html; charset=utf-8" />



 <link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url();?>application/libraries/templates/css/reset.css" /> 



<link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url();?>application/libraries/templates/css/main.css" />



<link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url();?>application/libraries/templates/css/2col.css" title="2col" />



<link rel="alternate stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url();?>application/libraries/templates/css/1col.css" title="1col" />



<!--[if lte IE 6]><link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url();?>application/libraries/templates/css/main-ie6.css" /><![endif]-->



<link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url();?>application/libraries/templates/css/style.css" />



<link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url();?>application/libraries/templates/css/mystyle.css" />



<link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url();?>assets/css/menu.css" />

<link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url();?>application/libraries/templates/css/validationEngine.jquery.css" />



<!--



<script type="text/javascript" src="<?php echo base_url();?>application/libraries/templates/js/jquery.js"></script>



<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js'></script>



-->



<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>



<script type="text/javascript" src="<?php echo base_url();?>application/libraries/templates/js/switcher.js"></script>



<script type="text/javascript" src="<?php echo base_url();?>application/libraries/templates/js/toggle.js"></script>



<script type="text/javascript" src="<?php echo base_url();?>application/libraries/templates/js/ui.core.js"></script>



<script type="text/javascript" src="<?php echo base_url();?>application/libraries/templates/js/ui.tabs.js"></script>

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
        <p id="logo"><a href="http://www.free-css.com/"><img src="<?php //echo base_url(); ?>application/libraries/images/logo.jpg" alt="" /></a></p>
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
    <div class="header_middle">Site&nbsp;(Royal free/ELP)</div>
    <div class="header_logo"><a href="http://www.cancerkin.org.uk/" style='float:left;'><img src="<?php echo base_url(); ?>application/libraries/templates/images/logo_header.jpg" alt="" title = 'Go to Cancerkin Website' /></a></div>
  </div>
  <div class="header-1">
  	<div class="header-1_right">
    RFH | ELP
    </div>
  </div>


  <div id="menu" class="box" >

<!-- SWITCHERS - PUT BACK LATER  



  <span class="f-left" id="switcher"> 



  <a href="javascript:void(0);" rel="1col" class="styleswitch ico-col1" title="Display one column">



  	<img src="design/switcher-1col.gif" alt="1 Column" />



  </a> 



  <a href="javascript:void(0)" rel="2col" class="styleswitch ico-col2" title="Display two columns">



  	<img src="design/switcher-2col.gif" alt="" />



  </a>  



  </span>



-->















<script type = 'text/JavaScript'>



$(window).resize(function() {



  $('.vli').css({"display":"none"});



});







function showOrHide(x,a, sh) 



{



	console.log(x);



	console.log(a);



	//var id				= x.className;



	var element 		= $('#' + x);



	var position 		= element.offset();



	var X			 	= position.left;



	var Y			 	= position.top;



	console.log(X);



	console.log(Y);



	



	switch(sh){



		case 'block':



			var h = element.height();



			$('#'+a).css({"display":sh});



			$('#'+a).animate({top: Y+h});



			$('#'+a).css({'margin-left':X-229});



			



			$('.'+a).live('mouseleave',function()



			{



				 $(document).mousemove(function(e){



					var width = 150;



					var ML = X;



					var ML2 = ML+width;



					console.log(e.pageX+'&'+ML+'&'+ML2);



					if((e.pageX>ML) && (e.pageX<=ML2)){



			console.log('hit3');



	  



					}else{



						$('#'+a).css({"display":"none"});



					}



					



	   }); 



				



			});



			



			$('#'+a).live('mouseleave',function()



			{



				



				$('#'+a).css({"display":"none"});



			});



		break;



		case 'none':



			//$('#'+a).css({"display":sh});



			



		break;	



	}



	/*



	var abra	 		= element.style;



	abra.display 		= sh; 



	if(sh == 'block')



	{



		//var aposition 	= $('#' + id).offset();



		//alert(JSON.stringify(aposition));



		//document.getElementById(id).style.left	= (X + 500);



		//document.getElementById(id).style.top	= (Y + 500);



		// $('#' + id).offset(500, 500);



		if(element)



		{



			//alert(Y);



			element.animate({top: Y});



		}



		else



		{



			alert('not found');



		}



	}*/



}



</script>







<style type="text/css">







#Calendars



{



	display				: none;



	position			: absolute;



	z-index				: 999;	



}







#Reports



{



	display				: none;



	position			: absolute;



	z-index				: 999;



	



}



#Administration



{



	display				: none;



	position			: absolute;



	z-index				: 999;



	



}



#Patients



{



	display				: none;



	position			: absolute;



	z-index				: 999;



	



}







.vli



{



	width				: 150px;



	float				: left;



	clear				: left;



}







.button {



width : 170px;



   border-top: 1px solid #8c9194;



   background: #003d5c;



   background: -webkit-gradient(linear, left top, left bottom, from(#168bde), to(#003d5c));



   background: -webkit-linear-gradient(top, #168bde, #003d5c);



   background: -moz-linear-gradient(top, #168bde, #003d5c);



   background: -ms-linear-gradient(top, #168bde, #003d5c);



   background: -o-linear-gradient(top, #168bde, #003d5c);



   padding: 14px 28px;



   -webkit-border-radius: 11px;



   -moz-border-radius: 11px;



   border-radius: 11px;



   -webkit-box-shadow: rgba(0,0,0,1) 0 1px 0;



   -moz-box-shadow: rgba(0,0,0,1) 0 1px 0;



   box-shadow: rgba(0,0,0,1) 0 1px 0;



   text-shadow: rgba(0,0,0,.4) 0 1px 0;



   color: #ffffff;



   font-size: 15px;



   font-family: 'Lucida Grande', Helvetica, Arial, Sans-Serif;



   text-decoration: none;



   vertical-align: middle;



   }



.button:hover {



   border-top-color: #14364d;



   background: #14364d;



   color: #ffffff;



   }



.button:active {



   border-top-color: #1b435e;



   background: #1b435e;



   }



</style>







<div id="container">



<div id="nav">



<ul id="navbar">



<?



	//print_r($_SESSION['menu']);



	foreach($_SESSION['menu'] as $key => $hd){



		//print_r($hd);



		if(!is_array($hd)){



			echo '<li><a href="'.base_url().$hd.'">'.$key.'</a>';



		}else if(is_array($hd)){



			echo '<li><a href="#">'.$key.'</a>';



			switch($key){

				case "Events":

					echo '<ul style="margin-left:320px;">';

				break;

				default:

					echo '<ul>';

				break;	

			}

			



			foreach($hd as $k => $v){



				$afr  = base_url() . $v;



				echo '<li><a href="'.$afr.'">'.$k.'</a></li>';



			}



			echo '<li style="width:100%;"><a href="'.$afr.'">'.$k.'</a></li>';



			echo '</ul>';



		}



		echo '</li>';



	}



	?> 



</ul>



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

	<script type="text/javascript">
  	$(document).ready(function(){
		$("#navbar li").click(function(){
			$('li.current_item').removeClass('current_item');
			$(this).closest('li').addClass('current_item');	
			
		});	
		
	});
  </script>


  <!-- /header -->

