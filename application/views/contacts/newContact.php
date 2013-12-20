<!--Michael:working on this file -->
<style type = 'text/css'>

#contact_form
{
	position		: fixed;
	right			: 0;
	width			: 300px;
	background		: #FFFFAA;
	top				: 15%;
	height			: 700px;
	border			: solid 1px black;
	padding-left	: 10px;
	padding-right	: 10px;
	border-radius	: 7px;
}

.nbox
{
	width			: 150px;
}

.xbutton
{
	width			: 140px;
	height			: 40px;
	float			: right;
}

tr
{
	padding			: 5px;
}

td
{
    padding-top		: .3em;
    padding-bottom	: .3em;
}

.center
{
	text-align		: center;
	font-size		: 1.3em;
}

.ctable
{
	padding-top		: -5px;
	font			: Verdana;
	border-collapse	: collapse;
}
.closeButton{
	float:right;	
	margin-top:-10px;
	margin-right:-10px;
}

</style>


<script type="text/javascript">
//consider generic implementation
function hideForm(){
	$('#error_NewContact').html('');
}
$("#cancel").click(function () 
{
   	$('#contact_form').remove();
});
$('.closeButton').click(function(){
	$('#contact_form').remove();	
});
$("#save").click(function () 
{
	//if($('#newContactForm').validationEngine('validate');	
	var saveArray			= new Object;
	saveArray.title			= $('#title').val();
	saveArray.fname			= $('#fname').val();
	saveArray.lname			= $('#lname').val();
	saveArray.ad1			= $('#ad1').val();
	saveArray.ad2			= $('#ad2').val();
	saveArray.ad3			= $('#ad3').val();
	saveArray.ad4			= $('#ad4').val();
	saveArray.city			= $('#city').val();
	saveArray.zip			= $('#zip').val();
	saveArray.tel			= $('#tel').val();
	saveArray.mob			= $('#mob').val();
	saveArray.fax			= $('#fax').val();
	saveArray.email			= $('#email').val();
	saveArray.site			= $('#site').val();
	saveArray.cat			= $('#cat').val();
	saveArray.notes			= $('#notes').val();

	console.log(saveArray);
	var url					= url 	= '<?php echo base_url()?>index.php/contacts/contacts/insertContact/';
	$.getJSON(url, {title:saveArray.title, fname:saveArray.fname, lname:saveArray.lname,address1:saveArray.ad1,address2:saveArray.ad2,address3:saveArray.ad3,address4:saveArray.ad4,zip:saveArray.zip,city:saveArray.city,telno:saveArray.tel,mobile:saveArray.mob,fax:saveArray.fax,email:saveArray.email,sites_id:saveArray.site,contacts_categories_id:saveArray.cat,notes_id:saveArray.notes}, function(data){		
	switch(data.status){
		case 0:
			$('#error_NewContact').html(data.msg);
			setTimeout(hideForm, 5000);
		break;
		case 1:
			$('#error_NewContact').html(data.msg);
		break;	
	}
});
	return false; 
});
</script>

<div id = 'contact_form'>
<img src="<?php echo base_url()?>/assets/images/closeButton.png" class="closeButton"/>

