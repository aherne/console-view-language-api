<?php
namespace Test\Lucinda\ConsoleViewLanguage\Rendering\Renderer;

use Lucinda\ConsoleViewLanguage\Rendering\Renderer\MultiRenderer;
use Test\Lucinda\ConsoleViewLanguage\Helper;
use Lucinda\UnitTest\Validator\Arrays;
use Lucinda\UnitTest\Validator\Strings;
    
class MultiRendererTest
{

    public function render()
    {
        $helper = new Helper();
        $lines = (new MultiRenderer($helper->context()))->render([
            $helper->element("p", [], [$helper->text("Hello")]),
            $helper->element("show", ["max-width" => "10"], [$helper->element("p", [], [$helper->text("Visible")])])
        ], 10);
        return [
            (new Arrays($lines))->assertSize(2),
            (new Strings(implode("\n", $lines)))->assertContains("Visible")
        ];
    }
        

}
