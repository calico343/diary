//make autocomplete
$(document).ready(function() {
	 
	$('.editButton').live('click',function(){
		$('#contactID').val($(this).data("id"));
		$('#hdnContactID').val($(this).data("id"));
		var oTable = $('#alternateAddresses').dataTable();
  		oTable.fnDestroy();
		//consider post processing JS
		$('#alternateAddresses').dataTable({
						"aaSorting": [ [0,'asc'], [1,'asc'] ],  
          				"bPaginate": false,
				    	"bLengthChange": false,
				        "bFilter": true,
				        "bSort": false,
			    	    "bInfo": false,
          				"bAutoWidth": false,
		  				"bProcessing": true,
          				"sAjaxSource": "../../../index.php/contacts/contacts/getAlternativeAddresses/"+$('#hdnContactID').val()
      					});
		$('#alertBox').removeClass('alertBoxError');
		$('#alertBox').removeClass('alertBox');
		 
		$.getJSON("getContactInfo", {cid: $(this).data("id")}, function (result) {
			console.log(result.data);
			var obj = result.data[0];
			$('#title').val(obj.Title);
			$('#lname').val(obj.Surname);
			$('#fname').val(obj.Firstname);
			$('#firstname').val(obj.Salutation);
			$('#typeFld').val(obj.AddName);
			$('#initials').val(obj.Initials);
			$('#addressee').val(obj.Addresse);
			$('#middlename').val(obj.Midname);
			$('#ad1').val(obj.Address1);
			$('#ad2').val(obj.Address2);
			$('#ad3').val(obj.Address2b);
			$('#city').val(obj.Address3);
			$('#countyFeild').val(obj.County);
			$('#countryFeild').val(obj.Country);
			$('#zip').val(obj.PostCode);
			$('#tel').val(obj.Phone);
			$('#mob').val(obj.Mobile);
			$('#fax').val(obj.Fax);
			$('#email').val(obj.Email);
			$('#mailSort').val(obj.Mailsort);
			$('#website').val(obj.Website);
			$('#PCode').val(obj.PCode);
			$('#hdnPCode').val(obj.PCode);
			$('#regionCode').val(obj.regionCode);
			$('#contactID').val(obj.CID);
			$('#notes').val(obj.OtherComm);
			$("#mailSort").val(obj.MailSort);
			$("#addNewContact").dialog("open");
			$("#pinfo").validationEngine({promptPosition : "bottomLeft", scroll: false});
			$("#PCode").prop('disabled', true);
		});
	});
	$('.deleteButton').live('click',function(){
		$("#dialog-Delete").dialog('open');
		$('#deleteID').val($(this).data("id"));
	}); 
	
	$('#pSearch').on('keyup', function(e){
			e.preventDefault();
			//in case we want to add some more keypress functions
			switch(e.keyCode){
				default:
				if($('#pSearch').val().length >=0){
					$.getJSON("flysearch", {keyword: $('#pSearch').val()}, function (data) {
						var posts_per_page 	= parseInt($('#posts_per_page').val());
						var num_posts 		= 0;
						generateTable(data,posts_per_page,num_posts,1)
					});
				}
				break;
			}
	});
	$('#pSearch').on('blur', function(){

	});
});

$('#next_button').on('click',function(){
	var page			= parseInt($('#page').val());
	page++;
	$('#page').val(page);
	$.getJSON("flysearch", {keyword: $('#pSearch').val(),'page':page}, function (data) {
		var posts_per_page 	= parseInt($('#posts_per_page').val());
		var num_posts 		= 0;
		generateTable(data,posts_per_page,num_posts,page)
	});
});
$('#previous_button').on('click',function(){
	var page			= parseInt($('#page').val());
	page--;
	$('#page').val(page);
	$.getJSON("flysearch", {keyword: $('#pSearch').val(),'page':page}, function (data) {
		var posts_per_page 	= parseInt($('#posts_per_page').val());
		var num_posts 		= 0;
		generateTable(data,posts_per_page,num_posts,page)
	});
});
function generateTable(data,posts_per_page,num_posts){
	var tSearchResults 	= '<tbody><tr class="tdHeader"><td class="third">Surname</td><td class="third">Firstname</td><td class="third">Postcode</td><td>Actions</td></tr>'
	//alert(data.data.length);
	//find some solution for the ../s
	$.each(data.data, function(k,v){
		tSearchResults +='<tr><td class="third">'+v.Surname+'</td><td class="third">'+v.Firstname+'</td><td class="third">'+v.PostCode+'</td><td><button value="Edit" class="editButton" data-id="'+v.CID+'">Edit</button><button value="Delete" class="deleteButton" data-id="'+v.CID+'">Delete</button></td></tr>'
		console.log(v);
		num_posts++;
	});
	tSearchResults +='</tbody>';
	//alert(tSearchResults);
	$('#tSearchResults').html(tSearchResults);
	
	if(data.show_next_page_button==true){
		$('#next_button').attr('disabled',false);
	}else{
		$('#next_button').attr('disabled',true);
	}
	var page			= parseInt($('#page').val());
	if(page==0){
		$('#previous_button').attr('disabled',true);
	}else{
		$('#previous_button').attr('disabled',false);
	}
}