<?php
namespace service;
use repository\usuarioRepository;
class usuarioService{
    private usuarioRepository $usuarioRepository;
    public function __construct()
    {
        $this->usuarioRepository=new usuarioRepository();
    }

    public function compruebaDni($dni)
    {
        return $this->usuarioRepository->compruebaDni($dni);
    }

    public function createUser($datos)
    {

        return $this->usuarioRepository->createUser($datos);
    }

    public function getUsuarios()
    {
        return $this->usuarioRepository->getUsuarios();
    }

    public function compruebaNombreUsuario($nombreUsuario){
        return $this->usuarioRepository->compruebaNombreUsuario($nombreUsuario);
    }

    public function getUsuarioFromUserName($username)
    {
        return $this->usuarioRepository->getUsuarioFromUserName($username);
    }

}