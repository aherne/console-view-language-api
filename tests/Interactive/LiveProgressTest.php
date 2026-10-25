<?php
namespace Test\Lucinda\ConsoleViewLanguage\Interactive;

use Lucinda\ConsoleViewLanguage\Engine;
use Lucinda\ConsoleViewLanguage\Exception;
use Lucinda\ConsoleViewLanguage\Interactive\LiveProgress;
use Test\Lucinda\ConsoleViewLanguage\Helper;
use Lucinda\UnitTest\Validator\Booleans;
    
class LiveProgressTest
{

    public function update()
    {
        $helper = new Helper();
        $progress = new LiveProgress(new Engine(), $helper->environment(40, \Lucinda\ConsoleViewLanguage\Terminal\ColorDepth::NONE, false, false, true), 10);
        $progress->update(5, "half");
        return [
            (new Booleans(true))->assertTrue("interactive update executed"),
            (new Booleans($helper->throws(fn () => new LiveProgress(new Engine(), $helper->environment()), Exception::class)))->assertTrue("non-interactive rejected")
        ];
    }
        

    public function finish()
    {
        $progress = new LiveProgress(new Engine(), (new Helper())->environment(40, \Lucinda\ConsoleViewLanguage\Terminal\ColorDepth::NONE, false, false, true), 10);
        $progress->finish(10, "done");
        return (new Booleans(true))->assertTrue("interactive finish executed");
    }
        

}
