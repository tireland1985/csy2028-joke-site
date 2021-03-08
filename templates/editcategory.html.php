<h2>Categories</h2>

<form action="/category/edit" method="post">
		<input type="hidden" name="category[id]" value="<?=$category['id'] ?? ''?>" />
		<label for="name">Enter category name:</label>
		<textarea id="name" name="category[name]" rows="3" cols="40"><?=$category['name'] ?? ''?></textarea>
		<input type="submit" value="Add">
</form>