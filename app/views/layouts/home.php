<?php
use yii\helpers\Html;

$asset = \app\assets\AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <title>
        СО НКО Тамбовской области
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Html::csrfMetaTags() ?>
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/assets/css/style.css?id=<?=md5(microtime())?>">
    <script src="/assets/js/jquery-2.1.4.min.js"></script>
    <script src="/assets/js/responciveSlider.js"></script>
    <script src="/assets/js/button_top.js"></script>
    <?php $this->head() ?>
</head>

<body>
    <!-- Позиция хидера -->
    <div class="template-row header">
        <div class="template-position">
            <!-- Модуль заднего плана в хидере -->
            <div class="module-header-background"></div>
            <!-- Модуль логотипа в хидере -->
            <div class="module-header-logo">
                <a href="/"><img src="/assets/img/top_logo.png"></a>
            </div>
            <!-- Модуль логина в хидере -->
            <div class="module-header-login">
                <a href="/" class="header-icon-home"><img src="/assets/img/icon_home.png"></a>
                <a href="#">Вход</a>
                <span>|</span>
                <a href="#">Регистрация</a>
            </div>

        </div>
    </div>

    <!-- Позиция верхнего меню -->
    <div class="template-row top-menu">
        <div class="template-position">
            <!-- Модуль верхнего меню -->
            <div class="module-top-menu">
                <ul>
                    <li><a href="/site/page/23">О нас</a></li>
                    <li><a href="/site/news/">Новости</a></li>
                    <li><a href="/site/category/7">Календарь мероприятий</a></li>
                    <li><a href="/site/page/4">Ресурсные центры</a></li>
                    <li><a>Медиа</a>
                        <ul>
                            <li><a href="/">Фотографии</a></li>
                            <li><a href="/site/category/8">Видео</a></li>
                        </ul>
                    </li>
                    <li><a href="/site/category/29">СМИ об НКО</a></li>
                    <li><a href="/site/page/24">Контакты</a></li>
                </ul>
                <!-- Скрипт располагающий выпадающее меню по центру под пунктом меню -->
                <script>
                    jQuery(window).on('load', function() {
                        jQuery('.module-top-menu>ul>li>ul').each(function() {
                            dropMenu = jQuery(this);
                            dropMenuParent = dropMenu.parent();
                            dropMenu.css({
                                left: -(dropMenu.innerWidth() / 2 - dropMenuParent.innerWidth() / 2)
                            });
                        });
                    });
                </script>
            </div>

        </div>
    </div>
    <!-- Позиция новостного слайдера -->
    <div class="template-row news-slider">
        <div class="template-position">
            <!-- Модуль новостного слайдера -->
            <div class="module-news-slider">
                <div class="slider">
                    <ul class="slide-container">
                        <li class="slide">
                            <div class="article-intro">
                                <div class="intro-image">
                                    <a href="#"><img src="/assets/img/news_slider_none_photo.jpg"></a>
                                </div>
                                <h3><a href="#">Cтарик в бороде</a></h3>
                                <div class="intro-text">

                                        Жил на свете старик в бороде. Говорил он: «Я знал, быть беде. Две совы, три чижа И четыре стрижа Свили гнезда в моей бороде».

                                </div>
                            </div>
                        </li>
                        <li class="slide">
                            <div class="article-intro">
                                <div class="intro-image">
                                    <a href="#"><img src="/assets/img/news_slider_none_photo.jpg"></a>
                                </div>
                                <h3><a href="#">Симпатичная леди с Атлантики</a></h3>
                                <div class="intro-text">
                                    Симпатичная леди с Атлантики, Завязавши ботинки на бантики, Знай гуляла по пристани Со щенками пятнистыми И порочила климат Атлантики.
                                </div>
                            </div>
                        </li>
                        <li class="slide">
                            <div class="article-intro">
                                <div class="intro-image">
                                    <a href="#"><img src="/assets/img/news_slider_none_photo.jpg"></a>
                                </div>
                                <h3><a href="#">Старый джентльмен</a></h3>
                                <div class="intro-text">
                                    Старый джентльмен на склоне холма Был подвижен и прыток весьма: Он, не знаясь со знатью, Бегал в тещином платье От подножья к вершине холма.
                                </div>
                            </div>
                        </li>
                        <li class="slide">
                            <div class="article-intro">
                                <div class="intro-image">
                                    <a href="#"><img src="/assets/img/news_slider_none_photo.jpg"></a>
                                </div>
                                <h3><a href="#">Длинноносый старик</a></h3>
                                <div class="intro-text">
                                    Длинноносый старик из Литвы Говорил: «Если скажете вы, Что мой нос длинноват, В чем же я виноват – Ведь не я так считаю, а вы!»
                                </div>
                            </div>
                        </li>
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
            <!-- Материал -->
            <div class="article">
                <div class="tabs-container">
                    <input type="radio" name="tab" checked="checked" id="tab-1" /><label for="tab-1">Интервью</label>
                    <input type="radio" name="tab" id="tab-2" /><label for="tab-2">Объявления</label>
                    <input type="radio" name="tab" id="tab-3" /><label for="tab-3">Форум</label>
                    <div>
                        <div class="interview-container">
                            <h2><a href="#">Волк Волкович Тамбовский</a></h2>
                            <p class="subtitle">Народный герой, широко известный персонаж русских народных сказок</p>

                            <div class="article-preview">
                                <img src="/assets/img/news_slider_none_photo.jpg">
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
                        II. В этом положении следует выжидать курдля. Когда зверь приблизится, нужно, сохраняя спокойствие, схватить обеими руками бомбу, которую держат между колен. Голодный курдль обычно глотает сразу. Если курдль не желает брать, для поощрения можно слегка
                        похлопать его по языку. В случае, если угрожает осечка, некоторые советуют посолиться еще раз, но это рискованный шаг, поскольку курдль может чихнуть. Мало какой охотник пережил чихание курдля.
                    </div>
                    <div>
                        III. Взяв приманку, курдль облизывается и уходит. По проглатывании охотник незамедлительно приступает к активной стадии, то есть при помощи метелки стряхивает с себя лук и приправы, чтобы паста могла свободно проявить свое прочищающее действие; затем
                        настраивает часовой механизм и удаляется возможно быстрее в сторону, противоположную той, откуда прибыл.
                    </div>
                </div>
                <a href="#test" class="gradient-btn btn1">Регистрация НКО на мероприятие</a>
            </div>
            <!-- Правые виджеты -->
            <div class="right-widgets">
                <!-- Модуль правого меню -->
                <div class="module-right-menu">
                    <ul>
                        <li><a href="/poetapnyy.html">Поэтапный доступ НКО к бюджетным средствам</a></li>
                        <li><a href="#">Конкурсы НКО</a></li>
                        <li><a href="#">Фестиваль "Добрый Тамбов"</a></li>
                        <li><a href="/proekt.html">Лучшие практики</a></li>
                        <li><a href="/otchety.html">Отчёты НКО</a></li>
                        <li><a href="#">Библиотека НКО</a></li>
                        <li><a href="#">Правовая база</a></li>
                    </ul>
                </div>
                <!-- Модуль какого-то виджета -->
                <div class="module-right-widget">
                    <img src="/assets/img/right_widget.png">
                </div>
            </div>
        </div>
    </div>

    <!-- Позиция после материала -->
    <div class="template-row after-middle">
        <div class="template-position">
            <!-- Модуль информации -->
            <div class="module-after-middle-content">
                <div>
                    <img src="/assets/img/main_after_content_pic.jpg">
                    <a href="#test" class="gradient-btn btn2">Предложите идею</a>
                </div>
                <div>
                    <h2>Поддержите проект НКО</h2>
                    <h3>Установка памятника тамбовскому волку</h3>
                    <div>
                        <img src="/assets/img/news_slider_none_photo.jpg">
                        <p class="descriptions">Красивая, опрятная с бантами ученица Опаздывала в школу, летела словно птица На красный свет пошла она Споткнулась и упал Поэтому не надо на дорогах торопиться</p>
                        <p>
                            Красивая, опрятная с бантами ученица Опаздывала в школу, летела словно птица На красный свет пошла она Споткнулась и упал Поэтому не надо на дорогах торопиться Красивая, опрятная с бантами ученица Опаздывала в школу, летела словно птица На красный свет
                            пошла она Споткнулась и упал Поэтому не надо на дорогах торопиться
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Позиция префутера -->
    <div class="template-row pre-footer">
        <div class="template-position">
            <!-- Модуль префутер -->
            <div class="module-prefooter">
                <div>
                    <img src="/assets/img/main_help_icon_1.png">
                    <h3>Социальная адаптация инвалидов и их семей</h3>
                    <div class="read-more-button"><a href="/adaptation.html">Подробнее</a></div>
                </div>
                <div>
                    <img src="/assets/img/main_help_icon_2.png">
                    <h3>Профилактика социального сиротства, поддержка материнства и детства</h3>
                    <div class="read-more-button"><a href="/sirotnet.html">Подробнее</a></div>
                </div>
                <div>
                    <img src="/assets/img/main_help_icon_3.png">
                    <h3>Повышение качества жизни людей пожилого возраста</h3>
                    <div class="read-more-button"><a href="/old.html">Подробнее</a></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Позиция футера -->
    <div class="template-row footer">
        <div class="template-position">
            <!-- Модуль слайдера в футере -->
            <div class="module-footer-logo-slider">
                <div class="slider">
                    <ul class="slide-container">
                        <li class="slide">
                            <img src="/assets/img/main_footer_abstrakt_logo.png">
                        </li>
                        <li class="slide">
                            <img src="/assets/img/main_footer_abstrakt_logo_2.png">
                        </li>
                        <li class="slide">
                            <img src="/assets/img/main_footer_abstrakt_logo_3.png">
                        </li>
                        <li class="slide">
                            <img src="/assets/img/main_footer_abstrakt_logo.png">
                        </li>
                        <li class="slide">
                            <img src="/assets/img/main_footer_abstrakt_logo_2.png">
                        </li>
                        <li class="slide">
                            <img src="/assets/img/main_footer_abstrakt_logo_3.png">
                        </li>
                        <li class="slide">
                            <img src="/assets/img/main_footer_abstrakt_logo.png">
                        </li>
                        <li class="slide">
                            <img src="/assets/img/main_footer_abstrakt_logo_2.png">
                        </li>
                        <li class="slide">
                            <img src="/assets/img/main_footer_abstrakt_logo_3.png">
                        </li>
                        <li class="slide">
                            <img src="/assets/img/main_footer_abstrakt_logo.png">
                        </li>
                    </ul>
                </div>
                <div class="arr_prev"></div>
                <div class="arr_next"></div>
            </div>
            <!-- Скрипт запускающий слайдер -->
            <script>
                jQuery(window).load(function() {
                    realResponsiveSlider({
                        slider: jQuery('.module-footer-logo-slider>.slider'),
                        fixWidth: true
                    });
                });
            </script>

        </div>
    </div>
    <!-- Позиция копирайта -->
    <div class="template-row copyright">
        <div class="template-position">
            <!-- Модуль копирайт -->
            <div class="module-footer-copyright">
                © 2017 Портал социально ориентированных некоммерческих организаций Тамбовской области
            </div>
        </div>
    </div>

</body>

</html>
