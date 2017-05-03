<div class="template-position">
    <!-- Категория блога -->
    <div class="news-blog-category">
        <h2><?=date('d.m.Y', $item->time)?>. <?=$item->title?></h2>
        <p class="newsItem">
            <img src="<?=$item->thumb('450', '350', 1)?>" />
            <?=$item->text?>
        </p>
    </div>

    <!-- Правые виджеты -->
    <div class="right-widgets">
        <?php $this->render('rightmenu'); ?>
    </div>
</div>