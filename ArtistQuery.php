<?php // ArtistQuery.php

require_once __DIR__.'/vendor/autoload.php';

namespace \Itp\Music;

class ArtistQuery extends \Itp\Base\Database {

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