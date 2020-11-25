<?php

declare(strict_types=1);

namespace LmcUserDoctrineORM;

use Doctrine\ORM\Mapping\Driver\XmlDriver;
use Doctrine\ORM\EntityManager;
use LmcUserDoctrineORM\Mapper\User;

/**
 * Class Module
 */
class Module
{
    /**
     * @param $e
     */
    public function onBootstrap($e): void
    {
        $app     = $e->getParam('application');
        $sm      = $app->getServiceManager();
        $options = $sm->get('lmcuser_module_options');

        // Add the default entity driver only if specified in configuration
        if ($options->getEnableDefaultEntities()) {
            $chain = $sm->get('doctrine.driver.orm_default');
            $chain->addDriver(new XmlDriver(__DIR__ . '/config/xml/lmcuserdoctrineorm'), 'LmcUserDoctrineORM\Entity');
        }
    }

    /**
     * @return array
     */
    public function getServiceConfig(): array
    {
        return [
            'aliases' => [
                'lmcuser_doctrine_em' => EntityManager::class,
            ],
            'factories' => [
                'lmcuser_module_options' => function ($sm) {
                    $config = $sm->get('Configuration');
                    return new Options\ModuleOptions($config['lmcuser'] ?? []);
                },
                'lmcuser_user_mapper' => function ($sm) {
                    return new User(
                        $sm->get('lmcuser_doctrine_em'),
                        $sm->get('lmcuser_module_options')
                    );
                },
            ],
        ];
    }

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}
