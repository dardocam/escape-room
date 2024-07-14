<?php
require_once(dirname(__FILE__, 3) . '/model/usuarioModel.php');
// var_dump($_POST);
// echo "<pre>";
// var_dump($usuarioModel);

// echo json_encode($_POST);


function dataFormating()
{
    foreach ($_POST as $key => $value) {
        foreach ($value as $clave => $final) {
            $data = explode(',', $clave);
        }
    }

    for ($i = 0; $i < count($data); $i++) {
        $resp[$i] = substr($data[$i], 1, strlen($data[$i]) - 2);
    }

    return $resp;
}

$resp = dataFormating();
var_dump(json_encode($resp));
