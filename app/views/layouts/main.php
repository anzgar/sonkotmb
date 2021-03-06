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
    <link rel="stylesheet" href="/design/css/style.css?id=<?=md5(microtime())?>">
    <script src="/design/js/jquery-2.1.4.min.js"></script>
    <script src="/design/js/responciveSlider.js?id=<?=md5(microtime())?>"></script>
    <script src="/design/js/button_top.js?id=<?=md5(microtime())?>"></script>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>
    <!-- Позиция хидера -->
    <div class="template-row header">
        <div class="template-position">
            <!-- Модуль заднего плана в хидере -->
            <div class="module-header-background" style="cursor:pointer;" onclick="location.href='/'"></div>
            <!-- Модуль логотипа в хидере -->
            <div class="module-header-logo">
                <a href="/site/nkobl/"><img src="/design/img/top_logo.png"></a>
            </div>
            <!-- Модуль логина в хидере -->
            <div class="module-header-login">
                <a href="/" class="header-icon-home"><img src="/design/img/icon_home.png"></a>
                <?php if (!\Yii::$app->user->id) { ?>
                    <a href="/user/login">Вход</a>
                    <span>|</span>
                    <a href="/user/register">Регистрация</a>
                <?php } else { ?>
                    <a href="/site/private">Личный кабинет</a>
                    <span>|</span>
                    <a href="/admin/sign/out">Выход</a>
                <?php } ?>
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
                    <li><a href="/site/category/66">Ресурсные центры</a></li>
                    <li><a>Медиа</a>
                        <ul>
                            <li><a href="/site/photo">Фотографии</a></li>
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

    <!-- Позиция хлебных крошек -->
    <div class="template-row breadcrumbs">
        <div class="template-position">
            <!-- -->
            <div class="module-breadcrumbs">
                <?php if (isset($this->params['bread'])) { ?>
                <ul>
                    <li><a href="/">Главная</a></li>
                    <?php
                    foreach ($this->params['bread'] as $key => $val) {
                        ?><li><a href="<?=$key?>"><?=$val?></a></li><?php
                    }
                    ?>
                </ul>
                <?php } ?>
            </div>

        </div>
    </div>

    <!-- Позиция заголовка страницы -->
    <div class="template-row page-header">
        <div class="template-position">
            <div class="module-page-header">
                <h1><?= $this->title ?></h1>
            </div>
        </div>
    </div>

    <!-- Позиция центральной части где расположены категория блога и правые виджеты -->
    <div class="template-row middle-two-column">
        <div class="template-position">
            <?= $content ?>
        </div>
        <?php if ($_SERVER['REQUEST_URI'] != '/site/idea'
                 && $_SERVER['REQUEST_URI'] != '/site/takepart'
                 && $_SERVER['REQUEST_URI'] != '/site/ideas'
                 && $_SERVER['REQUEST_URI'] != '/site/events'
                 && $_SERVER['REQUEST_URI'] != '/site/private') : ?>
        <script type="text/javascript">(function(w,doc) {
                if (!w.__utlWdgt ) {
                    w.__utlWdgt = true;
                    var d = doc, s = d.createElement('script'), g = 'getElementsByTagName';
                    s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
                    s.src = ('https:' == w.location.protocol ? 'https' : 'http')  + '://w.uptolike.com/widgets/v1/uptolike.js';
                    var h=d[g]('body')[0];
                    h.appendChild(s);
                }})(window,document);
            </script>
            <div style="position:relative;top:10px;left:310px;width:50%;" data-background-alpha="0.0" data-buttons-color="#FFFFFF" data-counter-background-color="#ffffff" data-share-counter-size="12" data-top-button="false" data-share-counter-type="common" data-share-style="1" data-mode="share" data-like-text-enable="false" data-mobile-view="true" data-icon-color="#ffffff" data-orientation="horizontal" data-text-color="#000000" data-share-shape="round-rectangle" data-sn-ids="fb.vk.tw.ok." data-share-size="30" data-background-color="#ffffff" data-preview-mobile="false" data-mobile-sn-ids="fb.vk.tw.ok.wh.vb.tm." data-pid="1692522" data-counter-background-alpha="1.0" data-following-enable="false" data-exclude-show-more="false" data-selection-enable="true" class="uptolike-buttons" ></div>
            <?php endif; ?>
    </div>

    <!-- Позиция футера -->
    <div class="template-row footer">
        <div class="template-position">
            <!-- Модуль слайдера в футере -->
            <div class="module-footer-logo-slider">
                <div class="slider">
                    <ul class="slide-container">
                        <li class="slide">
                            <a href="http://jcent.ru/contacts/">
                                <img src="/design/img/partner1.png">
                            </a>
                        </li>
                        <li class="slide">
                            <a href="http://to68.minjust.ru/">
                                <img src="/design/img/partner2.png">
                            </a>
                        </li>
                        <li class="slide">
                            <a href="http://op-tambov.ru/">
                                <img src="/design/img/partner3.png">
                            </a>
                        </li>
                        <li class="slide">
                            <a href="http://www.tambov.gov.ru/">
                                <img src="/design/img/partner4.png">
                            </a>
                        </li>
                    </ul>
                </div>
                <!--<div class="arr_prev"></div>
                <div class="arr_next"></div>-->
            </div>
            <!-- Скрипт запускающий слайдер -->
            <script>
                jQuery(window).load(function() {
                    /*realResponsiveSlider({
                        slider: jQuery('.module-footer-logo-slider>.slider'),
                        fixWidth: true
                    });*/
                });
            </script>

        </div>
    </div>
    <!-- Позиция копирайта -->
    <div class="template-row copyright">
        <div class="template-position">
            <!-- Модуль копирайт -->
            <div class="module-footer-copyright">
                В рамках проекта "Ресурсный центр поддержки общественных инициатив" поддержанного администрацией Тамбовской области на основании постановления администрации Тамбовской области от 01.07.2016 №799 "Об утверждении перечня СО НКО - получателей субсидий из бюджета области в 2016 году" и договора №888 о предоставлении субсидии СО НКО от 12.08.16
            </div>
        </div>
    </div>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>