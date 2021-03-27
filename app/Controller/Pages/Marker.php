<?php

namespace App\Controller\Pages;

use App\Utils\View;
use App\Http\Response;
use App\Model\Entity\Marker as EntityMarker;

class Marker extends Page{
    
    /**
     * Método responsável por retornar o conteudo da /inserir
     *  
     * @return string
     */
    public static function getMarker(){
      //VIEW DA MARKER
      
      $content = View::render('pages/insert',[
        "name"        => 'HOME',
        "description" => ''
      ]);

      //RETORNA A VIEW DA PAGINA
      return new Response(200, parent::getPage('TITULO', $content));
    } 
    
    /**
     * Método responsável por inserir um marcador no bando de dados
     *
     * @param  Request $request
     * @return string
     */
    public static function insertMarker($request)
    {
        //DADOS POST
        $postVars = $request->getPostVars();

        //NOVA INSTANCIA DE MARKER
        $obMarker = new EntityMarker;
        $obMarker->address = $postVars['address'];
        $obMarker->name = $postVars['name'];
        $obMarker->lat = $postVars['lat'];
        $obMarker->lng = $postVars['lng'];
        $obMarker->type = $postVars['type'];

        //CADASTRAR
        $obMarker->insertMarker();
        
        return self::getMarker();
    }
}