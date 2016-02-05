<?php /* Web site Title */ ?>
<?php $__env->startSection('title'); ?>
    @parent
    Users
<?php $__env->stopSection(); ?>

<?php /* Content */ ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class='page-header'>
            <div class='btn-toolbar pull-right'>
                <div class='btn-group'>
                    <a class='btn btn-primary' href="<?php echo e(route('sentinel.users.create')); ?>">Create User</a>
                </div>
            </div>
            <h1>Current Users</h1>
        </div>
    </div>

    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <th>User</th>
                <th>Status</th>
                <th>Options</th>
                </thead>
                <tbody>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td><a href="<?php echo e(route('sentinel.users.show', array($user->hash))); ?>"><?php echo e($user->email); ?></a></td>
                        <td><?php echo e($user->status); ?> </td>
                        <td>
                            <button class="btn btn-default" type="button" onClick="location.href='<?php echo e(route('sentinel.users.edit', array($user->hash))); ?>'">Edit</button>
                            <?php if($user->status != 'Suspended'): ?>
                                <button class="btn btn-default" type="button" onClick="location.href='<?php echo e(route('sentinel.users.suspend', array($user->hash))); ?>'">Suspend</button>
                            <?php else: ?>
                                <button class="btn btn-default" type="button" onClick="location.href='<?php echo e(route('sentinel.users.unsuspend', array($user->hash))); ?>'">Un-Suspend</button>
                            <?php endif; ?>
                            <?php if($user->status != 'Banned'): ?>
                                <button class="btn btn-default" type="button" onClick="location.href='<?php echo e(route('sentinel.users.ban', array($user->hash))); ?>'">Ban</button>
                            <?php else: ?>
                                <button class="btn btn-default" type="button" onClick="location.href='<?php echo e(route('sentinel.users.unban', array($user->hash))); ?>'">Un-Ban</button>
                            <?php endif; ?>
                            <button class="btn btn-default action_confirm" href="<?php echo e(route('sentinel.users.destroy', array($user->hash))); ?>" data-token="<?php echo e(Session::getToken()); ?>" data-method="delete">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <?php echo $users->render(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(config('sentinel.layout'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>