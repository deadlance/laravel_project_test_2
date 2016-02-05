<?php $__env->startSection('title'); ?>
Register
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <form method="POST" action="<?php echo e(route('sentinel.register.user')); ?>" accept-charset="UTF-8" id="register-form">

            <h2>Register New Account</h2>

            <div class="form-group <?php echo e(($errors->has('username')) ? 'has-error' : ''); ?>">
                <input class="form-control" placeholder="Username" name="username" type="text" value="<?php echo e(Request::old('username')); ?>">
                <?php echo e(($errors->has('username') ? $errors->first('username') : '')); ?>

            </div>

            <div class="form-group <?php echo e(($errors->has('email')) ? 'has-error' : ''); ?>">
                <input class="form-control" placeholder="E-mail" name="email" type="text" value="<?php echo e(Request::old('email')); ?>">
                <?php echo e(($errors->has('email') ? $errors->first('email') : '')); ?>

            </div>

            <div class="form-group <?php echo e(($errors->has('password')) ? 'has-error' : ''); ?>">
                <input class="form-control" placeholder="Password" name="password" value="" type="password">
                <?php echo e(($errors->has('password') ?  $errors->first('password') : '')); ?>

            </div>

            <div class="form-group <?php echo e(($errors->has('password_confirmation')) ? 'has-error' : ''); ?>">
                <input class="form-control" placeholder="Confirm Password" name="password_confirmation" value="" type="password">
                <?php echo e(($errors->has('password_confirmation') ?  $errors->first('password_confirmation') : '')); ?>

            </div>

            <input name="_token" value="<?php echo e(csrf_token()); ?>" type="hidden">
            <input class="btn btn-primary" value="Register" type="submit">

        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make(config('sentinel.layout'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>