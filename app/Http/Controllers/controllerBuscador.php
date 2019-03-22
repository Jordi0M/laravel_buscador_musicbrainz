<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controllerBuscador extends Controller
{
    public function getResultados(){
        // inicialitzem la crida cURL
        $url = "http://musicbrainz.org/ws/2/artist/5b11f4ce-a62d-471e-81fc-a69a8278c7da?inc=aliases";
        $c = curl_init( $url );
        
        // Ajustem headers perquè ens retorni la info en format JSON
        // tb afegim User-Agent (identificador de client, si no Musicbrainz no funciona)
        curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Accept:application/json','User-Agent:Laravel/5.7'));
        // ajustos perquè ens retorni les dades sobre una variable
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        
        // cridem per obtenir les dades
        $res = curl_exec($c);
        
        // transformem les dades a un array associatiu de PHP
        $dades = json_decode($res,true);
        
        // mostrem nom ($dades ja és un array associatiu PHP)

        return view('prueba', ['res' => $res]);
    }
}
