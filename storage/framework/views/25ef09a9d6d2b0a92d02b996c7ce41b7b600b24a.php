<div class="row">
    <div class="col-md-12 col-sm-12  col-xs-12 col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-comment"></span> 
                    Recent Comments
                </h3>
            </div>
            <div class="panel-body">
                <ul class="media-list">

                    <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="media">
                        <div class="media-left">
                            <img src="http://placehold.it/60x60" class="img-circle">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">
                                <small> 

                                    <a href="users/<?php echo e($comment->user->id); ?> " > <?php echo e($comment->user->first_name); ?> <?php echo e($comment->user->last_name); ?>

                                        -  <?php echo e($comment->user->email); ?> </a> 
                                    <br>
                                    commented on <?php echo e($comment->created_at); ?>

                                </small>
                            </h4>
                            <p>
                                <?php echo e($comment->body); ?>

                            </p>
                            <b> URL: </b>
                            <p>
                                <a href="<?php echo e($comment->url); ?>" target="_blank"> <?php echo e($comment->url); ?></a>
                            </p>
                        </div>
                    </li>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>

    </div>
</div>