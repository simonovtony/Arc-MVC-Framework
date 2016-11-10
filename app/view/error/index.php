<?= \Project\Lib\View::run('layout.index') ?>

<?= \Project\Lib\View::run('layout.header') ?>

<section class="content error">
    <h1>Ошибка <?= $code ?></h1>
    <p><?= $message ?></p>
</section>

<?= \Project\Lib\View::run('layout.footer') ?>
