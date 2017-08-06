<form method="post">
    <p>
        Контакты для ответа:<br />
        <input type="text" id="contacts" class="form-control" />
    </p>
    <p>
        Сообщение:<br />
        <textarea class="form-control" id="question"></textarea>
    </p>
    <p>
        <input type="button" class="form-control" style="width:30%;" id="sendfeedback" value="Отправить" />
    </p>
    <input type="hidden" id="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
</form>