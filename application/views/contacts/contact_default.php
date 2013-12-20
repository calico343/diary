<!--Working on this Mike-->

<div id="search_Results">

<table width="100%" border="0" style="border:0px;">

  <tr>

    <td colspan="2">&nbsp;</td>

    <td width="80%"><input id="newContact" type="button" value="New Contact" style="float:right;" /></td>

  </tr>

  <tr>

    <td colspan="2">Surname</td>

    <td><input id="pSearch" type="text" value="Search For Contacts Here" size="26" maxlength="26" onClick="this.value = '';"></td>

  </tr>

  </table>

  <br>

  <br>

<table  border="0" width="100%" id="tSearchResults">

  <tbody>

  	<tr class="tdHeader">

    	<td>Surname</td>

    	<td>Firstname</td>

    	<td>Postcode</td>

  	</tr>

  </tbody>

</table>

<input name="Previous" type="button" value="Previous" id="previous_button" disabled="disabled" style="float:left;">

<input name="Next" type="button" value="Next" id="next_button" disabled="disabled" style="float:right;">

</div>

<p>&nbsp;</p>

 <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />

  <script src="http://code.jquery.com/jquery-1.8.3.js"></script>

  <script src="/resources/demos/external/jquery.bgiframe-2.1.2.js"></script>

  <script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>

  <link rel="stylesheet" href="/resources/demos/style.css" />

  <script src="<?php echo base_url()?>assets/js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>

  <script src="<?php echo base_url()?>assets/js/jquery.validationEngine.js"></script>

  <script src="<?php echo base_url()?>assets/js/jquery.dataTables.js"></script>

  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery.dataTables.css"  />

  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery.dataTables_themeroller.css"  />

  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/demo_table_jui.css"  />

    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/demo_table.css"  />

  <script>

  //consider generic implementation

  (function ($) {

      $.widget("ui.combobox", {

          _create: function () {

              var input,

              that = this,

                  wasOpen = false,

                  select = this.element.hide(),

                  selected = select.children(":selected"),

                  value = selected.val() ? selected.text() : "",

                  wrapper = this.wrapper = $("<span>")

                      .addClass("ui-combobox")

                      .insertAfter(select);



              function removeIfInvalid(element) {

                  var value = $(element).val(),

                      matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(value) + "$", "i"),

                      valid = false;

                  select.children("option").each(function () {

                      if ($(this).text().match(matcher)) {

                          this.selected = valid = true;

                          return false;

                      }

                  });



                  if (!valid) {

                      // remove invalid value, as it didn't match anything

                      $(element)

                          .val("")

                          .attr("title", value + " didn't match any item")

                          .tooltip("open");

                      select.val("");

                      setTimeout(function () {

                          input.tooltip("close").attr("title", "");

                      }, 2500);

                      input.data("ui-autocomplete").term = "";

                  }

              }



              input = $("<input>")

                  .appendTo(wrapper)

                  .val(value)

                  .attr("title", "")

                  .addClass("ui-state-default ui-combobox-input")

                  .autocomplete({

                  delay: 0,

                  minLength: 0,

                  source: function (request, response) {

                      var matcher = new RegExp($.ui.autocomplete.escapeRegex(request.term), "i");

                      response(select.children("option").map(function () {

                          var text = $(this).text();

                          if (this.value && (!request.term || matcher.test(text))) return {

                              label: text.replace(

                              new RegExp(

                                  "(?![^&;]+;)(?!<[^<>]*)(" + $.ui.autocomplete.escapeRegex(request.term) +

                                  ")(?![^<>]*>)(?![^&;]+;)", "gi"), "<strong>$1</strong>"),

                              value: text,

                              option: this

                          };

                      }));

                  },

                  select: function (event, ui) {

                      ui.item.option.selected = true;

                      that._trigger("selected", event, {

                          item: ui.item.option

                      });

                  },

                  change: function (event, ui) {

                      if (!ui.item) {

                          removeIfInvalid(this);

                      }

                  }

              })

                  .addClass("ui-widget ui-widget-content ui-corner-left");



              input.data("ui-autocomplete")._renderItem = function (ul, item) {

                  return $("<li>")

                      .append("<a>" + item.label + "</a>")

                      .appendTo(ul);

              };



              $("<a>")

                  .attr("tabIndex", -1)

                  .attr("title", "Show All Items")

                  .tooltip()

                  .appendTo(wrapper)

                  .button({

                  icons: {

                      primary: "ui-icon-triangle-1-s"

                  },

                  text: false

              })

                  .removeClass("ui-corner-all")

                  .addClass("ui-corner-right ui-combobox-toggle")

                  .mousedown(function () {

                  wasOpen = input.autocomplete("widget").is(":visible");

              })

                  .click(function () {

                  input.focus();



                  // close if already visible

                  if (wasOpen) {

                      return;

                  }



                  // pass empty string as value to search for, displaying all results

                  input.autocomplete("search", "");

              });



              input.tooltip({

                  tooltipClass: "ui-state-highlight"

              });

          },



          _destroy: function () {

              this.wrapper.remove();

              this.element.show();

          }

      });

  })(jQuery);



  $(function () {

      $("#combobox").combobox();

      $("#toggle").click(function () {

          $("#combobox").toggle();

      });

  });



  function hideForm() {

      $('#error_NewContact').html('');

  }

  $(function () {

      $("#tabs").tabs();



      $("#dialog-modal").dialog({

          autoOpen: false,

          height: 500,

          width: 500,

          modal: true,

          buttons: {

              "Add Address": function () {
				  
				  if (!$("#alternateAddress").validationEngine('validate')) {
                      return false
                  }
			
		          var url = url = '<?php echo base_url()?>index.php/contacts/contacts/insertContactAddress/';
        		  $.post(url, {
        	      		address1: 		$('#ad1Addr').val(),
		    	        address2: 		$('#ad2Addr').val(),
              			address3: 		$('#ad3Addr').val(),
              			countryField: 	$('#countryFeild').val(),
              			zip: 			$('#zipAddr').val(),
              			city: 			$('#cityAddr').val(),
              			telno: 			$('#telAddr').val(),
              			mobile: 		$('#mobAddr').val(),
		                fax: 			$('#faxAddr').val(),
          			    email: 			$('#emailAddr').val(),
		                sites_id: 		$('#websiteAddr').val(),
          			    countyFeild: 	$('#countyFieldAddr').val(),
              			typeFld:  		$('#typeFld').val(),
              			CID: 			$('#hdnContactID').val()
          		}, function (data) {
              		var obj = jQuery.parseJSON(data);
              		switch (obj.status) {
                  	case 0:
					//need to add error handling here
					//alert('hit'); 
                      //$('#error_NewContact').html(obj.msg);
                      //setTimeout(hideForm, 5000);
					  var oTable = $('#alternateAddresses').dataTable();
  					  oTable.fnDestroy();
					  $('#alternateAddresses').dataTable({
						"aaSorting": [ [0,'asc'], [1,'asc'] ],  
          				"bPaginate": false,
				    	"bLengthChange": false,
				        "bFilter": true,
				        "bSort": false,
			    	    "bInfo": false,
          				"bAutoWidth": false,
		  				"bProcessing": true,
          				"sAjaxSource": "<?php echo base_url()?>index.php/contacts/contacts/getAlternativeAddresses/"+$('#hdnContactID').val()
      					});
                      break;
                  	case 1:
                      //$('#error_NewContact').html(obj.msg);
                      //$('#error_NewContact').html(obj.msg);
                      //setTimeout(hideForm, 5000);
					  var oTable = $('#alternateAddresses').dataTable();
  					  oTable.fnDestroy();
					  $('#alternateAddresses').dataTable({
						"aaSorting": [ [0,'asc'], [1,'asc'] ],
          				"bPaginate": false,
				    	"bLengthChange": false,
				        "bFilter": true,
				        "bSort": false,
			    	    "bInfo": false,
          				"bAutoWidth": false,
		  				"bProcessing": true,
          				"sAjaxSource": "<?php echo base_url()?>index.php/contacts/contacts/getAlternativeAddresses/"+$('#hdnContactID').val()
      					});
                    break;
              		}
          		});
          		return false;
              },
              Cancel: function () {
                  $(this).dialog("close");
              }
          },
          close: function () {}
      });


$("#dialog-WarningNoRecordID").dialog({
    modal: true,
    autoOpen: false,
    title: "No User Selected",
    buttons: [{
        text: "Close",
        click: function () {
            $(this).dialog("close");
        },
    }]
});


	  $("#dialog-Delete").dialog({

		modal: true,  

		autoOpen: false,

        title: "Delete Contact",

        buttons:

            [

              {

                  text: "Delete",

                  click: function() {

                    $(".my-custom-button-class > .ui-button-text").text("Please Wait..."); 

					$.getJSON("delete", {CID: $('#deleteID').val()}, function (data) {

						$(".my-custom-button-class > .ui-button-text").hide(); 

						$(".my-close-button-class > .ui-button-text").text("Close"); 

						$('#pSearch').keyup();

						$('#deleteMessage').html('Contact Deleted');

					});

                  },

                  'class': 'my-custom-button-class'

              },

			  {

                  text: "Cancel",

                  click: function() {

                    $(this).dialog("close");

                  },

				  'class': 'my-close-button-class'

              }

            ]

      });	

      $("#addNewContact").dialog({

          autoOpen: false,

          height: 675,

          width: 1100,

          modal: true,

          buttons: {

              "Add New Contact": function () {

                  //alert('hit');

                  //if($('#newContactForm').validationEngine('validate');	

                  if (!$("#pinfo").validationEngine('validate')) {

                      return false;

                  }

                  var saveArray = new Object;

                  saveArray.title = $('#title').val();

                  saveArray.fname = $('#fname').val();

                  saveArray.lname = $('#lname').val();

                  saveArray.initials = $('#initials').val();

                  saveArray.addressee = $('#addressee').val();

                  saveArray.middlename = $('#middlename').val();

                  saveArray.typeFld = $('#typeFld').val();

                  saveArray.mailSort = $('#mailSort').val();

                  saveArray.countyFeild = $('#countyFeild').val();

                  saveArray.countryFeild = $('#countryFeild').val();

                  saveArray.ad1 = $('#ad1').val();

                  saveArray.ad2 = $('#ad2').val();

                  saveArray.ad3 = $('#ad3').val();

                  saveArray.city = $('#city').val();

                  saveArray.zip = $('#zip').val();

                  saveArray.tel = $('#tel').val();

                  saveArray.mob = $('#mob').val();

                  saveArray.fax = $('#fax').val();

                  saveArray.email = $('#email').val();

                  saveArray.site = $('#website').val();

                  saveArray.notes = $('#notes').val();

				  if($('#hdnPCode').val()==''){

                  	saveArray.PCode = $('#PCode').val();

				  }else{

					saveArray.PCode = $('#hdnPCode').val();

				  }

                  saveArray.Salutation = $('#firstname').val();

				  saveArray.hdnContactID = $('#hdnContactID').val();

					//alert($('#hdnPCode').val());

                  console.log(saveArray);

                  var url = url = '<?php echo base_url()?>index.php/contacts/contacts/insertContact/';

                  $.post(url, {

                      title: saveArray.title,

                      fname: saveArray.fname,

                      lname: saveArray.lname,

                      address1: saveArray.ad1,

                      address2: saveArray.ad2,

                      address3: saveArray.ad3,

                      countryFeild: saveArray.countryFeild,

                      zip: saveArray.zip,

                      city: saveArray.city,

                      telno: saveArray.tel,

                      mobile: saveArray.mob,

                      fax: saveArray.fax,

                      email: saveArray.email,

                      sites_id: saveArray.site,

                      countyFeild: saveArray.countyFeild,

                      notes_id: saveArray.notes,

                      typeFld: saveArray.typeFld,

					  mailSort: saveArray.mailSort,

                      middlename: saveArray.middlename,

                      initials: saveArray.initials,

                      addressee: saveArray.addressee,

                      Salutation: saveArray.Salutation,

                      PCode: saveArray.PCode,

					  hdnContactID: saveArray.hdnContactID

                  }, function (data) {

                      var obj = jQuery.parseJSON(data);

                      switch (obj.status) {

                          case 0:

						  	  $('#alertBox').html(obj.msg);

                              $('#alertBox').addClass('alertBox');

                              //setTimeout(closeDialog, 2000);

                              $('#pSearch').keyup();
							  
							  //for adding new contact
							   $('#hdnContactID').val(obj.cid);

                          break;

                          case 1:

                              //$('#error_NewContact').html(obj.msg);

                              //setTimeout(hideForm, 5000);

                              $('#alertBox').html(obj.msg);

                              $('#alertBox').addClass('alertBoxError');

                          break;

                      }

                      //sessionStorage.setItem("CID", obj.cid);

                      //alert(obj.cid);

                  });

                  return false;

              },

              Cancel: function () {

                  $(this).dialog("close");

              }

          },

          close: function () {}

      });

      $("#addData").click(function () {
		  $("#alternateAddress").validationEngine({
              promptPosition: "bottomLeft",
              scroll: false
          });
			if($('#hdnContactID').val()==''){
				 $("#dialog-WarningNoRecordID").dialog("open");
			}else{
          		$("#dialog-modal").dialog("open");
			}
      });

      $("#newContact").click(function () {

		  $('#contactID').val('');

		  $('#hdnContactID').val('');

		  $('#alertBox').removeClass('alertBoxError');

		  $('#alertBox').removeClass('alertBox');

          $("#addNewContact").dialog("open");

          //$("#pinfo").validationEngine();

          $("#pinfo").validationEngine({

              promptPosition: "bottomLeft",

              scroll: false

          });

          $("#PCode").prop('disabled', false);

      });

  });



  function closeDialog() {

      	$("#addNewContact").dialog("close");

	  	$('#alertBox').html('');

	  	$('#alertBox').addClass('alertBox');

		$('#alertBox').addClass('alertBoxError');

  }

  $(document).ready(function () {

      $('#alternateAddresses').dataTable({
          "bPaginate": false,
          "bLengthChange": false,
          "bFilter": true,
          "bSort": false,
          "bInfo": false,
          "bAutoWidth": false/*,
		  "bProcessing": true,
          "sAjaxSource": "<?php echo base_url()?>index.php/contacts/contacts/getAlternativeAddresses/"+$('#hdnContactID').val()*/
      });
  });
  </script>







