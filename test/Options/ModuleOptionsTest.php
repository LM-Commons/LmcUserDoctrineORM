<?php

declare(strict_types=1);

namespace LmcUserDoctrineORMTest\Options;

use LmcUserDoctrineORM\Options\ModuleOptions;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use SebastianBergmann\RecursionContext\InvalidArgumentException;

/**
 * Class ModuleOptionsTest
 */
class ModuleOptionsTest extends TestCase
{
    /**
     * @throws ExpectationFailedException
     * @throws InvalidArgumentException
     */
    public function testEnableDefaultEntitiesReturnsTrueByDefault(): void
    {
        $moduleOptions = new ModuleOptions();
        self::assertTrue($moduleOptions->getEnableDefaultEntities());
    }

    public function testDisableDefaultEntities(): void
    {
        $moduleOptions = new ModuleOptions();
        $moduleOptions->setEnableDefaultEntities(false);
        self::assertFalse($moduleOptions->getEnableDefaultEntities());
    }
}
