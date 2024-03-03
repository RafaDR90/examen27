<?php
namespace controllers;
use lib\Pages;
use models\Correo;
use phpDocumentor\Reflection\Types\This;
use utils\utils;
use utils\ValidationUtils;
use service\CorreosService;
use service\UsuarioService;

class CorreoController{
    private Pages $pages;
    private CorreosService $correosService;

    public function __construct()
    {
        $this->pages=new Pages();
        $this->correosService=new CorreosService();
    }

    public function muestraVistaCorreos()
    {

        $this->pages->render('correo/vista_correo');

    }

    public static function getAllCorreosUsuario(){
        if (!isset($_SESSION['identity'])){
            $pages=new Pages();
            $pages->render('usuario/login');
            exit();
        }
        $idUsuario=$_SESSION['identity']['id'];
        $correosService=new CorreosService();
        $correos=$correosService->getAllCorreosUsuario($idUsuario);
        return $correos;
    }

    public function borrarCorreos()
    {
        if (!isset($_SESSION['identity'])){
            $this->pages->render('usuario/login');
            exit();
        }
        if ($_SERVER['REQUEST_METHOD']=='POST'){
            if ($_POST['seleccionado']){
                $correos=[];
                foreach ($_POST['seleccionado'] as $correo){
                    $correo=ValidationUtils::SVNumero($correo);
                    if (!isset($correo)){
                        $this->pages->render('correo/vista_correo', ['error' => 'Ha habido un problema con los correos']);
                        exit();
                    }
                    $correos[]=$correo;
                }
                $this->correosService->borrarCorreos($correos);
                $this->pages->render('correo/vista_correo', ['exito' => 'Correos borrados']);
            }
        }
    }

    public function nuevoCorreo()
    {
        $this->pages->render('correo/nuevo_correo');
    }

    public static function getAllUsuarios()
    {
        $pages=new Pages();
        if (!isset($_SESSION['identity'])){
            $pages->render('usuario/login', ['error' => 'No has iniciado sesion']);
            exit();
        }
        $usuarioService=new UsuarioService();
        $usuarios=$usuarioService->getAllUsuarios();
        if (!isset($usuarios)){
            $pages->render('correo/nuevo_correo', ['error' => 'Ha habido un problema con los usuarios']);
            exit();
        }
        return $usuarios;
    }

    public function enviaCorreo()
    {
        if (!isset($_POST['datos'])){
            $this->pages->render('correo/nuevo_correo', ['error' => 'Ha habido un problema con el envio del correo']);
            exit();
        }
        $correo=Correo::fromArray([$_POST['datos']]);
        $error=$correo[0]->ValidaCorreo();
        if(isset($error)){
            $this->pages->render('correo/nuevo_correo', ['error' => $error]);
            exit();
        }
        $error=$this->correosService->enviaCorreo($correo[0]);
        if (isset($error)){
            $this->pages->render('correo/nuevo_correo', ['error' => $error]);
            exit();
        }
        $this->pages->render('correo/vista_correo', ['exito' => 'Correo enviado']);

    }
}