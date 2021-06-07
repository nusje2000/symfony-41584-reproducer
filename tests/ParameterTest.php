<?php

declare(strict_types=1);

namespace App\Tests;

use App\Kernel;
use PHPUnit\Framework\TestCase;

final class ParameterTest extends TestCase
{
    public function testDefault(): void
    {
        $kernel = new Kernel('other', true);
        $kernel->boot();

        self::assertSame(
            'default value',
            $kernel->getContainer()->getParameter('root_parameter'),
            'Parameter did not match expected value, should be the configured value from config/config.yaml:5'
        );
    }

    public function testDev(): void
    {
        $kernel = new Kernel('dev', true);
        $kernel->boot();
        self::assertSame(
            'value when on dev',
            $kernel->getContainer()->getParameter('root_parameter'),
            'Parameter did not match expected value, should be the configured value from config/config.yaml:9'
        );
    }

    public function testTest(): void
    {
        $kernel = new Kernel('test', true);
        $kernel->boot();
        self::assertSame(
            'value when on test',
            $kernel->getContainer()->getParameter('root_parameter'),
            'Parameter did not match expected value, should be the configured value from config/config.yaml:13'
        );
    }

    public function testProd(): void
    {
        $kernel = new Kernel('prod', true);
        $kernel->boot();
        self::assertSame(
            'value when on prod',
            $kernel->getContainer()->getParameter('root_parameter'),
            'Parameter did not match expected value, should be the configured value from config/config.yaml:17'
        );
    }

    public function testImportedDefault(): void
    {
        $kernel = new Kernel('other', true);
        $kernel->boot();

        self::assertSame(
            'default value',
            $kernel->getContainer()->getParameter('imported_parameter'),
            'Parameter did not match expected value, should be the configured value from config/other_config.yaml:2'
        );
    }

    public function testImportedDev(): void
    {
        $kernel = new Kernel('dev', true);
        $kernel->boot();
        self::assertSame(
            'value when on dev',
            $kernel->getContainer()->getParameter('imported_parameter'),
            'Parameter did not match expected value, should be the configured value from config/other_config.yaml:6'
        );
    }

    public function testImportedTest(): void
    {
        $kernel = new Kernel('test', true);
        $kernel->boot();
        self::assertSame(
            'value when on test',
            $kernel->getContainer()->getParameter('imported_parameter'),
            'Parameter did not match expected value, should be the configured value from config/other_config.yaml:10'
        );
    }

    public function testImportedProd(): void
    {
        $kernel = new Kernel('prod', true);
        $kernel->boot();
        self::assertSame(
            'value when on prod',
            $kernel->getContainer()->getParameter('imported_parameter'),
            'Parameter did not match expected value, should be the configured value from config/other_config.yaml:14'
        );
    }
}
