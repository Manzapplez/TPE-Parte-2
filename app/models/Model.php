<?php
require_once 'config.php';
require_once './app/helpers/DbHelper.php';

class Model
{
  protected $db;

  public function __construct()
  {
    DbHelper::tryCreateDB();

    $this->db = new PDO(
      "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
      DB_USER,
      DB_PASSWORD,
      [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    DbHelper::deployIfEmpty($this->db, __DIR__ . '/../database/soundsnack.sql');
  }
}