<link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url()?>/application/libraries/templates/css/m_style.css" />

<div id="dialog-WarningNoRecordID" title="Remove Record" style="font-size: 11px !important;">
<div id="deleteMessage">
No user selected
</div>
</div>

<div id="dialog-Delete" title="Remove Record" style="font-size: 11px !important;">
<div id="deleteMessage">
Are you sure that you want to delete this contact?
</div>
<input id="deleteID" type="hidden" />
</div> 

<div id="dialog-modal" title="Add New Alternative Address" style="font-size: 11px !important;">

<div id="contacts_Form_Error"></div>

<form id="alternateAddress">

<table width="450" border="0" style="font-size:11px !important;">

  <tr>

    <td width="69"><label>Type </label></td><td><select id="typeFldAddr" class="validate[required]"><option value="">Please Select</option><option>Home</option><option>Work</option><option>Home - Alternative</option></select></td>

  </tr>

  <tr>

    <td><label>Address </label></td><td><input class="validate[required, custom[onlyLetterSp]]" id="ad1Addr" type="text" maxlength="26" size="26" data-prompt-position="Top:-10" /></td>

  </tr>

  <tr>

    <td><label>Address 2 </label></td><td><input class="validate[required, custom[onlyLetterSp]]" id="ad2Addr" type="text" maxlength="26" size="26" data-prompt-position="Top:-10" /></td>

  </tr>

  <tr>

    <td><label>Address 2-Extra </label></td><td><input id="ad3Addr" type="text" maxlength="26" size="26" /></td>

  </tr>

  <tr>

    <td><label>Town </label></td><td><select id="cityAddr" class="validate[required]"><option value="">Please Select</option><option>London</option></select></td>

  </tr>

  <tr>

    <td><label>County </label></td><td><select id="countyFieldAddr" class="validate[required]"><option value="">Please Select</option><option>London City</option></select></td>

  <tr>

     <td><label>Postcode </label></td><td><input class="validate[required]"  id="zipAddr" type="text" maxlength="10" size="10" data-prompt-position="Right:45" /></td>

  </tr>

  <tr>

    <td><label>Country </label></td><td><select id="counrtyFieldAddr" class="validate[required]"><option value="">Please Select</option><option>United Kingdom</option></select></td>

  </tr>
  
   <tr>

    <td><label>Phone </label></td><td><input class="validate[required, custom[onlyNumberSp]]" id="telAddr" type="text" maxlength="26" size="26" data-prompt-position="Right:45" TABINDEX="17"  /></td>

   <tr>

    <td><label>Mobile </label></td><td><input id="mobAddr" type="text" maxlength="26" size="26" data-prompt-position="Top:-10" TABINDEX="18"  /></td>

  </tr>

    <tr>

   <td><label>Fax </label></td><td><input TABINDEX="19"  id="faxAddr" type="text" maxlength="26" size="26" /></td>

  </tr>

      <tr>

   <td><label>Email </label></td><td><input TABINDEX="19"  id="emailAddr" type="text" maxlength="26" size="26" /></td>

  </tr>

      <tr>

   <td><label>Website </label></td><td><input TABINDEX="19"  id="websiteAddr" type="text" maxlength="26" size="26" /></td>

  </tr>

