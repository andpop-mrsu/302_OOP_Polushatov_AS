<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Truncater;

class TruncaterTest extends TestCase
{
    public function testTruncate(): void
    {
        $title = 'Полушатов Алексей';

        $truncater1 = new Truncater();

        $this->assertSame($title, $truncater1->truncate($title));

        $expected = "Полушатов Алексей...";
        $this->assertSame($expected, $truncater1->truncate($title, ['length' => 11]));

        $this->assertSame($title, $truncater1->truncate($title));

        $expected = "Полушатов Алексей***";
        $this->assertSame($expected, $truncater1->truncate($title, ['length' => 11, 'separator' => '***']));

        $expected = "Полушатов Алексей...";
        $this->assertSame($expected, $truncater1->truncate($title, ['length' => -8]));

        $truncater2 = new Truncater(['length' => 11, 'separator' => '!!!']);

        $expected = "Полушатов Алексей!!!";
        $this->assertSame($expected, $truncater2->truncate($title));
    }
}
