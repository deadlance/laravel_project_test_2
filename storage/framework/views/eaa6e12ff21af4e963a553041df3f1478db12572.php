<?php /* Web site Title */ ?>
<?php $__env->startSection('title'); ?>
@parent
View Group
<?php $__env->stopSection(); ?>

<?php /* Content */ ?>
<?php $__env->startSection('content'); ?>
<h4><?php echo e($group['name']); ?> Group</h4>
<div class="well clearfix">
	<div class="col-md-10">
	    <strong>Permissions:</strong>
	    <ul>
	    	<?php foreach($group->getPermissions() as $key => $value): ?>
	    		<li><?php echo e(ucfirst($key)); ?></li>
	    	<?php endforeach; ?>
	    </ul>
	</div>
	<div class="col-md-2">
		<a class="btn btn-primary" href="<?php echo e(route('sentinel.groups.edit', array($group->hash))); ?>">Edit Group</a>
	</div> 
</div>
<hr />
<h4>Group Object</h4>
<div>
    <?php echo e(var_dump($group)); ?>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make(config('sentinel.layout'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>