</table>
</form>
</div>

  <div id="addNewContact">

<div id="tabs" style="font-size:11px !important;">

  <ul>

    <li style="font-size:11px !important;"><a href="#tabs-1">Main</a></li>

    <li style="font-size:11px !important;"><a href="#tabs-2">Notes</a></li>

    <li style="font-size:11px !important;"><a href="#tabs-3">History</a></li>

    <li style="font-size:11px !important;"><a href="#tabs-4">Catagory</a></li>

    <li style="font-size:11px !important;"><a href="#tabs-5">Comms</a></li>

    <li style="font-size:11px !important;"><a href="#tabs-6">Giving</a></li>

    <li style="font-size:11px !important;"><a href="#tabs-7">Gift Aid</a></li>

    <li style="font-size:11px !important;"><a href="#tabs-8">Events</a></li>

    <li style="font-size:11px !important;"><a href="#tabs-9">Medical</a></li>

    <li style="font-size:11px !important;"><a href="#tabs-10">Therapies</a></li>







  </ul>



  <div id="tabs-1">

<p>Name & Address</p>

<div id="alertBox"></div>

<form id="pinfo">

<table width="978" border="0" style="font-size:11px !important;">

  <tr>

    <td width="69"><label>Title </label></td><td width="156"><select id="title" TABINDEX="1" >		<option value = 'Mr'> Mr </option>

				<option value = 'Ms'> Ms </option>

				<option value = 'Mrs'> Mrs </option>

				<option value = 'Miss'> Miss </option>

				<option value = 'Dr'> Doctor </option></select></td>

    <td width="85"><label>Initials</label></td><td width="172"><input id="initials" type="text" maxlength="26" TABINDEX="13"  /></td>

    <td width="90"><label>PCode </label></td><td width="149"><input disabled id="PCode" type="text" maxlength="26" /><input id="hdnPCode" type="hidden" value="" /></td>

  </tr>

  <tr>

    <td><label>Surname </label></td><td><input class="validate[required, custom[onlyLetterSp]]" TABINDEX="2"  id="lname" type="text" maxlength="12" size="26" data-prompt-position="Top:-10" /></td>

