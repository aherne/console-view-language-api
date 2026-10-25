<?php
namespace Test\Lucinda\ConsoleViewLanguage\Rendering;

use Lucinda\ConsoleViewLanguage\Rendering\AnsiPainter;
use Lucinda\ConsoleViewLanguage\Rendering\Color;
use Lucinda\ConsoleViewLanguage\Styling\Style;
use Lucinda\ConsoleViewLanguage\Terminal\ColorDepth;
use Test\Lucinda\ConsoleViewLanguage\Helper;
use Lucinda\UnitTest\Validator\Strings;
    
class AnsiPainterTest
{

    public function paint()
    {
        $helper = new Helper();
        $painter = new AnsiPainter(new Color());
        $styled = $painter->paint(
            "Error",
            new Style(["bold" => true, "underline" => true, "color" => "red"]),
            $helper->environment(80, ColorDepth::ANSI16)
        );
        $linked = $painter->paint(
            "Docs",
            new Style(),
            $helper->environment(80, ColorDepth::ANSI16, true, true),
            "https://example.com"
        );
        return [
            (new Strings($styled))->assertContains("\e[1;4;31mError\e[0m", "style codes"),
            (new Strings($linked))->assertContains("\e]8;;https://example.com", "hyperlink")
        ];
    }
        

}
