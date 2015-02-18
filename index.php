<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<!--<script src="https://code.jquery.com/jquery-2.1.3.min.js" type="text/javascript"></script>-->
		<script src="jquery.2.1.3.min.js"></script>
		<style type="text/css" media="screen">
			.cell_border{
				border: 1px solid red;
				padding : 3px;
				margin : 2px;
			}

			.render_layout{

			}

			#render_layout td:hover{
				/*background: #C8FFC8;*/
				cursor : pointer;
			}

			.td_selected{
				background: #4184F3;
			}

			.td_unselected{
				background: #fff;
			}
		</style>
	</head>
	<body>
		<div>
			Rows : <input type="text" name="" id="create_rows" value="3">	<br/>
			Cols : <input type="text" name="" id="create_cols" value="4">	<br/>
			<input type="button" name="" value="Create" id="create_layout_button">
		</div>
		<br/>
		<br/>
		<br/>
		<br/>

		<table id="render_layout" border="1" cellpadding="5" cellspacing="10" width="500"></table>
		<div style="display:none" id="seat_config">
		<input type="text" id="seat_number" data-s_number="">
		<input type="button" name="" value="Save" id="save_seat_number">
		</div>
		



 


		<script type="text/javascript">
		$(function(){

				var create_rows      = $('#create_rows'),
				create_cols          = $('#create_cols'),
				create_layout_button = $('#create_layout_button'),
				render_layout        = $('#render_layout'),
				tr                   = $('#render_layout tr'),
				td                   = $('#render_layout tr td'),
				seat_config          = $('#seat_config'),
				seat_number          = $('#seat_number'),
				save_seat_number     = $('#save_seat_number');

				var current_select;
			

			    create_layout_button.on('click', function(){

			       	var table_element;			    	
			    	for(var i = 1; i <= parseInt(create_rows.val()); i++){
			    		table_element += '<tr>';
				    	for (var j = 1; j <= parseInt(create_cols.val()); j++) {
				    		table_element += '<td class="td_unselected" data-unique-number="'+ i+j +'" id="'+ i+j +'">&nbsp</td>';
				    	}
				        table_element += '</tr>';
			    	}			
			    	render_layout.html(table_element);  

			    });


			    render_layout.on('click','td',function(){
			    	current_select = $(this).attr('id');
			    	if($(this).hasClass('td_selected')){
			    		$(this).removeClass('td_selected')
			    			   .addClass('td_unselected');


			    	}
			    	else{
			    		seat_config.show();
			    		$(this).removeClass('td_unselected')
			    			   .addClass('td_selected');			    		
			    	    seat_number.val('')
			    	    		   .attr('data-s_number',current_select);		    	   
			    		 
			    	}	
			    });

			    save_seat_number.on('click', function(){
			    	$('#'+seat_number.attr('data-s_number')).text(seat_number.val());
			    })	

				
			
			    
		});
		</script>
	</body>
</html>