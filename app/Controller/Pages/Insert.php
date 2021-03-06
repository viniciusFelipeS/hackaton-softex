<?php

namespace App\Controller\Pages;

use App\Utils\View;
use App\Http\Response;
use App\Model\Entity\Marker;

class Insert extends Page
{

  /**
   * Método responsável por retornar o conteudo da /inserir
   *  
   * @return string
   */
  public static function getMarker()
  {
    //VIEW DA MARKER

    $content = View::render('pages/insert', [
      "name"        => 'HOME',
      "description" => ''
    ]);

    //RETORNA A VIEW DA PAGINA
    return new Response(200, parent::getPage('Recicle Já', $content));
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
    $obMarker = new Marker;
    $obMarker->name = $postVars['name'];
    $obMarker->lng = $postVars['lng'];
    $obMarker->lat = $postVars['lat'];
    $obMarker->type = $postVars['type'];

    //CADASTRAR
    $obMarker->insertMarker();

    return new Response(200, 'Admistrador irá avaliar o ponto');
  }
}
