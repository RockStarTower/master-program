    $(document).ready( function () {
    	$("#searchbar input, #mini-searchbar input").on("keyup", function () {
			var textbox = $(this);
			if (textbox.val().substring(0, 4) == "http" || textbox.val().substring(0, 4) == "www.") {
				if (textbox.val().indexOf("https://www.") === 0) 
					textbox.val(textbox.val().substring(12));
				if (textbox.val().indexOf("http://www.") === 0) 
					textbox.val(textbox.val().substring(11));
				if (textbox.val().indexOf("https://") === 0) 
					textbox.val(textbox.val().substring(8));
				if (textbox.val().indexOf("http://") === 0) 
					textbox.val(textbox.val().substring(7));
				if (textbox.val().indexOf("www.") === 0) 
					textbox.val(textbox.val().substring(4));
				
				var someString = $(this).val();
				someString = someString.replace(/\//g, "");
				textbox.val(someString);
			}
		});
    	setTimeout(function () {
			$('#domain_success').fadeOut('slow')
		}, 3000);
		var domainError = $('#domain_error').html();		
		$('#domain_error').hide();
		if ( !$('#domain_error').length ) {
			$('#display_error').hide();
		}
		$('#display_error').html(domainError);
		
		$('input.select').focus(function() {
			var current_val = $(this).val();
			$(this).attr('data', current_val);
			$(this).val('');
		});
		$('input.select').blur(function() {
			var lastVal = $(this).attr('data');
			var curVal = $(this).val();
			if (curVal == lastVal || curVal == '') {
				$(this).val(lastVal);
			}
		});
		
		$('#searchbar input').focus();
    	//Bulk Edit, Edit all in column
    	$('.bulkhead').click(function() {
			var header = $(this).attr('name');
			var value = $('.' + header).first().val();
			$('.' + header).val(value);
		});
		//Select All Bulk Check Boxes on Search.php
		$('#selectall').click(function(){
			$('.bulkcheckbox').prop('checked', true);
		});
		$('#deselectall').click(function(){
			$('.bulkcheckbox').prop('checked', false);
		});
		var flyby = $('#login_header').data('permissions');
		if(flyby == 'Admin'){var flybyguy = '<img id="tie" src="images/goodluck.png" />';} else {var flybyguy = '<img id="tie" src="images/tiefighter.png" />';}
		$('body').append(flybyguy); 
		function flyTie(){
		 tie.css('left', startPos);
		 tie.animate({left: -500}, 7000, 'linear')
		};
		var screenWidth = $(document).width();
		var startPos = screenWidth;
		var tie = $('#tie');
		setInterval(function() {
		  flyTie();
		}, 300000);
		$('.error').hide();
		$('select#Type').bind('change', function (e) { 
			if( $("select#Type").val() == "Geo-Based") {
				$('.Location').show();
				$(".button").click(function() {
					var Location = $("input#Location").val();
					if (Location == "") {
						$("label#Location_error").show();
						$("input#Location").focus();
						return false;
					}
				});
			} else {
				$('.Location').hide();
			}
		});
		$(function() {
			var icons = {
				header: "ui-icon-circle-arrow-e",
				activeHeader: "ui-icon-circle-arrow-s"
			};
			$( "#accordion" ).accordion({
				icons: icons,
				heightStyle: "content"
			});
			$( "#toggle" ).button().click(function() {
				if ( $( "#accordion" ).accordion( "option", "icons" ) ) {
					$( "#accordion" ).accordion( "option", "icons", null );
				} else {
					$( "#accordion" ).accordion( "option", "icons", icons );
				}
			});
		});
		$(function() {
			var icons = {
				header: "ui-icon-circle-arrow-e",
				activeHeader: "ui-icon-circle-arrow-s"
			};
			$( "#accordion-1" ).accordion({
				icons: icons,
				heightStyle: "content"
			});
			$( "#toggle" ).button().click(function() {
				if ( $( "#accordion-1" ).accordion( "option", "icons" ) ) {
					$( "#accordion-1" ).accordion( "option", "icons", null );
				} else {
					$( "#accordion-1" ).accordion( "option", "icons", icons );
				}
			});
		});
		$( ".Date" ).datepicker({ dateFormat: "yy-mm-dd" });
		$(function() {
			$( "#tabs" ).tabs();
		});
		$(document).on('click', '.close', function() {
			$('#edit_wrap').hide('fade');
			var condition = $('.domainAccordion');
			if(!condition){
				window.location.reload();
			}
		});
		$('#edit_wrap').hide();
		$(".edit_user").click(function(){
			$('#edit_wrap').show();
			var userid = $(this).attr('name');
			$.ajax({
				url: 'users/user_edit.php',
				type: "GET",
				data: ({id: userid}),
				success: function(data){
					$("#edit").html(data);
				}
			});
		});
		
		$('#new_domain_form select').change(function() {
			if($(this).val() == '') {
				$(this).css('color','#a8a9ab');
			} else {
				$(this).css('color','inherit');
			}
		});
		$("#new_domain_form").on('submit', function(e){
			e.preventDefault();
			var formdata = $('#new_domain_form').serialize();
			$.ajax({
				url: 'update_forms/new_domain_action.php',
				type: "POST",
				data: formdata,
				success: function(data){
					$("#new_domain_reponse").html(data).show();
					window.scrollTo(0,0);
				}
			});
			$(this).closest('#new_domain_form').find('input[type=text], textarea').val('');
			$('#new_domain_form select option:first-child').attr('selected', 'selected');
			$('.Status').css('color', 'inherit');
		});
		$('.select').focus(function() {
			$(this).siblings('.dropdown').slideDown('slow');   
		});
		$('.select').focusout(function() {
			$(this).siblings('.dropdown').slideUp('slow');   
		});
		$('.dropdown li a').click(function() {
			var value = $(this).text();
			$(this).parents().siblings('.select').val(value);
		});
		$(".button").click(function() {
			  // validate and process form here			  
			  var DomainName = $("input#DomainName").val();
				if (DomainName == "") {
				$("label#DomainName_error").show();
				$("input#DomainName").focus();
				return false;
			  }
			  var HostAccount = $("input#HostAccount").val();
				if (HostAccount == "") {
				$("label#HostAccount_error").show();
				$("input#HostAccount").focus();
				return false;
			  }
			  var Vertical = $("select#Vertical").val();
				if (Vertical == "") {
				$("label#Vertical_error").show();
				$("select#Vertical").focus();
				return false;
			  }
			  var Type = $("select#Type").val();
				if (Type == "") {
				$("label#Type_error").show();
				$("select#Type").focus();
				return false;
			  }
			  var Language = $("select#Language").val();
				if (Language == "") {
				$("label#Language_error").show();
				$("select#Language").focus();
				return false;
			  }
			  var Status = $("select#Status").val();
				if (Status == "") {
				$("label#Status_error").show();
				$("select#Status").focus();
				return false;
			  }
			  var PR = $("select#PR").val();
				if (PR == "") {
				$("label#PR_error").show();
				$("select#PR").focus();
				return false;
			  }
			  var DA = $("input#DA").val();
				if (DA == "") {
				$("label#DA_error").show();
				$("input#DA").focus();
				return false;
			  }
			  var PA = $("input#PA").val();
				if (PA == "") {
				$("label#PA_error").show();
				$("input#PA").focus();
				return false;
			  }
			  var BackLinks = $("input#BackLinks").val();
				if (BackLinks == "") {
				$("label#BackLinks_error").show();
				$("input#BackLinks").focus();
				return false;
			  }
			  var MozTrust = $("input#MozTrust").val();
				if (MozTrust == "") {
				$("label#MozTrust_error").show();
				$("input#MozTrust").focus();
				return false;
			  }
			  var DomainNotes = $("input#DomainNotes").val();
				if (DomainNotes == "") {
				$("label#DomainNotes_error").show();
				$("input#DomainNotes").focus();
				return false;
			  }
			  var TimeStamp = $("input#TimeStamp").val();
				if (TimeStamp == "") {
				$("label#TimeStamp_error").show();
				$("input#TimeStamp").focus();
				return false;
			  }
			  
			});
		$('.newHostSubmit').click(function(e) {
			$('.required').each(function() {
				var validate = $(this).val();
				if (validate == '') {
					$(this).siblings('.host-error').html('This field is required');
					e.preventDefault();
				}
			});
		});
        $('#mainForm').submit( function () {
            var formdata = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "new-entry.php",
                data: formdata,
				success: function( data ) {
					alert('Data Submitted');				
				}
             });
            return false;
        });
		$('#page_dropdown').click(function() {
			$('.dropdown').slideToggle('slow');
		});
		$('#DomainNotesAccordion').hide();
		$('.domainupdated ').hide();
		$('#Domain_Notes_img').click(function() {
			$('#DomainNotesAccordion').animate({
				width: 'toggle'
			});
			$('.domainupdated ').fadeToggle();
			$('.vadernotesdomain').fadeToggle();
		});
		$('#HostNotes').hide();
		$('.hostupdated').hide();
		$('#Host_Notes_img').click(function() {
			$('#HostNotes').animate({
				width: 'toggle'
			});
			$('.hostupdated').fadeToggle();
			$('.vadernoteshost').fadeToggle();
		});
		var Domain_Status = $('.Status').html();
		if (Domain_Status == 'Active') {
			$('#Status').addClass('active');
		}
		if (Domain_Status == 'Inactive') {
			$('#Status').addClass('inactive');
		}
		if (Domain_Status == 'In Process') {
			$('#Status').addClass('inprocess');
		}
		if (Domain_Status == 'Down') {
			$('#Status').addClass('down');
		}
		if (Domain_Status == 'Researched') {
			$('#Status').addClass('researched');
		}
		if (Domain_Status == 'D-indexed') {
			$('#Status').addClass('deindexed');
		}
		if (Domain_Status == 'Retired') {
			$('#Status').addClass('retired');
		}
		//Domain Filters
		$(".selectoptions").change( function () {    
    		var HostAccount = $('#HostAccount').val();
    		var Vertical = $('#Vertical').val();
    		var Type = $('#Type').val();
    		var Country = $('#Country').val();
    		var location = $('#Location').val();
    		var Version = $('#Version').val();
    		var Converted = $('#Converted').val();
    		var Language = $('#Language').val();
    		var Status = $('#Status').val();
    		var PR = $('#PR').val();
    		var DA = $('#DA').val();
    		var PA = $('#PA').val();
    		var ManageWPAccount = $('#ManageWPAccount').val();
    		var Theme = $('#Theme').val();
    		var Wireframe = $('#Wireframe').val();
    		var Registrar = $('#Registrar').val();
    		var RenewalDate = $('#RenewalDate').val();
			var RenewalDateStr = ''; 
			var RenewalDateStr1 = '';
			if (RenewalDate != '') {
				var RenewalDateStr = '&RenewalDate=' + RenewalDate;
			}
			var RenewalDate1 = $('#RenewalDate1').val();
			if (RenewalDate1 != '') {
				var RenewalDateStr1 = '&RenewalDate1=' + RenewalDate1;
			}	
    		var ResearchedBy = $('#ResearchedBy').val();
    		var Designer = $('#Designer').val();
    		var Developer = $('#Developer').val();
			var DateBought = $('#DomDateBought').val();
			var DateBoughtStr = '';
			var DateBoughtStr1 = '';
			if (DateBought != '') {
				var DateBoughtStr = '&DateBought=' + DateBought;
			}
			var DateBought1 = $('#DomDateBought1').val();
			if (DateBought1 != '') {
				var DateBoughtStr1 = '&DateBought1=' + DateBought1;
			}
			var WhoIsRenewal = $('#WhoIsRenewal').val();
			var WhoIsRenewalStr = '';
			var WhoIsRenewalStr1 = '';
			if (WhoIsRenewal != '') {
				var WhoIsRenewalStr = '&WhoIsRenewal=' + WhoIsRenewal;
			}
			var WhoIsRenewal1 = $('#WhoIsRenewal1').val();
			if (WhoIsRenewal1 != '') {
				var WhoIsRenewalStr1 = '&WhoIsRenewal1=' + WhoIsRenewal1;
			}
			var DateComplete = $('#DomDateComplete').val();
			var DateCompleteStr = '';
			var DateCompleteStr1 = '';
			if (DateComplete != '') {
				var DateCompleteStr = '&DateComplete=' + DateComplete;
			}
			var DateComplete1 = $('#DomDateComplete1').val();
			if (DateComplete1 != '') {
				var DateCompleteStr1 = '&DateComplete1=' + DateComplete1;
			}
    		var Action = $('#actionurl').attr('name');
    		var fullURL = Action + HostAccount + Vertical + Status + Type + Country + Version + Converted + location + Language + PR + DA + PA + ManageWPAccount + Theme + Wireframe + Registrar + RenewalDateStr + RenewalDateStr1 + ResearchedBy + Designer + Developer + DateBoughtStr + DateBoughtStr1 + WhoIsRenewalStr + WhoIsRenewalStr1 + DateCompleteStr + DateCompleteStr1;
    		$('#domfilterform').attr('action', ''); 
    		$('#domfilterform').attr('action', fullURL);
		}).trigger('change');
		//Host Filters
        $(".selectoptions").change( function () {  
        	var hostCountry = $('#Country').val();  
        	var hostServerLocation = $('#ServerLocations').val();
        	var hostDateBought = $('#DateBought').val();
			var DateBoughtStr = '';
			var DateBoughtStr1 = '';
			if (hostDateBought != '') {
				var DateBoughtStr = '&DateBought=' + hostDateBought;
			}
			var hostDateBought1 = $('#DateBought1').val();
			if (hostDateBought1 != '') {
				var DateBoughtStr1 = '&DateBought1=' + hostDateBought1;
			}
			var hostHostAccount = $('#HostAccount').val();
			var hostEmail = $('#hostEmail').val();
			var hostcPanelUser = $('#hostcPanelUser').val();
			var hostFTPUser = $('#hostFTPUser').val();
			var hostRenewDate = $('#hostRenewDate').val();
			var RenewDateStr1 = '';
			var RenewDateStr = '';
			if (hostRenewDate != '') {
				var RenewDateStr = '&RenewDate=' + hostRenewDate;
			}
			var hostRenewDate1 = $('#hostRenewDate1').val();
			if (hostRenewDate1 != '') {
				var RenewDateStr1 = '&RenewDate1=' + hostRenewDate1;
			}
    		var Action = $('#hostactionurl').attr('name');
    		var fullURL = Action + DateBoughtStr + DateBoughtStr1 + hostHostAccount + hostEmail + hostcPanelUser + hostFTPUser + RenewDateStr + RenewDateStr1 + hostServerLocation + hostCountry;
    		$('#hostfilterform').attr('action', ''); 
    		$('#hostfilterform').attr('action', fullURL);
		}).trigger('change');

		//setup before functions
		var domainTypingTimer;
		var hostTypingTimer; 		//timer identifier
		var doneTypingInterval = 2000;  //time in ms, 5 second for example

		//on keyup, start the countdown
		$('#DomainNotes').keyup(function(){
			clearTimeout(domainTypingTimer);
			domainTypingTimer = setTimeout(doneTypingDomain, doneTypingInterval);
		});
		$('#HostNotes').keyup(function(){
			clearTimeout(hostTypingTimer);
			hostTypingTimer = setTimeout(doneTypingHost, doneTypingInterval);
		});
		//user is "finished typing," do something
		function doneTypingHost () {
			var HostNotes = $('#HostNotes').val();
			var HostNotes_Before = $('#HostNotes_Before').val();
			var Host_Time = $('#Host_Time').val();
			var Host_User = $('#Host_User').val();
			var Host_Account = $('#Host_Account').val();
			var hostTime = new Date();
			var h = hostTime.getHours();
			var m = hostTime.getMinutes();
			var curTime = h + ':' + m + 'AM';
			if (h == 0) {
				h = 12;
				curTime = h + ':' + m + 'AM';
			}
			if (h >= 12) {
				h = h-12;
				curTime = h + ':' + m + 'PM';
			}
			$.ajax({
				type: "POST",
				url: "update_forms/update_host_notes.php",
				data: ({
					HostNotes: HostNotes,
					HostNotes_Before: HostNotes_Before,
					TimeStamp: Host_Time,
					User: Host_User,
					HostAccount: Host_Account}),
					success: function( data ) {
						$('.hostupdated').html('<b>Updated at:</b> ' + curTime);				
					}
			 });
			return false;
		}
		function doneTypingDomain () {
			var DomainNotes = $('#DomainNotes').val();
			var DomainNotes_Before = $('#DomainNotes_Before').val();
			var Domain_Time = $('#Domain_Time').val();
			var Domain_User = $('#Domain_User').val();
			var Domain_Name = $('#Domain_Name').val();
			var domainTime = new Date();
			var hh = domainTime.getHours();
			var mm = domainTime.getMinutes();
			var curTimeDom = hh + ':' + mm + 'AM';
			if (hh == 0) {
				hh = 12;
				curTimeDom = hh + ':' + mm + 'AM';
			}
			if (hh >= 12) {
				hh = hh-12;
				curTimeDom = hh + ':' + mm + 'PM';
			}
			$.ajax({
				type: "POST",
				url: "update_forms/update_domain_notes.php",
				data: ({
					DomainNotes: DomainNotes,
					DomainNotes_Before: DomainNotes_Before,
					TimeStamp: Domain_Time,
					User: Domain_User,
					DomainName: Domain_Name}),
					success: function( data ) {
							$('.domainupdated').html('<b>Updated at:</b> ' + curTimeDom);				
						}
			 });
			return false;
		}
		var hostEntryTypingTimer; 		//timer identifier
		var doneTypingHostEntry = 500;  //time in ms, 5 second for example
		$('.duplicate_host').hide();
		//on keyup, start the countdown
		$('#HostAccountEntry').keyup(function(){
			clearTimeout(hostEntryTypingTimer);
			hostEntryTypingTimer = setTimeout(doneTypingHostAccount, doneTypingHostEntry);
		});
		//user is "finished typing," do something
		function doneTypingHostAccount (e) {
			var HostAccountEntry = $('#HostAccountEntry').val();
			$.ajax({
				type: "POST",
				url: "update_forms/check_host_account.php",
				data: ({
					HostAccount: HostAccountEntry}),
					success: function( data ) {
							if (data == 'duplicate') {
								$('#HostAccountEntry').addClass( 'duplicate' );
								$('.duplicate_host').show();
								e.preventDefault();
							} 
							if (data == 'not duplicate'){
								$('#HostAccountEntry').removeClass( 'duplicate' );
								$('.duplicate_host').hide();
							}
						}
			 });
			return false;
		}
		var domainEntryTypingTimer; 		//timer identifier
		var doneTypingDomainEntryInterval = 500;  //time in ms, 5 second for example
		$('#DomainEntry').keyup(function(){
			clearTimeout(domainEntryTypingTimer);
			domainEntryTypingTimer = setTimeout(doneTypingDomainEntry, doneTypingDomainEntryInterval);
		});
		//user is "finished typing," do something
		function doneTypingDomainEntry (e) {
			var DomainEntry = $('#DomainEntry').val();
			$.ajax({
				type: "POST",
				url: "update_forms/check_domain.php",
				data: ({
					Domain: DomainEntry}),
					success: function( data ) {
							if (data == 'duplicate') {
								$('#DomainEntry').addClass( 'duplicate' );
								$('.duplicate_domain').show();
								e.preventDefault();
							} 
							if (data == 'not duplicate'){
								$('#DomainEntry').removeClass( 'duplicate' );
								$('.duplicate_domain').hide();
							}
						}
			 });
			return false;
		}
		$('.add').keyup(function() {
			var total = 0;

			$('.add').each(function () {
				var add = $(this).val();
				total += parseFloat(add);
			});

			$('.TotalCost').val(total);
		}).trigger('update');
		$('#new_host input')
		.on('focus', function(){
			var $this = $(this);
			var placeholder = $this.attr('data');
			if($this.attr('placeholder') == placeholder){
				$this.attr('placeholder', '');
			}
		})
		.on('blur', function(){
			var $this = $(this);
			var placeholder = $this.attr('data');
			if($this.attr('placeholder') == ''){
				$this.attr('placeholder', placeholder);
			}
		});
		$('#uploadBtn').change(function () {
			var file = $(this).val();
			$('#uploadFile').val(file);
		});
		$('#uploadBtn').mouseover(function() {
			$('#upload').css('background', '#5499d2');  
		});
		$('#uploadBtn').mouseout(function() {
			$('#upload').css('background', '#7b7b7b');  
		});
		setInterval(function(){
		  $('#month_launched').load('live_update_requests/live_update.php');
		}, 1000);
		setInterval(function(){
		  $('#week_launched').load('live_update_requests/weekly_numbers.php');
		}, 1000);
		setInterval(function(){
		  $('#month_Action').load('live_update_requests/month_2-0.php');
		}, 1000);
		setInterval(function(){
		  $('#week_Action').load('live_update_requests/week_2-0.php');
		}, 1000);
		setInterval(function(){
		  $('#month_geo').load('live_update_requests/month_geo.php');
		}, 1000);
		setInterval(function(){
		  $('#week_geo').load('live_update_requests/week_geo.php');
		}, 1000);
		setInterval(function(){
		  $('#month_article').load('live_update_requests/month_article.php');
		}, 1000);
		setInterval(function(){
		  $('#week_article').load('live_update_requests/week_article.php');
		}, 1000);
		setInterval(function(){
		  $('#month_aus').load('live_update_requests/month_aus.php');
		}, 1000);
		setInterval(function(){
		  $('#week_aus').load('live_update_requests/week_aus.php');
		}, 1000);
		setInterval(function(){
		  $('#active').load('live_update_requests/total_live.php');
		}, 1000);
		setInterval(function(){
		  $('#active_AUS').load('live_update_requests/active_aus.php');
		}, 1000);
		setInterval(function(){
		  $('#active_Action').load('live_update_requests/active_2-0.php');
		}, 1000);
		setInterval(function(){
		  $('#active_Article').load('live_update_requests/active_article.php');
		}, 1000);
		setInterval(function(){
		  $('#active_Geo').load('live_update_requests/active_geo.php');
		}, 1000);
		// custom css expression for a case-insensitive contains()
		jQuery.expr[':'].Contains = function(a,i,m){
			return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase())>=0;
		};
		
		$('#navigation li').hover(function() {
			$(this).children('.sub-menu').slideDown('fast');
		},function() {
			$(this).children('.sub-menu').slideUp('fast');
		});
		$('#login_header div').hover(function() {
			$(this).children('.sub-menu').slideDown('fast');
		},function() {
			$(this).children('.sub-menu').slideUp('fast');
		});
		
		function listFilter(list) { // header is any element, list is an unordered list
			$('.select')
			.change( function () {
				var filter = $(this).val();
				if(filter) {
					// this finds all links in a list that contain the input,
					// and hide the ones not containing the input while showing the ones that do
					$(list).find("a:not(:Contains(" + filter + "))").parent().slideUp();
					$(list).find("a:Contains(" + filter + ")").parent().slideDown();
				} else {
					$(list).find("li").slideDown();
				}
				return false;
			})
			.keyup( function () {
				// fire the above change event after every letter
				$(this).change();
			});
		}
		$(function () {
			listFilter($(".dropdown"));
		});
		
 		//Calculate the width of the bulkedit.php
		var headerwidth = $('#bulkheaders > h4').length;
		var totalwidth = ((headerwidth * 1) * 185);
		$('#widediv').css('width', totalwidth);
		$('#widediv').fadeIn();

		var bulkscroll = $('.bulkscrolldiv').height();
		if (bulkscroll >= 500) {
			$('.bulkscrolldiv').css('padding-bottom', '200px');
		}
		var headerwrap = $('#header-wrapper').height();
		var footerwrap = $('#footer').height();
		var remainingHeight = parseInt($(window).height() - headerwrap - footerwrap);
		$('.bulkscrolldiv').height(remainingHeight);
		//ondomready
				
		//Calculate the height of the domain_csv_confirm.php
		var domainConfirmHeight = $('#domain-results').height();
		var submitScrollHeight = 39;
		var screenHeight = $(window).height();
		var headerHeight = $('#header-wrapper').height();
		var footerHeight = $('#footer').height();
		var elementsHeight = parseInt(domainConfirmHeight + submitScrollHeight + headerHeight + footerHeight);
		var remainderHeight = parseInt(screenHeight - elementsHeight);
		if (domainConfirmHeight <= 796) {
			$('#domain-results').css('padding-bottom', remainderHeight);
		}
		
		//ondomready
		$(function () {
			listFilter($(".dropdown"));
		});
 
	});
	$(document).ajaxComplete(function(){
		$( ".Date" ).datepicker({ dateFormat: "yy-mm-dd" });
		$('.select').focus(function() {
			$(this).siblings('.dropdown').slideDown('slow');   
		});
		$('.select').focusout(function() {
			$(this).siblings('.dropdown').slideUp('slow');   
		});
		var Stati = $('#Status').val();
		if (Stati == 'Active') {
			$('#Status').addClass('active');
		}
		if (Stati == 'Inactive') {
			$('#Status').addClass('inactive');
		}
		if (Stati == 'In Process') {
			$('#Status').addClass('inprocess');
		}
		if (Stati == 'Down') {
			$('#Status').addClass('down');
		}
		if (Stati == 'Researched') {
			$('#Status').addClass('researched');
		}
		$('.dropdown li a').click(function() {
			var value = $(this).text();
			$(this).parents().siblings('.select').val(value);
			if (value == 'Active') {
				$('#Status').removeClass();
				$('#Status').addClass('select active');
			}
			if (value == 'Inactive') {
				$('#Status').removeClass();
				$('#Status').addClass('select inactive');
			}
			if (value == 'In Process') {
				$('#Status').removeClass();
				$('#Status').addClass('select inprocess');
			}
			if (value == 'Down') {
				$('#Status').removeClass();
				$('#Status').addClass('select down');
			}
			if (value == 'Researched') {
				$('#Status').removeClass();
				$('#Status').addClass('select researched');
			}
			if (value == 'D-indexed') {
				$('#Status').removeClass();
				$('#Status').addClass('select deindexed');
			}
			if (value == 'Retired') {
				$('#Status').removeClass();
				$('#Status').addClass('select retired');
			}
		});
		$('.add').keyup(function() {
			var total = 0;

			$('.add').each(function () {
				total += parseFloat($(this).val());
			});

			$('.TotalCost').val(total);
		}).trigger('update');
		function listFilter(list) { // header is any element, list is an unordered list
			$('.select')
			.change( function () {
				var filter = $(this).val();
				if(filter) {
					// this finds all links in a list that contain the input,
					// and hide the ones not containing the input while showing the ones that do
					$(list).find("a:not(:Contains(" + filter + "))").parent().slideUp();
					$(list).find("a:Contains(" + filter + ")").parent().slideDown();
				} else {
					$(list).find("li").slideDown();
				}
				return false;
			})
			.keyup( function () {
				// fire the above change event after every letter
				$(this).change();
			});
		}
		$(function () {
			listFilter($(".dropdown"));
		});
		$('.Status').change(function() {
			currentVer = $(this).val();
			switch (currentVer) {
				case 'Active':
						$(this).css('color', '#60db30');
						break;
				case 'Inactive':
						$(this).css('color', '#dbd630'); 
						break;
				case 'In Process':
						$(this).css('color', '#3090db');
						break;
				case 'Down':
						$(this).css('color', '#ff0000');
						break;
				case 'Researched':
						$(this).css('color', '#6b2600');
						break;
				case 'D-indexed':
						$(this).css('color', '#161616');
						break;
				case 'Retired':
						$(this).css('color', '#b60048');
						break;
			}
		});
		$('input.select').focus(function() {
			var current_val = $(this).val();
			$(this).attr('data', current_val);
			$(this).val('');
		});
		$('input.select').blur(function() {
			var lastVal = $(this).attr('data');
			var curVal = $(this).val();
			if (curVal == lastVal || curVal == '') {
				$(this).val(lastVal);
			}
		});
	});
 $(function() {
      $("#adduserbutton").click(function(evt) {adduserdiv
         $("#user_databasediv").load('admin.php?action=users #user_databasediv');
      });
    });
