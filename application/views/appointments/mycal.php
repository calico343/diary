<!DOCTYPE HTML>
<html lang="en-UK">
<head>
<title>My Calendar</title>
<meta charset="UTF-8">
<style type="text/css">
	
	.calendar 
	{
		font-family: Arial; font-size: 12px;
	}
	table.calendar 
	{
		margin: auto; border-collapse: collapse;
	}
	.calendar .days td 
	{
		width: 150px; height: 120px; padding: 4px;
		border: 1px solid #999;
		vertical-align: top;
		background-color: #DEF;
	}
	.calendar .days td:hover 
	{
		background-color: #FFF;
	}
	.calendar .highlight 
	{
		font-weight: bold; color: #00F;
	}
	
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
</head>
<body>
<?php 
echo $calendar; 
if($data)
{
	echo "<script>alert('£Data')</script>";
}
else 
{
	echo "<script>alert('NO £Data')</script>";
}

if($cal_data)
{
	echo "cal Data found";
}
else 
{
	echo "cal Data NOT found";
}
if($header_data)
{
	echo "header Data found";
}
else 
{
	echo "header Data NOT found";
}
?>

<?php echo form_open()?>
<script type="text/javascript">

	$(document).ready(function() 
	{
		$('.calendar .day').click(function() 
		{
			day_num 		= $(this).find('.day_num').html();
			if(day_num.length == 1)
			{
				day_num = 0 + day_num;
			}
			
			day_data 		= prompt('Enter Stuff', $(this).find('.content').html());
			
			url = 			'<?php echo base_url()?>index.php/mycal/display/<?php echo $year?>/<?php echo $month?>';
			console.log(day_data);
			if (day_data 	!= null) 
			{
				console.log('##');
				console.log(url);
				$.post(url,{day:day_num, data:day_data, csrf_test_name: $("input[name=csrf_test_name]").val()}, function(msg) 
					{
						location.reload();
					}						
				);	
			}
		});
	});
		
</script>
</form>
</body>
</html>