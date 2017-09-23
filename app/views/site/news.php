<!-- Категория блога -->
<div class="news-blog-category">
    <ul class="blog-list">
        <?php
            foreach ($news as $item) {
                ?>
                <li class="blog-list-item">
                    <div class="article-intro">
                        <div class="intro-image">
                            <a href="/site/news/<?=$item->id?>"><img src="<?=$item->thumb('245', '200', 0)?>"></a>
                        </div>
                        <h3><a href="/site/news/<?=$item->id?>"><?=$item->title?></a></h3>
                        <!--<div class="intro-text">
                            <?php //echo $item->short ?>
                        </div>-->
                    </div>
                </li>
                <?php
            }
        ?>
    </ul>
    <?=$pages?>
</div>

<!-- Правые виджеты -->
<div class="right-widgets">
    <?= $this->render('rightmenu') ?>
</div>