$(document).ready(function(){
    $("#filter").keyup(function(){
        // Retrieve the input field text and reset the count to zero
        var filter = $(this).val();
 
        // Loop through the comment list
        var userlist = $('.userlist');
        var goalslist = $('.goalslist');
        var inprocesslist = $('.commentlist');
        var dashboard = $('#user_list');
        var filteredRes = $('.filteredRes');
        if(userlist){
        	$(".userlist").each(function(){
 		
        	    // If the list item does not contain the text phrase fade it out
        	    if ($(this).text().search(new RegExp(filter, "i")) < 0) {
        	        $(this).fadeOut();
 		
        	    // Show the list item if the phrase matches and increase the count by 1
        	    } else {
        	        $(this).show();
        	    }
       		});
    	}
    	if(filteredRes.length >= 1){
    		$(".filteredRes").each(function(){
 		
        	    // If the list item does not contain the text phrase fade it out
        	    if ($(this).text().search(new RegExp(filter, "i")) < 0) {
        	        $(this).fadeOut();
        	        $(this).removeClass('filtered');
 		
        	    // Show the list item if the phrase matches and increase the count by 1
        	    } else {
        	        $(this).show();
        	        $(this).addClass('filtered');
        	    }
        	});
    	} else if(goalslist){
        	$(".goalslist").each(function(){
 		
        	    // If the list item does not contain the text phrase fade it out
        	    if ($(this).text().search(new RegExp(filter, "i")) < 0) {
        	        $(this).fadeOut();
        	        $(this).removeClass('filtered');
 		
        	    // Show the list item if the phrase matches and increase the count by 1
        	    } else {
        	        $(this).show();
        	        $(this).addClass('filtered');
        	    }
        	});
        }
        if(filteredRes.length >= 1){
    		$(".filteredRes").each(function(){
    			var domainDiv = $(this).parent('.inProcessTask');
 		
        	    // If the list item does not contain the text phrase fade it out
        	    if (domainDiv.text().search(new RegExp(filter, "i")) < 0) {
        	        domainDiv.fadeOut();
        	        domainDiv.removeClass('filtered');
 		
        	    // Show the list item if the phrase matches and increase the count by 1
        	    } else {
        	        domainDiv.show();
        	        domainDiv.addClass('filtered');
        	    }
        	});
    	} else if(inprocesslist){
        	$(".domain_info").each(function(){
        		var domainDiv = $(this).parent('.inProcessTask');
 	
        	    // If the list item does not contain the text phrase fade it out
        	    if (domainDiv.text().search(new RegExp(filter, "i")) < 0) {
        	        domainDiv.fadeOut();
        	        domainDiv.removeClass('filtered');
 	
        	    // Show the list item if the phrase matches and increase the count by 1
        	    } else {
        	        domainDiv.show();
        	        domainDiv.addClass('filtered');
        	    }
        	});
        }
        if(dashboard){
        	$(".user_info").each(function(){
        		var userDiv = $(this).parent('.user');
 	
        	    // If the list item does not contain the text phrase fade it out
        	    if (userDiv.text().search(new RegExp(filter, "i")) < 0) {
        	        userDiv.fadeOut();
 	
        	    // Show the list item if the phrase matches and increase the count by 1
        	    } else {
        	        userDiv.show();
        	    }
        	});
        }
    });
    //Create multi filter system for the live filter
    $("#filterForm").submit(function(e){
    	e.preventDefault();
    	var newFilter = $('#filter').val();
    	var filters = $('#filters');
    	var filtersHtml = filters.html();

    	filters.html(filtersHtml+'<span class="filterText">'+newFilter+' <a class="newFilter" href="javascript:void(0);"></a></span>');
    	
    	$(".filteredRes").each(function(){
            $(this).removeClass('filteredRes');
        });
    	$(".filtered").each(function(){
    		$(this).removeClass('filtered');
            $(this).addClass('filteredRes');
        });
        $('#filter').val('');
    });
    //Delete filter on live filter
    $(document).on('click', ('.newFilter'), function(){
    	$(this).parent('.filterText').remove();

    	var userlist = $('.userlist');
        var goalslist = $('.goalslist');
        var inprocesslist = $('.commentlist');
        var dashboard = $('#user_list');
        var filteredRes = $('.filteredRes');

    	if($('#filters').children().length >= 1){
    	$('.filterText').each(function(){

    		var remaining = $.trim($(this).text());

        	userlist.removeClass('filtered');
    		userlist.removeClass('filteredRes');
    		goalslist.removeClass('filtered');
    		goalslist.removeClass('filteredRes');
    		inprocesslist.removeClass('filtered');
    		inprocesslist.removeClass('filteredRes');
    		dashboard .removeClass('filtered');
    		dashboard .removeClass('filteredRes');

        	if(userlist){
        		$(".userlist").each(function(){
 			
        		    if ($(this).text().search(new RegExp(remaining, "i")) < 0) {
        	    		$(this).fadeOut();
 		
        			// Show the list item if the phrase matches and increase the count by 1
        			} else {
        			    $(this).show();
        			    $(this).addClass('filteredRes');
        			}
       			});
    		}
    		if(goalslist){
        		$(".goalslist").each(function(){
 			
        		    if ($(this).text().search(new RegExp(remaining, "i")) < 0) {
        	    		$(this).fadeOut();
 		
        			// Show the list item if the phrase matches and increase the count by 1
        			} else {
        			    $(this).show();
        			    $(this).addClass('filteredRes');
        			}
        		});
        	}
        	if(inprocesslist){
        		$(".domain_info").each(function(){
        			var domainDiv = $(this).parent('.inProcessTask');
 		
        		    if (domainDiv.text().search(new RegExp(remaining, "i")) < 0) {
        	    		domainDiv.fadeOut();
 		
        			// Show the list item if the phrase matches and increase the count by 1
        			} else {
        			    domainDiv.show();
        			    domainDiv.addClass('filteredRes');
        			}
        		});
        	}
        	if(dashboard){
        		$(".user_info").each(function(){
        			var userDiv = $(this).parent('.user');
 		
        		    if (userDiv.text().search(new RegExp(remaining, "i")) < 0) {
        	    		userDiv.fadeOut();
 		
        			// Show the list item if the phrase matches and increase the count by 1
        			} else {
        			    userDiv.show();
        			    userDiv.addClass('filteredRes');
        			}
        		});
        	}
    	});
		} else {
			userlist.removeClass('filtered');
    		userlist.removeClass('filteredRes');
    		goalslist.removeClass('filtered');
    		goalslist.removeClass('filteredRes');
    		inprocesslist.children().removeClass('filtered');
    		inprocesslist.children().removeClass('filteredRes');
    		dashboard.children().removeClass('filtered');
    		dashboard.children().removeClass('filteredRes');

    		userlist.show();
    		goalslist.show();
    		inprocesslist.children().show();
    		dashboard.children().show();
		}
    });

    //Domain CSV Replacement functions
    $('.fields > h2').each(function(){
    	var value = $(this).siblings('.domain').val();
    	$(this).text(value);
    });
    //Add Another Domain Set
    $(document).on('click', '#add_fields', function() {
    	var fieldsCount = $('.fields').length;
    	var domain_names = $('#domain_name').attr('id');
		var fields = $('#empty_fields').html();
		$('#domain_csv_form').append(fields);
		$('.last').removeClass('last');
		$('.fields').last().addClass('last');
		$('.last > h2').attr('id',domain_names + fieldsCount);
		$('.last > .domain').attr('data-click',fieldsCount);
		var dataClick = $('.last > .domain').data('click');

		$('.last > input').each(function(){
			var lastName = $(this).attr('name');
			$(this).attr('name', lastName + dataClick);
		});
		if ($('.last .domain').val().length == 0) {
			$('.last h2').text('Domain Data');
		} else {
			$('.last h2').text(value);
		}
		fieldsCount++;
	});
    //Apply text to all fields
	$(document).on('click', '.apply_all', function() {
		var thisParent = $(this).parent();
		var dataTarget = $(this).data('target');
		var tempString = '.fields > input[data-field="'+dataTarget+'"]';
		var target = $(tempString);
		var getData = $(thisParent).children('input[data-field="'+dataTarget+'"]').val();
		console.log(target);
		target.val(getData);
	});
	//Copy Domain name to header of Domain set
	$(document).on('keyup', '.domain', function() {
		var temp_num = $(this).attr('data-click');
		var this_domain = $(this).val();
		var this_h2 = $('#domain_name' + temp_num);
		console.log($(this).text().length);
		if ($(this).val().length == 0) {
			this_h2.text('Domain Data');
		} else {
			this_h2.text(this_domain);
		}
	});
	//Remove Domain Set
	$(document).on('click', '.delete_fields', function() {
    	$(this).parents("div:first").remove();
    	$('.fields').last().addClass('last');
	});

    $('#quote').css('-webkit-transform', 'scale(1,1)');

    //TASK MANAGER AJAX FUNCTIONS
    $(document).on('submit', 'form.design_content', function(){
    	e.preventDefault();
		var formdata = $(this).serialize();
		$.ajax({
            type: "POST",
            url: "claim_process.php",
            data: formdata,
			success: function( data ) {
				$('#messages').html('<div class="claimed">You Have Claimed A Task!</div>');	
				$("#messages").delay(4000).fadeOut("slow");			
			}
         });
        return false;
	});
    $(document).on('submit', '#popout_task', function(){
        var formdata = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "submit_process.php",
            data: formdata,
			success: function( data ) {
				$('#messages').html('<div class="claimed">Thank You For Submitting!</div>');
				$("#messages").delay(4000).fadeOut("slow");
				$('#popout_wrap').hide();
				$(".page-wrap").load('my_tasks.php .page-wrap');
			}
         });
        return false;
    });

	//TASK MANAGER OTHER FUNCTIONS
	//ContentAdmin Assign Functions
	$(document).on('click', '#assign_writer', function(){
		var writerlist = $('#writerlist').html();
		var selectlist = $('#selectlist');
		selectlist.html(writerlist);
	});
	$(document).on('click', '#assign_admin', function(){
		var adminlist = $('#adminlist').html();
		var selectlist = $('#selectlist');
		selectlist.html(adminlist);
	});
	//Pass/Sendback Reviewer submit button
	$(document).on('click', '#reviewed', function(){
		var checked = this.checked ? 'Pass' : 'Send Back';
		$('.popout_button').html(checked);
		$('#reviewp').toggle();
	});
	//Hide task popout init
	$('#popout_wrap').hide();	
	//close task popout
	$(document).on('click', '.close_popout', function() {
		$('#popout_wrap').hide('fade');
		window.location.reload();
		
	});
	//Add Note Function-------------------------------------
	$(document).on('click', '#addNote', function() {
		var domain = $(this).data('domain');
		var date = $(this).data('date');
		var name = $(this).data('name');
		var note = prompt('Enter New Note:');
		if(note){
			$.ajax({
				url: 'add_note.php',
				type: "GET",
				data: ({domain: domain, name: name, date: date, note: note}),
				success: function(data){
					$('#noteSuccess').html('New Note Added!');
					$("#noteSuccess").delay(4000).fadeOut("slow");
					var html = $('#notes').html();
					$('#notes').html('<div class="domainNote"><p class="noteStamp">'+name+': '+date+'</p><p class="noteContent">'+note+'</p></div>'+html);
					var html = $('#newDomainNotes').html();
					$('#newDomainNotes').html('<div class="domainNote"><p class="noteStamp">'+name+': '+date+'</p><p class="noteContent">'+note+'</p></div>'+html);
				}
			});
		}
	});
	//Modify notes function!----------------------sweet sauce inc
	$(document).on('dblclick', '.noteContent', function () {
    	var oldNote = $(this).html();
    	$(this).hide();
    	var parent = $(this).parent();
    	parent.append('<input type="text" id="imEditing" value="' + oldNote + '">');
    	$(this).addClass('editingMe');
	});
	$(document).on('focusout', '#imEditing', function () {
	    var newEdit = $('.editingMe');
	    var addButton = $('#addNote');
	    var date = addButton.data('date');
	    var name = addButton.data('name');
	    var domain= addButton.data('domain');
	    var newNote = $(this).val();
	    $(this).hide();
	    var oldNote = newEdit.html();
	    newEdit.show();
	    newEdit.html(newNote);
	    $(this).remove();
	    if(newNote != oldNote){
	    $.ajax({
	        url: 'modify_note.php',
	        type: 'GET',
	        data: ({date: date, name: name, domain: domain, oldnote: oldNote, newnote: newNote}),
	        success: function(data){
	            $('#noteSuccess').html('Note Modified!');
				$("#noteSuccess").delay(4000).fadeOut("slow");
	        }
	    });
	    }
	});
	//Add Note Function HOST NOTES!!!!!!!!-------------------------------
	$(document).on('click', '#addHostNote', function() {
		var host = $(this).data('host');
		var date = $(this).data('date');
		var name = $(this).data('name');
		var note = prompt('Enter New Note:');
		if(note){
			$.ajax({
				url: 'host_note.php',
				type: "GET",
				data: ({host: host, name: name, date: date, note: note}),
				success: function(data){
					$('#hostNoteSuccess').html('New Note Added!');
					$("#hostNoteSuccess").delay(4000).fadeOut("slow");
					var html = $('#notes').html();
					$('#notes').html('<div class="hostNote"><p class="noteStamp">'+name+': '+date+'</p><p class="noteContent">'+note+'</p></div>'+html);
					var html = $('#newHostNotes').html();
					$('#newHostNotes').html('<div class="hostNote"><p class="noteStamp">'+name+': '+date+'</p><p class="noteContent">'+note+'</p></div>'+html);
				}
			});
		}
	});
	//Modify notes function!---HOST NOTES!!!!!!!-------------sweet sauce inc
	$(document).on('dblclick', '.noteContent', function () {
    	var oldNote = $(this).html();
    	$(this).hide();
    	var parent = $(this).parent();
    	parent.append('<input type="text" id="imEditing" value="' + oldNote + '">');
    	$(this).addClass('editingMe');
	});
	$(document).on('focusout', '#imEditing', function () {
	    var newEdit = $('.editingMe');
	    var addButton = $('#addNote');
	    var date = addButton.data('date');
	    var name = addButton.data('name');
	    var host= addButton.data('host');
	    var newNote = $(this).val();
	    $(this).hide();
	    var oldNote = newEdit.html();
	    newEdit.show();
	    newEdit.html(newNote);
	    $(this).remove();
	    if(newNote != oldNote){
	    $.ajax({
	        url: 'modify_host_note.php',
	        type: 'GET',
	        data: ({date: date, name: name, host: host, oldnote: oldNote, newnote: newNote}),
	        success: function(data){
	            $('#hostNoteSuccess').html('Note Modified!');
				$("#hostNoteSuccess").delay(4000).fadeOut("slow");
	        }
	    });
	    }
	});
	//Pop out for claimed task
	$(document).on('click', '.view_task', function() {
		var domain = $(this).data('domain');
		var write = $(this).data('writing');
		var fixed = $(this).data('fixed');
		$('#popout_wrap').show();
		$.ajax({
			url: 'partials/popout_domain.php',
			type: "GET",
			data: ({domain: domain, writing: write, fixed: fixed}),
			success: function(data){
				$("#popout_box").html(data);
				$('#reviewp').show();
			}
		});
	});
	//Task Info POPOUT my_tasks.php
	$(document).on('click', '.tab_task', function() {
		var domain = $(this).data('domain');
		var write = $(this).data('writing');
		var fixed = $(this).data('fixed');
		$('#popout_wrapper').removeClass('full_page');
		$('#popout_wrap').show();
		$.ajax({
			url: 'partials/popout_domain.php',
			type: "GET",
			data: ({domain: domain, writing: write, fixed: fixed}),
			success: function(data){
				$("#popout_box").html(data);
			}
		});
	});
	//Build History POPOUT my_tasks.php
	$(document).on('click', '.tab_history', function() {
		var domain = $(this).data('domain');
		var writing = $(this).data('writing');
		var fixed = $(this).data('fixed');
		$('#popout_wrapper').removeClass('full_page');
		$('#popout_wrap').show();
		$.ajax({
			url: 'partials/popout_history.php',
			type: "GET",
			data: ({domain: domain, writing: writing, fixed: fixed}),
			success: function(data){
				$("#popout_box").html(data);
			}
		});
	});
	//FTP/cPanel POPOUT my_tasks.php
	$(document).on('click', '.tab_ftpcpanel', function() {
		var domain = $(this).data('domain');
		var writing = $(this).data('writing');
		var fixed = $(this).data('fixed');
		$('#popout_wrapper').removeClass('full_page');
		$('#popout_wrap').show();
		$.ajax({
			url: 'partials/popout_ftpcpanel.php',
			type: "GET",
			data: ({domain: domain, writing: writing, fixed: fixed}),
			success: function(data){
				$("#popout_box").html(data);
			}
		});
	});
	//Content Tab POPOUT my_tasks.php
	//$(document).on('click', '.tab_content', function() {
	//	var domain = $(this).data('domain');
	//	var wireframe = $(this).data('wireframe');
	//	$('#popout_wrap').show();
	//	$('#popout_wrapper').addClass('full_page');
	//	$.ajax({
	//		url: 'wireframe_forms/Wireframe.php',
	//		type: "GET",
	//		data: ({domain: domain, wireframe: wireframe}),
	//		success: function(data){
	//			$("#popout_box").html(data);
	//		}
	//	});
	//});
	//Send Back To Queue my_tasks.php
	$(document).on('click', '.popout_return', function() {
		var domain = $(this).data('domain');
		var permissions = $(this).data('permissions');
		$.ajax({
			url: 'return_process.php',
			type: "POST",
			data: ({domain: domain, user_permissions: permissions}),
			success: function(data){
				$('#popout_wrap').hide();
				$(".page-wrap").load('my_tasks.php .page-wrap');
			}
		});
	});
	//Send Back To Support my_tasks.php
	$(document).on('click', '.return_support', function() {
		var domain = $(this).data('domain');
		var date = $(this).data('date');
		var name = $(this).data('name');
		var note = prompt('Enter Send Back Note:');
		if(note){
			$.ajax({
				url: 'add_note.php',
				type: "GET",
				data: ({domain: domain, name: name, date: date, note: note}),
				success: function(data){
					$.ajax({
						url: 'return_support.php',
						type: "POST",
						data: ({domain: domain}),
						success: function(data){
							$('#popout_wrap').hide();
							$(".page-wrap").load('my_tasks.php .page-wrap');
						}
					});
				}
			});
		}
	});
	//Send Back To Dev when fixed my_tasks.php
	$(document).on('click', '.fixed_return', function() {
		var domain = $(this).data('domain');
		$.ajax({
			url: 'return_dev.php',
			type: "POST",
			data: ({domain: domain}),
			success: function(data){
				$('#popout_wrap').hide();
				$(".page-wrap").load('my_tasks.php .page-wrap');
			}
		});
	});
	//FOR THE GOALS POPOUT
	$(document).on('click', '.popout', function() {
		var vertical = $(this).data('vertical');
		var country = $(this).data('country');
		var language = $(this).data('language');
		var permissions = $(this).data('permissions');
		var blog = $(this).data('blog');
		$('#popout_wrap').show();
		$.ajax({
			url: 'partials/popout_goals.php',
			type: "GET",
			data: ({vertical: vertical, country: country, language: language, permissions: permissions, blog: blog}),
			success: function(data){
				$("#popout_box").html(data);
			}
		});
	});
	//FOR THE Assigned popout Goals.php
	$(document).on('click', '.popout_assigned', function() {
		var vertical = $(this).data('vertical');
		var country = $(this).data('country');
		var language = $(this).data('language');
		var permissions = $(this).data('permissions');
		$('#popout_wrap').show();
		$.ajax({
			url: 'partials/popout_assigned.php',
			type: "GET",
			data: ({vertical: vertical, country: country, language: language, permissions: permissions}),
			success: function(data){
				$("#popout_box").html(data);
			}
		});
	});
	//GOALS POPOUT CLAIM BUTTON
	$(document).on('click', '.claim_button', function() {
		var username = $(this).data('username');
		var date = $(this).data('date');
		var domain = $(this).data('domain');
		var user_permissions = $(this).data('user_permissions');
		var blog = $(this).data('blog');
		$('#popout_wrap').show();
		//var prompt = prompt('Claim This Task?');
		$.ajax({
			url: 'claim_process.php',
			type: "POST",
			data: ({username: username, date_submitted: date, domain: domain, user_permissions: user_permissions, blog: blog}),
			success: function(data){
			}
		});
		$(this).parents("div:first").remove();
	});
	//Dashboard FUNCTIONS_-----------------
	//Click to see which domains the user is assigned Dashboard.php
	$(document).on('click', '.dashAssigned', function() {
		var name = $(this).data('name');
		var permissions = $(this).data('permissions');
		var parent = $(this).parents('.user');
		var child = parent.children('.user_view');
		$.ajax({
			url: 'partials/dashboard_inq.php',
			type: "GET",
			data: ({name: name, permissions: permissions}),
			success: function(data){
				child.html(data);
				if($('.domains p').length % 2 != 0){
					$('.domains p').last().css("width", "100%");
				}
			}
		});
	});
	//load Personal history dashboard.php
	$(document).ready(function(){
		var thisguy = $('.historyjs');
		var date = thisguy.data('date');
		var user = thisguy.data('user');
		var team = thisguy.data('team');
		$.ajax({
			url: 'partials/dashboard_history.php',
			type: 'GET',
			data: ({date: date, user: user, team: team}),
			success: function(data){
				$('.history_view').html(data);
			}
		});
	});
	//Load Team Overviews dashboard.php
	$(document).on('click', '.userOverview', function(){
		var parent = $(this).parents('.user');
		var name = parent.data('name');
		var user_view = parent.children('.user_view');
		$.ajax({
			url: 'partials/dashboard_overview.php',
			type: 'GET',
			data: ({name: name}),
			success: function(data){
				user_view.html(data);
			}
		});
	});
	//load Team Members History dashboard.php
	$(document).on('click', '.historyView', function() {
		var date = $(this).data('date');
		var user = $(this).data('user');
		var team = $(this).data('team');
		var parent = $(this).parents('.user');
		var child = parent.children('.user_view');
		$.ajax({
			url: 'partials/dashboard_history.php',
			type: 'GET',
			data: ({date: date, user: user, team: team, teamLead: 'yes'}),
			success: function(data){
				child.html(data);
				if($('.domains p').length % 2 != 0){
					$('.domains p').last().css("width", "100%");
				}
			}
		});
	});
	//Change Date on click TEAM LEAD dashboard.php
	$(document).on('click', '.changeHistory', function() {
		var parent = $(this).parents('.user');
		var child = parent.children('.user_info').children('.links').children('.historyView');
		var view = parent.children('.user_view');
		var date = $(this).html();
		var user = child.data('user');
		var team = child.data('team');
		$.ajax({
			url: 'partials/dashboard_history.php',
			type: 'GET',
			data: ({date: date, user: user, team: team, teamLead: 'yes'}),
			success: function(data){
				view.html(data);
				if($('.domains p').length % 2 != 0){
					$('.domains p').last().css("width", "100%");
				}
			}
		});
	});
	//Change Date on click USER dashboard.php
	$(document).on('click', '.change_date', function(){
		var thisguy = $('.historyjs');
		var user = thisguy.data('user');
		var team = thisguy.data('team');
		var date = $(this).html();
		$.ajax({
			url: 'partials/dashboard_history.php',
			type: 'GET',
			data: ({date: date, user: user, team: team}),
			success: function(data){
				$('.history_view').html(data);
			}
		});
	});
	// Live numbers auto refresh //
