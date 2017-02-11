<html>
	<head>
	    <title>Todo App</title>
	    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	    <link rel="stylesheet" type="text/css" href="/resources/css/main.css">
	</head>
	<body>
	    <div class="container">
	        @yield('content')
	    </div>
	</body>
	<script
			  src="https://code.jquery.com/jquery-3.1.1.min.js"
			  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
			  crossorigin="anonymous"></script>

	<script type="text/javascript">
		// Handles successful Ajax
		var successHandler = function(data, status, jqXHR){
			if(data['action'] == 'markComplete'){
				$("*[data-task-id='"+ data['id'] +"']").replaceWith(data['content']);
			} else if(data['action'] == 'delete'){
				$("*[data-task-id='"+ data['id'] +"']").remove();
			} else if(data['action'] == 'create'){
				$("tasks-container").append(data['content']);
			}


			$("form").unbind().submit(submitHandler);
		}

		var submitHandler = function(e){
			e.preventDefault();

			var data = $(this).serialize();
			data += "&ajax=1";

			console.log(data);
			$.ajax({
				url: "/index.php",
				data: data,
				type: 'POST',
				dataType: 'json',
				success: successHandler
			});
		}

		$("document").ready(function(){
			$("form").submit(submitHandler);
		});
	</script>

</html>