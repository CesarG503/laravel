<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('titulo', 'Documento'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

    <div class="container-md">
    
    <header>
        <?php echo $__env->yieldContent('header'); ?>
    </header>

    <div>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <section>
        <?php echo $__env->yieldContent('section'); ?>
    </section>

    </div>
    <footer>
        <?php echo $__env->yieldContent('footer'); ?>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html><?php /**PATH /var/www/html/practica/resources/views/layout/base.blade.php ENDPATH**/ ?>