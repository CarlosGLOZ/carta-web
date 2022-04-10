<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gusteau's</title>

    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- CSS -->
    <link rel="stylesheet" href="./css/styles.css">

    <!-- JavaScript -->
    <script src="./js/mostrarPlatos.js"></script>
</head>
<body>
    <div id="menu">
        <?php
            if (isset($_GET['tipo'])) {
                $rutaXML = "./xml/menu.xml";
                $tipo = $_GET['tipo'];

                if (file_exists($rutaXML)) {
                    $xml = simplexml_load_file($rutaXML);

                    echo "<script>document.getElementById('menu').style.backgroundImage = 'url(./img/dishes-menu-background.png)';</script>";
                    echo "<div class='center' style='margin-top: 3%;'>";
                    echo "<h2><a href='./'>Atrás</a></h2>";
                    echo "<br><br>";
                    foreach ($xml as $plato => $datos) {
                        if ($datos['tipo'] == $tipo) {

                            echo "<h2 class='clickable-dish' onClick='openDish(\"plato-{$datos -> nombre}\");'>{$datos -> nombre}</h2>";

                            echo "<div class='dish-info' id='plato-{$datos -> nombre}'>";
                            echo "    <img class='close-x' id='close-x-plato-{$datos -> nombre}' src='./img/icons/close-x.svg' onClick='hideDishes();' alt='close-x'>";
                            echo "    <h1>{$datos -> nombre}</h2>";
                            echo "    <h3>{$datos -> descripcion}</h3>";
                            echo "    <h3>{$datos -> precio}€</h3>";
                            echo "    <h3>{$datos -> calorias}</h3>";
                            echo "<br><br>";
                            if (isset($datos -> caracteristicas -> caracteristica)) {
                                foreach ($datos -> caracteristicas -> caracteristica as $caracteristica) {
                                    echo "  <img class='caracteristica-icon' id='icon-{$caracteristica}' src=./img/icons/{$caracteristica}.svg alt='{$caracteristica}'>";
                                }
                            }
                            echo "</div>";

                            echo "<div class='dish-img-background' id='img-plato-{$datos -> nombre}'>";
                            echo "    <img class='dish-img' id='img-plato-{$datos -> nombre}-foto' src='./img/platos/{$datos -> nombre}.png' alt='{$datos -> nombre}'>";
                            echo "</div>";

                            echo "<script>console.log('{$datos -> nombre}');</script>";
                            echo "<br>";

                        }
                    }
                    echo "<div id='leyenda'>";
                    echo "  <div class='item-leyenda'>";
                    echo "      <img class='caracteristica-icon' src=./img/icons/carne.svg alt='carne'>";
                    echo "      <p class='caracteristica-desc' id='desc-carne'>Contiene carne</p>";
                    echo "  </div>";
                    echo "  <div class='item-leyenda'>";
                    echo "      <img class='caracteristica-icon' src=./img/icons/pescado.svg alt='pescado'>";
                    echo "      <p class='caracteristica-desc' id='desc-pescado'>Contiene pescado</p>";
                    echo "  </div>";
                    echo "  <div class='item-leyenda'>";
                    echo "      <img class='caracteristica-icon' src=./img/icons/picante.svg alt='picante'>";
                    echo "      <p class='caracteristica-desc' id='desc-picante'>Contiene picante</p>";
                    echo "  </div>";
                    echo "  <div class='item-leyenda'>";
                    echo "      <img class='caracteristica-icon' src=./img/icons/sin-gluten.svg alt='sin-gluten'>";
                    echo "      <p class='caracteristica-desc' id='desc-sin-gluten'>No contiene gluten</p>";
                    echo "  </div>";
                    echo "  <div class='item-leyenda'>";
                    echo "      <img class='caracteristica-icon' src=./img/icons/vegano.svg alt='vegano'>";
                    echo "      <p class='caracteristica-desc' id='desc-vegano'>Apto para veganos</p>";
                    echo "  </div>";
                    echo "</div>";
                    echo "</div>";
                } else {
                    echo "<script>alert('No se ha podido encontrar archivo XML');</script>";
                }
            } else {
                $mostrar=<<<WXT
                    <div class="center">
                        <h2><a href="?tipo=entrante">Entrantes</a></h2>
                        <h2><a href="?tipo=primero">Primeros</a></h2>
                        <h2><a href="?tipo=segundo">Segundos</a></h2>
                        <h2><a href="?tipo=postre">Postres</a></h2>
                        <h2><a href="?tipo=bebida">Bebidas</a></h2>
                    </div>
                WXT;
                echo $mostrar;
            }        
        ?>
    </div>
</body>
</html>