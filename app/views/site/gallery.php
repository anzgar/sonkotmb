<!-- Категория блога -->
<div class="news-blog-category">
    <ul class="blog-list">
        <?php
            foreach ($cats as $item) {
                if (!$img = $item->thumb('245', '200', 0)) {
                    $img = '/design/img/news_slider_none_photo.jpg';
                }
                ?>
                <li class="blog-list-item">
                    <div class="article-intro">
                        <div class="intro-image">
                            <a href="/site/photo/<?=$item->id?>"><img src="<?=$img?>"></a>
                        </div>
                        <h3><a href="/site/photo/<?=$item->id?>"><?=$item->title?></a></h3>
                        <div class="intro-text">
                            <?php echo count($item->photos()) . ' фото' ?>
                        </div>
                    </div>
                </li>
                <?php
            }
        ?>
    </ul>
    <?php // echo $pages ?>
</div>

<!-- Правые виджеты -->
<div class="right-widgets">
    <?= $this->render('rightmenu') ?>
</div>