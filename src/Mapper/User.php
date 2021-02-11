<?php

declare(strict_types=1);

namespace LmcUserDoctrineORM\Mapper;

use Doctrine\ORM\EntityManagerInterface;
use Laminas\Db\Adapter\Driver\ResultInterface;
use LmcUser\Entity\UserInterface;
use LmcUser\Mapper\User as LmcUserMapper;
use LmcUserDoctrineORM\Options\ModuleOptions;
use Laminas\Hydrator\HydratorInterface;

/**
 * Class User
 */
class User extends LmcUserMapper
{
    /** @var EntityManagerInterface  */
    protected $em;

    /** @var ModuleOptions  */
    protected $options;

    /**
     * User constructor.
     *
     * @param EntityManagerInterface $em
     * @param ModuleOptions          $options
     */
    public function __construct(EntityManagerInterface $em, ModuleOptions $options)
    {
        $this->em      = $em;
        $this->options = $options;
    }

    /**
     * @param $email
     *
     * @return UserInterface|object|null
     * @noinspection PhpMissingParentCallCommonInspection
     */
    public function findByEmail($email)
    {
        $er = $this->em->getRepository($this->options->getUserEntityClass());

        return $er->findOneBy(['email' => $email]);
    }

    /**
     * @param string $username
     *
     * @return UserInterface|object|null
     * @noinspection PhpMissingParentCallCommonInspection
     */
    public function findByUsername($username)
    {
        $er = $this->em->getRepository($this->options->getUserEntityClass());

        return $er->findOneBy(['username' => $username]);
    }

    /**
     * @param int|string $id
     *
     * @return UserInterface|object|null
     * @noinspection PhpMissingParentCallCommonInspection
     */
    public function findById($id)
    {
        $er = $this->em->getRepository($this->options->getUserEntityClass());

        return $er->find($id);
    }

    /**
     * @param UserInterface          $entity
     * @param null                   $tableName
     * @param HydratorInterface|null $hydrator
     *
     * @return ResultInterface|UserInterface
     * @noinspection PhpMissingParentCallCommonInspection
     */
    public function insert(UserInterface $entity, $tableName = null, HydratorInterface $hydrator = null)
    {
        return $this->persist($entity);
    }

    /**
     * @param UserInterface          $entity
     * @param null                   $where
     * @param null                   $tableName
     * @param HydratorInterface|null $hydrator
     *
     * @return ResultInterface|UserInterface
     * @noinspection PhpMissingParentCallCommonInspection
     */
    public function update(UserInterface $entity, $where = null, $tableName = null, HydratorInterface $hydrator = null)
    {
        return $this->persist($entity);
    }

    /**
     * @param UserInterface $entity
     *
     * @return UserInterface
     */
    protected function persist(UserInterface $entity): UserInterface
    {
        $this->em->persist($entity);
        $this->em->flush();

        return $entity;
    }
}
