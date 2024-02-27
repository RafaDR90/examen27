
<?php
use controllers\CorreoController;
$correosController=new CorreoController();
$correos=$correosController->getAllCorreosUsuario();
?>
<h2>Correos</h2>
<?php var_dump($correos); die();?>
