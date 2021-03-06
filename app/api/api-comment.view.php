<?php

class APIView
{

    function response($data, $status)
    {
        //convierto a JSON lo que llega
        header("Content-Type: application/json");
        header("HTTP/1.1 " . $status . " " . $this->requestStatus($status));
        echo json_encode($data);
    }

    //funcion para codigo de respuesta
    private function requestStatus($code)
    {
        $status = array(
            200 => "OK",
            404 => "Not found",
            500 => "Internal Server Error"
        );

        return (isset($status[$code])) ? $status[$code] : $status[500];
    }
}
