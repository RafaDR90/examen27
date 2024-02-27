<div class="registroContainer">
    <h3>Registrate</h3>
    <form action="<?=BASE_URL?>CreateAccount" method="post">
        <p>
            <label for="nombre_usuario">Nombre usuario</label>
            <input id="nombre_usuario" type="text" name="data[nombre_usuario]" required>
        </p>
        <p>
        <label for="nombre">Nombre</label>
        <input id="nombre" type="text" name="data[nombre]" required>
        </p>
        <p>
        <label for="apellidos">Apellidos</label>
        <input id="apellidos" type="text" name="data[apellidos]" required>
        </p>
        <p>
            <label for="dni">DNI</label>
            <input id="dni" type="text" name="data[dni]" required>
        </p>
        <p>
        <label for="email">Email</label>
        <input id="email" type="text" name="data[email]" required>
        </p>
        <p>
        <label for="password">Contraseña</label>
        <input id="password" type="password" name="data[password]" required>
        </p>
        <?php if(isset($_SESSION['identity']) && $_SESSION['identity']['rol']=='admin'): ?>
            <p>
                <label for="rol">Rol</label>
                <select name="data[rol]" id="rol">
                    <option value="admin">Admin</option>
                    <option value="profesor">Profesor</option>
                </select>
            </p>
        <?php endif; ?>
        <p>
        <input type="submit" value="Registrarse">
        </p>
    </form>
</div>