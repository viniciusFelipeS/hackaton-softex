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
     * Tipo do marcador
     *
     * @var int
     */
    public $status;


    /**
     * Método responsável por cadastrar a instância atual no Banco de Dados
     *
     * @return void
     */
    public function insertMarker()
    {

        //INSERE NO BANCO DE DADOS
        $this->id = (new DataBase('markers'))->insert([
            'name'    => $this->name,
            'lat'     => $this->lat,
            'lng'     => $this->lng,
            'type'    => $this->type,
            'status'  => 'off'
        ]);

        return true;
    }

    /**
     * Método responsável por atualizar um marcador
     *
     * @return boolean
     */
    public function updateMarker()
    {
        //INSERE NO BANCO DE DADOS
        (new DataBase('markers'))->update([
            'status' => $this->status
        ], "id = $this->id");
        return true;
    }

    /**
     * Método responsável por atualizar um marcador
     *
     * @return boolean
     */
    public function deleteMarker()
    {
        //INSERE NO BANCO DE DADOS
        (new DataBase('markers'))->delete("id = $this->id");
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
        return (new DataBase('markers'))->select($where, $order, $limit, $field);
    }
}