function numbers() {
	$('#liveupdate').load('newliveupdate.php');
}
$(function() {
	numbers();
	setInterval(numbers, 1000);
	});
});
$(document).on("keyup", ".add", function () {
	dolla = $(this).val();
	while(dolla.indexOf('$') > -1){
		dolla = dolla.replace("$","");
		$(this).val(dolla);
	}
});
$(document).ready(function(){
	var ids = [
	"ContentDayChart",
	"ContentWeekChart",
	"ContentMonthChart",
	"ContentAllChart",
	"WriterDayChart",
	"WriterWeekChart",
	"WriterMonthChart",
	"WriterAllChart",
	"ReviewDayChart",
	"ReviewWeekChart",
	"ReviewMonthChart",
	"ReviewAllChart",
	"DevDayChart",
	"DevWeekChart",
	"DevMonthChart",
	"DevAllChart",
	"DesignDayChart",
	"DesignWeekChart",
	"DesignMonthChart",
	"DesignAllChart",
	"SupportDayChart",
	"SupportWeekChart",
	"SupportMonthChart",
	"SupportAllChart",
	"QADayChart",
	"QAWeekChart",
	"QAMonthChart",
	"QAAllChart",
	]
	var i;
	var len = ids.length;
	for(i = 0; i < len; i++){
		var chartid = $('#'+ids[i]+'');
		var thischart = document.getElementById(''+ids[i]+'');
		if(thischart){
			var complete = chartid.data('complete');
			var inQ = chartid.data('inq');
			var inProcess = chartid.data('inprocess');
			var ctx = thischart.getContext('2d');
			var options = {animation: false, segmentShowStroke: false, percentageInnerCutout: 75}
			var data = [
				{
					value: complete,
					color:"#5dcc18"
				},
				{
					value : inQ,
					color : "#4042d6"
				},
				{
					value : inProcess,
					color : "#efa12b"
				}
			]
			new Chart(ctx).Doughnut(data,options);
			var key = chartid.siblings('.donutKey');
			key.children('.completedSpan').children('.cnumber').html('('+complete+')');
			key.children('.inQSpan').children('.qnumber').html('('+inQ+')');
			key.children('.inProcessSpan').children('.pnumber').html('('+inProcess+')');
		}
	}
});

