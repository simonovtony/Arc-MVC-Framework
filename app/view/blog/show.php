<?= \Project\Lib\View::run('layout.index') ?>

<?= \Project\Lib\View::run('layout.header') ?>

<section class="content">
    <h1>Статья</h1>
    <div class="blogs">
        <div class="blog">
            <h3><?= $blog['title'] ?></h3>

            <div>
                <?= $blog['content'] ?>
            </div>

            <p><?= date('d.m.Y', strtotime($blog['updated_at'])) ?></p>

            <div class="comments">
                <?php if(count($comments) > 0): ?>
                    <hr>
                    <?php foreach($comments as $comment): ?>
                        <div class="comment">
                            <p><?= $comment['name'] ?></p>
                            <p><?= $comment['text'] ?></p>
                            <p><?= date('d.m.Y', strtotime($comment['updated_at'])) ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <br>

            <div class="writer">
                <form action="<?= \Project\Lib\Url::to('/comment/create') ?>" method="post">
                    <input type="hidden" name="token" value="<?= \Project\Lib\Session::getLastToken() ?>">
                    <input type="hidden" name="id" value="<?= $blog['id'] ?>">
                    Имя: <input name="name" type="text" required><br>
                    Комментарий:<br>
                    <textarea name="text" class="comment-text" required></textarea><br>
                    <button type="submit">Отправить</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?= \Project\Lib\View::run('layout.footer') ?>
