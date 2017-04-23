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
        <?= Html::encode($this->title) ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Html::csrfMetaTags() ?>
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="/assets/js/jquery-2.1.4.min.js"></script>
    <!-- Скрипт слайдера, самописный, можно доработать или взять другой -->
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
                    <li class="active"><a href="/">О нас</a></li>
                    <li><a href="/">Новости</a></li>
                    <li><a href="/">Календарь мероприятий</a></li>
                    <li><a href="/">Ресурсные центры</a></li>
                    <li><a href="/">Медиа</a>
                        <ul>
                            <li><a href="/">Фотографии</a></li>
                            <li><a href="/">Видео</a></li>
                        </ul>
                    </li>
                    <li><a href="/">СМИ об НКО</a></li>
                    <li><a href="/">Контакты</a></li>
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

    <!-- Позиция хлебных крошек -->
    <div class="template-row breadcrumbs">
        <div class="template-position">
            <!-- -->
            <div class="module-breadcrumbs">
                <ul>
                    <li><a href="/">Главная</a></li>
                    <li class="active"><a href="#">Социальная адаптация инвалидов и их семей</a></li>
                </ul>
            </div>

        </div>
    </div>

    <!-- Позиция заголовка страницы -->
    <div class="template-row page-header">
        <div class="template-position">
            <!-- -->
            <div class="module-page-header">
                <h1>Социальная адаптация инвалидов и их семей</h1>
            </div>

        </div>
    </div>

    <!-- Позиция центральной части где расположены категория блога и правые виджеты -->
    <div class="template-row middle-two-column">
        <?php $this->beginBody() ?>
        <?= $content ?>
        <?php $this->endBody() ?>
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
<?php $this->endPage() ?>