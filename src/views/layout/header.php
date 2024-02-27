<?php
use controllers\usuarioController;?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tienda</title>
    <link rel="stylesheet" href="<?=BASE_URL?>public/styles/Header.css">
    <link rel="stylesheet" href="<?=BASE_URL?>public/styles/main.css">
    <link rel="stylesheet" href="<?=BASE_URL?>public/styles/normalize.css">
    <link rel="stylesheet" href="<?=BASE_URL?>public/styles/usuario/registro.css">
    <link rel="stylesheet" href="<?=BASE_URL?>public/styles/usuario/login.css">
    <link rel="stylesheet" href="<?=BASE_URL?>public/styles/categoria/gestionCategoria.css">
</head>
<body>
    <header>
        <h1><a href="<?=BASE_URL?>">examen</a></h1>
        <ul>
        <?php
        if (isset($_SESSION['identity'])): ?>
            <li><a href="<?= BASE_URL ?>CierraSesion">Cerrar sesion</a></li>


        <?php endif; ?>


        <?php if (!isset($_SESSION['identity'])):?>

            <li><a href="<?= BASE_URL ?>CreateAccount">Crear cuenta</a></li>

            <li><a href="<?= BASE_URL ?>Login">Identificate</a></li>
            <?php endif; ?>
        </ul>

        <nav class="navPrincipal">
            <ul style="display: flex; gap: 15px">

            </ul>
        </nav>
        <div class="mensajesError">
        <?php if (isset($exito)): ?>
            <strong class="exito"><?=$exito?></strong>
        <?php elseif (isset($error)): ?>
            <strong class="error"><?=$error?></strong>
        <?php endif; ?>
        </div>
    </header>
<main>
