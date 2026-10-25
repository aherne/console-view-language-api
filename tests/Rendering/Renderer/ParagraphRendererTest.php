<?php
namespace Test\Lucinda\ConsoleViewLanguage\Rendering\Renderer;

use Lucinda\ConsoleViewLanguage\Rendering\Renderer\ParagraphRenderer;
use Test\Lucinda\ConsoleViewLanguage\Helper;
use Lucinda\UnitTest\Validator\Arrays;
    
class ParagraphRendererTest
{

    public function render()
    {
        $helper = new Helper();
        $paragraph = $helper->element("p", ["align" => "right", "width" => "6"], [$helper->text("x")]);
        return (new Arrays((new ParagraphRenderer($helper->context()))->render($paragraph, 6)))->assertEquals(["     x"]);
    }
        

}
