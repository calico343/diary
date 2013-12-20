<!-- john: re-added 22-01-13  --> 
<!--Michael:working on this file -->
<!--
<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>/application/third_party/weekcal/full_demo/reset.css' />
<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>/application/third_party/weekcal/libs/css/smoothness/jquery-ui-1.8rc3.custom.css' />
<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>/application/third_party/weekcal/jquery.weekcalendar.css' />
<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>/application/third_party/weekcal/full_demo/demo.css' />

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />

<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js'></script>
<script src="http://code.jquery.com/jquery-1.8.3.js"></script> 
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<script type='text/javascript' src='<?php echo base_url(); ?>/application/third_party/weekcal/libs/jquery-ui-1.8rc3.custom.min.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>/application/third_party/weekcal/jquery.weekcalendar.js'></script>
-->


<!--
<script type='text/javascript' src='<?php echo base_url(); ?>/application/libraries/templates/js/jquery.validationEngine-en.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>/application/libraries/templates/js/jquery.validationEngine.js'></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/application/third_party/scripts/json2.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/application/third_party/scripts/jqModal.js"></script>
<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>/application/libraries/templates/css/validationEngine.jquery.css' />
<script type="text/javascript" src="<?php //echo base_url(); ?>/application/libraries/templates/js/ui.tabs.js"></script>

<script type="text/javascript" src="<?php //echo base_url(); ?>/assets/js/common-calendar-functions.js"></script>
-->
<style type='text/css'>

	body {
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		margin: 0;
	}
	
	h1 {
		margin: 0;
		padding: 0.5em;
	}
	
	p.description {
		font-size: 0.8em;
		padding: 1em;
		position: absolute;
		top: 3.2em;
		margin-right: 400px;
	}
	
	#message {
		font-size: 0.7em;
		position: absolute;
		top: 1em; 
		right: 1em;
		width: 350px;
		display: none;
		padding: 1em;
		background: #ffc;
		border: 1px solid #dda;
	}
	
</style>





<!--
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.3.js"></script> 
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
-->

    
    <link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>/application/third_party/weekcal/full_demo/reset.css' />
    <!--
	<link rel='stylesheet' type='text/css' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/start/jquery-ui.css' />
	-->
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>/application/third_party/weekcal/libs/css/smoothness/jquery-ui-1.8rc3.custom.css' />
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>/application/third_party/weekcal/jquery.weekcalendar.css' />
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>/application/third_party/weekcal/full_demo/demo.css' />
	<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js'></script>
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>/application/third_party/weekcal/libs/jquery-ui-1.8rc3.custom.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>/application/third_party/weekcal/jquery.weekcalendar.js'></script>
<style type='text/css'>
/*
<?php 
foreach($th as $tvar)
{
	echo ".wc-cal-event .wc-time  ." . $tvar['cssclass'] . "\n" .
	"{\n" .
		"background-color	: #" . $tvar['color'] . ";\n" .
	"}\n" ;
}
?>

body 
{
	font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
	margin: 0;
}

.row
{
	margin			: 15px;
	padding			: 15px;
}

h1 
{
	margin: 0;
	padding: 0.5em;
}

p.description 
{
	font-size: 0.8em;
	padding: 1em;
	position: absolute;
	top: 3.2em;
	margin-right: 400px;

}

#message 
{
	font-size: 0.7em;
	width: 350px;
	display: none;
	padding: 1em;
	background: #ffc;
	border: 1px solid #dda;
	float: left;
}

.hidden 
{ 
	display				: none; 
}

.unhidden 

{ 
	display				: block; 
	background-color	: #E6EAE9;
	width				: 230px;
	height				: 280px;
	border				: 1px solid;
	border-radius		: 7px;
	padding				: 3px;
}

upopout
{
	display				: block; 
	background-color	: #E6EAE9;
	width				: 220px;
	border				: 1px solid;
	border-radius		: 7px;
	padding				: 3px;
}

#jMonthCalendar .holder
{
	background-color	: #CCCCCC;
	width				: 220px;
	height				: 220px;
	border				: 1px solid;
	border-radius		: 7px;
	padding				: 3px;
	float				: left;
}

#jMonthCalendar .holder .sel
{
	width				: 100px;
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
*/
</style>

