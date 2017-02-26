@extends('layouts.application')

@section('content')

	<h1>My Todos</h1>

	<hr>

	<form action="/index.php" method="POST">
		<div class="form-group">
			<div class="row">
				<div class="col-xs-10">
					<input type="hidden" name="tasks" value="create">
		      <input type="text" class="form-control" name="newTask" id="newTask" placeholder="New Task">
		    </div>
		    <div class="col-xs-2 text-center">
		    	<button class="btn btn-primary" type="submit" name="tasks" value="create">
		    		<i class="fa fa-plus" aria-hidden="true"></i>
		    	</button>
		    </div>
			</div>
	  </div>
	</form>

  <hr>

  <div class="tasks-container">
	  @if (count($tasks) > 0)
			@each ('tasks._task', $tasks, 'task')			  
	  @else
	  	@include('tasks._tasksAlert')
	  @endif
  </div>
@endsection
