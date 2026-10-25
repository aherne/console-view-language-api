<?php
namespace Test\Lucinda\ConsoleViewLanguage\Rendering\Renderer;

use Lucinda\ConsoleViewLanguage\Rendering\Renderer\InlineRenderer;
use Lucinda\ConsoleViewLanguage\Styling\Style;
use Test\Lucinda\ConsoleViewLanguage\Helper;
use Lucinda\UnitTest\Validator\Arrays;
    
class InlineRendererTest
{

    public function render()
    {
        $helper = new Helper();
        $lines = (new InlineRenderer($helper->context()))->render([$helper->text("one two three")], 8, new Style());
        return (new Arrays($lines))->assertEquals(["one two", "three"]);
    }
        

}
