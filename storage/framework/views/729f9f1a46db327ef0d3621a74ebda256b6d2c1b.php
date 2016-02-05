<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo e($album->name); ?></title>
    <!-- Latest compiled and minified CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>
    <style>
        body {
            padding-top: 50px;
        }
        .starter-template {
            padding: 40px 15px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <button type="button" class="navbar-toggle"data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">Awesome Albums</a>
        <div class="nav-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo e(URL::route('create_album_form')); ?>">Create New Album</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
<div class="container">

    <div class="starter-template">
        <div class="media">
            User Id - <?php echo e($album->user_id); ?><br />
            <img class="media-object pull-left"alt="<?php echo e($album->name); ?>" src="/albums/<?php echo e($album->cover_image); ?>" width="350px">
            <div class="media-body">
                <h2 class="media-heading" style="font-size: 26px;">Album Name:</h2>
                <p><?php echo e($album->name); ?></p>
                <div class="media">
                    <h2 class="media-heading" style="font-size: 26px;">AlbumDescription :</h2>
                    <p><?php echo e($album->description); ?><p>
                        <a href="<?php echo e(URL::route('add_image',array('id'=>$album->id))); ?>"><button type="button"class="btn btn-primary btn-large">Add New Image to Album</button></a>
                        <a href="<?php echo e(URL::route('delete_album',array('id'=>$album->id))); ?>" onclick="return confirm('Are yousure?')"><button type="button"class="btn btn-danger btn-large">Delete Album</button></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php foreach($album->Photos as $photo): ?>
            <div class="col-lg-3">
                <div class="thumbnail" style="max-height: 350px;min-height: 350px;">
                    <img alt="<?php echo e($album->name); ?>" src="/albums/<?php echo e($photo->image); ?>">
                    <div class="caption">
                        <p><?php echo e($photo->description); ?></p>
                        <p><p>Created date:  <?php echo e(date("d F Y",strtotime($photo->created_at))); ?> at <?php echo e(date("g:ha",strtotime($photo->created_at))); ?></p></p>
                        <a href="<?php echo e(URL::route('delete_image',array('id'=>$photo->id))); ?>" onclick="return confirm('Are you sure?')"><button type="button" class="btnbtn-danger btn-small">Delete Image </button></a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>