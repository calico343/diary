
<link rel="stylesheet" href="<?php echo base_url(); ?>/application/third_party/monthcal/css/core.css" type="text/css" />
		
<script src="<?php echo base_url(); ?>/application/third_party/monthcal/js/jquery-1.3.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>/application/third_party/monthcal/js/jMonthCalendar.js" type="text/javascript"></script>

<style type="text/css" media="screen">
#jMonthCalendar .Meeting { background-color: #DDFFFF;}
#jMonthCalendar .Birthday { background-color: #DD00FF;}
#jMonthCalendar #Event_3 { background-color:#0000FF; }
</style>	
	
    <script type="text/javascript">
        $().ready(function() 
        {
			var options = 
			{
				height		: 650,
				width		: 1180,
				navHeight	: 25,
				labelHeight	: 25,
				onMonthChanging: function(dateIn) 
				{					
					var mn			= parseInt(dateIn.getMonth()) + 1;
					var yr			= dateIn.getFullYear();
					var dd			= dateIn.getDay();
					var date		= yr + "-" + mn + "-" + dd; 
					
					url 			= '<?php echo base_url()?>index.php/mycal/getPeriodArray/' + date + '/m' ;

					$.ajax({
						type		: "GET",
						url			: url,
						dataType	: "html",
						success		: function(html) 
						{
							alert((html));
						}
					});
					//alert(url);
					//var events = [ 	{ "EventID": 7, "StartDate": new Date(2009, 1, 1), "Title": "10:00 pm - EventTitle1", "URL": "#", "Description": "This is a sample event description", "CssClass": "Birthday" },
					//				{ "EventID": 8, "StartDate": new Date(2009, 1, 2), "Title": "9:30 pm - this is a much longer title", "URL": "#", "Description": "This is a sample event description", "CssClass": "Meeting" }
					//];
					//$.jMonthCalendar.ReplaceEventCollection(events);
					return true;
				},
				onEventLinkClick: function(event) { 
					alert("event link click");
					return true; 
				},
				onEventBlockClick: function(event) { 
					alert("block clicked");
					return true; 
				},
				onEventBlockOver: function(event) {
					//alert(event.Title + " - " + event.Description);
					return true;
				},
				onEventBlockOut: function(event) {
					return true;
				},
				onDayLinkClick: function(date) { 
					alert(date.toLocaleDateString());
					return true; 
				},
				onDayCellClick: function(date) { 
					alert(date.toLocaleDateString());
					return true; 
				}
			};
			
			var events = 
			[ 	
				{ "EventID": 1, "Date": "new Date(2012, 12, 1)", "Title": "10:00 pm - Crash", "URL": "#", "Description": "Crash", "CssClass": "Birthday" },
				{ "EventID": 1, "StartDateTime": new Date(2012, 12, 12), "Title": "10:00 pm - Two", "URL": "#", "Description": "Two", "CssClass": "Birthday" },
				{ "EventID": 2, "Date": "2012-12-28T00:00:00.0000000", "Title": "9:30 pm - three", "URL": "#", "Description": "This is a sample event description", "CssClass": "Meeting" },
				{ "EventID": 3, "StartDateTime": new Date(2012, 12, 20), "Title": "9:30 pm - four", "URL": "#", "Description": "This is a sample event description", "CssClass": "Meeting" },
				{ "EventID": 4, "StartDateTime": "2012-12-14", "Title": "9:30 pm - five", "URL": "#", "Description": "This is a sample event description", "CssClass": "Meeting" }
			];
			
			var events = [<?php 
	  			
	  			$x = 0;
	  			
	  			$json = null;
	  			
	  			foreach($cal as $key => $value)
	  			{
					$x++;
					
					$date	= $value['date'];
					$dd		= strftime("%d", strtotime($date));
					$mm		= strftime("%m", strtotime($date));
					$yy		= strftime("%Y", strtotime($date));
					
					$title	= $value['notes_id'];
					$start	= $value['start'];
					
					$json	.= '{ 
									"EventID": ' . $key . ',
					 				"StartDateTime": "'.$yy.'-'.$mm.'-'.$dd.'", 
					 				"Title": "'.$start .' - '. $title.' - '.'",
					 				"URL": "#",
					 				"Description": "'.$title.'",
					 				"CssClass": "Meeting"
					 			},';
	  				
	  			}
	  			$json = substr($json, 0, (strlen($json)-1));
	  			echo $json;
	  			
	  		?>];

			
			var newoptions = { };
			var newevents = [ ];
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
        });
    </script>
</head>


	<center>
		<div id="jMonthCalendar"></div>


	</center>
		<button id="Button">Add More Events</button>

		<button id="ChangeMonth">Change Months May 2009</button>


