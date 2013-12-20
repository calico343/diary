<!DOCTYPE html>
<html>
<head>

<title>Calendar View</title>

<style type="text/css">

	.calendar
	{
		font-family 		: Arial;
		font-size			: 12px;
	}
	
	table.calendar
	{
		margin				: auto;
		border-collapse		: collapse;
	}	
	
	.calendar .days td
	{
		width				: 80px;
		height				: 80px;
		padding				: 4px;
		border				: 1px solid #999;
		vertical-align		: top;
		background-color	: #DEF;
	}
	
	.calendar .days td:hover
	{
		background-color	: #FFF;
	}
	
	.calendar.highlight
	{
		font-weight			: bold;
		color				: #00F;
	}
</style>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<!--  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script> -->


</head>
<body>
	<?php echo $calendar; ?>
<script type="text/javascript">

	$(document).ready(function() 
	{
		$('.calendar .day').click(function()
		{
			day_num 		= $(this).find('.day_num').html();
			day_data	 	= prompt("Enter", $(this).find('.content').html());
			url				= window.location;
			data			= {day	: day_num, data: day_data};
			
			//url				= url + "?day=" + day_num + "&data=" + day_data;
			
			if(day_data != null)
			{
				$.ajax({
					url		: url,
					data	: data,		
					type	: "POST",
					success	: function(msg)
					{
						alert("success");
						location.reload();
					},
					failure	: function()
					{
						alert("fail");
					}
				});
			}
		});
	});	

</script>

</body>
</html>