<form method="post">
    <p>
        Выбор мероприятия:<br />
        <select class="form-control" id="venue">
        <?php
            foreach ($items as $item) {
                ?><option<?php if (\Yii::$app->request->get('id') == $item->id) { ?> selected="selected"<?php } ?>>
                    <?=$item->title?>
                </option><?php
            }
        ?>
        </select>
    </p>
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