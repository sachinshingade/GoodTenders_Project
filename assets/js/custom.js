/*************************************
@@File: Job Stock  Template Custom Js

All custom js files contents are below
**************************************
* 01. Company Brand Carousel
* 02. Client Story testimonial
* 03. Bootstrap wysihtml5 editor
* 04. Tab Js
* 05. Add field Script
**************************************/

(function($){
"use strict";
	 
	 /*---Company Brand Carousel --*/
	 $("#company-brands").owlCarousel({
		items:5,
		itemsDesktop:[1199,5],
		itemsDesktopSmall:[979,4],
		itemsTablet:[768,3],
		itemsMobile: [600, 2],
		pagination: false,
		navigation:false,
		navigationText:["",""],
		autoPlay:true
	});
	
	/*--- Client Story testimonial --*/
	$("#client-testimonial-slider").owlCarousel({
		items:3,
		itemsDesktop:[1199,3],
		itemsDesktopSmall:[979,2],
		itemsTablet:[768,1],
		pagination: false,
		navigation:false,
		navigationText:["",""],
		autoPlay:true
	});
	
	/*---Bootstrap wysihtml5 editor --*/	
	$('.textarea').wysihtml5();
	
	/*---Tab Js --*/
	$("#simple-design-tab a").on('click', function(e){
				e.preventDefault();
				$(this).tab('show');
	});
	
	/*-----Add field Script------*/
	$('.extra-field-box').each(function() {
    var $wrapp = $('.multi-box', this);
    $(".add-field", $(this)).on('click', function() {
        $('.dublicat-box:first-child', $wrapp).clone(true).appendTo($wrapp).find('input').val('').focus();
    });
    $('.dublicat-box .remove-field', $wrapp).on('click', function() {
        if ($('.dublicat-box', $wrapp).length > 1)
            $(this).parent('.dublicat-box').remove();
		});
	});
			
			
	})(jQuery);

	//index page js logic

	$('#adbtn').on('click', function(){
					var isText = document.getElementById("texttoggle");
					var iSelector = $(this).find('span:first');
					if(iSelector.hasClass('fa fa-angle-down')) 
					{
						iSelector.removeClass('fa fa-angle-down')
						iSelector.addClass('fa fa-angle-up')
						//isText.innerHTML == 'Hide Advanced Search';
					}
					else{
						iSelector.removeClass('fa fa-angle-up')
						iSelector.addClass('fa fa-angle-down')
						//isText.innerHTML == 'Show Advanced Search';
					}
					if(isText.innerHTML == 'Show Advanced Search')
					{
						isText.innerHTML = 'Hide Advanced Search';
					}else{
						isText.innerHTML = 'Show Advanced Search';
					}

					var div = document.getElementById('advanced_search');
    				if (div.style.display !== 'none') {
        				div.style.opacity = 0;
    					div.style.transform = 'scale(0)';
    					window.setTimeout(function(){
      						div.style.display = 'none';
    					},500);
        			}
    				else {	
        				div.style.display = 'block';
        				window.setTimeout(function(){
      					div.style.opacity = 1;
      					div.style.transform = 'scale(1)'
      				});
    				}

				});	

				$(function() {
    				
                $("#deadline1").datepicker({
                    numberOfMonths: 1,
                    showAnim: "clip",
                    dateFormat: 'dd-mm-yy',
                    minDate: new Date(),
                        onSelect: function(selected) {
                        $("#deadline2").datepicker("option","minDate", selected)
                    }
                });
                    $("#deadline2").datepicker({ 
                        numberOfMonths: 1,
                        showAnim: "clip",
                        dateFormat: 'dd-mm-yy',
                        onSelect: function(selected) {
                        $("#deadline1").datepicker("option","maxDate", selected)
                    }
                });

				});	

               
                $(document).ready(function(){
     			$(window).scroll(function () {
            		if ($(this).scrollTop() > 50) {
                		$('#myBtn').fadeIn();
            		} else {
                		$('#myBtn').fadeOut();
            		}
        		});
        		// scroll body to 0px on click
        		$('#myBtn').click(function () {
            		//$('#myBtn').tooltip('hide');
            	$('body,html').animate({
                	scrollTop: 0
            		}, 800);
            		return false;
        		});
        
        			$('#myBtn').tooltip('show');

				});


	function closeAdvanced(){
		var div = document.getElementById('advanced_search');
		div.style.display="none";
    	div.style.transform = 'scale(0)';

		document.getElementById("texttoggle").innerHTML="Show Advanced Search";
	}

   
    $('.selectpicker').tooltip('enable');
    $('.selectpicker').selectpicker();

    
