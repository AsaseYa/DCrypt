<?php

//TODO problem avec namespace

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class FrontController
{
    protected Environment $twig;

    public function __construct()
    {
        $loader = new Twig\Loader\FilesystemLoader(__DIR__ . '/../../templates');
        $this->twig = new Twig\Environment($loader, ['debug' => true]);
        $this->twig->addExtension(new Twig\Extension\DebugExtension());
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function addView(string $page): string
    {
        $cssFiles = ["settings", "navbar", $page];
        return $this->twig->render('/' . $page . '.html.twig', ["cssFiles" => $cssFiles]);
    }



    

    /*    public function cryptView(string $encodedMessage = null, string $decodedMessage = null): string
    {
        $cssFiles = ["settings", "navbar", "crypt"];
        return $this->twig->render('crypt.html.twig', ["cssFiles" => $cssFiles,
            "encodedMessage" => $encodedMessage,
            "decodedMessage" => $decodedMessage
        ]);
    }*/



}