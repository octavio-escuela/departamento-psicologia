<html>
  <head>
    <title>
      Registro
    </title>
  </head>
  <body>
    <?php include '../env.php';
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

  	$servername = "localhost";
  	$dbname = "SASEB";
  	
  	// Create connection
  	$conn = new mysqli($servername, $username, $password, $dbname);
  	
  	// Check connection
    
  	if ($conn->connect_error) {
  	  die("Connection failed: " . $conn->connect_error);
  	}
  
    $nombre = $_POST["nombre"];
    $apellidoPat = $_POST["apellidoPaterno"];
    $apellidoMat = $_POST["apellidoMaterno"];
    $fechaNacimiento = $_POST["fechaNacimiento"];
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];
  
$sql="INSERT INTO `Registro` (`nombre`, `apellidoPaterno`, 
`apellidoMaterno`, `fechaNacimiento`, `correo`, `contrasena`) 
VALUES ('$nombre', '$apellidoPat', '$apellidoMat','$fechaNacimiento', 
'$correo', '$contrasena');";
    
  	if ($conn->query($sql) === TRUE) {
  	  echo "Usuario creado con éxito";
  	} else {
  	  echo "Error: " . $sql . "<br>" . $conn->error;
  	}
  	
  	$conn->close();
    ?> 
  </body>
</html>
