<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('titulo','Documento'); ?></title>
</head>
<body>

<div class="header">
    <?php echo $__env->yieldContent('header'); ?>
</div>

<div class="container">
    <div class="section">
        <?php echo $__env->yieldContent('section'); ?>
    </div>
</div>
<footer>
    <?php echo $__env->yieldContent('footer'); ?>
</footer>
</body>
</html><?php /**PATH /var/www/html/practica/resources/views/pages/base.blade.php ENDPATH**/ ?>