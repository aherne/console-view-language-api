<?php
namespace Test\Lucinda\ConsoleViewLanguage\Rendering\Renderer;

use Lucinda\ConsoleViewLanguage\Rendering\Renderer\TableRenderer;
use Test\Lucinda\ConsoleViewLanguage\Helper;
use Lucinda\UnitTest\Validator\Strings;
use Lucinda\ConsoleViewLanguage\Terminal\ColorDepth;
    
class TableRendererTest
{

    public function render()
    {
        $helper = new Helper();
        $table = $helper->element("table", ["border" => "ascii"], [
            $helper->element("tbody", [], [
                $helper->element("tr", [], [
                    $helper->element("td", [], [$helper->text("A")]),
                    $helper->element("td", ["align" => "right"], [$helper->text("2")])
                ])
            ])
        ]);
        $output = implode("\n", (new TableRenderer($helper->context(20, ColorDepth::NONE, false)))->render($table, 20));
        return [
            (new Strings($output))->assertContains("+"),
            (new Strings($output))->assertContains(" A ")
        ];
    }
        

}