//NEW DOMAIN ACCORDION javascript
$(document).ready(function(){
	//Change css and views on click
	$(document).on('click', 'span.btn-overview', function(){
		var button = $(this).data('button');

		$('.currentSelection').addClass('btn-overview');
		$('.currentSelection').removeClass('currentSelection');

		$(this).removeClass('btn-overview');
		$(this).addClass('currentSelection');

		if(button == 'domain'){

			var click = $('#domainNav').children('.navItem').data('click');
			var domain = $('#domainName').html();

			$('#hostArea').hide();
			$('#domainArea').show();
			$('#hostNav').hide();
			$('#domainNav').show();
			$('#host_basic').hide();
			$('#domain_basic').show();
			switch(click){
				case 'build':
					$.ajax({
						url: 'partials/domain_history.php',
						type: 'GET',
						data: ({domain: domain}),
						success: function(data){
							$('#viewBox').html(data);
						}
					});
					break;
				case 'val':
					$.ajax({
						url: 'partials/domain_value.php',
						type: 'GET',
						data: ({domain: domain}),
						success: function(data){
							$('#viewBox').html(data);
						}
					});
					break;
				case 'log':
					$.ajax({
						url: 'partials/domain_logistics.php',
						type: 'GET',
						data: ({domain: domain}),
						success: function(data){
							$('#viewBox').html(data);
						}
					});
					break;
				case 'reg':
					$.ajax({
						url: 'partials/domain_registration.php',
						type: 'GET',
						data: ({domain: domain}),
						success: function(data){
							$('#viewBox').html(data);
						}
					});
					break;
			}
		} else if(button == 'hostAccount'){

			var click = $('#hostNav').children('.navItem').data('click');
			var host = $('#hostName').html();

			$('#domainArea').hide();
			$('#hostArea').show();
			$('#domainNav').hide();
			$('#hostNav').show();
			$('#domain_basic').hide();
			$('#host_basic').show();
			switch(click){
				case 'login':
					$.ajax({
						url: 'partials/host_login.php',
						type: 'GET',
						data: ({hostAccount: host}),
						success: function(data){
							$('#viewBox').html(data);
						}
					});
					break;
				case 'billing':
					$.ajax({
						url: 'partials/host_billing.php',
						type: 'GET',
						data: ({hostAccount: host}),
						success: function(data){
							$('#viewBox').html(data);
						}
					});
					break;
			}
		}
	});
	//Change domain info on click
	$(document).on('click', '.btn-menu', function(){
		var sibling = $(this).siblings('.navItem');
		sibling.removeClass('navItem');
		sibling.addClass('btn-menu');
		$(this).removeClass('btn-menu');
		$(this).addClass('navItem');
		var click = $(this).data('click');
		var domain = $('#domainName').html();
		var host = $('#hostName').html();

		switch(click){
			case 'build':
				$.ajax({
					url: 'partials/domain_history.php',
					type: 'GET',
					data: ({domain: domain}),
					success: function(data){
						$('#viewBox').html(data);
					}
				});
				break;
			case 'val':
				$.ajax({
					url: 'partials/domain_value.php',
					type: 'GET',
					data: ({domain: domain}),
					success: function(data){
						$('#viewBox').html(data);
					}
				});
				break;
			case 'log':
				$.ajax({
					url: 'partials/domain_logistics.php',
					type: 'GET',
					data: ({domain: domain}),
					success: function(data){
						$('#viewBox').html(data);
					}
				});
				break;
			case 'reg':
				$.ajax({
					url: 'partials/domain_registration.php',
					type: 'GET',
					data: ({domain: domain}),
					success: function(data){
						$('#viewBox').html(data);
					}
				});
				break;
			case 'login':
				$.ajax({
					url: 'partials/host_login.php',
					type: 'GET',
					data: ({hostAccount: host}),
					success: function(data){
						$('#viewBox').html(data);
					}
				});
				break;
			case 'billing':
				$.ajax({
					url: 'partials/host_billing.php',
					type: 'GET',
					data: ({hostAccount: host}),
					success: function(data){
						$('#viewBox').html(data);
					}
				});
				break;
		}
	});
	//Edit sections
	$(document).on('click', '.btn-edit', function(){
		var domain = $('#domainName').html();
		var host = $('#hostName').html();
		var click = $(this).data('section');

		switch(click){
			case 'basic':
				$.ajax({
					url: 'update_forms/edit_domain_basic.php',
					type: 'GET',
					data: ({DomainName: domain}),
					success: function(data){
						$('#edit_wrap').show();
						$('#edit').html(data);
					}
				});
				break;
			case 'history':
				$.ajax({
					url: 'update_forms/edit_build_history.php',
					type: 'GET',
					data: ({DomainName: domain}),
					success: function(data){
						$('#edit_wrap').show();
						$('#edit').html(data);
					}
				});
				break;
			case 'value':
				$.ajax({
					url: 'update_forms/edit_domain_value_metrics.php',
					type: 'GET',
					data: ({DomainName: domain}),
					success: function(data){
						$('#edit_wrap').show();
						$('#edit').html(data);
					}
				});
				break;
			case 'log':
				$.ajax({
					url: 'update_forms/edit_domain_logistics.php',
					type: 'GET',
					data: ({DomainName: domain}),
					success: function(data){
						$('#edit_wrap').show();
						$('#edit').html(data);
					}
				});
				break;
			case 'reg':
				$.ajax({
					url: 'update_forms/edit_domain_registration.php',
					type: 'GET',
					data: ({DomainName: domain}),
					success: function(data){
						$('#edit_wrap').show();
						$('#edit').html(data);
					}
				});
				break;
			case 'hbasic':
				$.ajax({
					url: 'update_forms/edit_host_basic.php',
					type: 'GET',
					data: ({HostAccount: host}),
					success: function(data){
						$('#edit_wrap').show();
						$('#edit').html(data);
					}
				});
				break;
			case 'login':
				$.ajax({
					url: 'update_forms/edit_host_login.php',
					type: 'GET',
					data: ({HostAccount: host}),
					success: function(data){
						$('#edit_wrap').show();
						$('#edit').html(data);
					}
				});
				break;
			case 'billing':
				$.ajax({
					url: 'update_forms/edit_host_billing.php',
					type: 'GET',
					data: ({HostAccount: host}),
					success: function(data){
						$('#edit_wrap').show();
						$('#edit').html(data);
					}
				});
				break;
		}
	});
});