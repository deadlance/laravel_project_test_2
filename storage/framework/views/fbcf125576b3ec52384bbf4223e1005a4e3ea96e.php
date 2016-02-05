<?php /* Web site Title */ ?>
<?php $__env->startSection('title'); ?>
@parent
Home
<?php $__env->stopSection(); ?>

<?php /* Content */ ?>
<?php $__env->startSection('content'); ?>

    <?php
        // Determine the edit profile route
        if (($user->email == Sentry::getUser()->email)) {
            $editAction = route('sentinel.profile.edit');
        } else {
            $editAction =  action('\\Sentinel\Controllers\UserController@edit', [$user->hash]);
        }
    ?>

	<h4>Account Profile</h4>
	
  	<div class="well clearfix">
	    <div class="col-md-8">
		    <?php if($user->first_name): ?>
		    	<p><strong>First Name:</strong> <?php echo e($user->first_name); ?> </p>
			<?php endif; ?>
			<?php if($user->last_name): ?>
		    	<p><strong>Last Name:</strong> <?php echo e($user->last_name); ?> </p>
			<?php endif; ?>
		    <p><strong>Email:</strong> <?php echo e($user->email); ?></p>
		    
		</div>
		<div class="col-md-4">
			<p><em>Account created: <?php echo e($user->created_at); ?></em></p>
			<p><em>Last Updated: <?php echo e($user->updated_at); ?></em></p>
			<button class="btn btn-primary" onClick="location.href='<?php echo e($editAction); ?>'">Edit Profile</button>
		</div>
	</div>

	<h4>Group Memberships:</h4>
	<?php $userGroups = $user->getGroups(); ?>
	<div class="well">
	    <ul>
	    	<?php if(count($userGroups) >= 1): ?>
		    	<?php foreach($userGroups as $group): ?>
					<li><?php echo e($group['name']); ?></li>
				<?php endforeach; ?>
			<?php else: ?> 
				<li>No Group Memberships.</li>
			<?php endif; ?>
	    </ul>
	</div>
<!--
	<hr />

	<h4>User Object</h4>
	<div>
		<p><?php echo e(var_dump($user)); ?></p>
	</div>
-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make(config('sentinel.layout'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>