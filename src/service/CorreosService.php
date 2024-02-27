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




}