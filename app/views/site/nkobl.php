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
<?= $form->field($model, 'name')->textInput(['class' => 'form-control', 'style' => 'height: 24px; padding: 6px 18px;']) ?>
<?= $form->field($model, 'activities')->dropDownList($model->getActivities(), ['class' => 'form-control chosen', 'multiple' => true]) ?>
<?= $form->field($model, 'recipients')->dropDownList($model->getRecipients(), ['class' => 'form-control chosen', 'multiple' => true]) ?> 
<?= $form->field($model, 'member')->dropDownList($model->getMember(), ['class' => 'form-control chosen', 'multiple' => true]) ?> 
</div>
<?= Html::submitButton('Найти', ['class' => 'btn btn-primary']) ?>
<script>$('.chosen').chosen();</script>
<script>
    $('#findform').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/site/findnko/",
            data: {
                type: 0,
                activities: JSON.stringify($('#findform select#nko-activities').val()),
                member: $('#findform select#nko-member').val(),
                name: $('#findform input#nko-name').val(),
                pay: $('#findform select#nko-pay').val(),
                recipients: $('#findform select#nko-recipients').val()
            },
            success: function(info) {
                info = JSON.parse(info);
                console.log(info);
                $('#result').html('');
                info.forEach(function(item) {
                    var res = '<li><b>' + item.name + '</b>';
                    if (item.activities)
                        res += '<br />Основные направления деятельности: ' + item.activities;
                    if (item.member)
                        res += '<br />Участник актива: ' + item.member;
                    if (item.recipients)
                        res += '<br />Основные категории благополучателей: ' + item.recipients;
                    
                    res += '</li><br />';
                    $('#result').append(res);
                });
            }
        });
    });
</script>
<?php ActiveForm::end(); ?>
<hr />
<ul id="result"></ul>