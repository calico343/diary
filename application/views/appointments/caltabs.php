<?php  
//$stat = 'text';
$stat = 'hidden'; 
?>
<style type = 'text/css'>

#addNewContactTable 
{
	width				: 410px;
	margin				: 0px;
	float				: right;
	margin-right		: -5px;
	height				: 371px;
}

.hidden 
{ 
	display				: none; 
}

.table
{
	border-spacing		: 0;
	border-collapse		: collapse;
	margin-top			: -20px;
}

.bottom-panel
{
	background			: #EEEEEE;
	bottom				: 0px;
	height				: 38px;
	border-radius		: 3pt;
	border				: grey 1pt solid;
	align				: center;
	width				: 413px;
	margin-top			: 40px;
	margin-left			: -3px;
}

.bottom-inner
{
	margin-top			: 10px;
	margin-bottom		: 10px;
	align				: center;
}

.tab
{
	height				: 280px;
}

#_notes
{
	height: 110px;
	margin-bottom: 10px;
}

.checks
{
	margin-left			: 30px;
}

.conList
{
	width				: 380px;
	margin				: auto;
	height				: 230px;
	background			: #EEEEEE;
	border-radius		: 5px;
	padding				: 10px;
	overflow			: scroll;
	margin-right		: -60px;
}
</style>

<script type="text/javascript">

$(document).ready(function()
{
	$('.ui-tabs-anchor').click(function()
	{
		$(this).attr("aria-selected",true);
		alert($(this).attr('aria-controls'));
		$('.ui-tabs-panel').hide();
		$('#tabs-2').show();
	});
});

</script>

<div class = 'hidden'>
<div id='addNewEvent' >   <!-- Modal Add event Dialog content -->
<div>
<!--
<div id="tabs" style="font-size:11px !important;">
<ul>
<li style="font-size:11px !important;"><a href="#tabs-1">Main</a></li>
</ul>
<div id="tabs-1">content</div>
</div>
-->
<div id="addNewContactTable" style="font-size:11px !important;" >

  <ul>
    <li><a href="#tabs-1">Date / Time / Therapy</a></li>
    <li><a href="#tabs-2">Patient Details</a></li>
    <li><a href="#tabs-3">Cancellation List</a></li>
  </ul>

<div id="tabs-1" class = 'tab'>
		<table  style = 'width:400px; font-size:8pt;' class = 'table'>
			<tr class = 'row'>
				<td colspan = 2 align = 'left'>
					<h2>Appointment Details</h2>
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
				<td class = 'col1'>
					Therapy
				</td>
				<td class = 'col2'>
					<select id = '_therapies' class = 'dcell'>
					<option value = ''> - Please Select - </option>
					<?php 
						foreach($th as $arr)
						{
							$id				= $arr['id'];
							$name			= $arr['name'];
							echo "<option value = '$id'>$name</option>";	
						}
					?>
					</select>
				</td>
			</tr>
			
	  		<tr class = 'row'>
				<td>Event Type</td>
				<td>
					<select id = '_etype' class = 'dcell'>
						<option value = ''> - please select - </option>
						<?php 
							foreach($apTypeData as $key => $val)
							{
								echo "<option value = '$key'>$val</option>";	
							}
						?>
						
					</select>	
						
				</td>
			</tr>	
			<tr class = 'row'>
				<td class = 'col1' style = 'vertical-align:middle'>
					Notes
				</td>
				<td class = 'col2'>
					<textarea rows="4" cols="20" id = '_notes' class = 'dcell'></textarea>
				</td>
			</tr>
	<!-- 		<tr class = 'row'>
				<td colspan = '2'>
					<button onclick = 'cancelEntry()' style = 'width:70px; height:30px'>Cancel</button>
					<button onclick = 'saveEntry()' style = 'width:70px; height:30px'>Save</button>
					<button onclick = 'deleteEntry()' style = 'width:70px; height:30px'>Delete</button>
				</td>
			</tr>    -->
		</table>
	
</div>


<div id="tabs-2"  class = 'tab'>
  	<table style = 'width:400px; font-size:8pt;' class = 'table'>
  		<tr class = 'row'>
			<td colspan = 2 align = 'left'>
				<h2>Patient Details</h2>
			</td>
		</tr>
 		<tr class = 'row'>
			<td class = 'col1'>
				Name
			</td>
			<td class = 'col2'>
				<input type = 'text' id ='zow' class = 'dcell' style = 'width:93%' onkeyup = 'checker(this)' >
				<input type = '<?php echo $stat; ?>' id ='_contactid'>
				<input type = '<?php echo $stat; ?>' id ='_calid'>
				<input type = '<?php echo $stat; ?>' id ='_edorins'>
			</td>
		</tr>
		</tr>
	</table>
	<div class = 'conList'>
	
	</div>
	
</div>


<div id="tabs-3"  class = 'tab'>
  	<table style = 'width:400px; font-size:8pt;' class = 'table'>
		<tr class = 'row'>
			<td colspan = 2 align = 'center'>
				<h2>Cancellation List</h2>
			</td>
		</tr>
  	</table>
</div>


<div class='bottom-panel'>
	<div class='bottom-inner'> 
		&nbsp;&nbsp;&nbsp;Reminder : 
		<input type="checkbox" name="reminder" value="Phone" class = 'checks' id = 'phone'> Phone
		<input type="checkbox" name="reminder" value="Text"  class = 'checks' id = 'text'> Text
		<input type="checkbox" name="reminder" value="Email" class = 'checks' id = 'email'> Email
	</div>
</div>	

</div>


</div>

<script type="text/javascript">

$(document).ready(function()
{
	$('.checks').click(function()
	{
		var id = this.id;
		$('.checks').each(function(i, obj) 
		{
		    if(id != obj.id)
		    {
				obj.checked = null;
		    } 
		});
	});
});

</script>
</div>
