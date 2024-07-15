<?php

//incluye el archivo de configuración para acceder a las constantes ej: APP_ROOT
require_once(dirname(__FILE__) . '/private/config/config.php');

//la pagina index.php va a funcionar como un router
//la estructura switch recibe por la url la variable 'view' con la semantica de la vista a rutear.

$request = $_SERVER['REQUEST_METHOD'];
$vista = '';
$actividad = '';
$controlador = '';
$accion = 'index';
//verifica que el metodo de la request sea tipo get
if ($request == 'GET') {
    //verifica que recibe una pagina en la variable 'view' por ej: http://localhost/mvc-template/index.php?view=dashboard&activity=gestion&action=index
    //vistas
    if (isset($_GET['view'])) {
        $vista = trim($_GET['view']);
        if (isset($_GET['activity'])) {
            $actividad = trim($_GET['activity']);
        }
        if (isset($_GET['action'])) {
            $accion = trim($_GET['action']); //si es index se ejecuta por default
        }

        switch ($vista . '-' . $actividad . '-' . $accion) {
            case 'formulario-gestion-index':
                //incluye la vista formulario
                require_once(APP_SRC . '/view/gestion-usuario/formularioView.php');
                break;
            case 'start-mapa-index':
                //incluye la vista formulario
                require_once(APP_SRC . '/view/gestion-mapa/startView.php');
                break;
        }
    }

    //controladores por método get
    if (isset($_GET['controller'])) {
        $controlador = trim($_GET['controller']);
        if (isset($_GET['activity'])) {
            $actividad = trim($_GET['activity']);
        }
        if (isset($_GET['action'])) {
            $accion = trim($_GET['action']); //si es index se ejecuta por default
        }

        switch ($controlador . '-' . $actividad . '-' . $accion) {
            case 'preguntas-game-acertijo':
                require_once(APP_SRC . '/controller/game/preguntasController.php');
                break;
        }
    }

    //ruta a la home
    if (!isset($_GET['view']) && !isset($_GET['controller'])) {
        require_once(APP_SRC . '/view/homeView.php');
    }
}

//verifica que el metodo de la request sea tipo post
if ($request == 'POST') {
    //verifica que recibe un controlador en la variable 'controller' por ej: http://localhost/mvc-template/index.php?controller=formulario&activity=gestion&action=index
    //controladores por metodo post
    if (isset($_GET['controller'])) {
        $controlador = trim($_GET['controller']);
        if (isset($_GET['activity'])) {
            $actividad = trim($_GET['activity']);
        }
        if (isset($_GET['action'])) {
            $accion = trim($_GET['action']); //si es index se ejecuta por default
        }

        switch ($controlador . '-' . $actividad . '-' . $accion) {
            case 'formulario-gestion-index':
                //incluye la vista formulario
                require_once(APP_SRC . '/controller/gestion-usuario/formularioController.php');
                break;
            case 'preguntas-game-index':
                //incluye la vista formulario
                require_once(APP_SRC . '/controller/game/preguntasController.php');
                break;
        }
    }
}
