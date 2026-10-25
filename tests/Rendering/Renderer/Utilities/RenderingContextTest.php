<?php
namespace Test\Lucinda\ConsoleViewLanguage\Rendering\Renderer\Utilities;

use Lucinda\ConsoleViewLanguage\Rendering\Renderer\Utilities\RenderingContext;
use Lucinda\ConsoleViewLanguage\Rendering\AnsiPainter;
use Lucinda\ConsoleViewLanguage\Rendering\DisplayWidth;
use Lucinda\ConsoleViewLanguage\Styling\StyleResolver;
use Lucinda\ConsoleViewLanguage\Terminal\EnvironmentDetector\Results;
use Test\Lucinda\ConsoleViewLanguage\Helper;
use Lucinda\UnitTest\Validator\Booleans;
use Lucinda\UnitTest\Validator\Objects;
    
class RenderingContextTest
{
    private function context(): RenderingContext
    {
        return (new Helper())->context(80, \Lucinda\ConsoleViewLanguage\Terminal\ColorDepth::ANSI16, true, true);
    }

    public function getStyles()
    {
        return (new Objects($this->context()->getStyles()))->assertInstanceOf(StyleResolver::class);
    }
        

    public function getDisplayWidth()
    {
        return (new Objects($this->context()->getDisplayWidth()))->assertInstanceOf(DisplayWidth::class);
    }
        

    public function getEnvironment()
    {
        return (new Objects($this->context()->getEnvironment()))->assertInstanceOf(Results::class);
    }
        

    public function getAnsiPainter()
    {
        return (new Objects($this->context()->getAnsiPainter()))->assertInstanceOf(AnsiPainter::class);
    }
        

    public function getAnsi()
    {
        return (new Booleans($this->context()->getAnsi()))->assertTrue();
    }
        

}
