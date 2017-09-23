<div class="news-blog-category">
<h1>События, на которые Вы регистрировались</h1>

<?php foreach ($events as $event): ?>
<p>
    <b>Мероприятие:</b> <?=$event['event']?><br />
    <b>НКО:</b> <?=$event['nko']?><br />
    <b>Дата: <?=date("d.m.Y", strtotime($event['cdate'])) ?></b> 
</p>
<hr />
<?php endforeach; ?>
</div>