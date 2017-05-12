<?php
namespace app\modules\nko\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\widgets\ActiveForm;

use yii\easyii\components\Controller;
use app\modules\nko\models\Nko;

class AController extends Controller
{
    public $rootActions = ['create', 'delete'];

    public function actionIndex()
    {
        $data = new ActiveDataProvider([
            'query' => Nko::find(),
        ]);
        return $this->render('index', [
            'data' => $data
        ]);
    }

    public function actionCreate($slug = null)
    {
        $model = new Nko;
        
        if ($post = Yii::$app->request->post()) {
            if (is_array($post['Nko']['activities']))
                $post['Nko']['activities'] = implode(',', $post['Nko']['activities']);
            
            if (is_array($post['Nko']['services']))
                $post['Nko']['services'] = implode(',', $post['Nko']['services']);
        }

        if ($model->load($post)) {
            if(Yii::$app->request->isAjax){
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
            else{
                if($model->save()){
                    $this->flash('success', Yii::t('easyii/nko', 'Nko created'));
                    return $this->redirect(['/admin/'.$this->module->id]);
                }
                else{
                    $this->flash('error', Yii::t('easyii', 'Create error. {0}', $model->formatErrors()));
                    return $this->refresh();
                }
            }
        }
        else {
            if($slug){
                $model->slug = $slug;
            }
            return $this->render('create', [
                'model' => $model
            ]);
        }
    }

    public function actionEdit($id)
    {
        $model = Nko::findOne($id);

        if($model === null){
            $this->flash('error', Yii::t('easyii', 'Not found'));
            return $this->redirect(['/admin/'.$this->module->id]);
        }
        
        if ($post = Yii::$app->request->post()) {
            if (is_array($post['Nko']['activities']))
                $post['Nko']['activities'] = implode(',', $post['Nko']['activities']);
            
            if (is_array($post['Nko']['services']))
                $post['Nko']['services'] = implode(',', $post['Nko']['services']);
        }
        
        if ($model->load($post)) {
            if(Yii::$app->request->isAjax){
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
            else{
                if($model->save()){
                    $this->flash('success', Yii::t('easyii/nko', 'Nko updated'));
                }
                else{
                    $this->flash('error', Yii::t('easyii', 'Update error. {0}', $model->formatErrors()));
                }
                return $this->refresh();
            }
        }
        else {
            if ($model->activities)
                $model->activities = explode(',', $model->activities);
            
            if ($model->services)
                $model->services = explode(',', $model->services);
                
            return $this->render('edit', [
                'model' => $model
            ]);
        }
    }

    public function actionDelete($id)
    {
        if(($model = Nko::findOne($id))){
            $model->delete();
        } else {
            $this->error = Yii::t('easyii', 'Not found');
        }
        return $this->formatResponse(Yii::t('easyii/nko', 'Nko deleted'));
    }
}