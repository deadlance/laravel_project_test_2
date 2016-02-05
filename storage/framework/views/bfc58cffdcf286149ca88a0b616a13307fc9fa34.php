<?php /* Web site Title */ ?>
<?php $__env->startSection('title'); ?>
@parent
Edit Group
<?php $__env->stopSection(); ?>

<?php /* Content */ ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <form method="POST" action="<?php echo e(route('sentinel.groups.update', $group->hash)); ?>" accept-charset="UTF-8">

            <h2>Edit Group</h2>

            <div class="form-group <?php echo e(($errors->has('name')) ? 'has-error' : ''); ?>">
                <input class="form-control" placeholder="Name" name="name" value="<?php echo e(Request::old('name') ? Request::old('name') : $group->name); ?>" type="text">
                <?php echo e(($errors->has('name') ? $errors->first('name') : '')); ?>

            </div>

            <label for="Permissions">Permissions</label>
            <div class="form-group">
                <?php $defaultPermissions = config('sentinel.default_permissions', []); ?>
                <?php foreach($defaultPermissions as $permission): ?>
                    <label class="checkbox-inline">
                        <input name="permissions[<?php echo e($permission); ?>]" value="1" type="checkbox" <?php echo e((isset($permissions[$permission]) ? 'checked' : '')); ?>>
                        <?php echo e(ucwords($permission)); ?>

                    </label>
                <?php endforeach; ?>
            </div>

            <input name="_method" value="PUT" type="hidden">
            <input name="_token" value="<?php echo e(csrf_token()); ?>" type="hidden">
            <input class="btn btn-primary" value="Save Changes" type="submit">

        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make(config('sentinel.layout'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>