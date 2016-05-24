<?php
include("../librerias.php");
$oPro=new Producto();
$oPro->nombre=$_POST["nombre"];
$oPro->TotalUSD()=$_POST["total"];
$oPro->ano=$_POST["ano"];

if ($oUsr->ingresoProducto($_POST["Ingresar"])){
    echo json_encode(true);
    return;
 }
echo json_encode(false);
?>



<script>
	document.location.href="<?=PATHURL?>exportaciones_add.php";
</script>
