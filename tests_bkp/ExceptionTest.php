<?php
namespace Test\Lucinda\ConsoleViewLanguage;

use Lucinda\ConsoleViewLanguage\Exception;
use Lucinda\UnitTest\Validator\Strings;
    
class ExceptionTest
{
    public function message()
    {
        return (new Strings((new Exception("Failure"))->getMessage()))->assertEquals("Failure");
    }

}
