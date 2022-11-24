<?php
mb_internal_encoding( 'UTF-8');
mb_regex_encoding( 'UTF-8');
class Characters
{
    public function revert($str): string
    {
        $arr = [];
        $word = "";
        for ($i = 0; $i < mb_strlen($str); $i++) {
            $val = mb_substr($str, $i, 1);
            if (preg_match("/([а-яa-z]+)/ui", $val)) {
                // добавить букву в слово
                $word .= $val;
            } else {
                if ($word != "") {
                    // запомнить индексы заглавных букв
                    $indexChar = [];
                    for ($j = 0; $j < mb_strlen($word); $j++) {
                        $letter = mb_substr($word, $j, 1);
                        if (preg_match("/[А-ЯA-Z]/u", $letter)) {
                            $indexChar[] = $j;
                        }
                    }

                    // перевернуть слово, сделать все буквы маленькими
                    $res = "";
                    for ($j = mb_strlen($word); $j >= 0; $j--) {
                        $letter = mb_substr($word, $j, 1);
                        $letter = mb_strtolower($letter);
                        $res .= $letter;
                    }

                    // поставить заглавные буквы в слове
                    $word = "";
                    for ($j = 0; $j < mb_strlen($res); $j++) {
                        $letter = mb_substr($res, $j, 1);
                        if (in_array($j, $indexChar)) {
                            $letter = mb_strtoupper($letter);//
                        }
                        $word .= $letter;
                    }
                    // добавить слово в итоговый массив
                    $arr[] = $word;
                    // сбросить слово
                    $word = "";
                }
                // добавить символ в итоговый массив
                $arr[] = $val;
            }
        }

        return implode($arr);
    }
}