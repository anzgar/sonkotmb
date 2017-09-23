<?php
namespace app\models;

class Idea extends \yii\db\ActiveRecord {
    public static function tableName()
    {
        return 'app_ideas';
    }

    public function rules()
    {
        return [
            ['user_id', 'number', 'integerOnly' => true],
            ['fio', 'trim'],
            ['phone', 'trim'],
            ['idea', 'trim']
        ];
    }

    public function attributeLabels()
    {
        return [
            'fio' => 'Имя',
            'phone' => 'Телефон',
            'idea' => 'Идея'
        ];
    }
}