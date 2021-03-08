<?php foreach($jokes as $joke) { ?>
<blockquote>
<p>
	<?=$joke['joketext']?> 
	<a href="/edit?id=<?=$joke['id']?>">edit</a>

	<form action="/delete" method="POST">
	<input type="hidden" name="id" value="<?=$joke['id'];?>" />
	<input type="submit" name="submit" value="Delete" >
	</form>


</p>
</blockquote>
<?php } ?>
