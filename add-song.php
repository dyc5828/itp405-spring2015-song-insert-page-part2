<?php

require_once __DIR__.'/vendor/autoload.php';
use \Itp\Music\ArtistQuery;
use \Itp\Music\GenreQuery;
use \Itp\Music\Song;
use \Symfony\Component\HttpFoundation\Session\Session;

$session = new Session();
$session->start();

$aQuery = new ArtistQuery();
$artists = $aQuery->getAll();
$gQuery = new GenreQuery();
$genres = $gQuery->getAll();

if(isset($_REQUEST['Add'])) {
	$song = new Song();

	$song->setTitle($_REQUEST['title']);
	$song->setArtistId($_REQUEST['artist']);
	$song->setGenreId($_REQUEST['genre']);
	$song->setPrice($_REQUEST['price']);

	$song->save();

	$message = 'The song, '.$song->getTitle().' with an ID of '.$song->getId().' was inserted successfully!';

	$session->getFlashBag()->add('confirm',$message);

	header('Location: add-song.php');
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="main.css">

</head>
<body>
<div id="main">

<div id="heading">Song Insert Page</div>

	<div>
<?php foreach($session->getFlashBag()->get('confirm') as $message) : ?>
	<p class="message">
	<?=$message?>
	</p>
<?php endforeach ?>
	</div>

<form method="post">
	<label for="title">
		Title:
	</label>
	<input type="text" required id="title" name="title">
	<br>

	<label for="artist">
		Artist:
	</label>
	<select required id="artist" name="artist">

<?php foreach($artists as $artist) : ?>
	<option value="<?=$artist->id?>">
		<?=$artist->artist_name?>
	</option>
<?php endforeach; ?>

	</select>
	<br>

	<label for="genre">
		Genre:
	</label>
	<select required id="genre" name="genre">

<?php foreach($genres as $genre) : ?>
	<option value="<?=$genre->id?>">
		<?=$genre->genre?>
	</option>
<?php endforeach; ?>

	</select>
	<br>

	<label for="price">
		Price:
	</label>
	<input type="text" required id="price" name="price">
	<br>

	<input type="submit" value="Add" name="Add">
</form>

</div><!--div#main-->
</body>
</html>