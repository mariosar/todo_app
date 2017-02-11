;

<?php $__env->startSection('content'); ?>

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

  
  <?php if(count($tasks) > 0): ?>
  	<div class="tasks-container">
  		<?php echo $__env->renderEach('tasks._task', $tasks, 'task'); ?>	
	  </div>
  <?php else: ?>
  	<div class="alert alert-info">You have no tasks</div>
  <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.application', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>