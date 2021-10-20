<?php

use Src\Models\ShiftEncryption;

require_once __DIR__ . "/Controllers/FrontController.php";
require_once __DIR__ . "/Controllers/CryptController.php";

$urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$twigPages = new FrontController();


if ('/' === $urlPath) {
    echo $twigPages->addView('home');
} elseif ('/crypt' === $urlPath && isset($_POST['clearMessage'])) {

    $cryptPage = new CryptController();
    echo $cryptPage->cryptView($_POST['clearMessage']);

} elseif ('/crypt' === $urlPath) {
    echo $twigPages->addView('crypt');
} elseif ('/about' === $urlPath) {
    echo $twigPages->addView('about');
} elseif ('/test' === $urlPath) {
    require_once __DIR__ . '/../public/test.php';
} else {
    header('HTTP/1.1 404 Not Found');
}