<script type='text/javascript'>
/*
	var year 			= new Date('<? echo $ddate; ?>').getFullYear();
	var month 			= new Date('<? echo $ddate; ?>').getMonth();
	var day 			= new Date('<? echo $ddate; ?>').getDate();
	var globalIds 		= new Array();
	var dcell;
	var cell;
	var pcell;
	var stdate			= new Date(<? echo $ddate; ?>);
	
	var eventData 		= 
	{ 
		events : [<?php 
		
		$x 				= 10;
  		$y				= 11;
  		$weekstart		= strtotime($sweek[0]);
  		$json 			= null;
  		$calids			= Array();
  		$today			= strftime("%w", strtotime($ddate));

  		foreach($cal as $key => $value)
  		{		
  			$x++;
			$y++;
				
			$date		= $value['sdate'];
			$edate		= $value['edate'];
			$day		= strtotime($date);
			$days		= floor((($day - 1) - $weekstart) / 86400);
			$dd			= strftime("%d", strtotime($date));
			$mm			= strftime("%m", strtotime($date));
			$yy			= strftime("%Y", strtotime($date));
			$ww			= strftime("%w", strtotime($date));
			$ew			= strftime("%w", strtotime($edate));
			$dayadj 	= floor($ww - $today);
			$edayadj	= floor($ew - $today);
			$dtest 		= 0;			
	
			$type		= $value['type'];
			$title		= $value['title'];
			$fname		= $value['fname'];
			$lname		= $value['lname'];
			$therp		= $value['therapy_name'];
			$calid		= $value['cal_id'];
			$calids[]	= $calid;
			$start		= $value['start'];
			$end		= $value['end'];
			$split		= explode(":", $start);
			$esplit		= explode(":", $end);
			$csscls		= $value['cssclass'];
			$site		= $value['site'];
			$colcode	= $value['colourcode'];

			$json	.= '{
							"id"		: ' . $calid . ', 
							"start"		: new Date(year, month, day + '.$dayadj.', '.$split[0].', '.$split[1].'), 
							"end"		: new Date(year, month, day + '.$edayadj.', '. $esplit[0] .', '.$esplit[1].'),
							"title"		: "'."$therp : $title $fname $lname" .'",
							"CssClass"	: "'.$csscls.'",
							"site"		: "'.$site.'",
							"colcode"	: "'.$colcode.'"
  					},

			';

		}
		$json = substr($json, 0, (strlen($json)-1));
		echo $json;

  		?>]
	};

  		<?php 
  		foreach($calids as $cid)
		{?> 
			globalIds.push(<? echo $cid; ?>); 
	   <?php }?>	

  	var xeventData = 
  	{
		events : 
		[
		   {"id":1, "start": new Date(year, month, day, 12), "end": new Date(year, month, day, 13, 35),"title":"Lunch with Mike"},
		   {"id":2, "start": new Date(year, month, day, 14), "end": new Date(year, month, day, 14, 45),"title":"Dev Meeting"},
		   {"id":3, "start": new Date(year, month, day + 1, 18), "end": new Date(year, month, day + 1, 18, 45),"title":"Hair cut"},
		   {"id":4, "start": new Date(year, month, day - 1, 8), "end": new Date(year, month, day - 1, 9, 30),"title":"Team breakfast"},
		   {"id":5, "start": new Date(year, month, day + 1, 14), "end": new Date(year, month, day + 1, 15),"title":"Product showcase"}
		]
	};


	$(document).ready(function() 
	{
		$('#calendar').weekCalendar
		({
			timeslotsPerHour: 4,
			height: function($calendar)
			{
				return $(window).height() - $("h1").outerHeight();
			},

			eventRender : function(calEvent, $event) 
			{
				if(calEvent.end.getTime() < new Date().getTime()) 
				{
					$event.css("backgroundColor", "#aaa");
					$event.find(".time").css({"backgroundColor": "#999", "border":"1px solid #888"});
				}
			},

			eventNew : function(calEvent, $event) 
			{
				document.getElementById('calendar').ondblclick=function(evt) 
				{
				    evt = (evt || event);
				    showEventDialog(calEvent);

					var date		= new Date(calEvent.start);
					var edate		= new Date(calEvent.end);

					var day			= String(date.getDate());
					var mnt			= String((date.getMonth() + 1));
					var yyr			= date.getFullYear();
					var eday		= String(edate.getDate());
					var emnt		= String((edate.getMonth() + 1));
					var eyyr		= edate.getFullYear();
					
					var yr			= yyr + "-" + mnt + "-" + day;
					var hr			= date.getHours();
					var mn			= date.getMinutes();
					var sdate		= day + "-" + mnt + "-" + yyr;
					var edate		= eday + "-" + emnt + "-" + eyyr;

					day.length < 2 ? day = String("0") + day: day;
					mnt.length < 2 ? mnt = String("0") + mnt: mnt;

					var minArray	= [00,15,30,45];

					document.getElementById('_start_hour').selectedIndex 			= hr.length <2 ? String('0' + hr) : String(hr);
					document.getElementById('_start_min').selectedIndex 			= minArray.indexOf(parseInt(mn));
					document.getElementById('_end_hour').selectedIndex 				= hr + 1;
					document.getElementById('_end_min').selectedIndex 				= minArray.indexOf(parseInt(mn));

					$('#_edate').val(edate);
					$('#_sdate').val(sdate);
					$('#_edorins').val('insert');
					$(".ui-dialog-titlebar").html("Add Event " + day + "-" + mnt + "-" + yyr + ", " + hr + ":" + mn );
					clearEmptys();
				}
				return true;
			},

			eventDrop : function(calEvent, $event) 
			{
				var id 			= calEvent.id;
				var date		= new Date(calEvent.start);
				var edate		= new Date(calEvent.end);
				
				var sday		= String(date.getDate());
				var smnt		= String((date.getMonth() +1 ));
				var syyr		= date.getFullYear();
				var smin		= date.getMinutes();
				var shrs		= date.getHours();
				
				var eday		= String(edate.getDate());
				var emnt		= String((edate.getMonth() + 1));
				var eyyr		= edate.getFullYear();
				var emin		= edate.getMinutes();
				var ehrs		= edate.getHours();

				var sd			= syyr + "-" + smnt + "-" + sday;
				var ed			= eyyr + "-" + emnt + "-" + eday;
				var st			= shrs + ":" + smin + ":00";
				var et			= ehrs + ":" + emin + ":00";

				if(confirm("Save New Event Times?"))
				{
					changeEventTimes(id, sd, ed, st, et);
				}
			},

			eventResize : function(calEvent, $event) 
			{
				var id 			= calEvent.id;
				var date		= new Date(calEvent.start);
				var edate		= new Date(calEvent.end);
				
				var sday		= String(date.getDate());
				var smnt		= String((date.getMonth() +1 ));
				var syyr		= date.getFullYear();
				var smin		= date.getMinutes();
				var shrs		= date.getHours();
				
				var eday		= String(edate.getDate());
				var emnt		= String((edate.getMonth() + 1));
				var eyyr		= edate.getFullYear();
				var emin		= edate.getMinutes();
				var ehrs		= edate.getHours();

				var sd			= syyr + "-" + smnt + "-" + sday;
				var ed			= eyyr + "-" + emnt + "-" + eday;
				var st			= shrs + ":" + smin + ":00";
				var et			= ehrs + ":" + emin + ":00";

				if(confirm("Save New Event Times?"))
				{
					changeEventTimes(id, sd, ed, st, et);
				}			
			},

			eventClick : function(calEvent, $event) 
			{
				var id 			= calEvent.id;

		 		$('.wc-cal-event').dblclick(function(evt) 
		 		{
		 		    evt 		= (evt || event);
		 	 		var churl 	= '<?php echo base_url(); ?>index.php/mycal/getPeriodArray/' + id + '/e/json';
		 	 		
					showEventDialog();

					$.getJSON(churl,function(data)
					{	
						$.each(data, function(index, value) 
						{
							var minArray	= [00,15,30,45];
							$('#_calid').val(parseInt(value.cal_id));
							$('#_contactid').val(parseInt(value.contact_id));
							$('#zow').val(value.title + ' ' + value.fname + ' ' + value.lname);
							$('#_notes').val(value.notes_id);
							//$('#' + value.reminder).checked = true;

							$('.checks').each(function(i, obj) 
							{
							    if(value.reminder != obj.id)
							    {
									obj.checked = null;
							    } 
							    else
							    {
							    	obj.checked = true;
							    }
							});

							document.getElementById('_therapies').selectedIndex 			= value.therapy_id;
							document.getElementById('_etype').selectedIndex 				= value.type;
							var start 														= value.start.split(':');;
							var end 														= value.end.split(':');
							var sh															= start[0].length <2 ? String('0' + start[0]) : String(start[0]);
							var eh															= end[0].length <2 ? String('0' + end[0]) : String(end[0]);
							document.getElementById('_start_hour').selectedIndex 			= sh;
							document.getElementById('_start_min').selectedIndex 			= minArray.indexOf(parseInt(start[1]));
							document.getElementById('_end_hour').selectedIndex 				= eh;
							document.getElementById('_end_min').selectedIndex 				= minArray.indexOf(parseInt(end[1]));

							sdate					= value.sdate.split('-');
							edate					= value.edate.split('-');
							sdate					= sdate[2] + "-" + sdate[1] + "-" + sdate[0];
							edate					= edate[2] + "-" + edate[1] + "-" + edate[0];
							
							$('#_sdate').val(sdate);
							$('#_edate').val(edate);
							$('#_edorins').val('edit');
							$(".ui-dialog-titlebar").html("Edit Event");
						});
					});
		 		});
				return true; 
			},

			eventMouseover : function(calEvent, $event) 
			{
				displayMessage("<strong>Mouseover Event</strong><br/>Start: " + calEvent.start + "<br/>End: " + calEvent.end);
			},

			eventMouseout : function(calEvent, $event) 
			{
				displayMessage("<strong>Mouseout Event</strong><br/>Start: " + calEvent.start + "<br/>End: " + calEvent.end);
			},

			noEvents : function() 
			{
				displayMessage("There are no events for this week");
			},

			calendarBeforeLoad : function(calendar)
			{
				var drf 	= $('#urldate').val();
				var darr	= new Date(drf);
				var yr		= darr.getFullYear();
				var mo		= darr.getMonth() + 1;
				var dd		= darr.getDate();
				var sqld	= yr+"-"+mo+"-"+dd;
		 		var url 	= '<?php echo base_url(); ?>index.php/mycal/getPeriodArray/' + sqld + '/w/json';	
				var thisDay = new Date().getDay();

		 		$.getJSON(url,function(data)
				{	
					$.each(data, function(index, value) 
					{ 
						var locID = parseInt(value.cal_id);
						if($.inArray(locID, globalIds)==-1)
						{
							globalIds.push(locID);

							var split		= value.start.split(":");
							var esplit		= value.end.split(":");
							var dayAdj		= new Date(value.date).getDay() - thisDay;
							var start		= new Date(year, month, (day + dayAdj), split[0]);
							var end			= new Date(year, month, (day + dayAdj), esplit[0], esplit[1]);
							var title		= value.title + " " + value.fname + " " + value.lname + " - " + value.therapy_name;;

							eventData.events.push({"id": parseInt(value.cal_id), "start": start, "end": end, "title": title});
						}
					});
				});

		 		data:eventData;
		 		return true;
			},
			calendarAfterLoad : function(calendar)
			{
				
			},
			changedate: function($calendar, newDate)
			{

			}, 
			data:eventData
		});

		function displayMessage(message) 
		{
			$("#message").html(message).fadeIn();
		}

		$("<div id=\"message\" class=\"ui-corner-all\"></div>").prependTo($(".header-1"));

		$(".wc-next").click(function() 
		{
			var ds		= $('#datehold').val() ? new Date($('#datehold').val()) : new Date();
			var darr 	= ds.getTime() + 604800000;
			var yr		= new Date(darr).getFullYear();
			var mo		= new Date(darr).getMonth() + 1;
			var dd		= new Date(darr).getDate();
			var sqld	= yr+"-"+mo+"-"+dd;

	 		var url 	= '<?php echo base_url(); ?>index.php/mycal/display/w/'+sqld+'/';
	 		window.location.assign(url);
		});

		$(".wc-prev").click(function() 
		{
			var ds		= $('#datehold').val() ? new Date($('#datehold').val()) : new Date();
			var darr 	= ds.getTime() - 604800000;
			var yr		= new Date(darr).getFullYear();
			var mo		= new Date(darr).getMonth() + 1;
			var dd		= new Date(darr).getDate();
			var sqld	= yr+"-"+mo+"-"+dd;
	 		var url 	= '<?php echo base_url(); ?>index.php/mycal/display/w/'+sqld+'/';
	 		window.location.assign(url);
		});
		
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
					window.location.reload(true);
		        },
		        Cancel: function() 
		        {
					$(this).dialog( "close" );
					clearEmptys();
				},
		        "Delete Entry": function() 
		        {
			        deleteEntry($('#_calid').val());
				}
			},
			close: function() 
			{
				$(this).dialog( "close" );
			}
		});

		$( "#addData" ).click(function() 
		{
			$( "#dialog-modal" ).dialog( "open" );
		});

		$( "#newEvent" ).click(function() 
		{
			$( "#addNewEvent" ).dialog( "open" );
			$("#pinfo").validationEngine({promptPosition : "bottomLeft", scroll: false});
		});	 
	});
	function changeEventTimes(id, sd, ed, st, et)
	{
		var url				= '<?php echo base_url()?>index.php/mycal/editEventTimes/';  
		var times 			= new Object;
		times.calid			= id;
		times.sdate			= sd;
		times.edate			= ed;
		times.stime			= st;
		times.etime			= et;
		
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

	function showEventDialog(calEvent)
	{
		//alert('a');
		$("#addNewEvent").dialog("open");
		
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

	function jump()
	{
		$('#calendar').weekCalendar('gotoWeek', new Date($('#urldate').val()));
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
		$('.' + className).remove();
	}

	function grey(x)
	{
		var y	=	x.id;
		document.getElementById(y).style.background = '#CCCCCC';
	}

	function normal(x)
	{
		var y	=	x.id;
		document.getElementById(y).style.background = '#E6EAE9';
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
		        //alert("Error : " + xhr.status);
		        alert(JSON.stringify(text));
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
					window.location.reload(true);
				},
				error		: function(xhr, ajaxOptions) 
				{
			        alert("Error : " + xhr.status);
					window.location.reload(true);
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

	function expand(i)
	{
		var dlist			= [1,2,3,4,5,6,7];

		for(var x = 1; x < (dlist.length + 1); x++)
		{
			var dd			= "dwref-" + x;
			var day 		= document.getElementById(dd);
			if(x !== i)
			{
				document.getElementById(dd).style.width = '7%';
			}
		} 
		var dd			= "dwref-" + i;
		var day 		= document.getElementById(dd);		
		day.width 		= '58%';
	}

	function newContact()
	{
		var url			= '<?php echo base_url()?>index.php/contacts/contacts/newContactForm/';
		var data		= new Object;
		data.header		= "Add Contact";

		$.ajax({
		    type		: "POST",
		    url			: url,
		    cache		: false,
		    data		: data,
		    dataType	: "text",
			success		: function(text) 
			{	
				$('body').append(text);
				setTimeout(valThis,2000);
			}
		});
	}

	function valThis()
	{
		$("#newContactForm").validationEngine({promptPosition : "bottomLeft", scroll: false});
		$("#newContactForm").bind("jqv.form.validating", function(event){
			$("#error_NewContact").html("")
		})
		$("#formID").bind("jqv.form.result", function(event , errorFound)
		{
			if(errorFound) $("#error_NewContact").append('<?php echo $error_message?>');
		});
	} 

	$(function() 
	{
		$( ".datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
	});
	
*/
</script>


