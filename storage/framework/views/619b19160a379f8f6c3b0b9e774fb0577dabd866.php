<?php $__env->startSection('content'); ?>
<div class="col-sm-9 col-md-9 col-lg-9 pull-left">
    <div class="row" style="background-color: #FFF; padding: 10px">
        <h1>Add Project</h1>
        <form method="post" action="<?php echo e(route('projects.store')); ?>">
            <?php echo e(csrf_field()); ?>

           <?php if($companies == null): ?>
            <input type="hidden" name="company_id" value="<?php echo e($company_id); ?>" />
           <?php endif; ?>
            <div class="form-group">
                <label for="project-name">Name<span class="required">*</span></label>
                <input
                    placeholder="Enter Name"
                    id="project-name"
                    required
                    name="name"
                    spellcheck="false"
                    class="form-control"
                    />
            </div>
            
            <?php if($companies != null): ?>
            <div class="form-group">
                <label for="company-content">Companies<span class="required">*</span></label>
                <select class="form-control" name="company_id">
                    <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($company->id); ?>"><?php echo e($company->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <?php endif; ?>
            <div class="form-group">
                <label for="project-content">Description</label>
                <textarea
                    placeholder="Enter Description"
                    style="resize: vertical"
                    id="project-content"
                    name="description"
                    spellcheck="false"
                    rows="5"
                    class="form-control autosize-target text-left"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-primary"/>
            </div>
        </form>
    </div>
</div>
<div class="col-sm-3 col-md-3 col-lg-3 pull-right blog-sidebar">
    <div class="sidebar-module">
        <h4>Actions</h4>
        <ol class="list-unstyled">
            <li><a href="/projects">All Projects</a></li>
        </ol>
    </div>
    <!--    <div class="sidebar-module">
            <h4>Members List</h4>
            <ol class="list-unstyled">
                <li><a href="#">March 2014</a></li>
            </ol>
        </div>-->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>