<!-- Категория блога -->
<div class="news-blog-category">
    <table class="resource-center">
        <?php
        foreach ($articles as $item) {
            if (!$img = $item->thumb('245', '200', 0)) {
                $img = '/design/img/news_slider_none_photo.jpg';
            }
            ?>
        <tr>
            <td><a href="/site/article/<?=$item->id?>"><img src="<?=$img?>"></a></td>
            <td>
                <p><b><?=$item->title?></b></p>
                <p><?=$item->short?></p>
                <p align="right"><a href="/site/article/<?=$item->id?>">Подробнее</a></p>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
    <?=$pages?>
</div>

<!-- Правые виджеты -->
<div class="right-widgets">
    <?= $this->render('rightmenu') ?>
</div>