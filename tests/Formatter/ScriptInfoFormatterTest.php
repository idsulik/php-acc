<?php

namespace PhpAss\Tests\Formatter;

use PhpAss\Formatter\ScriptInfoFormatter;
use PhpAss\Parser\ScriptInfoParser;
use PHPUnit\Framework\TestCase;

class ScriptInfoFormatterTest extends TestCase
{
    public function testFormat(): void
    {
        $parser = new ScriptInfoParser();
        $lines = explode(
            "\n",
            'Title: Default Aegisub file
ScriptType: v4.00+
WrapStyle: 0
PlayResX: 640
PlayResY: 480
ScaledBorderAndShadow: yes
Last Style Storage: Default
Video File: ?dummy:23.976000:40000:640:480:47:163:254:
Video Aspect Ratio: 0
Video Zoom: 8
Video Position: 0'
        );
        $scriptInfo = $parser->parse($lines);
        $formatted = (new ScriptInfoFormatter())->format($scriptInfo);

        self::assertEquals("[Script Info]\n" . implode("\n", $lines), $formatted);
    }
}