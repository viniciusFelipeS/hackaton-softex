<?php

namespace App\Model\Entity;

use App\Model\Db\DataBase;

class Marker
{

    /**
     * ID do marcador
     *
     * @var int
     */
    public $id;

    /**
     * Endreço do marcador
     *
     * @var string
     */
    public $address;


    /**
     * Nomem do marcador
     *
     * @var string
     */
    public $name;

    /**
     * Latitude do marcador
     *
     * @var string
     */
    public $lat;

    /**
     * Longitude do marcador
     *
     * @var string
     */
    public $lng;

    /**
     * Tipo do marcador
     *
     * @var int
     */
    public $type;


    /**
     * Método responsável por cadastrar a instância atual no Banco de Dados
     *
     * @return void
     */
    public function insertMarker()
    {
        //INSERE NO BANCO DE DADOS
        $this->id = (new DataBase('markers'))->insert([
            'address' => $this->address,
            'name'    => $this->name,
            'lat'     => $this->lat,
            'lng'     => $this->lng,
            'type'    => $this->type,
        ]);

        return true;
    }
    
    /**
     * Método que retorna os dados dos marcadores do banco de dados
     *
     * @param  string $where
     * @param  string $order
     * @param  string $limit
     * @param  string $field
     * @return PDOStatement
     */
    public static function getMarkers($where =  null, $order = null, $limit = null,  $field = '*')
    {
        return (new DataBase('markers'))->select($where,$order,$limit,$field);
    }
}