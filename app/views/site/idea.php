<?php if ($isGuest) { ?>
Пожалуйста, зарегистрируйтесь или авторизуйтесь, чтобы предложить идею.
<?php } else { ?>

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
        Ваша идея:<br />
        <textarea class="form-control" id="idea"></textarea>
    </p>
    <p>
        <input type="button" class="form-control" style="width:30%;" id="sendidea" value="Отправить" />
    </p>
    <input type="hidden" id="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
</form>
<?php } ?>