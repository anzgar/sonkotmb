<?php
namespace app\modules\nko;

class NkoModule extends \yii\easyii\components\Module
{
    public static $installConfig = [
        'title' => [
            'en' => 'NKO Database',
            'ru' => 'База данных НКО',
        ],
        'icon' => 'font',
        'order_num' => 20,
    ];
}