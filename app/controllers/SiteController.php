<?php

namespace app\controllers;

use yii\web\Controller;
use yii\easyii\modules\news\api\News;
use yii\easyii\modules\article\api\Article;
use yii\easyii\modules\page\api\Page;
use yii\easyii\modules\article\models\Category;
use yii\easyii\modules\gallery\api\Gallery;
use app\modules\nko\models\Nko;

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
        
        $this->view->params['userId'] = \Yii::$app->user->id;
        
        return $this->render('index', [
            'news' => $news,
            'support' => Page::get(5),
            'adv' => Article::items([
                        'where' => ['category_id' => 5],
                    ])[0],
            'interview' => Article::items([
                        'where' => ['category_id' => 4],
                    ])[0]
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
                'item' => $item
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

        return $this->render('сategory', [
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
            
            $this->view->title = $item->title;
            
            $category = Article::cat($item->category_id);
            
            $this->view->params['bread'] = [];
            $this->view->params['bread']['/site/category/'.$category->id] = $category->title;
            $this->view->params['bread']['/site/article/'.$item->id] = $item->title;
            
            return $this->render('newsItem', [
                'item' => $item
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
        $this->view->title = 'Помощь семьям, находящимся в трудной жизненной ситуации';
        return $this->render('stepdb', [
            'model' => new Nko
        ]);
    }
    
    public function actionFindnko($op, $activities, $services, $pay, $recipients)
    {
        return Nko::findNko($op, $activities, $services, $pay, $recipients);
    }
}