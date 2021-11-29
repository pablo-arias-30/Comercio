<!DOCTYPE html>
<html>

<head>
    <meta charset=utf-8 />
    <link rel="stylesheet" href="../Interfaz/stile.css" type="text/css">
    <title>Procesar</title>
    <script src="../Interfaz/model.js"></script>
    <script src="../Interfaz/carrito-presenter.js"></script>


    <script>
    function inicio() {

        modelo = new ComprasApp();
        for (let i = 0; i < modelo.compras.length; i++) {
            document.cookie = "compras" + i + ""+ '=' + modelo._compras[i]._id;
        }

    }
    </script>
</head>

<body>
    <?php 
    $ids = array();
    $i=0;
    while(isset($_COOKIE["compras".$i.""])){
    $ids[$i]= $_COOKIE["compras".$i.""];
    $i++;
    }
    $_SESSION=$ids;
    echo'<script>
    setTimeout(function(){ window.location.href="../Interfaz/pago.php"; }, 1500);
    </script>';
    
     ?>
</body>

</html>