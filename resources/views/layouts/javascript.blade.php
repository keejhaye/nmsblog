<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.5/js/bootstrap-dialog.min.js"></script>
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
    	
@yield('script')