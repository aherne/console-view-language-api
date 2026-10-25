<?php
namespace Test\Lucinda\ConsoleViewLanguage\Language;

use Test\Lucinda\ConsoleViewLanguage\Helper;
use Lucinda\ConsoleViewLanguage\Language\SourcePosition;
use Lucinda\UnitTest\Validator\Objects;
use Lucinda\UnitTest\Validator\Strings;
    
class TextNodeTest
{

    public function getPosition()
    {
        $node = (new Helper())->text("hello");
        return (new Objects($node->getPosition()))->assertInstanceOf(SourcePosition::class);
    }
        

    public function getValue()
    {
        return (new Strings((new Helper())->text("hello")->getValue()))->assertEquals("hello");
    }
        

}
