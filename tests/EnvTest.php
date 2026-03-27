<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Vansbeck07\Os;

class EnvTest extends TestCase
{
    public function testSlash(): void
    {
        $this->assertSame(DIRECTORY_SEPARATOR, Os::slash());
        $this->assertSame('\\', Os::slash('win'));
        $this->assertSame('\\', Os::slash('windows'));
        $this->assertSame('/', Os::slash('linux'));
        $this->assertSame('/', Os::slash('mac'));
        $this->assertSame('/', Os::slash('forward'));
        $this->assertSame('/', Os::slash('backward'));
    }

    public function testPlatformPathStyle(): void
    {
        $withForward = '/home/docs/codes';
        $withBackward = '\\home\\docs\\codes';

        $this->assertSame($withBackward, Os::toPathStyle($withForward, 'win'));
        $this->assertSame($withForward, Os::toPathStyle($withBackward, 'linux'));
    }
}
