<div class="news-blog-category">
<h1>Предложенные Вами идеи</h1>

<?php foreach ($ideas as $idea): ?>
<p>
    <?=$idea['idea']?><br />
    <b>Дата: <?=date("d.m.Y", strtotime($idea['cdate'])) ?></b> 
</p>
<hr />
<?php endforeach; ?>
</div>