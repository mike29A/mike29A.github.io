<?php

require 'config1/database.php';
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT id, nombre, precio FROM productos WHERE activo=1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
?>




<!DOCTYPE html>
<html lang="en">
    
<head>
    <link rel="shortcut icon" href="img1/donas1.png">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="catalogo.css">
    <script defer src="main1.js" ></script>
    <title>DONUTS STATION</title>
</head>
<body>
    <header>
		<nav>
			<div id="nav">
				<ul>
					<img src="img1/logo_003.png"  id="img-logo">
                    <li><a href="../pagina/CONTACTANOS.html">CONTACTANOS</a></li>
                    <li><a href="../productos/CATALOGO.php">CATALOGO</a></li>
					<li><a href="../pagina/NOSOTROS.html">NOSOTROS</a></li>
                    <li><a href="../pagina/index.html">INICIO </a></li>
                    <li><a href="../Login/CerrarSesion.php">CERRRA SESION</a></li>
				</ul>
			</div>
		</nav>
	</header>
 

    <br> <br> <br>
    <section class="contenedor">
        <!-- Contenedor de elementos -->
        <div class="contenedor-items">
            <?php  foreach($resultado as $row) { ?>
            <div class="item">
                <span class="titulo-item"> <?php echo $row['nombre']; ?></span>
                <?php 
                
                $id = $row['id'];
                $imagen = "img1/productos/" . $id . "/Dona1.png";

                if(!file_exists($imagen)){
                    $imagen = "img1/no-photo.png";
                }
                
                ?>
                <img src="<?php echo $imagen; ?>" alt="" class="img-item">
                <span class="precio-item"><?php echo $row['precio']; ?></span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <?php }?>
            
        </div>
        <!-- Carrito de Compras -->
        <div class="carrito" id="carrito">
            <div class="header-carrito">
                <h2>Tu Carrito</h2>
            </div>

            <div class="carrito-items">
                <!-- 
                <div class="carrito-item">
                    <img src="img/boxengasse.png" width="80px" alt="">
                    <div class="carrito-item-detalles">
                        <span class="carrito-item-titulo">Box Engasse</span>
                        <div class="selector-cantidad">
                            <i class="fa-solid fa-minus restar-cantidad"></i>
                            <input type="text" value="1" class="carrito-item-cantidad" disabled>
                            <i class="fa-solid fa-plus sumar-cantidad"></i>
                        </div>
                        <span class="carrito-item-precio">$15.00</span>
                    </div>
                   <span class="btn-eliminar">
                        <i class="fa-solid fa-trash"></i>
                   </span>
                </div>
                <div class="carrito-item">
                    <img src="img/skinglam.png" width="80px" alt="">
                    <div class="carrito-item-detalles">
                        <span class="carrito-item-titulo">Skin Glam</span>
                        <div class="selector-cantidad">
                            <i class="fa-solid fa-minus restar-cantidad"></i>
                            <input type="text" value="3" class="carrito-item-cantidad" disabled>
                            <i class="fa-solid fa-plus sumar-cantidad"></i>
                        </div>
                        <span class="carrito-item-precio">$18.00</span>
                    </div>
                   <button class="btn-eliminar">
                        <i class="fa-solid fa-trash"></i>
                   </button>
                </div>
                 -->
            </div>
            <div class="carrito-total">
                <div class="fila">
                    <strong>Tu Total</strong>
                    <span class="carrito-precio-total">
                        $12.00
                    </span>
                </div>
                <button class="btn-pagar">Pagar <i class="fa-solid fa-bag-shopping"></i> </button>
            </div>
        </div>
    </section>
    <script src="app.js"></script>

    <br><br><br><br><br>
  
    <footer>
      <center>@donust station</center>
      <center>Derecho reservado Copyright All Rights Reserved ©2023 | Aviso de privacidad | Términos y condiciones</center>
  </footer>
</body>
</html>