<?php
namespace Test\Lucinda\ConsoleViewLanguage\Rendering\Renderer;

use Lucinda\ConsoleViewLanguage\Rendering\Renderer\BoxRenderer;
use Lucinda\ConsoleViewLanguage\Rendering\Renderer\MultiRenderer;
use Test\Lucinda\ConsoleViewLanguage\Helper;
use Lucinda\UnitTest\Validator\Strings;
use Lucinda\ConsoleViewLanguage\Terminal\ColorDepth;
    
class BoxRendererTest
{

    public function render()
    {
        $helper = new Helper();
        $box = $helper->element("box", ["title" => "X", "border" => "ascii"], [$helper->element("p", [], [$helper->text("ok")])]);
        $output = implode("\n", (new BoxRenderer($helper->context(20, ColorDepth::NONE, false)))->render($box, 10, new MultiRenderer($helper->context(20, ColorDepth::NONE, false))));
        return (new Strings($output))->assertContains("+ X ");
    }
        

}
