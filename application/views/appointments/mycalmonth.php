
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>/application/third_party/monthcal/css/core.css" type="text/css" />
<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>/application/libraries/templates/css/validationEngine.jquery.css' />

<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>    
<script type='text/javascript' src="<?php echo base_url(); ?>/application/third_party/scripts/json2.js" type="text/javascript"></script>
<script type='text/javascript' src='<?php echo base_url(); ?>/application/libraries/templates/js/jquery.validationEngine-en.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>/application/libraries/templates/js/jquery.validationEngine.js'></script>
<!--
<script type="text/javascript" src="<?php echo base_url(); ?>/application/libraries/templates/js/ui.tabs.js"></script>
-->
<script type="text/javascript" src="<?php //echo base_url(); ?>/assets/js/common-calendar-functions.js"></script>

<script type='text/javascript' src="<?php echo base_url(); ?>/application/third_party/monthcal/js/jMonthCalendar.js" type="text/javascript"></script> 

<style type="text/css" media="screen">


<?php 

function getContrast50($hexcolor)
{
    return (hexdec($hexcolor) > 0xffffff/2) ? '#000000':'#FFFFFF';
}

foreach($th as $tvar)
{
	echo "#jMonthCalendar ." . $tvar['cssclass'] . "\n" .
	"{\n" .
		"background-color : #" . $tvar['color'] . ";\n" .
		"font	: " . 	getContrast50($tvar['color'])	. ";\n"	.
		"}\n" ;
}
?>

.hidden 
{ 
	display				: none; 
}
.unhidden 
{ 
	display				: block; 
	background-color	: #FEF2BF;
	width				: 230px;
	height				: 280px;
	border				: 1px solid;
	border-radius		: 7px;
	padding				: 3px;
}

upopout
{
	display				: block; 
	background-color	: #FEF2BF;
	width				: 220px;
	border				: 1px solid;
	border-radius		: 7px;
	padding				: 3px;
}

.table tr td
{
	padding				: 5px; 	
}

.tabhead
{
	font				: Arial, 10, bold;
}

.conList
{
	lfloat				: left;
	width				: 250px;
	height				: 300px;
	padding				: 5px;
	float				: right;
	left				: -50px;
	position			: relative;
}

.aholder
{
	width				: 350px;
	float				: left;
}

.dcell
{
	width				: 300px;
}

.popout
{
	display				: none;
	 
}

.table tr td
{
	padding				: 5px; 	
}

</style>	
	
<script type="text/javascript">

