<?php $__env->startSection('content'); ?>
<div class="col-sm-9 col-md-9 col-lg-9 pull-left">
    <div class="row" style="background-color: #FFF; padding: 10px">
        <form method="post" action="<?php echo e(route('companies.update', [$company->id])); ?>">
            <!--Note; the model company has user_id field but this field does not change on edit so we do not need to-->
            <!--add it even though as a hidden input-->
            <!--the below two lines must be in every form-->
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="_method" value="put" />
            
            <div class="form-group">
                <label for="company-name">Name<span class="required">*</span></label>
                <input
                    placeholder="Enter Name"
                    id="company-name"
                    required
                    name="name"
                    spellcheck="false"
                    class="form-control"
                    value="<?php echo e($company->name); ?>"
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
                    class="form-control autosize-target text-left"><?php echo e($company->description); ?></textarea>
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
            <li><a href="/companies/<?php echo e($company->id); ?>">View Company</a></li>
            <li><a href="/companies">All Companies</a></li>
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