<input type = 'hidden' id = 'datehold'>
<input type = 'hidden' id = 'urldate' value = '<?php echo $ddate; ?>'>
	<div id = 'tester'></div>
	<div id='calendar'></div>
	<div id='ajaxGrab'></div>

<script language="javascript">

$(document).ready(function() 
{	
	/*jump();
	
	$('.wc-day-column-header').css({'font-size':'11px'})
	$('.wc-time-slots tr:first').remove();
	$('.wc-grid-timeslot-header').css({'width':'46px'})
	$('.wc-day-column').addClass('backgr');

	var newWidth 		= 10;
	var i 				= 1;

	while(i<7)
	{
		$('#dwref-'+i).css({'width':($('.wc-day-'+i).width()-5)+'px'}); 
		i++;
	}	

	$('.wc-day-column-header').click(function()
	{
		var classList = $(this).attr('class').split(/\s+/);

		$.each( classList, function(index, item)
		{
			var re = new RegExp('[0-9]');
    		if (item.match(re)) 
        	{	
				var m = re.exec(item);
    			resizeColumn(m, newWidth);
			}
		});
	});*/
});



function resizeColumn(column, newWidth)
{
	$('.wc-day-column-header').removeClass('calNewWidth');
	$('.wc-day-column').removeClass('calNewWidth');
	$('.wc-day-'+column).addClass('calNewWidth');
	$('#dwref-'+column).addClass('calNewWidth');
	var i = 1;

	while(i<7)
	{
		if(i != column)
		{
			$('#dwref-'+i).css({'width':($('.wc-day-'+i).width()+1)+'px'}); 
		}
		i++;
	}	
}

