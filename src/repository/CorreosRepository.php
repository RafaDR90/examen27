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
            $sel=$this->db->prepara("SELECT * FROM correos WHERE id_usuario=:id");
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







}