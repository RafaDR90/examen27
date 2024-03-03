<?php
namespace models;

use utils\ValidationUtils;

class Correo
{
    private int|null $id;
    private string $de;
    private string $asunto;
    private string $cuerpo;
    private string $fecha;
    private int $para;

    public function __construct(int|null $id=null, string $de,string $asunto,string $cuerpo,string $fecha,int $para)
    {
        $this->id=$id;
        $this->de=$de;
        $this->asunto=$asunto;
        $this->cuerpo=$cuerpo;
        $this->fecha=$fecha;
        $this->para=$para;
    }


    public static function fromArray($datos){
        $correos=[];
        foreach ($datos as $dato){
            $correos[]=new Correo(
                $dato['id']??null,
                $dato['de']??$_SESSION['identity']['id'],
                $dato['asunto']??"",
                $dato['cuerpo']??"",
                $dato['fecha']??date('Y-m-d'),
                $dato['destinatario']);
        }
        return $correos;
    }

    public function validaCorreo()
    {
        $this->setAsunto(ValidationUtils::sanidarStringFiltro($this->getAsunto()));
        $this->setCuerpo(ValidationUtils::sanidarStringFiltro($this->getCuerpo()));
        if (!ValidationUtils::SVNumero($this->getPara())){
            return "El destinatario no es válido";
        }
        if (!ValidationUtils::noEstaVacio($this->getAsunto())){
            return "El asunto no es válido";
        }
        if (!ValidationUtils::noEstaVacio($this->getCuerpo())){
            return "El cuerpo no es válido";
        }
        if (!ValidationUtils::TextoNoEsMayorQue($this->getAsunto(),50)){
            return "El asunto no puede tener mas de 50 caracteres";
        }
        if (!ValidationUtils::TextoNoEsMayorQue($this->getCuerpo(),500)){
            return "El cuerpo no puede tener mas de 500 caracteres";
        }
    return null;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getDe(): string
    {
        return $this->de;
    }

    public function setDe(string $de): void
    {
        $this->de = $de;
    }

    public function getAsunto(): string
    {
        return $this->asunto;
    }

    public function setAsunto(string $asunto): void
    {
        $this->asunto = $asunto;
    }

    public function getCuerpo(): string
    {
        return $this->cuerpo;
    }

    public function setCuerpo(string $cuerpo): void
    {
        $this->cuerpo = $cuerpo;
    }

    public function getFecha(): string
    {
        return $this->fecha;
    }

    public function setFecha(string $fecha): void
    {
        $this->fecha = $fecha;
    }

    public function getPara(): int
    {
        return $this->para;
    }

    public function setPara(int $para): void
    {
        $this->para = $para;
    }


}