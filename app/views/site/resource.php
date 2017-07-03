<form method="post">
    <p>
        Наименование НКО:<br />
        <input type="text" id="nko" class="form-control" />
    </p>
    <p>
        Вопрос:<br />
        <textarea id="question" class="form-control"></textarea>
    </p>
    <p>
        Контакты:<br />
        <textarea id="contacts" class="form-control"></textarea>
    </p>
    <p>
        <input type="button" class="form-control" style="width:30%;" id="sendresource" value="Оставить заявку" />
    </p>
    <input type="hidden" id="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
</form>