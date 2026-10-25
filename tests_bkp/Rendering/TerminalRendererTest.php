<?php
namespace Test\Lucinda\ConsoleViewLanguage\Rendering;

use Lucinda\ConsoleViewLanguage\Language\Parser;
use Lucinda\ConsoleViewLanguage\Rendering\TerminalRenderer;
use Lucinda\ConsoleViewLanguage\Styling\Theme;
use Test\Lucinda\ConsoleViewLanguage\Helper;
use Lucinda\UnitTest\Validator\Strings;
    
class TerminalRendererTest
{

    public function render()
    {
        $helper = new Helper();
        $document = (new Parser())->parse("<view><h1>Title</h1><p>Hello</p></view>");
        $output = (new TerminalRenderer(false))->render($document, $helper->environment(), new Theme());
        return (new Strings($output))->assertEquals("Title\n\nHello");
    }
        

}
