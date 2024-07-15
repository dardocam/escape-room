<?php
require_once(dirname(__FILE__, 3) . '/model/preguntasModel.php');
// var_dump($_POST);
// echo "<pre>";
// var_dump($usuarioModel);

// echo json_encode($_POST);



switch (verificarAction()) {
    case 'resolver':
        # code...
        break;
    case 'acertijo':
        seleccionarAcertijo($preguntas);
        break;
}


function verificarAction()
{

    $action = 'index';
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    }

    return $action;
}


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



function resolverAcertijo($preguntas)
{
    $resp = dataFormating();

    // for ($i = 0; $i < count($preguntas); $i++) {
    //     $preguntas[$i]['Respuesta']
    // }
}


function seleccionarAcertijo(array $preguntas)
{
    $key = rand(0, count($preguntas) - 1);
    echo json_encode($preguntas[$key]);
}
