<div class="template-position">
    <!-- Категория блога -->
    <div class="news-blog-category">
        <ul class="blog-list">
            <?php
                foreach ($articles as $item) {
                    ?>
                    <li class="blog-list-item">
                        <div class="article-intro">
                            <div class="intro-image">
                                <a href="/site/article/<?=$item->id?>"><img src="<?=$item->thumb('245', '200', 1)?>"></a>
                            </div>
                            <h3><a href="/site/article/<?=$item->id?>"><?=$item->title?></a></h3>
                            <div class="intro-text">
                                <?=$item->short?>
                            </div>
                        </div>
                    </li>
                    <?php
                }
            ?>
        </ul>
        <!--<ul class="blog-category-pages-navigation">
            <span>Страница:</span>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li>...</li>
            <li><a href="#">200</a></li>
        </ul>-->
    </div>

    <!-- Правые виджеты -->
    <div class="right-widgets">
        <?= $this->render('rightmenu') ?>
    </div>
</div>