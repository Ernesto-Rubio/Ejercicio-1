<?php

    function obtenerDatosWebService() {
        try {

            //Se consume el web service tipo rest y se convierte a json
             $data = json_decode(
                 file_get_contents("https://my-json-server.typicode.com/dp-danielortiz/dptest_jsonplaceholder/items"),
                 true
             );
     
             if(count($data) > 0) {
                 foreach ($data as $item) {
                     //validamos si el color es green
                     if($item['color'] === 'green') {
                         //se obtienen los datos y se colocan en un array
                         $data = [
                             "id" => $item['id'],
                             "type" => $item['type'],
                             "color" => $item['color'],
                         ];

                         $arrayRespuesta = [
                            "data" => $data,
                            "success" => true,
                            "error" => false,
                            "registros" => true,
                            "mensaje" => 'Información obtenida correctamente'
                        ];
                     }
                 }
             }else{
     
                 $arrayRespuesta = [
                     "success"=> true,
                     "error" => false,
                     "registros" => false,
                     "mensaje"=> 'No se encontraron registros',
                 ];
             }
     
         } catch (Exception $e) {
             $arrayRespuesta = [
                     "success" => false,
                     "error" => true,
                     "mensaje" => $e->getMessage(),
                 ];
         }
         
         return $arrayRespuesta;
    }
    
?>