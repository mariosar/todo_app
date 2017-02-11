<div class="row item" data-task-id="{{ $task->id }}">
	@if ($task->completed == '1')
		<div class="col-xs-8 name completed">{{ $task->name }}</div>
	@else
		<div class="col-xs-8 name">{{ $task->name }}</div>
	@endif
	<div class="col-xs-2 text-right">
		<form action="/index.php" method="POST">
			<input type="hidden" name="tasks" value="delete">
			<input type="hidden" name="taskId" value="{{ $task->id }}">
			<button type="submit" class="btn btn-danger" name="tasks" value="delete">
				<i class="fa fa-minus" aria-hidden="true"></i>
			</button>
		</form>
	</div>
	<div class="col-xs-2 text-right">	
		<form action="/index.php" method="POST">
			<input type="hidden" name="tasks" value="markComplete">
			<input type="hidden" name="completed" value="{{ $task->completed }}">
			<input type="hidden" name="taskId" value="{{ $task->id }}">
			@if ($task->completed == '1')
  			<button type="submit" class="btn btn-success">
  				<i class="fa fa-check" aria-hidden="true"></i>
  			</button>
			@else
				<button type="submit" class="btn btn-default">
  				<i class="fa fa-check" aria-hidden="true"></i>
  			</button>
			@endif
		</form>
	</div>		
</div>