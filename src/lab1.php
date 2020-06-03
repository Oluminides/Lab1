<?php
$username = "cmpt310";
$password = "w2qa=m";
$server   = "db";
$schema   = "Lab1";

$across = array(
  1  => "SELECT 'BALSA' as `Word`;",
  6  => "SELECT 'IFFY' as `Word`;",
  10 => "",
  14 => "",
  15 => "",
  16 => "",
  17 => "",
  20 => "",
  21 => "",
  22 => "",
  25 => "",
  26 => "",
  30 => "",
  32 => "",
  35 => "",
  41 => "",
  43 => "",
  44 => "",
  45 => "",
  47 => "",
  48 => "",
  53 => "",
  56 => "",
  58 => "",
  63 => "",
  66 => "",
  67 => "",
  68 => "",
  69 => "",
  70 => "",
  71 => ""
);

$down = array(
  1  => "",
  2  => "",
  3  => "",
  4  => "",
  5  => "",
  6  => "",
  7  => "",
  8  => "",
  9  => "",
  10 => "",
  11 => "",
  12 => "",
  13 => "",
  18 => "",
  19 => "",
  23 => "",
  24 => "",
  26 => "",
  27 => "",
  28 => "",
  29 => "",
  31 => "",
  33 => "",
  34 => "",
  36 => "",
  37 => "",
  38 => "",
  39 => "",
  40 => "",
  42 => "",
  46 => "",
  48 => "",
  49 => "",
  50 => "",
  51 => "",
  52 => "",
  54 => "",
  55 => "",
  57 => "",
  59 => "",
  60 => "",
  61 => "",
  62 => "",
  64 => "",
  65 => ""
);

// DO NOT MODIFY BELOW THIS POINT ---------------------------------------------

function openDB()
{
  $mysqli = new mysqli();
  $mysqli->init();
  $mysqli->real_connect($GLOBALS['server'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['schema'], NULL, NULL, MYSQLI_CLIENT_SSL);
  if ($mysqli->connect_errno)
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  else
    echo "Connected to " . $mysqli->host_info . "\n";
  echo "</p>\n";
  return $mysqli;
}

function closeDB()
{
  openDB()->close();
}

function getAnswers($questions, $mysqli)
{
  foreach ($questions as $num => $query) {
    $resultString = "";
    if (!empty($query)) {
      $result = $mysqli->query($query);
      if ($result) {
        if ($result->num_rows != 1)
          $outcome = "failure";
        else
          $outcome = "success";
        $resultString = $result->fetch_assoc();
        $resultString = $resultString['Word'];
      } else {
        $outcome = "failure";
        if (!empty($query))
          $resultString = "Error: " . "[" . $mysqli->errno . "] " . $mysqli->error;
      }
    } else {
      $outcome = "failure";
    }
    echo "<tr><td id=\"number\">$num</td><td id=\"answer\">$resultString</td><td id=\"query\" class=\"$outcome\">$query</td>\n";
  }
}