<td width="78"><label>ContactID</label></td><td width="145"><input disabled id="contactID" type="text" maxlength="26" /><input name="hdnContactID" type="hidden" value="" id="hdnContactID" /></td>

  </tr>

  <tr>

    <td><label>Firstname </label></td><td><input class="validate[required, custom[onlyLetterSp]]" id="fname" type="text" maxlength="26" size="26" data-prompt-position="Top:-10" TABINDEX="3"  /></td>

    <td><label>Addressee </label></td><td><input  id="addressee" type="text" maxlength="26" size="26" data-prompt-position="Right:45" TABINDEX="14"  /></td>

  </tr>

  <tr>

    <td><label>Salutation </label></td><td><input id="firstname" type="text" maxlength="26" size="26" TABINDEX="4"  /></td>

    <td><label>Middlename </label></td><td><input TABINDEX="15"  id="middlename" type="text" maxlength="26" size="26" /></td>

  </tr>

  <tr>

    <td width="69"><label>Type </label></td><td><select id="typeFld" TABINDEX="5"  ><option>Home</option><option>Work</option><option>Home - Alternative</option></select></td><td> <label>MailSort </label></td><td><input TABINDEX="16"  id="mailSort" type="text" maxlength="26" size="26"/></td>

    <td width="78"><label>Region Code </label></td><td><input disabled id="regionCode" type="text" maxlength="26" value="N/A" /></td>

  </tr>

  <tr>

    <td><label>Address </label></td><td><input class="validate[required]" id="ad1" type="text" maxlength="26" size="26" data-prompt-position="Top:-10" TABINDEX="6"/></td>

    <td><label>Phone </label></td><td><input class="validate[required, custom[onlyNumberSp]]" id="tel" type="text" maxlength="26" size="26" data-prompt-position="Right:45" TABINDEX="17"  /></td>

  </tr>

  <tr>

    <td><label>Address 2 </label></td><td><input class="validate[required]" id="ad2" TABINDEX="7"  type="text" maxlength="26" size="26" data-prompt-position="Top:-10" /></td>

    <td><label>Mobile </label></td><td><input id="mob" type="text" maxlength="26" size="26" data-prompt-position="Top:-10" TABINDEX="18"  /></td>

  </tr>

  <tr>

    <td><label>Address 2-Extra </label></td><td><input id="ad3" type="text" maxlength="26" size="26" TABINDEX="8"  /></td>

    <td><label>Fax </label></td><td><input TABINDEX="19"  id="fax" type="text" maxlength="26" size="26" /></td>

  </tr>

  <tr>

    <td><label>City </label></td><td><select TABINDEX="9"  id="city"><option selected>Please Select</option><option>London</option><option>Other</option></select></td>

    <td><label>Other </label></td><td><input TABINDEX="20"  id="notes" type="text" maxlength="26" size="26" /></td>

  </tr>

  <tr>

    <td><label>County </label></td><td><select TABINDEX="10"  id="countyFeild"><option>Please Select</option><option>London City</option><option>Other</option></select></td>

    <td><label>Email </label></td><td><input TABINDEX="21"  class="validate[custom[email]]"  id="email" type="text" maxlength="26" size="26" data-prompt-position="Right:45" /></td>

  </tr>

  <tr>

     <td><label>Postcode </label></td><td><input TABINDEX="11"  class="validate[required]"  id="zip" type="text" maxlength="10" size="10" data-prompt-position="Right:45" /></td>

  </tr>

  <tr>

    <td><label>Country </label></td><td><select TABINDEX="12"  id="countryFeild"><option>United Kingdom</option></select></td>

    <td><label>Web Address </label></td><td><input TABINDEX="22"  id="website" type="text" maxlength="250" size="26" /></td>

    

  </tr>

    <tr>

	<td>
    <button id='save' class='xbutton' type="submit" style="display:none;">Save</button>
	</td><td>
    <button id = 'cancel' class = 'xbutton' style="display:none;">Cancel</button></td>

    

  </tr>

