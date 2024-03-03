<?php
namespace repository;
use lib\BaseDeDatos,
    PDO,
    PDOException;
class CorreosRepository{
    public function __construct()
    {
        $this->db=new BaseDeDatos();
    }

    public function getAllCorreosUsuario($id)
    {
        try{
            $sel=$this->db->prepara("SELECT * FROM mensajes WHERE para=:id");
            $sel->bindValue(':id',$id);
            $sel->execute();
            $correos=$sel->fetchAll(PDO::FETCH_ASSOC);
            return $correos;
        }catch (PDOException $err){
            return $err->getMessage();
        } finally {
            $sel->closeCursor();
            $this->db->cierraConexion();
        }

    }

    public function borrarCorreos($correos)
    {
        $error=null;
        try{
            //borra los correos con los id del array $correos
            $borrar=$this->db->prepara("DELETE FROM mensajes WHERE id=:id");
            foreach ($correos as $correo){
                $borrar->bindValue(':id',$correo);
                $borrar->execute();
            }
        }catch (PDOException $err){
            $error=$err->getMessage();
        } finally {
            $borrar->closeCursor();
            $this->db->cierraConexion();
            return $error;
        }
    }

    public function enviaCorreo($correo)
    {
        $error=null;
        try{

            $envia=$this->db->prepara("INSERT INTO mensajes (de,asunto,cuerpo,fecha,para) VALUES (:de,:asunto,:cuerpo,:fecha,:para)");

            $envia->bindValue(':de',$_SESSION['identity']['nombre']);
            $envia->bindValue(':asunto',$correo->getAsunto());
            $envia->bindValue(':cuerpo',$correo->getCuerpo());

            $envia->bindValue(':fecha',$correo->getFecha());
            $envia->bindValue(':para',$correo->getPara());
            $envia->execute();
            return null;
        }catch (PDOException $err){
            return $err->getMessage();
        } finally {
            $envia->closeCursor();
            $this->db->cierraConexion();
        }
    }

}