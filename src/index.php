<?php

// Enable Error Reporting to HTML
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Any syntax in the included scripts will presented to HTML
include 'lab1.php';

$mysqli = openDB();
?>

<html>
<head><title>Lab 1: SQL Crossword</title></head>
<style>
body {
    font-family: sans-serif;
}

table {
  width: 95%;
  border-spacing: 0px;
  border-collapse: collapse;
  margin-left:auto; 
  margin-right:auto; 
}
tr {
  border-top:  1px solid;
  border-bottom:  1px solid;
}

td {
  padding: 4px 0 4px 0;
}

#number {
  width: 50px;
  text-align: right;
  padding-right: 10px;
}

#answer {
  width: 200px;
  text-align: left;
  padding-left: 10px;
  padding-right: 10px;
}

th#query {
    font-family: inherit;
}

#query {
  text-align: left;
  font-family: monospace;
  padding-left: 10px;
  padding-right: 10px;
}

#query.failure {
  color: black;
  background-color: rgba(255, 0, 0, 0.26);
}

</style>

<body>
  <h1>Lab 1: SQL Crossword</h1>
  <table> 
    <tr><th id="number">Across</th><th id="answer">Answer</th><th id="query">Query</th></tr>
    <?php getAnswers($across, $mysqli); ?>
  </table>

  </p>

  <table> 
    <tr><th id="number">Down</th><th id="answer">Answer</th><th id="query">Query</th></tr>
    <?php getAnswers($down, $mysqli); ?>
  </table>
</body>

</html>