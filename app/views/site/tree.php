<?php
function showCategory($category) {
    ?><ul><?php
        foreach ($category->children as $child) {
            ?><li><?php
            if (count($child->children)) {
                echo $child->title;
                showCategory($child);
            }
            else {
                echo '<a href="/site/category/'.$child->category_id.'">'.$child->title.'</a>';
            }
            ?></li><?php
        }
    ?></ul><?php
}

?><div class="module-otchety"><table class="otchety"><tr>
<?php
foreach ($category->children as $key => $child) {
    ?>
        <td<?php if (!($key % 3) && $key == count($category->children)-1) { ?>
            colspan="3"
            <?php } ?>>
            <?php if (!count($child->children)) {
                ?><h3><a href="/site/category/<?=$child->category_id?>"><?=$child->title?></a></h3>
            <?php } else {
                ?><h3><?=$child->title?></h3><?php 
                showCategory($child);
            }
            ?>
        </td>
    <?php
    if ($key % 3) {
        ?></tr><tr><?php
    }
}
?>
</tr></table></div>
<!-- Аккордеон -->
  <script>
   jQuery(window).on('load',function(){
    jQuery('.otchety td>ul>li').on('click',function(){
	 jQuery('.otchety td>ul>li>ul').slideUp();
	 jQuery('.otchety td>ul>li').removeClass('active');
	 jQuery(this).addClass('active');
	 jQuery('>ul',jQuery(this)).slideDown();
	});
	jQuery('.otchety td>ul>li>ul>li').on('click',function(e){
	 e.stopPropagation();
	 jQuery('.otchety td>ul>li>ul>li>ul').slideUp();
	 jQuery('.otchety td>ul>li>ul>li').removeClass('active');
	 jQuery(this).addClass('active');
	 jQuery('>ul',jQuery(this)).slideDown();
	});
	jQuery('.otchety td>ul>li>ul>li>ul>li').on('click',function(e){
	 e.stopPropagation();
	 jQuery('.otchety td>ul>li>ul>li>ul>li>ul').slideUp();
	 jQuery('.otchety td>ul>li>ul>li>ul>li').removeClass('active');
	 jQuery(this).addClass('active');
	 jQuery('>ul',jQuery(this)).slideDown();
	});
	jQuery('.otchety td>ul>li>ul>li>ul>li>ul>li').on('click',function(e){
	 e.stopPropagation();
	});
   });
  </script>
