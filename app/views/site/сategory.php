<!-- Категория блога -->
<div class="news-blog-category">
    <ul class="blog-list">
        <?php
            foreach ($articles as $item) {
                if (!$img = $item->thumb('245', '200', 1)) {
                    $img = '/design/img/news_slider_none_photo.jpg';
                }
                ?>
                <li class="blog-list-item">
                    <div class="article-intro">
                        <div class="intro-image">
                            <a href="/site/article/<?=$item->id?>"><img src="<?=$img?>"></a>
                        </div>
                        <h3><a href="/site/article/<?=$item->id?>"><?=$item->title?></a></h3>
                        <!--<div class="intro-text">
                            <?php //echo $item->short; ?>
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