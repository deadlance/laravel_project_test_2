<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Create an Album</title>
    <!-- Latest compiled and minified CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <button type="button" class="navbar-toggle"data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span lclass="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">Awesome Albums</a>
        <div class="nav-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><ahref="<?php echo e(URL::route('create_album_form')); ?>">CreateNew Album</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
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

        <form name="createnewalbum" method="POST"action="<?php echo e(URL::route('create_album')); ?>"enctype="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <fieldset>
                <legend>Create an Album</legend>
                <div class="form-group">
                    <label for="name">Album Name</label>
                    <input name="name" type="text" class="form-control"placeholder="Album Name"value="<?php echo e(Input::old('name')); ?>">
                </div>
                <div class="form-group">
                    <label for="description">Album Description</label>
                    <textarea name="description" type="text"class="form-control" placeholder="Albumdescription"><?php echo e(Input::old('descrption')); ?></textarea>
                </div>
                <div class="form-group">
                    <label for="cover_image">Select a Cover Image</label>
                    <?php echo Form::file('cover_image'); ?>

                </div>
                <button type="submit" class="btnbtn-default">Create!</button>
            </fieldset>
        </form>
    </div>
</div> <!-- /container -->
</body>
</html>