<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "moodle";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
echo "<br/>";

$sql = "SELECT id, score, definition FROM mdl_gradingform_rubric_levels";
$result = $conn->query($sql);



echo "<table border='1'>";


if ($result->num_rows > 0) {
	
	echo "<tr><th>ID</th><th>Score</th><th>Definition</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]."</td>"; 
		echo "<td>" . $row["score"]."</td>";
		echo "<td>" . $row["definition"]."</td></tr>";
    }
} else {
    echo "0 results";

    echo json_encode($result);
}
echo"</table>";


$conn->close();

/*

$course= array("1" => "Lemang Portal", "2" => "Web Engineering");

echo json_encode($course);
*/
?>