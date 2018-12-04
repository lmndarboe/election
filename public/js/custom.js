$(document).ready(function(){

	$('table').on('click','a.delete-item',function(ev){
		var url = $(this).attr('href');


		ev.preventDefault();
		bootbox.confirm('<h3>Are you sure you want to delete ?</h>',function(state){
			if(state){
				$.ajax({
					type: 'POST',
					url: url,
					beforeSend: function(request){
						return request.setRequestHeader('X-CSRF-TOKEN',$("input[name='_token']").val());

					},
					data: {"_method" : "DELETE"},
					success: function(data){
						window.location.reload();		
					}
				});
				
			}
		});

	});

	$('table').on('click','a.delete-row',function(ev){
    ev.preventDefault();
    var row = $(this).parent().parent();
    row.remove();
  });


	$('#rootwizard').bootstrapWizard({'nextSelector': '.button-next', 'previousSelector': '.button-previous',
										onTabShow: function(tab, navigation, index) {
		var $total = navigation.find('li').length;
		var $current = index+1;
		var $percent = ($current/$total) * 100;
		$('#rootwizard').find('.bar').css({width:$percent+'%'});
		
		// If it's the last tab then hide the last button and show the finish instead
		if($current >= $total) {
			$('#rootwizard2').find('.button-next').hide();
			$('#finish-button').show();
		} else {
			$('#rootwizard2').find('.button-next').show();
			$('#finish-button').hide();
		}
		}
	});

	$('#add-item').click(function(ev){
    ev.preventDefault();
    
    var options_div = $('#options-list');
    var options_len = options_div.children().length;
    var html = '<tr><td><div class="form-group col-md-12">';
    html += '<input type="text" class="form-control " name="options['+options_len+'][option]" required>';
    html += '</div></td>';

    html += '<td><div class="form-group col-md-6">';
    html += '<input type="checkbox" class="form-control " name="options['+options_len+'][answer]" >';
    html += '</div></td>';

    html += '<td><a  class="delete-row btn btn-danger btn-rounded btn-sm" href="#"><span class="fa fa-trash-o "></span></a></td>';
    html += '</tr>';
    
    
    options_div.append(html);
  });




});