var globalIds = Array();
var dcell;
var cell;
var pcell;


	$(document).ready(function() 
	{
		var events = new Array;	
		var events 		= [<?php 
				
				$x 				= 0;
		  			
		  		$json 			= null;
		  		$calids			= Array();
		  			
		  		foreach($cal as $key => $value)
		  		{		
		  			$x++;
						
					$date		= $value['sdate'];
					$dd			= strftime("%d", strtotime($date));
					$mm			= strftime("%m", strtotime($date));
					$yy			= strftime("%Y", strtotime($date));
					
					$type		= $value['type'];
					$title		= $value['title'];
					$fname		= $value['fname'];
					$lname		= $value['lname'];
					$therp		= $value['therapy_name'];
					$calid		= $value['cal_id'];
					$calids[]	= $calid;
					$start		= $value['start'];
					$end		= $value['end'];
					$type		= $value['type'];
					$colcode	= $value['colourcode'];
					$csscls		= $value['cssclass'];
					$site		= $value['site'];
						
					$json	.= '{ 
									"EventID": ' . $calid . ',
					 				"StartDateTime": "'.$yy.'-'.$mm.'-'.$dd.'", 
					 				"Title": "'."$therp" .' : '. "$title $fname $lname : $start-$end" .'",
					 				"URL": "#",
									"Description": "'."$start"."-"."$end".'",
									"CssClass": "'.$csscls . ' ' . $site.'",
									"site": "'.$site.'"
								},';
		  				
				}
				$json = substr($json, 0, (strlen($json)-1));
				echo $json;
		  			
		  		?>];

		  		<?php 
			  		foreach($calids as $cid)
					{
						?> globalIds.push(<? echo $cid; ?>); <?
					}
		  		?>

		$( "#addNewEvent" ).dialog({
			autoOpen	: false,
			height		: 510,
			width		: 450,
			modal		: true,
			buttons: 
			{
				"Save Entry": function() 
				{
					saveEntry();
					//window.location.reload(true);
		        },
		        Cancel: function() 
		        {
					//alert('h');
					$("#addNewEvent").dialog( "close" );
					clearEmptys();
				},
		        "Delete Entry": function() 
		        {
			        deleteEntry($('#_calid').val());
			        window.location.reload(true);
				}
			},
			close: function() 
			{
				$(this).dialog( "close" );
			}
		});

		
		var options = 
		{
			height				: 650,
			width				: window.innerWidth,
			navHeight			: 25,
			labelHeight			: 25,
			onMonthChanging		: function(dateIn) 
			{
				var url = '<?php echo base_url(); ?>index.php/mycal/getPeriodArray/'+dateIn.getFullYear()+'-'+(dateIn.getMonth()+1)+'-'+dateIn.getDate()+'/m/' + $('#filter').val();
		
				$.getJSON(url,function(data)
				{	
					$.each(data, function(index, value) 
					{ 
						var locID = parseInt(value.cal_id);
						if($.inArray(locID, globalIds)==-1)
						{
							$.jMonthCalendar.AddEvents({ "EventID": locID, "StartDateTime": new Date(value.year, (value.month-1), value.day), "Title": value.start + "-" + value.end + " : " + value.title + " " + value.fname + " " + value.lname + " / " + value.therapy_name, "URL": "#", "Description": value.therapy_name, "CssClass": "Meeting" });
							globalIds.push(locID);
						}
					});
				});
				
				return true;	
			},
			onEventLinkClick: function(event) 
			{ 
				var id 			= event.EventID;
				var date 		= new Date(event.StartDateTime);
				var day			= String(date.getDate());
				var mnt			= String((date.getMonth() + 1));
				var yyr			= date.getFullYear();
				var yr			= yyr + "-" + mnt + "-" + day;
			
				day.length < 2 ? day = String("0") + day: day;
				mnt.length < 2 ? mnt = String("0") + mnt: mnt;

				var dt			= day + "-" + mnt + "-" + yyr;
				
				showEventDialog();

				$('#_sdate').val(dt);
				$('#_edate').val(dt);
				$('#_edorins').val('edit');
				$(".ui-dialog-titlebar").html("Edit Event : " + dt);	
	
		 		var churl 		= '<?php echo base_url(); ?>index.php/mycal/getPeriodArray/' + id + '/e/' + $('#filter').val();;
				
				$.getJSON(churl,function(data)
				{	
					$.each(data, function(index, value) 
					{
						var minArray	= [00,15,30,45];
						$('#_calid').val(parseInt(value.cal_id));
						$('#_contactid').val(parseInt(value.contact_id));
						$('#zow').val(value.title + ' ' + value.fname + ' ' + value.lname);
						$('#_notes').val(value.notes_id);

						document.getElementById('_therapies').selectedIndex 			= value.therapy_id;
						document.getElementById('_etype').selectedIndex 				= value.type;
						
						var start 			= value.start.split(':');;
						var end 			= value.end.split(':');
						
						document.getElementById('_start_hour').selectedIndex 			= start[0].length <2 ? String('0' + start[0]) : String(start[0]);
						document.getElementById('_start_min').selectedIndex 			= minArray.indexOf(parseInt(start[1]));
						document.getElementById('_end_hour').selectedIndex 				= end[0].length <2 ? String('0' + end[0]) : String(end[0]);
						document.getElementById('_end_min').selectedIndex 				= minArray.indexOf(parseInt(end[1]));
					});
				});
				
				return true; 
			},
			onEventBlockClick: function(event) 
			{ 
				alert("block clicked");
				return true; 
			},
			onEventBlockOver: function(event) 
			{
				//alert(event.Title + " - " + event.Description);
				return true;
			},
			onEventBlockOut: function(event) 
			{
				return true;
			},
			onDayLinkClick: function(date) 
			{
				var day 		= String(date.getDate());
				var mnt 		= String(date.getMonth() + 1);
				var yyr			= String(date.getFullYear());

				day.length < 2 ? day = String("0") + day: day;
				mnt.length < 2 ? mnt = String("0") + mnt: mnt;

				var dt			= day + "-" + mnt + "-" + yyr;
				var sqld		= yyr + "-" + mnt + "-" + day;
		 		var url 	= '<?php echo base_url(); ?>index.php/mycal/display/'+ $('#filter').val() +'/w/'+sqld+'/';	
		 		window.location = url;
				//return false; 
			},
			onDayCellClick: function(date) 
			{ 
				//var date = date.toLocaleDateString();
				var day 		= String(date.getDate());
				var mnt 		= String(date.getMonth() + 1);
				var yyr			= String(date.getFullYear());

				day.length < 2 ? day = String("0") + day: day;
				mnt.length < 2 ? mnt = String("0") + mnt: mnt;

				var dt			= day + "-" + mnt + "-" + yyr;
				
				showEventDialog();

				$('#_sdate').val(dt);
				$('#_edate').val(dt);
				$('#_edorins').val('insert');
				$(".ui-dialog-titlebar").html("New Event : " + dt);	
				return true; 
			}
		};



		//var newoptions 			= { };
		//var newevents 			= [ ];
		//$.jMonthCalendar.Initialize(newoptions, newevents);

		$.jMonthCalendar.Initialize(options, events);
		
		var extraEvents = 
		[	
			{ "EventID": 5, "StartDateTime": new Date(2012,12, 11), "Title": "10:00 pm - EventTitle1", "URL": "#", "Description": "This is a sample event description", "CssClass": "Birthday" },
			{ "EventID": 6, "StartDateTime": new Date(2012,12, 20), "Title": "9:30 pm - this is a much longer title", "URL": "#", "Description": "This is a sample event description", "CssClass": "Meeting" }
		];
		
			
		$("#Button").click(function() 
		{					
			$.jMonthCalendar.AddEvents(extraEvents);
		});
			
		$("#ChangeMonth").click(function() 
		{
			$.jMonthCalendar.ChangeMonth(new Date(2008, 4, 7));
		});



/*
		$( "#addNewEvent" ).dialog({
			autoOpen	: false,
			height		: 510,
			width		: 450,
			modal		: true,
			buttons: 
			{
				"Save Entry": function() 
				{
					saveEntry();
					//window.location.reload(true);
		        },
		        Cancel: function() 
		        {
					$(this).dialog( "close" );
					clearEmptys();
				},
		        "Delete Entry": function() 
		        {
			        deleteEntry($('#_calid').val());
			        window.location.reload(true);
				}
			},
			close: function() 
			{
				$(this).dialog( "close" );
			}
		});
*/
		$( "#newEvent" ).click(function() 
		{
			$( "#addNewEvent" ).dialog( "open" );
			//$("#pinfo").validationEngine();
			$("#pinfo").validationEngine({promptPosition : "bottomLeft", scroll: false});
		});	

		$.jMonthCalendar.ChangeMonth(new Date('<? echo $ddate; ?>')); 
	});

	function setNewDate(id, date)
	{
		date				= new Date(date);
		var url				= '<?php echo base_url()?>index.php/mycal/editEventDate/';  
		var day 			= String(date.getDate());
		var mnt 			= String(date.getMonth() + 1);
		var yyr				= String(date.getFullYear());
		day.length < 2 ? day = String("0") + day: day;
		mnt.length < 2 ? mnt = String("0") + mnt: mnt;
		var dt			= day + "-" + mnt + "-" + yyr;
		var sqld		= yyr + "-" + mnt + "-" + day;

		var times 			= new Object;
		times.calid			= id;
		times.sdate			= sqld;
		times.edate			= sqld;
		
		if(confirm("Confirm New Date/Time?"))
		{
			$.ajax({
			    type		: "POST",
			    url			: url,
			    cache		: false,
			    data		: times,
			    dataType	: "text",
	
				success		: function(text) 
				{	
					$('#ajaxGrab').html(text);
					window.location.reload(true);
				},
				error		: function(xhr, ajaxOptions) 
				{
			        alert(xhr.status);
				}
			});
		} 
	}

	function gotoDate(date)
	{
		var day 		= String(date.getDate());
		var mnt 		= String(date.getMonth() + 1);
		var yyr			= String(date.getFullYear());

		day.length < 2 ? day = String("0") + day: day;
		mnt.length < 2 ? mnt = String("0") + mnt: mnt;

		var dt			= day + "-" + mnt + "-" + yyr;
		var sqld		= yyr + "-" + mnt + "-" + day;
 		var url 	= '<?php echo base_url(); ?>index.php/mycal/display/'+ $('#filter').val() +'/m/'+sqld+'/';	
 		window.location = url;
	}

	function showEventDialog(dt)
	{
		$("#addNewEvent").dialog("open");
		//alert('re');
		$('#_calid').val(null);
		$('#_contactid').val(null);
		$('#zow').val(null);
		$('#_notes').val(null);
		$('#_sdate').val(null);
		$('#_edate').val(null);
		$('#_edorins').val(null);
		$(".ui-dialog-titlebar").html(null);

		document.getElementById('_therapies').selectedIndex 			= 0;
		document.getElementById('_etype').selectedIndex 				= 0;
		document.getElementById('_start_hour').selectedIndex 			= 0;
		document.getElementById('_start_min').selectedIndex 			= 0;
		document.getElementById('_end_hour').selectedIndex 				= 0;
		document.getElementById('_end_min').selectedIndex 				= 0;	
		
		$("#addNewContactTable").tabs();	
	}


	
	function getIndex(x)
	{
		var val = document.getElementById(x).selectedIndex;
		var typ = typeOf(val);
		alert(val);
		alert(typ);
	}

	function URLEncode (clearString) 
	{
		var output = '';
	  	var x = 0;
	  	clearString = clearString.toString();
	  	var regex = /(^[a-zA-Z0-9_.]*)/;
	  	while (x < clearString.length) 
	  	{
	    	var match = regex.exec(clearString.substr(x));
	    	if (match != null && match.length > 1 && match[1] != '') 
	    	{
	    		output += match[1];
	      		x += match[1].length;
	    	}
	     	else
	    	{
	      		if (clearString[x] == ' ')
	        		output += '+';
	      		else 
	      		{
	        		var charCode = clearString.charCodeAt(x);
	        		var hexVal = charCode.toString(16);
	        		output += '%' + ( hexVal.length < 2 ? '0' : '' ) + hexVal.toUpperCase();
	      		}
	      		x++;	
			}
	  	}
	  	return output;
	}

	function testForObject(Id)
	{
		var o = document.getElementById(Id);
		if (o)
		{
			return 1;
		}
		else
		{	
	  		return null;
		}
	}

	function checker(x)
	{
		var e 				= x.value;
		clearDrop('upopout');
		if(e.length > 1)
		{
			var url			= '<?php echo base_url(); ?>index.php/contacts/contacts/showPartNames/' + e;

			$.ajax({
				type		: "GET",
				url			: url,
				dataType	: "html",
				success		: function(html) 
				{
					//alert()
					$('.conList').html(html);	
				}
			});
		}
	}

	function returnContact(x, name)
	{
		$('#_contactid').val(x);
		$('#zow').val(name);	
		clearDrop('upopout');  
	}

	function novate(haystack, find, sub) 
	{
	    var str =  haystack.split(find).join(sub);
	    return str;
	}
	
	function changeIndex()
	{
		var sh				= document.getElementById('_start_hour').selectedIndex;
		document.getElementById('_end_hour').selectedIndex = parseInt(sh + 1);
	}

	function clearDrop(className)
	{
	 	var popDivs			= document.getElementsByClassName(className);

	 	for(var i = 0; i < popDivs.length; i++)
	 	{
		 	var popDiv 		= popDivs[i].id;
		 	var element 	= document.getElementById(popDiv);
		 	element.parentNode.removeChild(element);
	 	}  	 
	}

	function setEvents(event)
	{		
		//alert('setEv');
		var ntype		= event.edorins;
		var url 		= '';

		if(ntype		== 'insert')
		{
			url 	= '<?php echo base_url()?>index.php/mycal/insertEvent/';
		}
		else
		{
			url 	= '<?php echo base_url()?>index.php/mycal/editEvent/';
		}

		$.ajax({
		    type		: "POST",
		    url			: url,
		    cache		: false,
		    data		: event,
		    dataType	: "text",

			success		: function(text) 
			{	
				$('#ajaxGrab').html(text);
				$('#addNewEvent').dialog("close");
			},
			error		: function(xhr, ajaxOptions) 
			{
		        alert("Error : " + xhr.status);
		        //alert(JSON.stringify(text));
		        $('#ajaxGrab').html(text);
			}
		}); 
	}

	function deleteEntry(event)
	{
		var delObj			= new Object;
		delObj.calid		= event;
		
		if($('#_edorins').val() == 'insert')
		{
			$("#addNewEvent").dialog("close");
		} 
		else
		{
			url 	= '<?php echo base_url()?>index.php/mycal/deleteEvent/';
			
			$.ajax({
			    type		: "POST",
			    url			: url,
			    cache		: false,
			    data		: delObj,
			    dataType	: "text",

				success		: function(text) 
				{	
					$('#ajaxGrab').html(text);
					$('#addNewEvent').dialog("close");
					windows.location.reload(true);
				},
				error		: function(xhr, ajaxOptions) 
				{
			        alert("Error : " + xhr.status);
				}
			}); 
		}
	}

	function saveEntry()
	{
		var errors = new Array();
	
		if($('#_contactid').val() == null || $('#_contactid').val() == '')
		{
			errors.push("No Contact Selected.");
		}

		if($('#_therapies').val() == null || $('#_therapies').val() == '')
		{
			errors.push("No Therapy Selected.");
		}

		if($('#_edate').val() == null || $('#_edate').val() == '')
		{
			errors.push("No Calendar Object.");
		}

		if($('#_start_hour').val() > $('#_end_hour').val())
		{
			errors.push("Start time can't be after end.");
		}

		if(!errors.length > 0)
		{
			if(event = getEventArray('obj'))
			{
				setEvents(event);
			}
		}
		else
		{
			var errmsg = 'Errors! :\n\n';
			for(var i = 0; i < errors.length; i++)
			{
				errmsg = errmsg + (errors[i] + "\n");
			}
			alert(errmsg);
		}
	}

	function cancelEntry()
	{
		clearDrop('unhidden');
	}

	function getEventArray(x)
	{
		var eventObj			= new Object;
		var rem					= null;
		var sdate				= String($('#_sdate').val());
		var edate				= String($('#_edate').val());
		sdate					= sdate.split('-');
		edate					= edate.split('-');
		sdate					= sdate[2] + "-" + sdate[1] + "-" + sdate[0];
		edate					= edate[2] + "-" + edate[1] + "-" + edate[0];

		var cc					= 0;
		$('.checks').each(function(i, obj) 
		{
		    if(obj.checked == true)
		    {
			    cc++
		    	eventObj.rem = obj.id;
		    } 
			if(cc == 0) 
			{
				eventObj.rem = 0;
			}
		});
		
		eventObj.contactid		= $('#_contactid').val();
		eventObj.sdate			= sdate;
		eventObj.edate			= edate;
		eventObj.stime			= $('#_start_hour').val() + ":" + $('#_start_min').val();
		eventObj.etime			= $('#_end_hour').val() + ":" + $('#_end_min').val();
		eventObj.edorins		= $('#_edorins').val();
		eventObj.therapy		= $('#_therapies').val();
		eventObj.calid			= $('#_calid').val();
		eventObj.notes			= $('#_notes').val();
		eventObj.type			= $('#_etype').val();
		
		var eventArray			= {
									contactid 	: eventObj.contactid,
									stime		: eventObj.stime,
									etime		: eventObj.etime,
									edate		: eventObj.edate,
									edorins		: eventObj.edorins,
									therapy		: eventObj.therapy,
									calid		: eventObj.calid,
									notes		: eventObj.notes
								};

		if(x == 'array')
		{
			return eventArray;
		}
		else
		{
			return eventObj;
		}		
	}

	function clearErrors()
	{
		$('.ajaxGrab').html = "";
	}

