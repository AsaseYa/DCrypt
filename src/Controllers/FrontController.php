<?php

namespace Src\Controllers;
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
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../../templates');
        $this->twig = new \Twig\Environment($loader, ['debug' => true]);
        $this->twig->addExtension(new \Twig\Extension\DebugExtension());
    }

    public function addView(string $page): string
    {
        $cssFiles = ["settings", "navbar", $page];
        $jsFiles = ["crypt"];

        try {
            return $this->twig->render('/' . $page . '.html.twig', [
                "cssFiles" => $cssFiles,
                "jsFiles" => $jsFiles,
            ]);
        } catch (LoaderError | RuntimeError | SyntaxError $e) {
            return $e->getMessage();
        }
    }
}