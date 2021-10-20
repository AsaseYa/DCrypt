<?php

namespace Src\Models;


abstract class Decrypt
{
    protected string $input;

    public function __construct(string $input)
    {
        $this->input = $input;
    }

    public function getInput(): string
    {
        return $this->input;
    }

    public function setInput(string $input)
    {
        $this->input = $input;
    }

    protected function stripAccents(string $stripAccents): string
    {
        return strtr(utf8_decode($stripAccents), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
    }

    protected function isPositive(int $number): bool
    {
        return !($number < 0);
    }
}