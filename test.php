<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Kai Test PHP</title>
    <style type="text/css" media="screen">
    </style>
  </head>
  <body>
<h1>Kai Test PHP / MySQL / Symfony / <a href="/">Home</a></h1>
<p>
<?php
// turn on error display to debug DB connection difficulties
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<p>1. Hi PHP!</p>";

$servername = "localhost";
$database = "kaitest";
$username = "jdb";
$password = '--09!Meat!White!Norway!77--';
$sql = "SELECT id, firstname, address FROM person";

echo <<<TEXT
2. connect to MySQL on server=$servername using mysqli 
db $database 
user $username 
pass xxx
SQL "$sql"
Trying...
TEXT;

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully!!!";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table border='1'>";
  echo "<tr><th>ID</th><th>Name</th><th>Address</th></tr>";
  while ($row = $result->fetch_assoc()) {
     echo "<tr><td>{$row['id']}</td><td>{$row['firstname']}</td><td>{$row['address']}</td></tr>";
  }
  echo "</table>";
} else {
  echo "No results found.";
}

echo "<p>3. next, can test Symfony ... since I solved my initial DB API problems.</p>";

echo <<<HTML
<p>3.5 but first, a bit of sys admin. I want:
<ul>
  <li>all of my files in a git repo</li>
  <li>the right user permissions on those files</li>
</ul>
</p>
HTML;

echo "<p>4. how about some phpinfo?</p>";

phpinfo();

echo "5. done for now";
?>
</p>
<p>
  <a href="/">Home</a>
</p>
  </body>
</html>

