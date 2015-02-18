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

			.td_all_seat{
				background: #FDD405;
			}

			.td_available_seat{
				background: #4CB348;
			}

			.td_unavailable_seat{
				background: #E5423A;
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
		<select id="set_status_seat">
			<option value="td_all_seat">Marked selected seat to the layout</option>
			<option value="td_available_seat">Available seat</option>
			<option value="td_unavailable_seat">Booked seat</option>
		</select>
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
				save_seat_number     = $('#save_seat_number'),
				set_status_seat 	 = $('#set_status_seat');

				var current_select,seat_selected = [];
			

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
			    	current_select = parseInt($(this).attr('id'));
			    	if($(this).hasClass('td_selected')){
			    		$(this).removeClass('td_selected')
			    			   .addClass('td_unselected');
			    		seat_selected.splice( $.inArray(current_select, seat_selected), 1 );

			    	}
			    	else{
			    		
			    		$(this).removeClass('td_unselected')
			    			   .addClass('td_selected');
			    		seat_selected.push(current_select);
			    		


			    	 	/* after this
			    		seat_config.show();		    		
			    	    seat_number.val('')
			    	    		   .attr('data-s_number',current_select);*/	  


			    		 
			    	}	
			    });

			    set_status_seat.on('change', function(){
			    	for(var o = 0; o < seat_selected.length; o++){
			    		$('#'+ seat_selected[o]).addClass($(this).val());
			    	}
			    })

			    save_seat_number.on('click', function(){
			    	$('#'+seat_number.attr('data-s_number')).text(seat_number.val());
			    })	

				
			
			    
		});
		</script>
	</body>
</html>