<?php

require_once "controller/ContactController.php";

$controller = new ContactController();

$action = $_GET['action'] ?? 'index';

switch($action){
    case 'create':
        $controller->create();
        break;

    case 'store':
        $controller->store();
        break;

    case 'edit':
        $controller->edit($_GET['id'] ?? null);
        break;

    case 'update':
        $controller->update();
        break;

    case 'destroy':
        $controller->destroy($_GET['id'] ?? null);
        break;

    default:
        $controller->index();
        break;
}