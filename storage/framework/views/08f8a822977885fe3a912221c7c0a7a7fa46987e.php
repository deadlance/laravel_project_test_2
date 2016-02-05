<?php /* Web site Title */ ?>
<?php $__env->startSection('title'); ?>
@parent
Groups
<?php $__env->stopSection(); ?>

<?php /* Content */ ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class='page-header'>
        <div class='btn-toolbar pull-right'>
            <div class='btn-group'>
                <a class='btn btn-primary' href="<?php echo e(route('sentinel.groups.create')); ?>">Create Group</a>
            </div>
        </div>
        <h1>Available Groups</h1>
    </div>
</div>

<div class="row">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <th>Name</th>
                <th>Permissions</th>
                <th>Options</th>
            </thead>
            <tbody>
            <?php foreach($groups as $group): ?>
                <tr>
                    <td><a href="<?php echo e(route('sentinel.groups.show', $group->hash)); ?>"><?php echo e($group->name); ?></a></td>
                    <td>
                        <?php
                            $permissions = $group->getPermissions();
                            $keys = array_keys($permissions);
                            $last_key = end($keys);
                        ?>
                        <?php foreach($permissions as $key => $value): ?>
                            <?php echo e(ucfirst($key) . ($key == $last_key ? '' : ', ')); ?>

                        <?php endforeach; ?>
                    </td>
                    <td>
                        <button class="btn btn-default" onClick="location.href='<?php echo e(route('sentinel.groups.edit', [$group->hash])); ?>'">Edit</button>
                        <button class="btn btn-default action_confirm <?php echo e(($group->name == 'Admins') ? 'disabled' : ''); ?>" type="button" data-token="<?php echo e(csrf_token()); ?>" data-method="delete" href="<?php echo e(route('sentinel.groups.destroy', [$group->hash])); ?>">Delete</button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <?php echo $groups->render(); ?>

</div>
<!--
	The delete button uses Resftulizer.js to restfully submit with "Delete".  The "action_confirm" class triggers an optional confirm dialog.
	Also, I have hardcoded adding the "disabled" class to the Admin group - deleting your own admin access causes problems.
-->
<?php $__env->stopSection(); ?>


<?php echo $__env->make(config('sentinel.layout'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>