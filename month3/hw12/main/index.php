<?php

declare(strict_types=1);

use month3\hw12\controller\AppController;

require __DIR__ . '/vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new AppController();
    $action = filter_input(INPUT_POST, 'action');
    switch ($action) {
        case 'store':
            $controller->store();
            break;
        case 'index':
            $controller->index();
            break;
        case 'show':
            $controller->show();
        break;
        case 'delete':
            $controller->delete();
            break;
    }
} else {
    include __DIR__ . '/src/view/AdminPanelForm.php';
    include __DIR__ . '/src/view/UserPanel.php';
}
