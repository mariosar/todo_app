<div class="row item" data-task-id="<?php echo e($task->id); ?>">
	<?php if($task->completed == '1'): ?>
		<div class="col-xs-8 name completed"><?php echo e($task->name); ?></div>
	<?php else: ?>
		<div class="col-xs-8 name"><?php echo e($task->name); ?></div>
	<?php endif; ?>
	<div class="col-xs-2 text-right">
		<form action="/index.php" method="POST">
			<input type="hidden" name="tasks" value="delete">
			<input type="hidden" name="taskId" value="<?php echo e($task->id); ?>">
			<button type="submit" class="btn btn-danger" name="tasks" value="delete">
				<i class="fa fa-minus" aria-hidden="true"></i>
			</button>
		</form>
	</div>
	<div class="col-xs-2 text-right">	
		<form action="/index.php" method="POST">
			<input type="hidden" name="tasks" value="markComplete">
			<input type="hidden" name="completed" value="<?php echo e($task->completed); ?>">
			<input type="hidden" name="taskId" value="<?php echo e($task->id); ?>">
			<?php if($task->completed == '1'): ?>
  			<button type="submit" class="btn btn-success">
  				<i class="fa fa-check" aria-hidden="true"></i>
  			</button>
			<?php else: ?>
				<button type="submit" class="btn btn-default">
  				<i class="fa fa-check" aria-hidden="true"></i>
  			</button>
			<?php endif; ?>
		</form>
	</div>		
</div>