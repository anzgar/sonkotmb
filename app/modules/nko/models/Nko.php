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
            ['type', 'number', 'integerOnly' => true],
            ['name', 'required'],
            ['name', 'trim'],
            ['activities', 'trim'],
            ['services', 'trim'],
            ['pay', 'trim'],
            ['recipients', 'trim'],
            ['member', 'trim'],
            ['slug', 'match', 'pattern' => self::$SLUG_PATTERN, 'message' => Yii::t('easyii', 'Slug can contain only 0-9, a-z and "-" characters (max: 128).')],
            ['slug', 'default', 'value' => null],
            ['slug', 'unique']
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => Yii::t('easyii', 'Name'),
            'activities' => 'Основные направления деятельности',
            'services' => 'Сфера услуг',
            'recipients' => 'Основные категории благополучателей',
            'member' => 'Участник актива',
            'pay' => 'Оплата',
            'type' => 'Отображать в разделе',
            'slug' => 'Метка',
        ];
    }

    public function behaviors()
    {
        return [
            CacheFlush::className()
        ];
    }
    
    public function getActivities($key = false)
    {
        $arr = [
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
        
        return $key !== false && is_numeric($key) ? $arr[$key] : $arr;
    }
    
    public function getServices($key = false)
    {
        $arr = [
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
        
        return $key !== false && is_numeric($key) ? $arr[$key] : $arr;
    }
    
    public function getRecipients($key = false)
    {
        $arr = [
            0 => 'дети (до 18 лет)',
            1 => 'дети с ОВЗ',
            2 => 'взрослые с ОВЗ',
            3 => 'дети группы риска',
            4 => 'ветераны',
            5 => 'молодёжь (18-30 лет)',
            6 => 'семьи, находящиеся в трудной жизненной ситуации',
            7 => 'лица старше 60 лет',
            8 => 'женщины',
            9 => 'юридические лица'
        ];
        
        return $key !== false && is_numeric($key) ? $arr[$key] : $arr;
    }
    
    public function getMember($key = false)
    {
        $arr = [
            0 => 'здоровый образ жизни',
            1 => 'просвещение',
            2 => 'семья и дети',
            3 => 'молодёжь и патриотизм',
            4 => 'экология',
            5 => 'добровольчество',
            6 => 'детские и молодёжные организации'
        ];
        
        return $key !== false && is_numeric(trim($key)) ? $arr[$key] : $arr;
    }
    
    public function getPay($key = false)
    {
        $arr = [
            0 => 'Бесплатно',
            1 => 'Платно',
            2 => 'Платно/бесплатно'
        ];
        
        return $key !== false && is_numeric($key) ? $arr[$key] : $arr;
    }
    
    public static function findNko($name, $activities, $services, $pay)
    {
        $model = new Nko;
        $all = $model::find()->all();
        $res = [];
        
        $activities = json_decode($activities);
        //$services = json_decode($services);

        foreach ($all as $key => $item) {
            $itemActivities = explode(',', $item->activities);
            $itemServices = explode(',', $item->services);
            if (($item->type == 1 || $item->type == 2) &&
                (!$name || strpos(mb_strtolower($item->name), mb_strtolower($name)) !== FALSE) &&
                (!is_array($activities) || !count($activities) || count(array_intersect($itemActivities, $activities))) &&
                (!is_array($services) || !count($services) || count(array_intersect($itemServices, $services))) &&
                $item->pay == $pay) {
                foreach ($itemActivities as &$i) {
                    if (is_numeric($i))
                        $i = $model->getActivities($i);
                }
                foreach ($itemServices as &$i) {
                    if (is_numeric($i))
                        $i = $model->getServices($i);
                }
                
                $res[] = ['name' => $item->name,
                          'activities' => implode(', ', $itemActivities),
                          'services' => implode(', ', $itemServices),
                          'pay' => $model->getPay($item->pay)
                         ];
            }
        }
        
        return $res;
    }
    
    public static function findNkobl($name, $activities, $recipients, $member)
    {
        $model = new Nko;
        $all = $model::find()->all();
        $res = [];
        
        $activities = json_decode($activities);

        foreach ($all as $key => $item) {
            $itemActivities = explode(',', $item->activities);
            $itemMember = explode(',', $item->member);
            $itemRecipients = explode(',', $item->recipients);
            if (($item->type == 0 || $item->type == 2) &&
                (!$name || strpos(mb_strtolower($item->name), mb_strtolower($name)) !== FALSE) &&
                (!is_array($activities) || !count($activities) || count(array_intersect($itemActivities, $activities))) &&
                (!is_array($recipients) || !count($recipients) || count(array_intersect($itemRecipients, $recipients))) &&
                (!is_array($member) || !count($member) || count(array_intersect($itemMember, $member)))) {
                foreach ($itemActivities as &$i) {
                    if (is_numeric($i))
                        $i = $model->getActivities($i);
                }
                foreach ($itemMember as &$i) {
                    if (is_numeric($i))
                        $i = $model->getMember($i);
                }
                foreach ($itemRecipients as &$i) {
                    if (is_numeric($i))
                        $i = $model->getRecipients($i);
                }
                
                $res[] = ['name' => $item->name,
                          'activities' => implode(', ', $itemActivities),
                          'member' => implode(', ', $itemMember),
                          'recipients' => implode(', ', $itemRecipients)
                         ];
            }
        }
        
        return $res;
    }
}