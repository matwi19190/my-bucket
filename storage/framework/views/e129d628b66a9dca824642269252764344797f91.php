<?php $__env->startSection('content'); ?>
<div class="col-sm-9 col-md-9 col-lg-9 pull-left">
    <div class="well well-lg">
        <h1><?php echo e($project->name); ?></h1>
        <p class="lead"><?php echo e($project->description); ?></p>
    </div>
    <div class="row" style="background-color: #FFF; padding: 10px">
      <a class="btn btn-default btn-sm pull-right" href="/projects/create">Add New Project</a>
  
      <div class="row container-fluid"><br/>
          <form method="post" action="<?php echo e(route('comments.store')); ?>">
            <?php echo e(csrf_field()); ?>

            
            <input type="hidden" name="commentable_id" value="<?php echo e($project->id); ?>" />
            <input type="hidden" name="commentable_type" value="App\Project" />
            <div class="form-group">
                <label for="comment-url">URL</label>
                <input
                    placeholder="Enter URL"
                    id="comment-url"
                    name="url"
                    spellcheck="false"
                    class="form-control"
                    />
            </div>
            <div class="form-group">
                <label for="comment-body">Comment</label>
                <textarea
                    placeholder="Enter Comment"
                    style="resize: vertical"
                    id="company-content"
                    name="body"
                    spellcheck="false"
                    rows="5"
                    class="form-control autosize-target text-left"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-primary"/>
            </div>
        </form>
      </div>
      <?php echo $__env->make('partials.comments', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</div>
<div class="col-sm-3 col-md-3 col-lg-3 pull-right blog-sidebar">
    <div class="sidebar-module">
        <h4>Actions</h4>
        <ol class="list-unstyled">
            <li><a href="/projects/create">Add New Project</a></li>
            <li><a href="/projects">Projects List</a></li>
            <li><a href="/projects/<?php echo e($project->id); ?>/edit">Edit</a></li>
            <br/>
            <?php if($project->id == Auth::user()->id): ?>
            <li>
                <a   
                    href="#"
                    onclick="
                            var result = confirm('Are you sure you wish to delete this Project?');
                            if (result) {
                                event.preventDefault();
                                document.getElementById('delete-form').submit();
                            }
                    "
                    >
                    Delete
                </a>

                <form id="delete-form" action="<?php echo e(route('projects.destroy',[$project->id])); ?>" 
                      method="POST" style="display: none;">
                    <input type="hidden" name="_method" value="delete">
                    <?php echo e(csrf_field()); ?>

                </form>
            </li>
            <?php endif; ?>
        </ol>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>