    $(window).resize(function() {
    
      $('.vli').css({"display":"none"});
    
    });
    
    
    
    function showOrHide(x,a, sh) 
    
    {
    
    	console.log(x);
    
    	console.log(a);
    
    	//var id				= x.className;
    
    	var element 		= $('#' + x);
    
    	var position 		= element.offset();
    
    	var X			 	= position.left;
    
    	var Y			 	= position.top;
    
    	console.log(X);
    
    	console.log(Y);
    
    	
    
    	switch(sh){
    
    		case 'block':
    
    			var h = element.height();
    
    			$('#'+a).css({"display":sh});
    
    			$('#'+a).animate({top: Y+h});
    
    			$('#'+a).css({'margin-left':X-229});
    
    			
    
    			$('.'+a).live('mouseleave',function()
    
    			{
    
    				 $(document).mousemove(function(e){
    
    					var width = 150;
    
    					var ML = X;
    
    					var ML2 = ML+width;
    
    					console.log(e.pageX+'&'+ML+'&'+ML2);
    
    					if((e.pageX>ML) && (e.pageX<=ML2)){
    
    			console.log('hit3');
    
    	  
    
    					}else{
    
    						$('#'+a).css({"display":"none"});
    
    					}
    
    					
    
    	   }); 
    
    				
    
    			});
    
    			
    
    			$('#'+a).live('mouseleave',function()
    
    			{
    
    				
    
    				$('#'+a).css({"display":"none"});
    
    			});
    
    		break;
    
    		case 'none':
    
    			//$('#'+a).css({"display":sh});
    
    			
    
    		break;	
    
    	}
    
    	/*
    
    	var abra	 		= element.style;
    
    	abra.display 		= sh; 
    
    	if(sh == 'block')
    
    	{
    
    		//var aposition 	= $('#' + id).offset();
    
    		//alert(JSON.stringify(aposition));
    
    		//document.getElementById(id).style.left	= (X + 500);
    
    		//document.getElementById(id).style.top	= (Y + 500);
    
    		// $('#' + id).offset(500, 500);
    
    		if(element)
    
    		{
    
    			//alert(Y);
    
    			element.animate({top: Y});
    
    		}
    
    		else
    
    		{
    
    			alert('not found');
    
    		}
    
    	}*/
    
    }