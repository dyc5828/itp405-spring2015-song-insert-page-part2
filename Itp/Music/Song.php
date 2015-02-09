<?php // Song.php
namespace Itp\Music;

use \Itp\Base\Database;

class Song extends Database {

	private $title;
	private $artist_id;
	private $genre_id;
	private $price;

	public function setTitle($title) {
		$this->title = $title;
	}

	public function setArtistId($artist) {
		$this->artist_id = $artist;
	}

	public function setGenreId($genre) {
		$this->genre_id = $genre;
	}

	public function setPrice($price) {
		$this->price = $price;
	}

	public function save() {

		$sql = '
			INSERT INTO songs (title, artist_id, genre_id, price)
			VALUES (:title, :artist, :genre, :price)
		';

		$statement = parent::$pdo->prepare($sql);

		$statement->bindParam(':title',$this->title);
		$statement->bindParam(':artist',$this->artist_id);
		$statement->bindParam(':genre',$this->genre_id);
		$statement->bindParam(':price',$this->price);

		$statement->execute();

	}

	public function getTitle() {
		return $this->title;
	}

	public function getId() {
		return parent::$pdo->lastInsertId();
	}

}