<?php

namespace Lucinda\ConsoleViewLanguage\Language;

interface Node
{
    public function getPosition(): SourcePosition;
}
