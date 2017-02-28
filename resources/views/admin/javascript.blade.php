<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.5/js/bootstrap-dialog.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script type="text/javascript">
   
	$(document).ready(function(){
	     $(window).scroll(function () {
	            if ($(this).scrollTop() > 50) {
	                $('#back-to-top').fadeIn();
	            } else {
	                $('#back-to-top').fadeOut();
	            }
	        });
	        // scroll body to 0px on click
	        $('#back-to-top').click(function () {
	            $('#back-to-top').tooltip('hide');
	            $('body,html').animate({
	                scrollTop: 0
	            }, 800);
	            return false;
	        });
	        
	        $('#back-to-top').tooltip('show');

	});
   	
</script>

@if (Session::has('success'))
	<script type="text/javascript">
		BootstrapDialog.show({
			title: 'Success',
			type: 'type-success',
		    message: '{{Session::get("success")}}',
		    buttons: [{
		   		label: 'Close',
		        action: function(dialog) {
		        	dialog.close();
		        }
		    }]
		});
	</script>
@endif


@if (count($errors) > 0)
	<script type="text/javascript">
		BootstrapDialog.show({
			title: 'Error',
			type: 'type-warning',
		    message: '<ul>@foreach ($errors->all() as $error) <li>{{$error}}</li> @endforeach</ul>',
		    buttons: [{
		   		label: 'Close',
		        action: function(dialog) {
		        	dialog.close();
		        }
		    }]
		});
	</script>
@endif


<script type="text/javascript">
    $(document).ready(function() {
        $('#authorTable').DataTable();

      	$('.enable_btn').change(function() {
	        if($(this).is(":checked")) {
	        	$('#loading').show();
                $.ajax({
                    type: "POST",
					data: { 
						_token: $('#token').val(),
						user_id: $(this).attr("data-id"),
						check_val: 0
					},
                    url: "{{ URL::to('/userenable') }}",
                    success: function(res){
						setTimeout(function() {
	        				$('#loading').hide();
			                window.location.replace('{{ URL::to("/login/admin/author") }}');
			            }, 1000);
                    }
                });
	        }
	        else {
	        	$('#loading').show();
                $.ajax({
                    type: "POST",
					data: { 
						_token: $('#token').val(),
						user_id: $(this).attr("data-id"),
						check_val: 1
					},
                    url: "{{ URL::to('/userenable') }}",
                    success: function(res){
						setTimeout(function() {
	        				$('#loading').hide();
			                window.location.replace('{{ URL::to("/login/admin/author") }}');
			            }, 1000);
                    }
                });
	        }       
    	});


      	$('.publish_btn').change(function() {
	        if($(this).is(":checked")) {
	        	$('#loading').show();
                $.ajax({
                    type: "POST",
					data: { 
						_token: $('#token').val(),
						post_id: $(this).attr("data-id"),
						check_val: 0
					},
                    url: "{{ URL::to('/adminpublish') }}",
                    success: function(res){
						setTimeout(function() {
	        				$('#loading').hide();
			                window.location.replace('{{ URL::to("/login/admin/blog") }}');
			            }, 1000);
                    }
                });
	        }
	        else {
	        	$('#loading').show();
                $.ajax({
                    type: "POST",
					data: { 
						_token: $('#token').val(),
						post_id: $(this).attr("data-id"),
						check_val: 1
					},
                    url: "{{ URL::to('/adminpublish') }}",
                    success: function(res){
						setTimeout(function() {
	        				$('#loading').hide();
			                window.location.replace('{{ URL::to("/login/admin/blog") }}');
			            }, 1000);
                    }
                });
	        }       
    	});


});
</script>


    	
@yield('script')