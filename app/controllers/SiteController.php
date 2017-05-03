<?php

namespace app\controllers;

use yii\web\Controller;
use yii\easyii\modules\news\api\News;
use yii\easyii\modules\article\api\Article;
use yii\easyii\modules\page\api\Page;
use yii\easyii\modules\article\models\Category;

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
        return $this->render('index');
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
        
        $page = \Yii::$app->request->get('p') ?
                \Yii::$app->request->get('p') : 0;
        
        $news = News::items([
            'pagination' => ['pageSize' => 5, 'page' => $page]
        ]);

        return $this->render('news', [
            'news' => $news
        ]);
    }
    
    public function actionCategory()
    {
        if (!\Yii::$app->request->get('id') || !$category = Article::cat(\Yii::$app->request->get('id'))) {
            return false;
        }
//        die(print_r(Category::generateTree()));
        
        $this->view->params['bread'] = [];
        $this->view->params['bread']['/site/category/'.$category->id] = $category->title;
        
        $this->view->title = $category->title;
        
        $page = \Yii::$app->request->get('p') ?
                \Yii::$app->request->get('p') : 0;
        
        $items = Article::items([
            'pagination' => ['pageSize' => 5, 'page' => $page]
        ]);

        return $this->render('сategory', [
            'articles' => $items
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
}