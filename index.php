<?php

//incluye el archivo de configuración para acceder a las constantes ej: APP_ROOT
require_once(dirname(__FILE__) . '/private/config/config.php');

//la pagina index.php va a funcionar como un router
//la estructura switch recibe por la url la variable 'view' con la semantica de la vista a rutear.

$request = $_SERVER['REQUEST_METHOD'];
$vista = '';
$actividad = '';
$controlador = '';
//verifica que el metodo de la request sea tipo get
if ($request == 'GET') {
    //verifica que recibe una pagina en la variable 'view' por ej: http://localhost/mvc-template/index.php?view=dashboard&activity=gestion
    if (isset($_GET['view'])) {
        $vista = trim($_GET['view']);
        if (isset($_GET['activity'])) {
            $actividad = trim($_GET['activity']);
        }
    }

    switch ($vista . '-' . $actividad) {
        case 'formulario-gestion':
            //incluye la vista formulario
            require_once(APP_SRC . '/view/gestion-usuario/formularioView.php');
            break;
        case 'start-mapa':
            //incluye la vista formulario
            require_once(APP_SRC . '/view/gestion-mapa/startView.php');
            break;

        default:
            //incluye la vista welcome
            require_once(APP_SRC . '/view/homeView.php');
            break;
    }
}

//verifica que el metodo de la request sea tipo post
if ($request == 'POST') {
    //verifica que recibe un controlador en la variable 'controller' por ej: http://localhost/mvc-template/index.php?controller=formulario&activity=gestion
    if (isset($_GET['controller'])) {
        $controlador = trim($_GET['controller']);
        if (isset($_GET['activity'])) {
            $actividad = trim($_GET['activity']);
        }
    }

    switch ($controlador . '-' . $actividad) {
        case 'formulario-gestion':
            //incluye la vista formulario
            require_once(APP_SRC . '/controller/gestion-usuario/formularioController.php');
            break;
        case 'respuestas-game':
            //incluye la vista formulario
            require_once(APP_SRC . '/controller/game/respuestasController.php');
            break;
        default:
            //incluye la vista welcome
            require_once(APP_SRC . '/view/welcomeView.php');
            break;
    }
}
