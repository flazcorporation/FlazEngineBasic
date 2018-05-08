	function jq(attribute){
          	var selector,target,param,speed;
			if('selector' in attribute){
				selector = attribute['selector'];
			}else{
				console.log("FlazEngine Error: Please Determine Selector");
			}
			if('target' in attribute){
				target = attribute['target'];
			}else{
				console.log("FlazEngine Error: Please Determine Target");
			}             	
			if('param' in attribute){
				param = attribute['param'];
			}else{
				console.log("FlazEngine Error: Please Determine Parameteres of Animation");
			}
			if('speed' in attribute){
				speed = attribute['speed'];
			}else{
				console.log("FlazEngine Error: Please Determine Speed of Effect");
			}
			if('callback' in attribute){
				callback = attribute['callback'];
			}else{
				console.log("FlazEngine Error: Please Determine Callback of Effect");
			}
	        $(document).ready(function(){
		            if(attribute['effect']=="hide"){
			           	$(target).hide(speed);
		            }else if(attribute['effect']=="show"){
			           	$(attribute['target']).show(speed);
		            }else if(attribute['effect']=="fadeIn"){
			          	$(target).fadeIn(speed);
		            }else if(attribute['effect']=="fadeOut"){
			           	$(target).fadeOut(speed);
		            }else if(attribute['effect']=="fadeToggle"){
			           	$(target).fadeToggle(speed);
		            }else if(attribute['effect']=="fadeTo"){
			           	$(target).fadeTo(speed);
		            }else if(attribute['effect']=="slideDown"){
			           	$(target).slideDown(speed);
		            }else if(attribute['effect']=="slideUp"){
			           	$(target).slideUp(speed);
		            }else if(attribute['effect']=="slideToggle"){
			           	$(target).slideToggle(speed);
		            }else if(attribute['effect']=="animate"){
			           	$(target).animate(param,speed);
		            }
	        });		
	}
	function jq_hide(selector,target,speed){
          $(document).ready(function(){
	            	$(target).hide(speed);
	        });
	}
	function jq_show(selector,target,speed){
          $(document).ready(function(){
	            	$(target).show(speed);
	        });
	}	
	function jq_fade_in(selector,target,speed){
          $(document).ready(function(){
	            	$(target).fadeIn(speed);
	        });
	}	
	function jq_fade_out(selector,target,speed){
          $(document).ready(function(){
	            	$(target).fadeOut(speed);
	        });
	}		
	function jq_fade_toggle(selector,target,speed){
          $(document).ready(function(){
	            	$(target).fadeToggle(speed);
	        });
	}		
	function jq_fade_to(selector,target,speed){
          $(document).ready(function(){
	            	$(target).fadeTo(speed);
	        });
	}		
	function jq_slide_down(selector,target,speed){
          $(document).ready(function(){
	            	$(target).slideDown(speed);
	        });
	}			
	function jq_slide_up(selector,target,speed){
          $(document).ready(function(){
	            	$(target).slideUp(speed);
	        });
	}				
	function jq_slide_toggle(selector,target,speed){
          $(document).ready(function(){
	            	$(target).slideToggle(speed);
	        });
	}					
	function jq_animate(param,target,speed){
          $(document).ready(function(){
	            	$(target).slideToggle(param,speed);
	        });
	}						
	function jq_stop(selector,param,target){
          $(document).ready(function(){
	            	$(target).stop();
	        });
	}
	var val_jq_text;
	function jq_get_text(target){
          	$(document).ready(function(){
	            val_jq_text = $(target).text();
	        });
          return val_jq_text;
	}
	var val_jq_html;
	function jq_get_html(target){
          	$(document).ready(function(){
	            val_jq_html = $(target).html();
	        });
          return val_jq_html;
	}
	var val_jq_val;
	function jq_get_val(target){
          	$(document).ready(function(){
	            val_jq_val = $(target).val();
	        });
          return val_jq_val;
	}
	function jq_set_text(target,val){
          	$(document).ready(function(){
	            $(target).text(val);
	        });
	}
	function jq_set_html(target,val){
          	$(document).ready(function(){
	            $(target).html(val);
	        });
	}
	function jq_set_attr(target,attr,val){
          	$(document).ready(function(){
	            $(target).attr(attr,val);
	        });
	}
	function jq_set_attrs(target,param){
          	$(document).ready(function(){
	            $(target).attr(param);
	        });
	}	
	function jq_append(target,val){
          	$(document).ready(function(){
	            $(target).append(val);
	        });
	}		
	function jq_prepend(target,val){
          	$(document).ready(function(){
	            $(target).prepend(val);
	        });
	}			
	function jq_before(target,val){
          	$(document).ready(function(){
	            $(target).before(val);
	        });
	}				
	function jq_after(target,val){
          	$(document).ready(function(){
	            $(target).after(val);
	        });
	}
	function jq_remove(target){
          	$(document).ready(function(){
	            $(target).remove();
	        });
	}						
	function jq_empty(target){
          	$(document).ready(function(){
	            $(target).empty();
	        });
	}						
	function jq_class_add(target,clas){
          	$(document).ready(function(){
	            $(target).addClass(clas);
	        });
	}
	function jq_class_remove(target,clas){
          	$(document).ready(function(){
	            $(target).removeClass(clas);
	        });
	}						
	function jq_class_toggle(target,clas){
          	$(document).ready(function(){
	            $(target).toggleClass(clas);
	        });
	}						
	function jq_css(target,property,value){
          	$(document).ready(function(){
	            $(target).css(property,value);
	        });
	}						
	function jq_csses(target,param){
          	$(document).ready(function(){
	            $(target).css(param);
	        });
	}						
	var val_jq_width;
	function jq_get_width(target){
          	$(document).ready(function(){
	            val_jq_width = $(target).width();
	        });
          return val_jq_width;
	}
	var val_jq_height;
	function jq_get_height(target){
          	$(document).ready(function(){
	            val_jq_height = $(target).height();
	        });
          return val_jq_height;
	}
	var val_jq_inner_width;
	function jq_get_inner_width(target){
          	$(document).ready(function(){
	            val_jq_inner_width = $(target).innerWidth();
	        });
          return val_jq_inner_width;
	}
	var val_jq_inner_height;
	function jq_get_inner_height(target){
          	$(document).ready(function(){
	            val_jq_inner_height = $(target).innerHeight();
	        });
          return val_jq_inner_height;
	}
	var val_jq_outer_width;
	function jq_get_outer_width(target){
          	$(document).ready(function(){
	            val_jq_outer_width = $(target).outerWidth();
	        });
          return val_jq_outer_width;
	}
	var val_jq_outer_height;
	function jq_get_outer_height(target){
          	$(document).ready(function(){
	            val_jq_outer_height = $(target).outerHeight();
	        });
          return val_jq_outer_height;
	}
	function jq_test(){
		alert("Mulyawan");
	}
	