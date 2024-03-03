<?php
namespace repository;
use lib\BaseDeDatos,
    PDO,
    PDOException,
    models\usuario;
class usuarioRepository{
    public function __construct()
    {
        $this->db=new BaseDeDatos();
    }

    public function compruebaDni($dni){
        try{

            $sel=$this->db->prepara("SELECT dni FROM usuarios WHERE dni=:dni");
            $sel->bindValue(':dni',$dni);
            $sel->execute();

            if ($sel->rowCount()>0) {
                return true;
            }else{
                return false;
            }
        }catch (PDOException $err){
            return $err->getMessage();
        } finally {
            $sel->closeCursor();
            $this->db->cierraConexion();
        }
    }

    public function createUser($datos)
    {
        $id=null;
        $nombreUsuario=$datos->getNombreUsuario();
        $nombre=$datos->getNombre();
        $apellidos=$datos->getApellidos();
        $dni=$datos->getDni();
        $email=$datos->getEmail();
        $password=$datos->getPassword();
        $rol=$datos->getRol();
        $this->db=new BaseDeDatos();
        try{
            $ins=$this->db->prepara("INSERT INTO usuarios (id,nombre,apellidos,dni,email,password,rol) values (:id,:nombre,:apellidos,:dni,:email,:password,:rol)");
            $ins->bindValue(':id',$id);
            $ins->bindValue(':nombre',$nombre);
            $ins->bindValue(':apellidos',$apellidos);
            $ins->bindValue(':dni',$dni);
            $ins->bindValue(':email',$email);
            $ins->bindValue(':password',$password);
            $ins->bindValue(':rol',$rol);
            $ins->execute();
            $result=true;
        }catch (PDOException $err){
            $result=false;
        } finally {
            $ins->closeCursor();
            $this->db->cierraConexion();
        }
        return $result;
    }

    public function getUsuarios()
    {
        try{
            $sel=$this->db->prepara("SELECT * FROM usuarios order by nombre asc");
            $sel->execute();
            if ($sel->rowCount()>0) {
                $usuarios=$sel->fetchAll(PDO::FETCH_ASSOC);
                return $usuarios;
            }else{
                return null;
            }
        }catch (PDOException $err){
            return $err->getMessage();
        } finally {
            $sel->closeCursor();
            $this->db->cierraConexion();
        }
    }

    public function compruebaNombreUsuario($nombreUsuario)
    {

        try{
            $sel=$this->db->prepara("SELECT email FROM usuarios WHERE email=:email");
            $sel->bindValue(':email',$nombreUsuario);
            $sel->execute();
            if ($sel->rowCount()>0) {
                return true;
            }else{
                return false;
            }
        }catch (PDOException $err){
            return $err->getMessage();
        } finally {
            $sel->closeCursor();
            $this->db->cierraConexion();
        }
    }


    public function getUsuarioFromUserName($nombreUsuario)
    {
        try{
            $this->db=new BaseDeDatos();
            $sel=$this->db->prepara("SELECT * FROM usuarios WHERE email=:email");
            $sel->bindValue(':email',$nombreUsuario);
            $sel->execute();
            if ($sel->rowCount()>0) {
                $usuario=$sel->fetch(PDO::FETCH_ASSOC);
                return $usuario;
            }else{
                return false;
            }
        }catch (PDOException $err){
            return $err->getMessage();
        } finally {
            $sel->closeCursor();
            $this->db->cierraConexion();
        }
    }

    public function getAllUsuarios()
    {
        try{
            $sel=$this->db->prepara("SELECT * FROM usuarios order by nombre asc");
            $sel->execute();
            if ($sel->rowCount()>0) {
                $usuarios=$sel->fetchAll(PDO::FETCH_ASSOC);
            }else{
                $usuarios= null;
            }
        }catch (PDOException $err){
            $usuarios= null;
        } finally {
            $sel->closeCursor();
            $this->db->cierraConexion();
            return $usuarios;
        }
    }














    public function cierraConexion(){
        $this->db->cierraConexion();
    }

}
