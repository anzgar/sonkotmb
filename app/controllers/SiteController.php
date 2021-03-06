<?php

namespace app\controllers;

use yii\web\Controller;
use yii\easyii\modules\news\api\News;
use yii\easyii\modules\article\api\Article;
use yii\easyii\modules\page\api\Page;
use yii\easyii\modules\article\models\Category;
use yii\easyii\modules\gallery\api\Gallery;
use app\modules\nko\models\Nko;
use yii\easyii\models\Setting;
use app\models\Idea;
use app\models\Event;

class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $this->layout = 'home';
        
        $news = News::items([
            'pagination' => ['pageSize' => 5, 'page' => 1]
        ]);
        
        $adv = \Yii::$app->db->createCommand('SELECT item_id,title,short,image FROM easyii_article_items WHERE category_id=5 ORDER BY item_id DESC LIMIT 1')->queryOne();
        
        $interview = Article::items([
                        'where' => ['category_id' => 4],
                    ])[0];
        
        $forums = \Yii::$app->db->createCommand('SELECT * FROM podium_forum')->query();
        
        $tab4 = \Yii::$app->db->createCommand('SELECT title,text FROM easyii_pages WHERE page_id=29')->query()->read();
        
        $tab5 = \Yii::$app->db->createCommand('SELECT title,text FROM easyii_pages WHERE page_id=30')->query()->read();
        
        $supportItems = \Yii::$app->db->createCommand('SELECT item_id FROM easyii_article_items WHERE category_id=54')->query();
        $support = [];
        
        $tab4['title'] = 'Новости Общественной палаты';
        
        $tab5['title'] = 'Новости Минэкономразвития';
        
        while ($si = $supportItems->read()) {
            $support[] = Article::get($si['item_id']);
        }
        
        return $this->render('index', [
            'news' => $news,
//            'support' => Page::get(5),
            'support' => $support,
            'adv' => $adv,
            'interview' => $interview,
            'forums' => $forums,
            'tab4' => $tab4,
            'tab5' => $tab5,
        ]);
    }
    
    public function actionNews()
    {   
        $this->view->title = 'Новости';
        if (\Yii::$app->request->get('id')) {
            $item = News::get(\Yii::$app->request->get('id'));
            
            $this->view->params['bread'] = [];
            $this->view->params['bread']['/site/news/'] = 'Новости';
            $this->view->params['bread']['/site/news/'.$item->id] = $item->title;
            
            return $this->render('newsItem', [
                'item' => $item,
                'showDate' => true
            ]);
        }
        
        $page = \Yii::$app->request->get('page') ?
                \Yii::$app->request->get('page') : 0;
        
        $news = News::items([
            'pagination' => ['pageSize' => 6, 'page' => $page - 1]
        ]);
        
        return $this->render('news', [
            'news' => $news,
            'pages' => News::pages()
        ]);
    }
    
    public function actionPrivate()
    {
        if (\Yii::$app->user->isGuest) {
            return false;
        }
        
        return $this->render('private');
    }
    
    public function actionIdeas()
    {
        if (\Yii::$app->user->isGuest)
            return false;
        
        return $this->render('ideas', [
           'ideas' => Idea::find('user_id=:userId', ['userId' => \Yii::$app->user->id])->all()
        ]);
    }
    
    public function actionEvents()
    {
        if (\Yii::$app->user->isGuest)
            return false;
        
        return $this->render('events', [
           'events' => Event::find('user_id=:userId', ['userId' => \Yii::$app->user->id])->all()
        ]);
    }
    
    public function actionCategory()
    {
        if (!\Yii::$app->request->get('id') || !$category = Article::cat(\Yii::$app->request->get('id'))) {
            return false;
        }
        
        $this->view->params['bread'] = [];
        $this->view->params['bread']['/site/category/'.$category->id] = $category->title;
        
        $this->view->title = $category->title;
        
        $page = \Yii::$app->request->get('page') ?
                \Yii::$app->request->get('page') : 0;
        
        $items = Article::items([
            'where' => ['category_id' => \Yii::$app->request->get('id')],
            'pagination' => ['pageSize' => 6, 'page' => $page - 1]
        ]);

        $view = \Yii::$app->request->get('id') == 66 ? 'resourceCenter' : 'category';
        
        if ($view == 'category' && count($items) == 1 && !$page) {
            \Yii::$app->response->redirect('/site/article/'.$items[0]->id);
        }
        
        return $this->render($view, [
            'articles' => $items,
            'pages' => Article::pages()
        ]);
    }
    
    public function actionTree()
    {
        if (!\Yii::$app->request->get('id') || !$category = Article::cat(\Yii::$app->request->get('id'))) {
            return false;
        }
        
        foreach (Category::tree() as $category) {
            if ($category->category_id == \Yii::$app->request->get('id')) {
                break;
            }
        }
        
        $this->view->params['bread'] = [];
        $this->view->params['bread']['/site/category/'.$category->category_id] = $category->title;
        
        $this->view->title = $category->title;
        
        return $this->render('tree', [
            'category' => $category
        ]);
    }
    
    public function actionArticle()
    {
        if (\Yii::$app->request->get('id')) {
            $item = Article::get(\Yii::$app->request->get('id'));
            
            $textMade = trim(strip_tags($item->text));

            //Если статья состоит только из адреса файла, переходим на него
            if (substr($textMade, 0, 8) === '/uploads'
                    && file_exists(\Yii::getAlias('@webroot') . $textMade)) {
                \Yii::$app->response->redirect($textMade);
            }
            
            $this->view->title = $item->title;
            
            $category = Article::cat($item->category_id);
            
            $this->view->params['bread'] = [];
            $this->view->params['bread']['/site/category/'.$category->id] = $category->title;
            $this->view->params['bread']['/site/article/'.$item->id] = $item->title;
            
            return $this->render('newsItem', [
                'item' => $item,
                'showReg' => $item->reg ? true : false,
                'showDate' => $item->category_id == 5 ? true : false
            ]);
        }
    }
    
    public function actionPhoto()
    {
        $this->view->title = 'Фотогалерея';
        
        if (\Yii::$app->request->get('id')) {
            $item = Gallery::cat(\Yii::$app->request->get('id'));
            
            $this->view->params['bread'] = [];
            $this->view->params['bread']['/site/photo/'] = 'Фотогалерея';
            $this->view->params['bread']['/site/photo/'.$item->id] = $this->view->title = $item->title;
            
            return $this->render('photos', [
                'items' => $item->photos(),
                'plugin' => Gallery::plugin()
            ]);
        }
        
        /*$page = \Yii::$app->request->get('page') ?
                \Yii::$app->request->get('page') : 0;
        
        $news = News::items([
            'pagination' => ['pageSize' => 6, 'page' => $page - 1]
        ]);*/
        
        $cats = [];
        foreach (Gallery::cats() as $cat) {
            $cats[] = Gallery::cat($cat->category_id);
        }
        
        return $this->render('gallery', [
            'cats' => $cats,
//            'pages' => News::pages()
        ]);
    }
    
    public function actionPage()
    {
        if (\Yii::$app->request->get('id')) {
            $item = Page::get(\Yii::$app->request->get('id'));
            
            $this->view->title = $item->title;
            
            $this->view->params['bread'] = [];
            $this->view->params['bread']['/site/page/'.$item->id] = $item->title;
            
            return $this->render('page', [
                'item' => $item
            ]);
        }
    }
    
    public function actionInvalid()
    {
        $this->view->title = 'Социальная адаптация инвалидов и их семей';
        return $this->render('invalid');
    }
    
    public function actionMotherhood()
    {
        $this->view->title = 'Профилактика социального сиротства, поддержка материнства и детства';
        return $this->render('motherhood');
    }
    
    public function actionOld()
    {
        $this->view->title = 'Повышение качества жизни людей пожилого возраста';
        return $this->render('old');
    }
    
    public function actionFamily()
    {
        $this->view->title = 'Помощь семьям, находящимся в трудной жизненной ситуации';
        return $this->render('family');
    }
    
    public function actionStepbystep()
    {
        $this->view->title = 'Поэтапный доступ НКО к бюджетным средствам';
        return $this->render('stepbystep');
    }
    
    public function actionStepdb()
    {
        $this->view->title = 'Сведения о СО НКО';
        return $this->render('stepdb', [
            'model' => new Nko
        ]);
    }
    
    public function actionNkobl()
    {
        $this->view->title = 'База СО НКО области';
        return $this->render('nkobl', [
            'model' => new Nko
        ]);
    }
    
    public function actionFindnko()
    {
        return \Yii::$app->request->post('type') ?
            json_encode(Nko::findNko(    //1 - поэтапный
                \Yii::$app->request->post('name'),
                \Yii::$app->request->post('activities'),
                \Yii::$app->request->post('services'),
                \Yii::$app->request->post('pay')
            )) :
            json_encode(Nko::findNkobl(   //0 - бд нко
                \Yii::$app->request->post('name'),
                \Yii::$app->request->post('activities'),
                \Yii::$app->request->post('recipients'),
                \Yii::$app->request->post('member')
            ));
    }
    
    public function actionIdea()
    {   
        if ($post = \Yii::$app->request->post()) {
            $htmlMail = 'Имя: '.$post['fio'].'<br />';
            $htmlMail .= 'Телефон: '.$post['phone'].'<br />';
            $htmlMail .= 'Идея: '.$post['idea'].'<br />';
            
            $toAddrs = [
                'jc_garant@bk.ru',
                'sav@publ.tambov.gov.ru',
                'roa@publ.tambov.gov.ru',
                'bdv@publ.tambov.gov.ru'
            ];
            
            foreach ($toAddrs as $addr) {
                if (!\Yii::$app->mailer->compose()
                    ->setFrom('robot@sonkotmb.ru')
                    ->setTo($addr)
                    ->setSubject('Sonkotmb: идея')
                    ->setHtmlBody($htmlMail)
                    ->send())
                        die('Ошибка отправки');
            }
            
            $idea = new Idea;
            $idea->user_id = \Yii::$app->user->id;
            $idea->fio = $post['fio'];
            $idea->phone = $post['phone'];
            $idea->idea = $post['idea'];
            $idea->save();
            
            die('ok');
        }
        $this->view->title = 'Предложите свою идею';
        
        return $this->render('idea', [
            'isGuest' => \Yii::$app->user->isGuest
        ]);
    }
    
    public function actionTakepart()
    {
        if ($post = \Yii::$app->request->post()) {
            $htmlMail = 'Мероприятие: '.$post['venue'].'<br />';
            $htmlMail .= 'Имя: '.$post['fio'].'<br />';
            $htmlMail .= 'Телефон: '.$post['phone'].'<br />';
            $htmlMail .= 'НКО: '.$post['nko'].'<br />';
            
            $toAddrs = [
                'jc_garant@bk.ru',
                'sav@publ.tambov.gov.ru',
                'roa@publ.tambov.gov.ru',
                'bdv@publ.tambov.gov.ru'
            ];
            
            foreach ($toAddrs as $addr) {
                if (!\Yii::$app->mailer->compose()
                    ->setFrom('robot@sonkotmb.ru')
                    ->setTo($addr)
                    ->setSubject('Sonkotmb: регистрация НКО на мероприятие')
                    ->setHtmlBody($htmlMail)
                    ->send())
                        die('Ошибка отправки');
            }
           
            if (!\Yii::$app->user->isGuest && \Yii::$app->user->id) {
                $event = new Event;
                $event->user_id = \Yii::$app->user->id;
                $event->event = $post['venue'];
                $event->fio = $post['fio'];
                $event->phone = $post['phone'];
                $event->nko = $post['nko'];
                $event->save();
            }
            
            die('ok');
        }
        $this->view->title = 'Регистрация НКО на мероприятие';

        return $this->render('takepart', [
            'items' => Article::items([
                        'where' => ['category_id' => 7],
                    ]),
            'isGuest' => \Yii::$app->user->isGuest
        ]);
    }
    
    public function actionResource()
    {
        if ($post = \Yii::$app->request->post()) {
            $htmlMail .= 'НКО: '.$post['nko'].'<br />';
            $htmlMail .= 'Вопрос: '.$post['question'].'<br />';
            $htmlMail .= 'Контакты: '.$post['contacts'].'<br />';
            
            if (\Yii::$app->mailer->compose()
                ->setFrom('robot@sonkotmb.ru')
                ->setTo('jc_garant@bk.ru')
                ->setSubject('Sonkotmb: Ресурсный центр')
                ->setHtmlBody($htmlMail)
                ->send())
                die('ok');
            else
                die('Ошибка отправки');
        }
        
        $this->view->title = 'Ресурсный центр: оставить заявку';
        $page = Page::get(31);
        return $this->render('resource', ['page' => $page]);
    }
    
    public function actionFeedback()
    {
        if ($post = \Yii::$app->request->post()) {
            $htmlMail = 'Текст: '.$post['question'].'<br />';
            $htmlMail .= 'Контакты для ответа: '.$post['contacts'].'<br />';

            if (\Yii::$app->mailer->compose()
                ->setFrom('robot@sonkotmb.ru')
                ->setTo('jc_garant@bk.ru')
                ->setSubject('Sonkotmb: письмо от пользователя')
                ->setHtmlBody($htmlMail)
                ->send())
                die('ok');
            else
                die('Ошибка отправки');
        }
        $this->view->title = 'Связь с администрацией';
        return $this->render('feedback');
    }
}