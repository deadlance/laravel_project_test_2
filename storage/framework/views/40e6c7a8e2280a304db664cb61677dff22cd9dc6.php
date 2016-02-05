<?php /* Web site Title */ ?>
<?php $__env->startSection('title'); ?>
@parent
Edit Profile
<?php $__env->stopSection(); ?>

<?php /* Content */ ?>
<?php $__env->startSection('content'); ?>

<?php
    // Pull the custom fields from config
    $isProfileUpdate = ($user->email == Sentry::getUser()->email);
    $customFields = config('sentinel.additional_user_fields');

    // Determine the form post route
    if ($isProfileUpdate) {
        $profileFormAction = route('sentinel.profile.update');
        $passwordFormAction = route('sentinel.profile.password');
    } else {
        $profileFormAction =  route('sentinel.users.update', $user->hash);
        $passwordFormAction = route('sentinel.password.change', $user->hash);
    }
?>

<div class="row">
    <div class='page-header'>
        <h1>
            Edit
            <?php if($isProfileUpdate): ?>
                Your
            <?php else: ?>
                <?php echo e($user->email); ?>'s
            <?php endif; ?>
            Account
        </h1>
    </div>
</div>

<?php if(! empty($customFields)): ?>
<div class="row">
    <h4>Profile</h4>
    <div class="well">
        <form method="POST" action="<?php echo e($profileFormAction); ?>" accept-charset="UTF-8" class="form-horizontal" role="form">
            <input name="_method" value="PUT" type="hidden">
            <input name="_token" value="<?php echo e(csrf_token()); ?>" type="hidden">

            <?php foreach(config('sentinel.additional_user_fields') as $field => $rules): ?>
            <div class="form-group <?php echo e(($errors->has($field)) ? 'has-error' : ''); ?>" for="<?php echo e($field); ?>">
                <label for="<?php echo e($field); ?>" class="col-sm-2 control-label"><?php echo e(ucwords(str_replace('_',' ',$field))); ?></label>
                <div class="col-sm-10">
                    <input class="form-control" name="<?php echo e($field); ?>" type="text" value="<?php echo e(Request::old($field) ? Request::old($field) : $user->$field); ?>">
                    <?php echo e(($errors->has($field) ? $errors->first($field) : '')); ?>

                </div>
            </div>
            <?php endforeach; ?>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input class="btn btn-primary" value="Submit Changes" type="submit">
                </div>
            </div>

        </form>
    </div>
</div>
<?php endif; ?>

<?php if(Sentry::getUser()->hasAccess('admin') && ($user->hash != Sentry::getUser()->hash)): ?>
<div class="row">
    <h4>Group Memberships</h4>
    <div class="well">
        <form method="POST" action="<?php echo e(route('sentinel.users.memberships', $user->hash)); ?>" accept-charset="UTF-8" class="form-horizontal" role="form">

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <?php foreach($groups as $group): ?>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="groups[<?php echo e($group->name); ?>]" value="1" <?php echo e(($user->inGroup($group) ? 'checked' : '')); ?>> <?php echo e($group->name); ?>

                        </label>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input name="_token" value="<?php echo e(csrf_token()); ?>" type="hidden">
                    <input class="btn btn-primary" value="Update Memberships" type="submit">
                </div>
            </div>

        </form>
    </div>
</div>
<?php endif; ?>

<div class="row">
    <h4>Change Password</h4>
    <div class="well">
        <form method="POST" action="<?php echo e($passwordFormAction); ?>" accept-charset="UTF-8" class="form-inline" role="form">

            <?php if(! Sentry::getUser()->hasAccess('admin')): ?>
            <div class="form-group <?php echo e($errors->has('oldPassword') ? 'has-error' : ''); ?>">
                <label for="oldPassword" class="sr-only">Old Password</label>
                <input class="form-control" placeholder="Old Password" name="oldPassword" value="" id="oldPassword" type="password">
            </div>
            <?php endif; ?>

            <div class="form-group <?php echo e($errors->has('newPassword') ? 'has-error' : ''); ?>">
                <label for="newPassword" class="sr-only">New Password</label>
                <input class="form-control" placeholder="New Password" name="newPassword" value="" id="newPassword" type="password">
            </div>

            <div class="form-group <?php echo e($errors->has('newPassword_confirmation') ? 'has-error' : ''); ?>">
                <label for="newPassword_confirmation" class="sr-only">Confirm New Password</label>
                <input class="form-control" placeholder="Confirm New Password" name="newPassword_confirmation" value="" id="newPassword_confirmation" type="password">
            </div>

            <input name="_token" value="<?php echo e(csrf_token()); ?>" type="hidden">
            <input class="btn btn-primary" value="Change Password" type="submit">

            <?php echo e(($errors->has('oldPassword') ? '<br />' . $errors->first('oldPassword') : '')); ?>

            <?php echo e(($errors->has('newPassword') ?  '<br />' . $errors->first('newPassword') : '')); ?>

            <?php echo e(($errors->has('newPassword_confirmation') ? '<br />' . $errors->first('newPassword_confirmation') : '')); ?>


        </form>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(config('sentinel.layout'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>