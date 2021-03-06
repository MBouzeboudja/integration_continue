<?php
$servername = "mysql";
$username = "root";
$password = "test";
$dbname = "test1";

// Create connection.
$conn = new mysqli($servername, $username, $password);

// Check connection.
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully to databse container";

// Create database.
if(!$conn->select_db($dbname)){
  echo "data base not exist";

  $sql = "CREATE DATABASE " . $dbname;
  if ($conn->query($sql) === TRUE) {
      echo "Database created successfully";
  } else {
      echo "Error creating database: " . $conn->error;
  }

  //Select Database after creation.
  if(!$conn->select_db($dbname)){
    echo "failled select databse";
  }
}

//Creation of table
$sql = "CREATE TABLE User (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "<div>";
    echo "Table User created successfully";
    echo "</div>";

} else {
    echo "<div>";
    echo "Error creating table: " . $conn->error;
    echo "</div>";
}

//Insert data
$sql = "INSERT INTO User (firstname, lastname, email)
VALUES ('Dupond', 'Doe', 'Dupond@example.com')";

if ($conn->query($sql) === TRUE) {
    echo "<div>";
    echo "New record created successfully";
    echo "</div>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "SELECT * FROM User";
$ret = $conn->query($sql);
echo "<table>";
echo "<tr>";
    echo "<th>first_name</th>";
    echo "<th>last_name</th>";
    echo "<th>email</th>";
echo "</tr>";
   while($row = $ret->fetch_array(MYSQLI_ASSOC) ) {
      echo "<tr>";
      echo "<td> ". $row['firstname'] ."</td>" ;
      echo "<td>". $row['lastname'] ."</td>";
      echo "<td>".$row['email'] ."</td>";
      echo "</tr>";

   }
echo "</table>";
echo"<div>";
echo "Operation done successfully\n";
echo "</div>";
$conn->close();



?>
