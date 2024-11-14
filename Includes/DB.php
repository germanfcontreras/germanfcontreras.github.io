<?php
   $servername = "localhost";
   $database = "TiendaAbarrotes";
   $username = "root";
   $password = "";
   
   /*
   // Crear conexion
   $conexion = mysqli_connect($servername, $username, $password,$database);

   // Revisar conexion
   if ($conexion->connect_error) {
                                  die("Conexón fallida: " . $conn->connect_error);
                                 }
   echo "Conexion Exitosa <br>";
   
   // Esta línea le pide a la base que muestre los acentos o tildes
   mysqli_set_charset($conexion,"utf8");
   
   
   $query  = "INSERT INTO FichaContactos (nombre,edad,email,numero,mensaje) VALUES  ('german30', '30', 'german30@gmail.com', '85488230', 'Prueba 30')";

    // Guarda la consulta
   $resultado = mysqli_query ($conexion,$query);  
	  
  // Consulta  
   $query = "SELECT * FROM `FichaContactos` WHERE 1";
   
   // Guarda la consulta
   $resultado = mysqli_query ($conexion,$query);
   
   // Muestra toda la tabla que se consulta
   while(($fila=mysqli_fetch_row($resultado))==true)
      {  
   	   echo $fila[0]." ";
	   echo $fila[1]." ";
	   echo $fila[2]." ";
	   echo $fila[3]." ";
       echo $fila[4]." ";
	   echo $fila[5]." ";
	   echo $fila[6]." ";
	   echo "<br>";
	  }

   // Cerrar la conexión
   mysqli_close($conexion);
   */
?>