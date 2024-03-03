<?php
use controllers\correoController;
$correoController=new CorreoController();
$usuarios=$correoController->getAllUsuarios();

?>
<div class="nuevoCorreo">
    <form action="<?=BASE_URL?>nuevoCorreo" method="post">
        <label for="destinatario">Destinatario</label>
        <select name="datos[destinatario]" id="destinatario">
            <?php foreach ($usuarios as $usuario):
                if ($usuario['id']!=$_SESSION['identity']['id']):
                ?>
                <option value="<?=$usuario['id']?>"><?=$usuario['nombre']?></option>
            <?php
            endif;
            endforeach; ?>
        </select>
        <label for="asunto">Asunto</label>
        <input type="text" name="datos[asunto]" id="asunto">
        <label for="cuerpo">Cuerpo</label>
        <textarea name="datos[cuerpo]" id="cuerpo" cols="30" rows="10"></textarea>
        <input type="submit" value="enviar">
    </form>
</div>