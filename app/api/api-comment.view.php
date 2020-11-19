<?php

class APIView
{

    function response($data)
    {
        //convierto a JSON lo que llega
        echo json_encode($data);
    }
}