</script>

<style type="text/css">

.backgr
{
	/*background-image:url(<?php echo base_url()?>application/libraries/images/bck.gif);*/
}

.wc-today
{
	/*background-image:url(<?php echo base_url()?>application/libraries/images/currentDay.gif);*/
}

.wc-time-header-cell
{
	/*height:70px !important;	*/
}

.calbutton
{
	padding		: 5px;
}

</style>

<!--

<form id="newContactForm">

<span>Field is required : </span>

<input value="" class="validate[required] text-input" type="text" name="req" id="req" />

<input name="" type="button" onclick="validate();" value="hit"/>

</form>

-->

<script language="javascript">
/*
function validate()
{
	$("#newContactForm").validationEngine();
	$('#newContactForm').validationEngine('validate');	
}

$(document).ready(function() 
{
	$("#newContactForm").validationEngine();
})
*/

 
	var year = new Date().getFullYear();
	var month = new Date().getMonth();
	var day = new Date().getDate();

	var eventData = {
		events : [
		   {"id":1, "start": new Date(year, month, day, 12), "end": new Date(year, month, day, 13, 35),"title":"Lunch with Mike"},
		   {"id":2, "start": new Date(year, month, day, 14), "end": new Date(year, month, day, 14, 45),"title":"Dev Meeting"},
		   {"id":3, "start": new Date(year, month, day + 1, 18), "end": new Date(year, month, day + 1, 18, 45),"title":"Hair cut"},
		   {"id":4, "start": new Date(year, month, day - 1, 8), "end": new Date(year, month, day - 1, 9, 30),"title":"Team breakfast"},
		   {"id":5, "start": new Date(year, month, day + 1, 14), "end": new Date(year, month, day + 1, 15),"title":"Product showcase"}
		]
	};


	   
	$(document).ready(function() {

		$('#calendar').weekCalendar({
			timeslotsPerHour: 4,
			height: function($calendar){
				return $(window).height() - $("h1").outerHeight();
			},
			eventRender : function(calEvent, $event) {
				if(calEvent.end.getTime() < new Date().getTime()) {
					$event.css("backgroundColor", "#aaa");
					$event.find(".time").css({"backgroundColor": "#999", "border":"1px solid #888"});
				}
			},
			eventNew : function(calEvent, $event) {
				displayMessage("<strong>Added event</strong><br/>Start: " + calEvent.start + "<br/>End: " + calEvent.end);
				alert("You've added a new event. You would capture this event, add the logic for creating a new event with your own fields, data and whatever backend persistence you require.");
			},
			eventDrop : function(calEvent, $event) {
				displayMessage("<strong>Moved Event</strong><br/>Start: " + calEvent.start + "<br/>End: " + calEvent.end);
			},
			eventResize : function(calEvent, $event) {
				displayMessage("<strong>Resized Event</strong><br/>Start: " + calEvent.start + "<br/>End: " + calEvent.end);
			},
			eventClick : function(calEvent, $event) {
				displayMessage("<strong>Clicked Event</strong><br/>Start: " + calEvent.start + "<br/>End: " + calEvent.end);
			},
			eventMouseover : function(calEvent, $event) {
				displayMessage("<strong>Mouseover Event</strong><br/>Start: " + calEvent.start + "<br/>End: " + calEvent.end);
			},
			eventMouseout : function(calEvent, $event) {
				displayMessage("<strong>Mouseout Event</strong><br/>Start: " + calEvent.start + "<br/>End: " + calEvent.end);
			},
			noEvents : function() {
				displayMessage("There are no events for this week");
			},
			data:eventData
		});

		function displayMessage(message) {
			$("#message").html(message).fadeIn();
		}

		$("<div id=\"message\" class=\"ui-corner-all\"></div>").prependTo($("body"));
		
	});

</script>