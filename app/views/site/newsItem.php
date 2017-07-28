<!-- Категория блога -->
<div class="news-blog-category">
    <h2><?=$item->title?></h2>
    <p class="newsItem">
        <img src="<?=$item->thumb('450', '350', 1)?>" />
        <?=$item->text?>
    </p>
    <hr />
    <p>
        <?php if (isset($showReg) && $showReg) { ?>
        <b><a href="/site/takepart?id=<?=$item->id?>">Зарегистрироваться на мероприятие</a></b>
        <?php } ?>
    </p>
    <p>
        Дата публикации: <?=date('d.m.Y', $item->time)?>
    </p>
</div>

<!-- Правые виджеты -->
<div class="right-widgets">
    <?php $this->render('rightmenu'); ?>
</div>