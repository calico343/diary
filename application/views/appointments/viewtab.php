<?php 
$stat = 'text';
//$stat = 'hidden';
?>
	<div class = 'holder'>		
		<table  style = 'width:100%; font-size:8pt;' class = 'table'>
		<tr>
			<td colspan = '2' class = 'tabhead' align = 'center'></td>
		</tr>
		<tr>
			<td class = 'col1'>
				Name
			</td>
			<td class = 'col2'>
				<input type = 'text' id ='zow' style = 'width:150px' onkeyup = 'checker(this)' >
				<input type = '<?php echo $stat; ?>' id ='_contactid'>
				<input type = '<?php echo $stat; ?>' id ='_calid'>
				<input type = '<?php echo $stat; ?>' id ='_edate'>
				<input type = '<?php echo $stat; ?>' id ='_edorins'>
			</td>
		</tr>
		<tr>	
			<td class = 'col1'>
				Start
			</td>
			<td class = 'col2'>
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
		<tr>
			<td class = 'col1'>
				End
			</td>
			<td class = 'col2'>
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
		<tr>
			<td class = 'col1'>
				Treatment
			</td>
			<td class = 'col2'>
				<select id = '_therapies' style = 'width:150px'>
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
		<tr>
			<td class = 'col1'>
				Notes
			</td>
			<td class = 'col2'>
				<textarea rows="4" cols="20" id = '_notes' style = 'width:150px'></textarea>
			</td>
		</tr>
		<tr>
			<td colspan = '2'>
				<button onclick = 'cancelEntry()' style = 'width:70px; height:30px'>Cancel</button>
				<button onclick = 'saveEntry()' style = 'width:70px; height:30px'>Save</button>
				<button onclick = 'deleteEntry()' style = 'width:70px; height:30px'>Delete</button>
			</td>
		</tr>
		</table>
	</div>

	
	
	
	
	
	
	
	