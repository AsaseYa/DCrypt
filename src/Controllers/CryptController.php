<?php

namespace Src\Controllers;

use Src\Models\Decrypt;
use Src\Models\ShiftEncryption;

class CryptController extends FrontController
{
    protected Decrypt $decryptModel;

    public function __construct()
    {
        //appel de twig
        parent::__construct();
        $this->decryptModel = new ShiftEncryption();
    }

    public function cryptClearView(string $clearMessage, int $gap): string
    {
        //import css et js
        $cssFiles = ["settings", "navbar", "crypt"];
        $jsFiles = ["crypt"];

        //code le message
        $cryptMessage = $this->decryptModel->encryptInput($clearMessage, $gap);

        //view
        return $this->twig->render('crypt.html.twig', [
            "cssFiles" => $cssFiles,
            "jsFiles" => $jsFiles,
            "clearMessage" => $clearMessage,
            "cryptMessage" => $cryptMessage,
        ]);
    }

    public function cryptDecryptView(string $cryptMessage, int $gap): string
    {
        //import css et js
        $cssFiles = ["settings", "navbar", "crypt"];
        $jsFiles = ["crypt"];

        //code le message
        $decryptMessage = $this->decryptModel->decryptInput($cryptMessage, $gap);

        //view
        return $this->twig->render('crypt.html.twig', [
            "cssFiles" => $cssFiles,
            "jsFiles" => $jsFiles,
            "clearMessage" => $decryptMessage,
            "cryptMessage" => $cryptMessage
        ]);
    }
}