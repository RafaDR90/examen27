<?php
namespace controllers;
use lib\Pages;
use models\Correo;
use utils\utils;
use utils\ValidationUtils;
use service\CorreosService;

class CorreoController{
    private Pages $pages;
    private CorreosService $correosService;

    public function __construct()
    {
        $this->pages=new Pages();
    }

    public function muestraVistaCorreos()
    {

        $this->pages->render('correo/vista_correo');

    }

    public static function getAllCorreosUsuario(){
        $idUsuario=$_SESSION['identity']['id'];
        $correosService=new CorreosService();
        $correos=$correosService->getAllCorreosUsuario($idUsuario);
        return $correos;
    }

}