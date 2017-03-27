<?php

$db = new mysqli(
  getenv('MYSQL_HOSTMAME'),
  getenv('MYSQL_USER'),
  getenv('MYSQL_PASSWORD'),
  getenv('MYSQL_DATABASE')
);

$db->query('
  CREATE TABLE IF NOT EXISTS messages (
    id int NOT NULL AUTO_INCREMENT,
    date DATETIME,
    PRIMARY KEY (id)
  )
');

$db->query('INSERT INTO messages VALUES (NULL, NOW())');

$result = $db
  ->query('SELECT * FROM messages ORDER BY date DESC LIMIT 5')
  ->fetch_all(MYSQLI_ASSOC);

header('Content-Type: application/json');
echo json_encode($result);
