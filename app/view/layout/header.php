    <body>
        <header>
            <nav>
                <ul class="menu">
                    <li>
                        <a <?php
                            if(\Project\Lib\Url::current() ==  \Project\Lib\Url::to('/'))
                                echo 'class="active"';
                        ?> href="<?= \Project\Lib\Url::to('/') ?>">Статьи</a>
                    </li>
                </ul>
            </nav>
        </header>