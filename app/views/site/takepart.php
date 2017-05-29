<form method="post">
    <p>
        ФИО:<br />
        <input type="text" id="fio" class="form-control" />
    </p>
    <p>
        Контактный телефон:<br />
        <input type="text" id="phone" class="form-control" />
    </p>
    <p>
        Наименование НКО:<br />
        <input type="text" id="nko" class="form-control" />
    </p>
    <p>
        <input type="button" class="form-control" style="width:30%;" id="sendtakepart" value="Отправить" />
    </p>
    <input type="hidden" id="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
</form>