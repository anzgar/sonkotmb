<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>
<link rel="stylesheet" href="/design/chosen/chosen.css">
<script src="/design/chosen/chosen.jquery.js" type="text/javascript"></script>
<?php $form = ActiveForm::begin([
    'enableAjaxValidation' => false,
    'options' => ['class' => 'model-form', 'id' => 'findform'],
    'validateOnChange' => false,
    'validateOnSubmit' => false,
    'validateOnBlur' => false
]); ?>
<div style="width:400px">
<?= $form->field($model, 'activities')->dropDownList($model->getActivities(), ['class' => 'form-control chosen', 'multiple' => true]) ?>
<?= $form->field($model, 'services')->dropDownList($model->getServices(), ['class' => 'form-control chosen', 'multiple' => true]) ?>
<?= $form->field($model, 'pay')->dropDownList([0 => 'Бесплатно', 1 => 'Платно', 2 => 'Платно/бесплатно'], ['class' => 'form-control chosen', 'style' => 'width:103%']) ?>
<?= $form->field($model, 'recipients')->dropDownList($model->getRecipients(), ['class' => 'form-control chosen', 'multiple' => true]) ?>
</div>
<?= Html::submitButton('Найти', ['class' => 'btn btn-primary']) ?>
<script>$('.chosen').chosen();</script>
<script>
    $('#findform').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "GET",
            url: "/site/findnko/",
            data: {
                op: 'stepdb',
                activities: JSON.stringify($('#findform select#nko-activities').val()),
                services: $('#findform select#nko-services').val(),
                pay: $('#findform select#nko-pay').val(),
                recipients: $('#findform select#nko-recipients').val()
            },
            success: function(info) {
//                info = $.parseJSON(info);
//                alert(info);
            }
        });
    });
</script>
<?php ActiveForm::end(); ?>
<hr />
