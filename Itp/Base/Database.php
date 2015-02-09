<?php // Database.php
namespace Itp\Base;

use \PDO;

class Database {

	private static $host = 'itp460.usc.edu';
	private static $db = 'music';
	private static $user = 'student';
	private static $pass = 'ttrojan';

	protected static $pdo;

	public function __construct() {

		if (!self::$pdo) {
			$connectionStr = 'mysql:host='.self::$host.';dbname='.self::$db;
			self::$pdo = new PDO($connectionStr, self::$user, self::$pass);
		}
	}
}