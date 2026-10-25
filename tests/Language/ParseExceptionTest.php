<?php
namespace Test\Lucinda\ConsoleViewLanguage\Language;

use Lucinda\ConsoleViewLanguage\Language\ParseException;
use Lucinda\ConsoleViewLanguage\Language\SourcePosition;
use Lucinda\UnitTest\Validator\Strings;
    
class ParseExceptionTest
{
    public function message()
    {
        $exception = new ParseException("Broken", new SourcePosition(4, 9));
        return (new Strings($exception->getMessage()))->assertContains("line 4, column 9");
    }

}
