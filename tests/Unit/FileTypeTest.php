<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Src\FileType;

class FileTypeTest extends TestCase
{
    public function testKnownExtension()
    {
        $fileType = new FileType('document.pdf');
        $type = $fileType->getType();
        $this->assertArrayHasKey('icon', $type);
        $this->assertSame('fa-file-pdf', $type['icon']);
    }

    public function testUnknownExtension()
    {
        $fileType = new FileType('file.unknownext');
        $type = $fileType->getType();
        $this->assertArrayHasKey('icon', $type);
        $this->assertSame('fa-file', $type['icon']);
    }
}
