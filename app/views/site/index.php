<?php
use yii\helpers\Url;

$this->title = 'EasyiiCMS start page';
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
                <img src="/design/img/right_widget.png">
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
                        <h2><a href="/site/article/<?=$adv->id?>"><?=$adv->title?></a></h2>

                        <div class="article-preview">
                            <img src="<?php if (!$img = $adv->thumb(245,200,0)) {
                                $img = '/design/img/news_slider_none_photo.jpg';
                            }?>">
                            <div>
                                <p><?=$adv->text?></p>
                                <div class="read-more-button"><a href="/site/article/<?=$adv->id?>">Подробнее</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="interview-container">
                        <h2><a href="#">Волк Волкович Тамбовский</a></h2>
                        <!--<p class="subtitle">Народный герой, широко известный персонаж русских народных сказок</p>-->

                        <div class="article-preview">
                            <img src="/design/img/news_slider_none_photo.jpg">
                            <div>
                                <h3>Интервью с В.В. Тамбовским</h3>
                                <p> Жил на свете старик в бороде. Говорил он: «Я знал, быть беде. Две совы, три чижа И четыре стрижа Свили гнезда в моей бороде». Жил на свете старик в бороде. Говорил он: «Я знал, быть беде. Две совы, три чижа И четыре
                                    стрижа Свили гнезда в моей бороде». Жил на свете старик в бороде. Говорил он: «Я знал, быть беде. Две совы, три чижа И четыре стрижа Свили гнезда в моей бороде». Жил на свете старик в бороде. Говорил он: «Я знал,
                                    быть беде. Две совы, три чижа И четыре стрижа Свили гнезда в моей бороде». Жил на свете старик в бороде. Говорил он: «Я знал, быть беде. Две совы, три чижа И четыре стрижа Свили гнезда в моей бороде».</p>
                                <div class="read-more-button"><a href="#">Подробнее</a></div>

                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    III. Взяв приманку, курдль облизывается и уходит. По проглатывании охотник незамедлительно приступает к активной стадии, то есть при помощи метелки стряхивает с себя лук и приправы, чтобы паста могла свободно проявить свое прочищающее действие; затем
                    настраивает часовой механизм и удаляется возможно быстрее в сторону, противоположную той, откуда прибыл.
                </div>
            </div>
            <a href="#test" class="gradient-btn btn1">Регистрация НКО на мероприятие</a>
        </div>
        
    </div>
</div>

<!-- Позиция после материала -->
<div class="template-row after-middle">
    <div class="template-position">
        <!-- Модуль информации -->
        <div class="module-after-middle-content">
            <div>
                <img src="/design/img/main_after_content_pic.jpg">
                <a href="#test" class="gradient-btn btn2">Предложите идею</a>
            </div>
            <div>
                <h2>Поддержите проект НКО</h2>
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