
<?php
use controllers\CorreoController;
$correosController=new CorreoController();
$correos=$correosController->getAllCorreosUsuario();
?>
<div class="vista_correo">
    <h2>Correos</h2>
    <table>
        <tr>
            <th>De</th>
            <th>Asunto</th>
            <th>Cuerpo</th>
            <th>Fecha</th>
            <th>Seleccionar</th>
        </tr>
        <form action="<?=BASE_URL?>borrarCorreos" method="post">
            <input type="submit" value="Borrar">
        <?php
        foreach ($correos as $correo):?>
            <tr>
                <td><?=$correo['de']?></td>
                <td><?=$correo['asunto']?></td>
                <td><?=$correo['cuerpo']?></td>
                <td><?=$correo['fecha']?></td>
                <td><input type="checkbox" name="seleccionado[]" value="<?=$correo['id']?>"></td>
            </tr>
        <?php endforeach; ?>
        </form>
    </table>
    <a href="<?=BASE_URL?>nuevoCorreo">Nuevo correo</a>
</div>
