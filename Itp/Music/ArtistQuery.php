<?php // ArtistQuery.php
namespace Itp\Music;

use \Itp\Base\Database;
use \PDO;

class ArtistQuery extends Database {

	public function getAll() {

		$sql = '
			SELECT id, artist_name
			FROM artists
		';

		$statement = parent::$pdo->prepare($sql);
		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_OBJ);
	}

}