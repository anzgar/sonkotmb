<?php
use yii\helpers\Url;

?>
<!-- Позиция новостного слайдера -->
<div class="template-row news-slider">
    <div class="template-position">
        <!-- Модуль новостного слайдера -->
        <div class="module-news-slider">
            <div class="slider">
                <ul class="slide-container">
                    <?php
                        foreach ($news as $item) {
                            ?>
                            <li class="slide">
                                <div class="article-intro">
                                    <div class="intro-image">
                                        <a href="/site/news/<?=$item->id?>"><img src="<?=$item->thumb('245', '200', 1)?>"></a>
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
            </div>
            <div class="arr_prev"></div>
            <div class="arr_next"></div>
            <div class="read-more-button"><a href="/site/news/">Все новости</a></div>
        </div>
        <!-- Скрипт запускающий слайдер -->
        <script>
            jQuery(window).load(function() {
                realResponsiveSlider({
                    slider: jQuery('.module-news-slider>.slider'),
                    fixWidth: true
                });
            });
        </script>
    </div>
</div>

<!-- Позиция центральной части где расположены материал и правые виджеты -->
<div class="template-row middle-two-column">
    <div class="template-position">
        <!-- Правые виджеты -->
        <div class="right-widgets">
            <!-- Модуль правого меню -->
            <?= $this->render('rightmenu') ?>
            <!-- Модуль какого-то виджета -->
            <div class="module-right-widget">
                <!--<img src="/design/img/right_widget.png">-->
            </div>
        </div>
        
        <!-- Материал -->
        <div class="article">
            <div class="tabs-container">
                <input type="radio" name="tab" checked="checked" id="tab-1" /><label for="tab-1">Объявления</label>
                <input type="radio" name="tab" id="tab-2" /><label for="tab-2">Интервью</label>
                <input type="radio" name="tab" id="tab-3" /><label for="tab-3">Форум</label>
                <div>
                    <div class="interview-container">
                        <h2><a href="/site/article/<?=$adv['item_id']?>"><?=$adv['title']?></a></h2>

                        <div class="article-preview">
                            <img style="height:245px;" src="<?php if (!$img = $adv['image']) {
                                $img = '/design/img/news_slider_none_photo.jpg';
                            } echo $img; ?>" />
                            <div>
                                <p><?=$adv['short']?></p>
                                <div class="read-more-button"><a href="/site/article/<?=$adv['item_id']?>">Подробнее</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="interview-container">
                        <h2><a href="/site/article/<?=$interview->id?>"><?=$interview->title?></a></h2>

                        <div class="article-preview">
                            <img src="<?php if (!$img = $interview->thumb(245,200,0)) {
                                $img = '/design/img/news_slider_none_photo.jpg';
                            } echo $img; ?>" />
                            <div>
                                <p><?=$interview->short?></p>
                                <div class="read-more-button"><a href="/site/article/<?=$interview->id?>">Подробнее</a></div>

                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <ul>
                    <?php
                        foreach ($forums as $forum) {
                            ?><li><a href="/podium/<?=$forum['category_id']?>/<?=$forum['id']?>/<?=$forum['slug']?>"><?=$forum['name']?></a></li><?php
                        }
                    ?>
                    </ul>
                </div>
            </div>
            <a href="/site/takepart" class="gradient-btn btn1">Регистрация НКО на мероприятие</a>
        </div>
        
    </div>
</div>

<!-- Позиция после материала -->
<div class="template-row after-middle">
    <div class="template-position">
        <!-- Модуль информации -->
        <div class="module-after-middle-content">
            <div>
                <a href="http://sonkotmb.ru/site/resource"><img src="/design/img/main_after_content_pic.jpg" /></a>
                <a href="/site/idea" class="gradient-btn btn2">Предложите идею</a>
            </div>
            <div>
                <h2><a href="/site/category/54">Поддержите проект НКО</a></h2>
                <!--<h3>Установка памятника тамбовскому волку</h3>
                <div>
                    <img src="/design/img/news_slider_none_photo.jpg">
                    <p class="descriptions">Красивая, опрятная с бантами ученица Опаздывала в школу, летела словно птица На красный свет пошла она Споткнулась и упал Поэтому не надо на дорогах торопиться</p>
                    <p>
                        Красивая, опрятная с бантами ученица Опаздывала в школу, летела словно птица На красный свет пошла она Споткнулась и упал Поэтому не надо на дорогах торопиться Красивая, опрятная с бантами ученица Опаздывала в школу, летела словно птица На красный свет
                        пошла она Споткнулась и упал Поэтому не надо на дорогах торопиться
                    </p>
                </div>-->
                <?=$support->text?>
            </div>
        </div>
    </div>
</div>