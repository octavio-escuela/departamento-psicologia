<html>
  <head>
    <title>
      Prueba de conexion
    </title>
  </head>
  <body>
    <?php
	//TODO obtener datos de un archivo externo
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "myDB";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	//TODO cambar esta query de prueba por una que tenga
	//que ver con la historia
	$sql = "INSERT INTO MyGuests (firstname, lastname, email)
	VALUES ('John', 'Doe', 'john@example.com');";
	$sql .= "INSERT INTO MyGuests (firstname, lastname, email)
	VALUES ('Mary', 'Moe', 'mary@example.com');";
	$sql .= "INSERT INTO MyGuests (firstname, lastname, email)
	VALUES ('Julie', 'Dooley', 'julie@example.com')";

	// sql to create
	if ($conn->multi_query($sql) === TRUE) {
		$last_id = $conn->insert_id;
	  echo "New record created successfully";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();
    ?> 
  </body>
</html>