</table>



</form>

Alternative Address  <a href="#"><img id="addData" alt="Add New Alternative Address" src="<?php echo base_url()?>assets/images/plus.png" /></a>

<table cellpadding="0" cellspacing="0" border="0" class="display" id="alternateAddresses">

	<thead>

		<tr>

           <th> Type </th>

<th>Address</th>

<th>Address 2</th>

<th>Address 2-Extra</th>

<th>Town</th>

<th>County</th>

<th>Post Code</th>

<th>Country</th>

<th>Options</th>

		</tr>

	</thead>

	<tbody>

		<tr class="gradeX">

			<td>N/A</td>

			<td>N/A</td>

			<td>N/A</td>

			<td class="center">N/A</td>

			<td class="center">N/A</td>

            <td class="center">N/A</td>

			<td class="center">N/A</td>

            <td class="center">N/A</td>
            <td class="center">N/A</td>

		</tr>

	</tbody>

	<tfoot>

		<tr>

        <th> Type </th>

		<th>Address</th>

		<th>Address 2</th>

		<th>Address 2-Extra</th>

		<th>Town</th>

		<th>County</th>

		<th>Post Code</th>

		<th>Country</th>
        
        <th>Options</th>

		</tr>

	</tfoot>

</table>

</div>

  <div id="tabs-2"><div class="ui-widget">

  <label>Your preferred programming language: </label>

  <select id="combobox">

    <option value="">Select one...</option>

    <option value="ActionScript">ActionScript</option>

    <option value="AppleScript">AppleScript</option>

    <option value="Asp">Asp</option>

    <option value="BASIC">BASIC</option>

    <option value="C">C</option>

    <option value="C++">C++</option>

    <option value="Clojure">Clojure</option>

    <option value="COBOL">COBOL</option>

    <option value="ColdFusion">ColdFusion</option>

    <option value="Erlang">Erlang</option>

    <option value="Fortran">Fortran</option>

    <option value="Groovy">Groovy</option>

    <option value="Haskell">Haskell</option>

    <option value="Java">Java</option>

    <option value="JavaScript">JavaScript</option>

    <option value="Lisp">Lisp</option>

    <option value="Perl">Perl</option>

    <option value="PHP">PHP</option>

    <option value="Python">Python</option>

    <option value="Ruby">Ruby</option>

    <option value="Scala">Scala</option>

    <option value="Scheme">Scheme</option>

  </select>

</div></div>

  <div id="tabs-3">Tab3</div>

	<div id="tabs-4">Tab4</div>

    <div id="tabs-5">Tab5</div>

    <div id="tabs-6">Tab6</div>

    <div id="tabs-7">Tab7</div>

    <div id="tabs-8">Tab8</div>

    <div id="tabs-9">Tab9</div>

    <div id="tabs-10">Tab10</div>

</div>

</div>

<input id="posts_per_page" type="hidden" value="<?php echo $posts_per_page?>">

<input id="page" type="hidden" value="0">

<script language="javascript" src="<?php echo base_url('application/libraries/templates/js/autocomplete.js');?>"></script>