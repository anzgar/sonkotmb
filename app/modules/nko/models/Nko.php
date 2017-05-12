<?php
namespace app\modules\nko\models;

use Yii;
use yii\easyii\behaviors\CacheFlush;

class Nko extends \yii\easyii\components\ActiveRecord
{
    const CACHE_KEY = 'easyii_nko';

    public static function tableName()
    {
        return 'app_nkos';
    }

    public function rules()
    {
        return [
            ['nko_id', 'number', 'integerOnly' => true],
            ['name', 'required'],
            ['name', 'trim'],
            ['activities', 'trim'],
            ['services', 'trim'],
            ['pay', 'trim'],
            ['slug', 'match', 'pattern' => self::$SLUG_PATTERN, 'message' => Yii::t('easyii', 'Slug can contain only 0-9, a-z and "-" characters (max: 128).')],
            ['slug', 'default', 'value' => null],
            ['slug', 'unique']
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => Yii::t('easyii', 'Name'),
            'activities' => Yii::t('easyii/nko', 'Activities'),
            'services' => Yii::t('easyii/nko', 'Services'),
            'pay' => Yii::t('easyii/nko', 'Pay'),
            'slug' => Yii::t('easyii', 'Slug'),
        ];
    }

    public function behaviors()
    {
        return [
            CacheFlush::className()
        ];
    }
    
    public function getActivities()
    {
        return [
            0 => 'профилактика социального сиротства, поддержка материнства и детства',
            1 => 'повышение качества жизни людей пожилого возраста',
            2 => 'социальная адаптация инвалидов и их семей',
            3 => 'дополнительное образование, творчество и массовый спорт для детей и молодёжи',
            4 => 'профилактика и охрана здоровья граждан, пропаганда здорового образа жизни',
            5 => 'оказание юридической помощи',
            6 => 'деятельность в области культуры',
            7 => 'национально-культурное развитие',
            8 => 'содействие охране общественного правопорядка',
            9 => 'деятельность в сфере патриотического воспитания',
            10 => 'деятельность в области предупреждения и (или) тушения пожаров',
            11 => 'деятельность по оказанию помощи безнадзорным животным',
            12 => 'изучение общественного мнения',
            13 => 'целевой капитал',
            14 => 'ресурсные центры поддержки СО НКО'
        ];
    }
    
    public function getServices()
    {
        return [
            0 => 'социальная',
            1 => 'культурная',
            2 => 'здоровый образ жизни',
            3 => 'трудовая',
            4 => 'экологическая',
            5 => 'средства массовой информации',
            6 => 'детская/молодежная',
            7 => 'патриотическая',
            8 => 'юридическая/правозащитная',
            9 => 'межнациональная/межэтническая',
            10 => 'здравоохранение',
            11 => 'семья',
            12 => 'ветераны',
            13 => 'жилищно-коммунальное хозяйство'
        ];
    }
}