<?php
namespace service;

use repository\CorreosRepository;

class CorreosService
{
    private CorreosRepository $correosRepository;

    public function __construct()
    {
        $this->correosRepository = new CorreosRepository();
    }

    public function getAllCorreosUsuario($idUsuario)
    {
        return $this->correosRepository->getAllCorreosUsuario($idUsuario);
    }

    public function borrarCorreos($correos)
    {
        return $this->correosRepository->borrarCorreos($correos);
    }

    public function enviaCorreo($correo)
    {
        return $this->correosRepository->enviaCorreo($correo);
    }



}