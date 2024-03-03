<?php
namespace routes;
use controllers\usuarioController;
use controllers\CorreoController;
use controllers\ErrorController;
use lib\Router;
class routes{
    const PATH="/examen27";

    public static function getRoutes(){
    $router=new Router();

    // CREO CONTROLADORES
    $usuarioController=new usuarioController();
    $correoController=new CorreoController();

    // PAGINA PRINCIPAL
        $router->get(self::PATH, function () use ($usuarioController){
            $usuarioController->login();
        });
    // CREAR CUENTA
        $router->get(self::PATH.'/CreateAccount', function () use ($usuarioController){
                $usuarioController->registro();
            });
        $router->post(self::PATH.'/CreateAccount', function () use ($usuarioController){
                $usuarioController->registro();
            });
    // LOGIN
        $router->get(self::PATH.'/Login', function () use ($usuarioController){
                $usuarioController->login();
            });
        $router->post(self::PATH.'/Login', function () use ($usuarioController){
                $usuarioController->login();
            });
        $router->get(self::PATH.'/CierraSesion', function () use ($usuarioController){
                $usuarioController->logout();
            });

        $router->get(self::PATH.'/correo', function () use ($correoController){
                $correoController->muestraVistaCorreos();
            });

        $router->post(self::PATH.'/borrarCorreos', function () use ($correoController){
                $correoController->borrarCorreos();
            });
        $router->get(self::PATH.'/nuevoCorreo', function () use ($correoController){
                $correoController->nuevoCorreo();
            });
        $router->post(self::PATH.'/nuevoCorreo', function () use ($correoController){
                $correoController->enviaCorreo();
            });







    // LA PAGINA NO SE ENCUENTRA
        $router->any('/404', function (){
            header('Location: ' . self::PATH . '/error');
            });
        $router->get(self::PATH.'/error', function (){
                ErrorController::showErrorView();
            });

        $router->resolve();
        }
}

?>