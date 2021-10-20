<?php

namespace Src\Models;

class ShiftEncryption extends Decrypt
{

    public function decryptInput(string $input): string
    {
        //TODO

        return "A";
    }

    public function encryptInput($clearMessage): string
    {
        $gap = 1; //à rendre modulable
        if (!($gap >= -26 && $gap <= 26)) {
            return "Gap must be between < 25 and > -25 ";
        }
        $checkKeys = range("a", "z");
        $messageEncoded = "";
        $toEncodeChars = str_split($this->stripAccents($clearMessage));
        foreach ($toEncodeChars as $toEncodeChar) {
            for ($i = 0; $i < count($checkKeys); $i++) {
                if (is_numeric($toEncodeChar)) {
                    $messageEncoded .= intval($toEncodeChar) + $gap;
                    break;
                } elseif ($toEncodeChar === ' ') {
                    $messageEncoded .= ' ';
                    break;
                }
                if (ctype_alpha($toEncodeChar)) {
                    if (strtolower($toEncodeChar) === $checkKeys[$i]) {
                        $index = $this->pickGoodChar($i, $gap); //create index
                        if (ctype_lower($toEncodeChar)) {
                            $messageEncoded .= $checkKeys[$index];
                            break;
                        } else {
                            $messageEncoded .= strtoupper($checkKeys[$index]);
                            break;
                        }
                    }
                } else {
                    $messageEncoded .= $toEncodeChar;
                    break;
                }
            }
        }
        return $messageEncoded;
    }

    private function pickGoodChar(int $iterate, int $gap): int
    {
        if ($this->isPositive($gap)) {
            if ($iterate + $gap > 26 - 1) { //26=count($checkKeys)
                $index = ($iterate + $gap) - 26;
            } else {
                $index = $iterate + $gap;
            }
        } else {
            if ($iterate + $gap < 0) {
                $index = ($iterate + $gap + 26);
            } else {
                $index = $iterate + $gap;
            }
        }
        return $index;
    }
}