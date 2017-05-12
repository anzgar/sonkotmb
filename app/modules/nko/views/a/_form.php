<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>
<link rel="stylesheet" href="/design/chosen/chosen.css">
<script src="/design/chosen/chosen.jquery.js" type="text/javascript"></script>
<?php $form = ActiveForm::begin([
    'enableAjaxValidation' => false,
    'options' => ['class' => 'model-form'],
    'validateOnChange' => false,
    'validateOnSubmit' => false,
    'validateOnBlur' => false
]); ?>
<?= $form->field($model, 'name')->input('text') ?>
<?= $form->field($model, 'activities')->dropDownList($model->getActivities(), ['class' => 'form-control chosen', 'multiple' => true]) ?>
<?= $form->field($model, 'services')->dropDownList($model->getServices(), ['class' => 'form-control chosen', 'multiple' => true]) ?>
<?= $form->field($model, 'pay')->dropDownList([0 => 'Бесплатно', 1 => 'Платно', 2 => 'Платно/бесплатно']) ?>
<?= $form->field($model, 'recipients')->dropDownList($model->getRecipients(), ['class' => 'form-control chosen', 'multiple' => true]) ?>
<?= $form->field($model, 'member')->dropDownList($model->getMember(), ['class' => 'form-control chosen', 'multiple' => true]) ?>
<?= $form->field($model, 'type')->dropDownList([0 => 'База данных НКО', 1 => 'Поэтапный доступ', 2 => 'В обоих']) ?>
<?= Html::submitButton(Yii::t('easyii', 'Save'), ['class' => 'btn btn-primary']) ?>
<script>$('.chosen').chosen();</script>
<?php ActiveForm::end(); ?>