<form id="newContactForm">
<table id = 'ctable' class = 'ctable'>
	<tr style = 'padding:5px'>
		<th colspan = '2' class ='center'>
			<h5><?php echo $header; ?></h5>
            <div id="error_NewContact"></div>
		</th>
	</tr>
	<tr style = 'padding:5px'>
		<td style = 'width:100px'>
			Title
		</td>
		<td>
			<select id = 'title' style = 'width:180px;padding:5px' class="validate[required] text-input">
				<option value = ''> - select - </option>
				<option value = 'Mr'> Mr </option>
				<option value = 'Ms'> Ms </option>
				<option value = 'Mrs'> Mrs </option>
				<option value = 'Miss'> Miss </option>
				<option value = 'Dr'> Doctor </option>
			</select>
		</td>		
	</tr>	
	<tr style = 'padding:5px'>
		<td>
			First Name
		</td>
		<td>
			<input type = 'text' class = 'nbox validate[required] text-input' id = 'fname' style = 'width:170px;padding:5px'>
		</td>				
	</tr>
	<tr style = 'padding:5px'>
		<td>
			Last Name
		</td>		
		<td>
			<input type = 'text' class = 'nbox validate[required] text-input' id = 'lname' style = 'width:170px;padding:5px'>		
		</td>		
	</tr>
	<tr style = 'padding:5px'>
		<td>
			Address
		</td>		
		<td>
			<input type = 'text' class = 'nbox validate[required] text-input' id = 'ad1' style = 'width:170px;padding:5px'>		
		</td>		
	</tr>
	<tr style = 'padding:5px'>
		<td>
			Address
		</td>		
		<td>
			<input type = 'text' class = 'nbox validate[required] text-input' id = 'ad2' style = 'width:170px;padding:5px'>		
		</td>		
	</tr>
	<tr style = 'padding:5px'>
		<td>
			Address
		</td>		
		<td>
			<input type = 'text' class = 'nbox validate[required] text-input' id = 'ad3' style = 'width:170px;padding:5px'>		
		</td>		
	</tr>
	<tr style = 'padding:5px'>
		<td>
			Address
		</td>		
		<td>
			<input type = 'text' class = 'nbox validate[required] text-input' id = 'ad4' style = 'width:170px;padding:5px'>		
		</td>		
	</tr>
	<tr style = 'padding:5px'>
		<td>
			City
		</td>		
		<td>
			<input type = 'text' class = 'nbox validate[required] text-input' id = 'city' style = 'width:170px;padding:5px'>		
		</td>		
	</tr>
	<tr style = 'padding:5px'>
		<td>
			Postcode
		</td>		
		<td>
			<input type = 'text' class = 'nbox validate[required] text-input' id = 'zip' style = 'width:170px;padding:5px'>		
		</td>		
	</tr>
	<tr style = 'padding:5px'>
		<td>
			Telephone
		</td>		
		<td>
			<input type = 'number' class = 'nbox validate[required] text-input' id = 'tel' style = 'width:170px;padding:5px'>		
		</td>		
	</tr>
	<tr style = 'padding:5px'>
		<td>
			Mobile
		</td>		
		<td>
			<input type = 'number' class = 'nbox validate[required] text-input' id = 'mob' style = 'width:170px;padding:5px'>		
		</td>		
	</tr>	
	<tr style = 'padding:5px'>
		<td>
			Fax
		</td>		
		<td>
			<input type = 'number' class = 'nbox validate[required] text-input' id = 'fax' style = 'width:170px;padding:5px'>		
		</td>		
	</tr>	
	<tr style = 'padding:5px'>
		<td>
			Email
		</td>		
		<td>
			<input type = 'email' class = 'nbox validate[required] text-input' id = 'email' style = 'width:170px;padding:5px'>		
		</td>		
	</tr>
	<tr style = 'padding:5px'>
		<td>
			Notes
		</td>		
		<td>
			<textarea type = 'text' class = 'nbox validate[required] text-input' id = 'notes' style = 'width:170px;padding:5px'>		</textarea>
		</td>		
	</tr>
	
	<tr style = 'padding:5px'>
		<td>
			Category
		</td>		
		<td>
			<select id = 'cat' style = 'width:180px;padding:5px' class="validate[required] text-input">
				<option value = ''> - select - </option>
				<?php 
					foreach ($categories as $key => $value)
					{
						$k	= $value['id'];
						$v	= $value['contact_type'];
						echo "<option value = '$k'>$v</option>";							
					}
				?>
			</select>	
		</td>		
	</tr>
	<tr style = 'padding:5px'>
		<td>
			Default Site
		</td>		
		<td>
			<select id = 'site' style = 'width:180px;padding:5px' class="validate[required] text-input">
				<option value = ''> - select - </option>
				<?php 
					foreach ($sites as $key => $value)
					{
						$k	= $value['id'];
						$v	= $value['name'];
						echo "<option value = '$k'>$v</option>";							
					}
				?>
			</select>
		</td>		
	</tr>		
	<tr style = 'padding:5px'>
		<td colspan = '2'>
			<button id = 'cancel' class = 'xbutton'>Cancel</button>
			<button id = 'submit' class = 'xbutton'>Save</button>		
		</td>		
	</tr>
	
</table>
</form>
</div>
