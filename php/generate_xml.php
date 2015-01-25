<?php

require("db_access.php");

header("Content-type: text/xml");

// Создание XML-файла и родительского элемента
$dom = new DOMDocument("1.0", "UTF-8");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

// Выборка всех записей из таблицы markers

$query = "SELECT * FROM markers";
$result = mysql_query($query);

// Цикл прохода по всем выбранным записи; создание узла для каждой

while ($row = @mysql_fetch_assoc($result)){
  // Добавление нового узла в XML
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("id",$row['id']);
  $newnode->setAttribute("name",$row['name']);
  $newnode->setAttribute("address", $row['address']);
  $newnode->setAttribute("lat", $row['lat']);
  $newnode->setAttribute("lng", $row['lng']);
}

echo $dom->saveXML();

?>
