<?php

namespace Test\Lucinda\ConsoleViewLanguage;

use Lucinda\ConsoleViewLanguage\Engine;
use Lucinda\ConsoleViewLanguage\Language\DocumentNode;
use Lucinda\ConsoleViewLanguage\Language\ElementNode;
use Lucinda\ConsoleViewLanguage\Language\SourcePosition;
use Lucinda\ConsoleViewLanguage\Language\TextNode;
use Lucinda\ConsoleViewLanguage\Rendering\AnsiPainter;
use Lucinda\ConsoleViewLanguage\Rendering\Color;
use Lucinda\ConsoleViewLanguage\Rendering\DisplayWidth;
use Lucinda\ConsoleViewLanguage\Rendering\Renderer\Utilities\RenderingContext;
use Lucinda\ConsoleViewLanguage\Styling\StyleResolver;
use Lucinda\ConsoleViewLanguage\Styling\Theme;
use Lucinda\ConsoleViewLanguage\Terminal\ColorDepth;
use Lucinda\ConsoleViewLanguage\Terminal\EnvironmentDetector\Results;

final class Helper
{
    public function environment(
        int $width = 80,
        ColorDepth $depth = ColorDepth::NONE,
        bool $unicode = true,
        bool $hyperlinks = false,
        bool $interactive = false
    ): Results {
        $results = new Results();
        $results->setWidth($width);
        $results->setHeight(24);
        $results->setColorDepth($depth);
        $results->setUnicode($unicode);
        $results->setHyperlinks($hyperlinks);
        $results->setInteractive($interactive);
        return $results;
    }

    public function context(
        int $width = 80,
        ColorDepth $depth = ColorDepth::NONE,
        bool $unicode = true,
        bool $ansi = false,
        bool $hyperlinks = false
    ): RenderingContext {
        return new RenderingContext(
            new StyleResolver(new Theme()),
            new DisplayWidth(),
            $this->environment($width, $depth, $unicode, $hyperlinks),
            new AnsiPainter(new Color()),
            $ansi
        );
    }

    public function position(int $line = 1, int $column = 1): SourcePosition
    {
        return new SourcePosition($line, $column);
    }

    public function text(string $value): TextNode
    {
        return new TextNode($value, $this->position());
    }

    /**
     * @param array<string,string|bool> $attributes
     * @param \Lucinda\Console\Language\Node[] $children
     */
    public function element(string $name, array $attributes = [], array $children = []): ElementNode
    {
        return new ElementNode($name, $attributes, $children, $this->position());
    }

    /**
     * @param \Lucinda\Console\Language\Node[] $children
     */
    public function document(array $children): DocumentNode
    {
        return new DocumentNode($children, $this->position());
    }

    public function throws(callable $callback, string $class): bool
    {
        try {
            $callback();
        } catch (\Throwable $exception) {
            return $exception instanceof $class;
        }
        return false;
    }

    public function plain(string $markup, int $width = 80, bool $unicode = true): string
    {
        return (new Engine())->render(
            $markup,
            $this->environment($width, ColorDepth::NONE, $unicode),
            \Lucinda\ConsoleViewLanguage\RenderMode::PLAIN_TEXT
        );
    }
}
