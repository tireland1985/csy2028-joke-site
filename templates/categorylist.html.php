<?php foreach($categories as $category) { ?>
<blockquote>
<p>
	<?=$category['name']?> 
	<a href="/category/edit?id=<?=$category['id']?>">edit</a>

	<form action="/category/delete" method="POST">
	<input type="hidden" name="id" value="<?=$category['id'];?>" />
	<input type="submit" name="submit" value="Delete" >
	</form>


</p>
</blockquote>
<?php } ?>
