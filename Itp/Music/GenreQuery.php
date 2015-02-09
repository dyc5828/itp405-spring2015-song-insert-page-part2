<?php // GenreQuery.php
namespace Itp\Music;

use \PDO;
use \Itp\Base\Database;

class GenreQuery extends Database {

	public function getAll() {

		$sql = '
			SELECT id, genre
			FROM genres
		';

		$statement = parent::$pdo->prepare($sql);
		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_OBJ);
	}

}