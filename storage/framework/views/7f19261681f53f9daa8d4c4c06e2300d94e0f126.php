<?php /* Web site Title */ ?>
<?php $__env->startSection('title'); ?>
Log In
<?php $__env->stopSection(); ?>

<?php /* Content */ ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <form method="POST" action="<?php echo e(route('sentinel.session.store')); ?>" accept-charset="UTF-8">

            <h2 class="form-signin-heading">Sign In</h2>

            <div class="form-group <?php echo e(($errors->has('email')) ? 'has-error' : ''); ?>">
                <input class="form-control" placeholder="Email" autofocus="autofocus" name="email" type="text" value="<?php echo e(Request::old('email')); ?>">
                <?php echo e(($errors->has('email') ? $errors->first('email') : '')); ?>

            </div>

            <div class="form-group <?php echo e(($errors->has('password')) ? 'has-error' : ''); ?>">
                <input class="form-control" placeholder="Password" name="password" value="" type="password">
                <?php echo e(($errors->has('password') ?  $errors->first('password') : '')); ?>

            </div>
            <div class="checkbox">
                <label>
                    <input name="rememberMe" value="rememberMe" type="checkbox"> Remember Me
                </label>
            </div>
            <input name="_token" value="<?php echo e(csrf_token()); ?>" type="hidden">
            <input class="btn btn-primary" value="Sign In" type="submit">
            <a class="btn btn-link" href="<?php echo e(route('sentinel.forgot.form')); ?>">Forgot Password</a>

        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make(config('sentinel.layout'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>