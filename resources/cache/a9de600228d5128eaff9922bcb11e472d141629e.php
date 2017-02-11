;

<?php $__env->startSection('content'); ?>
	<h1>My Todo</h1>

	<div class="form-group">
    <label for="newTask" class="col-sm-2 control-label">New Task</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="newTask" id="newTask" placeholder="New Task">
    </div>
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.application', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>