<?php $__env->startSection('page'); ?>

    
    <?php echo $__env->yieldContent('content'); ?>
    
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>