</script>

	<center style = 'top:120px'> 
		<div id="jMonthCalendar"></div>
	</center> 
<!-- 		<button id="Button" onclick = 'clearErrors()'>Add More Events</button>

		<button id="ChangeMonth">Change Months May 2009</button>
 -->
	<div id = 'ajaxGrab'></div>
<?php  
//$stat = 'text';
$stat = 'hidden'; 
?>

<input type = '<?php echo $stat; ?>' id = 'filter' value  = '<?php if($filter != '1' && $filter != 2 && $filter != 3 && $filter != 4) { echo 'all';}else{ echo $filter;} ?>'>
<!-- Modal Add event Dialog content -->
<!--
	<div class = 'hidden'>
	<div id='addNewEvent' >   
		<div class = 'holder'>		
			<table  style = 'width:400px; font-size:8pt;' class = 'table'>
			<tr class = 'row'>
				<td colspan = '2' class = 'tabhead' align = 'center'></td>
			</tr>
			<tr class = 'row'>
				<td class = 'col1'>
					Name
				</td>
				<td class = 'col2'>
					<input type = 'text' id ='zow' class = 'dcell' style = 'width:93%' onkeyup = 'checker(this)' >
					<input type = '<?php //echo $stat; ?>' id ='_contactid'>
					<input type = '<?php //echo $stat; ?>' id ='_calid'>
					<input type = '<?php //echo $stat; ?>' id ='_edorins'>
				</td>
			</tr>
			<tr class = 'row'>	
				<td class = 'col1'>
					Start
				</td>
				<td class = 'col2'>
					<input type = 'text' class = 'datepicker' id = '_sdate'  style = 'width:150px'>
					<select id = '_start_hour' class = 'sel' style = 'width:70px' onchange = 'changeIndex()'>
						<option value = '00'>00</option>
						<option value = '01'>01</option>
						<option value = '02'>02</option>
						<option value = '03'>03</option>
						<option value = '04'>04</option>
						<option value = '05'>05</option>
						<option value = '06'>06</option>
						<option value = '07'>07</option>
						<option value = '08'>08</option>
						<option value = '09'>09</option>
						<option value = '10'>10</option>
						<option value = '11'>11</option>
						<option value = '12'>12</option>
						<option value = '13'>13</option>
						<option value = '14'>14</option>
						<option value = '15'>15</option>
						<option value = '16'>16</option>
						<option value = '17'>17</option>
						<option value = '18'>18</option>
						<option value = '19'>19</option>
						<option value = '20'>20</option>
						<option value = '21'>21</option>
						<option value = '22'>22</option>
						<option value = '23'>23</option>
					</select>
					
					<select id = '_start_min' onchange = 'getIndex(this.id)'  style = 'width:70px' >
						<option value = '00'>00</option>
						<option value = '15'>15</option>
						<option value = '30'>30</option>
						<option value = '45'>45</option>
					</select>
				</td>
			</tr>

			<tr class = 'row'>
				<td class = 'col1'>
					End
				</td>
				<td class = 'col2'>
					<input type = 'text' class = 'datepicker' id = '_edate' style = 'width:150px'>
					<select id = '_end_hour' class = 'sel' style = 'width:70px'>
						<option value = 00>00</option>
						<option value = 01>01</option>
						<option value = 02>02</option>
						<option value = 03>03</option>
						<option value = 04>04</option>
						<option value = 05>05</option>
						<option value = 06>06</option>
						<option value = 07>07</option>
						<option value = 08>08</option>
						<option value = 09>09</option>
						<option value = 10>10</option>
						<option value = 11>11</option>
						<option value = 12>12</option>
						<option value = 13>13</option>
						<option value = 14>14</option>
						<option value = 15>15</option>
						<option value = 16>16</option>
						<option value = 17>17</option>
						<option value = 18>18</option>
						<option value = 19>19</option>
						<option value = 20>20</option>
						<option value = 21>21</option>
						<option value = 22>22</option>
						<option value = 23>23</option>
					</select>
					<select id = '_end_min'  style = 'width:70px' >
						<option value = '00'>00</option>
						<option value = '15'>15</option>
						<option value = '30'>30</option>
						<option value = '45'>45</option>
					</select>
				</td>
			</tr>
		
			<tr class = 'row'>
				<td>Event Type</td>
				<td>
					<select id = '_etype' class = 'dcell'>
						<option value = 'papt'>Patient Appointment</option>
						<option value = 'aapt'>Admin Appointment</option>
						<option value = 'prom'>Promotion</option>
					</select>
				</td>
			</tr>

			<tr class = 'row'>
				<td class = 'col1'>
					Treatment
				</td>
				<td class = 'col2'>
					<select id = '_therapies' class = 'dcell'>
					<option value = ''> - Please Select - </option>
					<?php 
						foreach($th as $arr)
						{
							$id				= $arr['id'];
							$name			= $arr['name'];
							//echo "<option value = '$id'>$name</option>";	
						}
					?>
					</select>
				</td>
			</tr>
			<tr class = 'row'>
				<td class = 'col1'>
					Notes
				</td>
				<td class = 'col2'>
					<textarea rows="4" cols="20" id = '_notes' class = 'dcell'></textarea>
				</td>
			</tr>
			</table>
		</div>	

		<div class = 'conList'>

		</div>
	</div>
	</div>
-->