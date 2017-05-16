<!-- Категория блога -->
<div class="news-blog-category">
    <ul class="blog-list">
        <?php
            foreach ($items as $item) {
                if (!$img = $item->thumb('245', '200', 0)) {
                    $img = '/design/img/news_slider_none_photo.jpg';
                }
                ?>
                <li class="blog-list-item" style="height:225px;">
                    <div class="article-intro">
                        <div class="intro-image">
                            <?=$item->box(245, 200)?>
                        </div>
                        <div class="intro-text">
                            <?php $item->description ?>
                        </div>
                    </div>
                </li>
                <?php
            }
        ?>
    </ul>
    <?php // echo $pages ?>
</div>

<?=$plugin?>

<!-- Правые виджеты -->
<div class="right-widgets">
    <?= $this->render('rightmenu') ?>
</div>