<?php
require 'Characters.php';

class CharactersTest extends PHPUnit\Framework\TestCase
{
    private $str;

    protected function setUp(): void
    {
        $this->str = new Characters();
    }

    public function testsRevertRus() {
        $this->assertSame('Тевирп! Онвад ен ьсиледив.',$this->str->revert('Привет! Давно не виделись.'));
    }

    public function testsRevertEng() {
        $this->assertSame('Olleh! Olleh!',$this->str->revert('Hello! Hello!'));
    }

    public function testsRevertNull() {
        $this->assertSame('',$this->str->revert(null));
    }
}