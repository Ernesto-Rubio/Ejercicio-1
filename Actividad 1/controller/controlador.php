<?php
    include('../model/data.php');
    $opcion = $_POST['valor'];

    switch ($opcion) {
        case '1':
            consumirWs();
            break;
        default:
            # code...
            break;
    }

    function consumirWs() {
        
        $respuesta = obtenerDatosWebService();
         
        if($respuesta['success']) {
             
            if($respuesta['registros']) {
                exportarArchivoJson($respuesta['data']);
            }      

        } 
 
        echo json_encode($respuesta);
        
    }
    
    function exportarArchivoJson(array $data) {

        try {

            $json_string = json_encode($data);
            $file = '../archivo json/Respuesta1.json';
            file_put_contents($file, $json_string);
     
         } catch (Exception $e) {
             echo 'Excepción capturada: ', $e->getMessage(), "\n";
                 
         }

    }
?>