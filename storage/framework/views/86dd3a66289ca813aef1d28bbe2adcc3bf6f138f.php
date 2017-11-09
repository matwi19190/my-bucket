<?php $__env->startSection('content'); ?>
<div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
    <div class="panel panel-primary">
        <div class="panel-heading">Companies Listing
            <a class="btn btn-primary pull-right btn-sm" href="/companies/create">Create New Company</a>
        </div>
        <div class="panel-body">
            <ul class="list-group">
                <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item"><a href="/companies/<?php echo e($company->id); ?>"><?php echo e($company->name); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>