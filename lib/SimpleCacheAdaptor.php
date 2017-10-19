<?php

/*
 * This file is part of the olvlvl/symfony-validator-companion package.
 *
 * (c) Olivier Laviale <olivier.laviale@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace olvlvl\SymfonyValidatorCompanion;

use Symfony\Component\Validator\Mapping\Cache\CacheInterface as ValidatorCache;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Psr\SimpleCache\CacheInterface as SimpleCache;

class SimpleCacheAdaptor implements ValidatorCache
{
    /**
     * @param string $class
     *
     * @return string
     */
    public static function normalizeKey($class)
    {
        return strtr($class, '\\', '.');
    }

    /**
     * @var SimpleCache
     */
    private $cache;

    /**
     * @param SimpleCache $cache
     */
    public function __construct(SimpleCache $cache)
    {
        $this->cache = $cache;
    }

    /**
     * @inheritdoc
     */
    public function has($class)
    {
        return $this->cache->has(self::normalizeKey($class));
    }

    /**
     * @inheritdoc
     */
    public function read($class)
    {
        $result = $this->cache->get(self::normalizeKey($class));

        return $result ? $result : false;
    }

    /**
     * @inheritdoc
     */
    public function write(ClassMetadata $metadata)
    {
        $this->cache->set(self::normalizeKey($metadata->getClassName()), $metadata);
    }
}
