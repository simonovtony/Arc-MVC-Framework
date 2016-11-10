<?= \Project\Lib\View::run('layout.index') ?>

<?= \Project\Lib\View::run('layout.header') ?>

<section class="content">
    <h1>Статьи</h1>
    <div class="popular">
        <?php if(count($top) > 0): ?>
            <?php foreach($top as $blog): ?>
                <div class="blog">
                    <h3><?= $blog['title'] ?></h3>
                    <div>
                        <?= $blog['content'] ?>
                    </div>
                    <p>Комментариев <?= $blog['comment_count'] ?></p>
                    <p><?= date('d.m.Y', strtotime($blog['updated_at'])) ?></p>
                    <a href="<?= \Project\Lib\Url::to("/blog?{$blog['url']}") ?>">Подробнее</a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <h2>Нет популярных статей</h2>
        <?php endif; ?>
    </div>
    <hr>
    <div class="blogs">
        <?php if(count($blogs) > 0): ?>
            <?php foreach($blogs as $blog): ?>
                <div class="blog">
                    <h3><?= $blog['title'] ?></h3>
                    <div>
                        <?= $blog['content'] ?>
                    </div>
                    <p>Комментариев <?= $blog['comment_count'] ?></p>
                    <p><?= date('d.m.Y', strtotime($blog['updated_at'])) ?></p>
                    <a href="<?= \Project\Lib\Url::to("/blog?{$blog['url']}") ?>">Подробнее</a>
                </div>
            <?php endforeach; ?>
            <div class="block center">
                <ul class="paginator">
                    <?php if($paginator['count'] <= $paginator['total']): ?>
                        <?php for($i = 0, $j = 1; $i < $paginator['total']; $i = $i + $paginator['count']): ?>
                            <li>
                                <a href="<?= \Project\Lib\Url::to("?page=$j") ?>">
                                    <?= $j++ ?>
                                </a>
                            </li>
                        <?php endfor; ?>
                    <?php endif; ?>
                </ul>
            </div>
        <?php else: ?>
            <h2>Нет статей</h2>
        <?php endif; ?>

        <div class="writer">
            <form action="<?= \Project\Lib\Url::to('/blog/create') ?>" method="post">
                Оглавление: <input name="title" type="text" required><br>
                Автор: <input name="author"  type="text" required><br>
                Контент:<br>
                <textarea name="content" class="tinymce"></textarea><br>
                <button type="submit">Публиковать</button>
            </form>
        </div>
    </div>
</section>

<?= \Project\Lib\View::run('layout.footer') ?>
