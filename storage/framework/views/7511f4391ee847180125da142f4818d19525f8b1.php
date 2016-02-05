<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Laravel PHP Framework</title>
    <!-- Latest compiled and minified CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container" style="text-align: center;">
    <div class="span4" style="display: inline-block;margin-top:100px;">
        <?php if($errors->has()): ?>
            <div class="alert alert-block alert-error fade in"id="error-block">
                <?php
                $messages = $errors->all('<li>:message</li>');
                ?>
                <button type="button" class="close"data-dismiss="alert">×</button>

                <h4>Warning!</h4>
                <ul>
                    <?php foreach($messages as $message): ?>
                        <?php echo e($message); ?>

                    <?php endforeach; ?>

                </ul>
            </div>
        <?php endif; ?>
        <form name="addimagetoalbum" method="POST"action="<?php echo e(URL::route('add_image_to_album')); ?>"enctype="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <input type="hidden" name="album_id"value="<?php echo e($album->id); ?>" />
            <fieldset>
                <legend>Add an Image to <?php echo e($album->name); ?></legend>
                <div class="form-group">
                    <label for="description">Image Description</label>
                    <textarea name="description" type="text"class="form-control" placeholder="Imagedescription"></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Select an Image</label>
                    <?php echo Form::file('image'); ?>

                </div>
                <button type="submit" class="btnbtn-default">Add Image!</button>
            </fieldset>
        </form>
    </div>
</div> <!-- /container -->
</body>
</html>