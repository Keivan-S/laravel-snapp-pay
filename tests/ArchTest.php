<?php

namespace BackendProgramer\SnappPay\Tests;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class ArchTest extends TestCase
{
    public function testPackageDoesNotUseDebuggingFunctions(): void
    {
        $debugFunctions = ['dd(', 'dump(', 'ray('];
        $sourcePath = realpath(__DIR__ . '/../src');
        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($sourcePath));

        foreach ($iterator as $file) {
            if (!$file->isFile() || $file->getExtension() !== 'php') {
                continue;
            }

            $contents = file_get_contents($file->getPathname());
            foreach ($debugFunctions as $function) {
                $this->assertStringNotContainsString(
                    $function,
                    $contents,
                    sprintf('File %s should not contain call to %s', $file->getPathname(), rtrim($function, '('))
                );
            }
        }
    }
}
