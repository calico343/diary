<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<script type="text/javascript" src="<?php //echo base_url(); ?>/application/third_party/scripts/jscolor.js"></script>
<script src="http://code.jquery.com/jquery-1.8.3.js"></script> 
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>

<script type="text/javascript">

$(document).ready(function() 
{
	$('.therapy').blur(function()
	{
		var colObj		= new Object();
		colObj.color	= $(this).val();
		colObj.item		= $(this).attr('id');		
		var url			=  '<?php echo base_url()?>index.php/utils/utils/setColors/';  
		
		$.ajax({
		    type		: "POST",
		    url			: url,
		    cache		: false,
		    data		: colObj,
		    dataType	: "text",
	
			success		: function(text) 
			{
				//alert(text);	
				$('#ajaxGrab').html(text);
				//window.location.reload(true);
			},
			error		: function(xhr, ajaxOptions) 
			{
		        alert(xhr.status);
			}
		}); 
	});
	//alert(getContrast50($(this).val()));
});

function getContrast50(hexcolor)
{
    return (parseInt(hexcolor, 16) > 0xffffff/2) ? '#000000':'#FFFFFF';
}
/*
function rgbstringToTriplet(rgbstring)
{
	var commadelim 		= rgbstring.substring(4,rgbstring.length-1);
	var strings 		= commadelim.split(",");
	var numeric 		= [];
	for(var i=0; i<3; i++) 
	{ 
		numeric[i] = parseInt(strings[i]); 
	}
	return numeric;
}

function hexToRgb(hex) 
{
    var bigint 			= parseInt(hex, 16);
    alert(bigint);
    var r 				= (bigint >> 16) & 255;
    var g 				= (bigint >> 8) & 255;
    var b 				= bigint & 255;

    return r + "," + g + "," + b;
}

function adjustColour(someelement)
{
	var rgbstring 		= $(someelement).val();
	var rgbstring		= hexToRgb(rgbstring);
	var triplet 		= rgbstringToTriplet(rgbstring);
	alert(triplet);
	var newtriplet 		= [];
   	//black or white:
	var total 			= 0; for (var i=0; i<triplet.length; i++) { total += triplet[i]; }
	if(total > (3*256/2)) 
	{	
		newtriplet = [0,0,0];
	} 
	else 
	{
		newtriplet = [255,255,255];
	}
	//var newstring = "rgb("+newtriplet.join(",")+")";
	//someelement.style.color = newstring;
	alert(newtriplet);
	return true;
}
ondblclick = 'adjustColour(this)'
*/
</script>


<table>


<?php 
$html = "";
foreach ($therapies as $key => $val)
{
	$name 			= $val['name'];
	$col			= $val['color'];
	
	$html 	.= "  <tr>
		<td class = 'name'> $key </td>
		<td> $name </td>
		<td> <input class='color therapy' id = '$key' value = '$col' ></td>	
	</tr>";
}
/*
foreach ($sites as $key => $val)
{
	$name 			= $val['name'];
	$col			= $val['color'];
	
	$html 	.= "  <tr>
		<td class = 'name'> $key </td>
		<td> $name </td>
		<td> <input class='sitecolor' id = '$key' value = '$col' ondblclick = 'brightness()'></td>	
	</tr>";
}
*/
echo $html;
?>
</table>

<div id = 'ajaxGrab'></div>
<!-- /*

*/ -->