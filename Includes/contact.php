<!DOCTYPE html>
<html>
<head>
	<title >Tienda Abarrotes</title>
	<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
   <nav class="navbar">
      <div class="name"><a href="/home.html" href="home.html" style="color: red;
         font-family: algerian">Tienda Vegetales</a>
      </div>
      <ul>
         <li>
            <a href="/home.html">Inicio</a>
         </li>
         <li>
            <a href="#">Tienda</a>
               <ul>
			      <li>
                     <a href="/home.html">
                        Vegetales
                     </a>
                  </li>
				  <li>
                     <a href="/pulses.html">
                        Legumbres
                     </a>
                  </li>
			   </ul>
         </li>	 
		 <li>
            <a href="/about.html">Qui&eacute;nes Somos</a>
         </li>
		 <li>
            <a href="/Includes/contact.php">Cont&aacute;ctanos</a>
         </li>
		 <li>
            <a href="/cart.html">Carro</a>
         </li>
	  </ul>
   </nav>

	 <div style="background-image: linear-gradient(rgba(0,0,0,0),rgba(0,0,0,0.5)) ,url(/images/image_6.jpg);width: 100%;height: 90vh; background-size: 100%;background-repeat: no-repeat;">

      <h2 style="position: absolute; top: 50%;left: 50%;transform: translate(-50%,-50%);font-size: 7vw;background-size: 100%;text-align: center;margin: 0;padding: 0; ">
         Cont&aacute;ctanos
      </h2>
   </div>

   <form class="form" action="contact.php" method="POST" style="margin-bottom: 50px;">
      <h1 style="color: black; font-size: 60px; padding-bottom: 20px;">
         Para nosotros ser&aacute; un gusto atenderle
      </h1>
      <div>
	     Nombre <input name="nombre" type="text" placeholder="Nombre">
	  </div>
      
      <div >
	    Correo electr&oacute;nico <input name="email" type="text" placeholder="Correo electrónico">
	  </div>
	  <div >
	    Edad <input name="edad" type="number" placeholder="Años">
	  </div>
	  <div >
	     Celular <input name="numero"  type="number" placeholder="Numero">
	  </div>	
	  <p style="color: black; font-size: 20px; padding-top: 10px;">
         Su mensaje o PQRS "Peticiones, Quejas, Reclamos y Sugerencias"
      </p>
	  <div>	
         <textarea name="mensaje" style="padding: 90px; color: black;" placeholder="Escriba aquí..."></textarea>
	  </div>
		<input class="butt" name="submit" type="submit" >Enviar</input>
   </form>

   <?php    
   if(isset($_POST["submit"]))
		   {
            require_once("Includes/DB.php"); 
   
            // Crear conexion
            $conexion = mysqli_connect($servername, $username, $password,$database);

            // Revisar conexion
            if ($conexion->connect_error) {
                                           die("Conexón fallida: " . $conn->connect_error);
                                          }
            echo "Conexion Exitosa <br>";
   
            // Esta línea le pide a la base que muestre los acentos o tildes
            mysqli_set_charset($conexion,"utf8");
			
			$nombre  = $_POST["nombre"];
            $email  = $_POST["email"];
            $edad  = $_POST["edad"];
            $numero  = $_POST["numero"];
            $mensaje  =$_POST["mensaje"];
   
            $query  = "INSERT INTO FichaContactos (nombre,edad,email,numero,mensaje) VALUES  ('$nombre', '$edad', '$email', '$numero', '$mensaje')";

            // Guarda la consulta
            $resultado = mysqli_query ($conexion,$query);
			
            if($Execute)
			   {
		        echo "<h4>Tus comentarios se agregaron correctamente.</h4>";
	           }
			else
			   {
		        echo "Algo salió mal, intenta nuevamente";
	           }  

            // Cerrar la conexión
            mysqli_close($conexion);
		   }
   ?> 
   <footer>
      <p style="padding-top: 10px;">Dise&ntilde;ado y mantenido por <b style=" color: #000;">
         JAMES LEANDRO LOZADA ROMERO & GERMAN FLECHAS CONTRERAS</b>
      </p>
   </footer>
</body>
</html>