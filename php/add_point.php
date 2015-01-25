<?php
require("db_access.php");

function utf8_urldecode($str) {
  $str = preg_replace("/%u([0-9a-f]{3,4})/i","&#x\1;",urldecode($str));
  return html_entity_decode($str,null,'UTF-8');
}

// Gets data from URL parameters
$name = utf8_urldecode($_GET['name']);
$address = utf8_urldecode($_GET['address']);
$lat = $_GET['lat'];
$lng = $_GET['lng'];

// Insert new row with user data
$query = sprintf("INSERT INTO markers " .
" (id, name, address, lat, lng ) " .
" VALUES (NULL, '%s', '%s', '%s', '%s');",
mysql_real_escape_string($name),
mysql_real_escape_string($address),
mysql_real_escape_string($lat),
mysql_real_escape_string($lng));

$result = mysql_query($query);

if (!$result) {
  die('Invalid query: ' . mysql_error());
}

// response - id
$query = "SELECT id FROM markers";
$result = mysql_query($query);
$max = 0;
while ($row = @mysql_fetch_assoc($result)){
  if ($row['id']>$max){
    $max = $row['id'];
  }
}
echo $max;
?>
