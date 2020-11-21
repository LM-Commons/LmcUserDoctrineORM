<?php

declare(strict_types=1);

namespace LmcUserDoctrineORM\Options;

use LmcUser\Options\ModuleOptions as BaseModuleOptions;
use LmcUserDoctrineORM\Entity\User;

/**
 * Class ModuleOptions
 */
class ModuleOptions extends BaseModuleOptions
{
    /** @var string  */
    protected $userEntityClass = User::class;

    /** @var bool  */
    protected $enableDefaultEntities = true;

    /**
     * @param bool $enableDefaultEntities
     *
     * @return $this
     */
    public function setEnableDefaultEntities(bool $enableDefaultEntities): self
    {
        $this->enableDefaultEntities = $enableDefaultEntities;
        return $this;
    }

    /**
     * @return bool
     */
    public function getEnableDefaultEntities(): bool
    {
        return $this->enableDefaultEntities;
    }
}
