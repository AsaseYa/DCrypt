<?php

//problem avec namespace

use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class FrontController
{
    protected \Twig\Environment $twig;

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


/*    public function homeView(): string
    {
        $cssFiles = ["navbar", "home"];
        return $this->twig->render('home.html.twig', ["cssFiles" => $cssFiles]);
    }

    public function cryptView(): string
    {
        $cssFiles = ["navbar", "crypt"];
        return $this->twig->render('crypt.html.twig', ["cssFiles" => $cssFiles]);
    }

    public function aboutView(): string
    {
        $cssFiles = ["navbar", "about"];
        return $this->twig->render( 'about.html.twig', ["cssFiles" => $cssFiles]);
    }*/
}