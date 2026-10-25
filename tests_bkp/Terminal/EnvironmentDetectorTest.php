<?php
namespace Test\Lucinda\ConsoleViewLanguage\Terminal;

use Lucinda\ConsoleViewLanguage\Terminal\EnvironmentDetector;
use Lucinda\ConsoleViewLanguage\Terminal\EnvironmentDetector\Results;
use Lucinda\UnitTest\Validator\Objects;
    
class EnvironmentDetectorTest
{

    public function getResults()
    {
        return (new Objects((new EnvironmentDetector())->getResults()))->assertInstanceOf(Results::class);
    }
        

}
