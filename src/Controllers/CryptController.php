<?php

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

    public function cryptView(string $clearMessage): string
    {
        //import css
        $cssFiles = ["settings", "navbar", "crypt"];

        //code le message
        $cryptMessage = $this->decryptModel->encryptInput($clearMessage);

        //view
        return $this->twig->render('crypt.html.twig', [
            "cssFiles" => $cssFiles,
            "clearMessage" => $clearMessage,
            "cryptMessage" => $cryptMessage
        ]);
    }
}