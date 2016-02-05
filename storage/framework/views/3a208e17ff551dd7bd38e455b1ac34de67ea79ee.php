<?php /* Web site Title */ ?>
<?php $__env->startSection('title'); ?>
@parent
Forgot Password
<?php $__env->stopSection(); ?>

<?php /* Content */ ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <form method="POST" action="<?php echo e(route('sentinel.reset.request')); ?>" accept-charset="UTF-8">

            <h2>Forgot your Password?</h2>

            <div class="form-group <?php echo e(($errors->has('email')) ? 'has-error' : ''); ?>">
                <input class="form-control" placeholder="E-mail" autofocus="autofocus" name="email" type="text" value="<?php echo e(Request::old('name')); ?>">
                <?php echo e(($errors->has('email') ? $errors->first('email') : '')); ?>

            </div>

            <input name="_token" value="<?php echo e(csrf_token()); ?>" type="hidden">
            <input class="btn btn-primary" value="Send Instructions" type="submit">

        </form>
  	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make(config('sentinel.layout'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>