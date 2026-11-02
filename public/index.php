
<?php

require_once __DIR__ . "/../config/parameters.php";

function showError($code, $message)
{
    $view = __DIR__ . "/../views/error.php";
    include __DIR__ . "/../views/main.php";
}

if (!isset($_GET["controller"])) {
    $controller = default_controller;
} else {
    $controller = $_GET["controller"];
}

$controllerName = ucfirst($controller) . "Controller";
$controllerFile = __DIR__ . "/../controllers/" . $controllerName . ".php";

if (file_exists($controllerFile)) {

    require_once $controllerFile;

    if (class_exists($controllerName)) {

        $controllerObject = new $controllerName();

        if (!isset($_GET["action"])) {
            $action = default_action;
        } else {
            $action = $_GET["action"];
        }

        if (is_callable(array($controllerObject, $action))) {
            $controllerObject->$action();
        } else {
            showError(404, "La acción no existe");
        }

    } else {
        showError(404, "El controlador no existe");
    }

} else {
    showError(404, "El archivo del controlador no existe");
}
