<?php $__env->startComponent('mail::layout'); ?>


<?php $__env->slot('header'); ?>
    <?php $__env->startComponent('mail::header', ['url' => config('app.url')]); ?>
        <?php echo e(config('app.name')); ?>

    <?php echo $__env->renderComponent(); ?>
<?php $__env->endSlot(); ?>

<table align="left" width="570" cellpadding="0" cellspacing="0" style="color: black;">
    <tr>
        <td align="left" style="font-size: 16px; font-family: Avenir,sans-serif;">
			<p style="color: black;">
				<b style="font-size: 18px;"><?php echo e(__('notification.auth.confirm_email.mail.greeting', ['user' => $user])); ?></b>
			</p>
			<p style="color: black;"><?php echo e(__('notification.auth.confirm_email.mail.line.0')); ?></p>

			<?php $__env->startComponent('mail::button', ['url' => $url]); ?>
				<?php echo e(__('notification.auth.confirm_email.mail.action'), $url); ?>

			<?php echo $__env->renderComponent(); ?>

			<p style="color: black;">
				<?php echo e(__('notification.auth.confirm_email.mail.line.1')); ?>

			</p>

			<p style="color: black;">
				<?php echo e(__('notification.auth.confirm_email.mail.line.2', ['email' => config('mail.from.address')])); ?>

			</p>

			<p style="color: black;">
				Thanks for using 2HEX!
				<br>
				Regards,
				2HEX
			</p>
        </td>
    </tr>
</table>

<table align="left" width="570" cellpadding="0" cellspacing="0" style="margin-top: 15px;">
    <tr>
        <td align="left">
			<hr>
			<p style="font-size: 10px; color: #7b7e7d; font-family: Verdana,sans-serif;">
				If you’re having trouble clicking the "<?php echo e(__('notification.auth.confirm_email.mail.action')); ?>" 
				button, copy and paste the URL below into your web browser: 
				<a href="<?php echo e($url); ?>"><?php echo e($url); ?></a>
			</p>
        </td>
    </tr>
</table>


<?php if(isset($subcopy)): ?>
    <?php $__env->slot('subcopy'); ?>
        <?php $__env->startComponent('mail::subcopy'); ?>
            <?php echo e($subcopy); ?>

        <?php echo $__env->renderComponent(); ?>
    <?php $__env->endSlot(); ?>
<?php endif; ?>


<?php $__env->slot('footer'); ?>
    <?php $__env->startComponent('mail::footer'); ?>
        © <?php echo e(date('Y')); ?> <?php echo e(config('app.name')); ?>. All rights reserved.
    <?php echo $__env->renderComponent(); ?>
<?php $__env->endSlot(); ?>

<?php echo $__env->renderComponent(); ?>
