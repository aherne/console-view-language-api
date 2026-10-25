<?php

namespace Lucinda\ConsoleViewLanguage\Rendering\Renderer;

interface NodesRenderer
{
    function render(array $nodes, int $width): array;
}