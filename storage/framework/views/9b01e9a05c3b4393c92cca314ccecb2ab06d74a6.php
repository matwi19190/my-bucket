<?php $__env->startSection('content'); ?>
<div class="col-sm-9 col-md-9 col-lg-9 pull-left">
    <div class="row" style="background-color: #FFF; padding: 10px">
        <h1>Add Company</h1>
        <form method="post" action="<?php echo e(route('companies.store')); ?>">
            <?php echo e(csrf_field()); ?>

            
            <div class="form-group">
                <label for="company-name">Name<span class="required">*</span></label>
                <input
                    placeholder="Enter Name"
                    id="company-name"
                    required
                    name="name"
                    spellcheck="false"
                    class="form-control"
                    />
            </div>
            <div class="form-group">
                <label for="company-content">Description</label>
                <textarea
                    placeholder="Enter Description"
                    style="resize: vertical"
                    id="company-content"
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
            <li><a href="/companies">All Companies</a></li>
        </ol>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>