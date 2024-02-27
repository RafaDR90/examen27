<?php
namespace models;

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
                $dato['de']??"",
                $dato['asunto']??"",
                $dato['cuerpo']??"",
                $dato['fecha']??"",
                $dato['para'])??"";
        }
        return $correos;
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