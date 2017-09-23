<?php
namespace app\models;

class Event extends \yii\db\ActiveRecord {
    public static function tableName()
    {
        return 'app_events';
    }

    public function rules()
    {
        return [
            ['user_id', 'number', 'integerOnly' => true],
            ['event', 'trim'],
            ['fio', 'trim'],
            ['phone', 'trim'],
            ['nko', 'trim']
        ];
    }

    public function attributeLabels()
    {
        return [
            'fio' => 'Имя',
            'phone' => 'Телефон',
            'nko' => 'НКО',
            'event' => 'Мероприятие'
        ];
    }
}