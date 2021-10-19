<?php


class FrontController
{
    protected \Twig\Environment $twig;

    public function __construct()
    {
        $loader = new Twig\Loader\FilesystemLoader(__DIR__ . '/../../templates');
        $this->twig = new Twig\Environment($loader, ['debug' => true]);
        $this->twig->addExtension(new Twig\Extension\DebugExtension());
    }

    public function getTwig(): \Twig\Environment
    {
        return $this->twig;
    }

    /**
     * @throws \Twig\Error\SyntaxError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\LoaderError
     */
    public function addView(string $page): string
    {
        $cssFiles = ["navbar", $page];
        return $this->twig->render('/' . $page . '.html.twig', ["cssFiles" => $cssFiles]);
    }

    /**
     * @throws \Twig\Error\SyntaxError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\LoaderError
     */
    public function homeView(): string
    {
        $cssFiles = ["navbar", "home"];
        return $this->twig->render('home.html.twig', ["cssFiles" => $cssFiles]);
    }

    /**
     * @throws \Twig\Error\SyntaxError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\LoaderError
     */
    public function cryptView(): string
    {
        $cssFiles = ["navbar", "crypt"];
        return $this->twig->render('crypt.html.twig', ["cssFiles" => $cssFiles]);
    }

    /**
     * @throws \Twig\Error\SyntaxError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\LoaderError
     */
    public function aboutView(): string
    {
        $cssFiles = ["navbar", "about"];
        return $this->twig->render( 'about.html.twig', ["cssFiles" => $cssFiles]);
    }
}