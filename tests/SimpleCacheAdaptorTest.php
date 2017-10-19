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

use PHPUnit\Framework\TestCase;
use Psr\SimpleCache\CacheInterface;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class SimpleCacheAdaptorTest extends TestCase
{
    public function testHas()
    {
        $result = (bool) mt_rand(0, 1);

        $class = __CLASS__;
        $cache = $this->prophesize(CacheInterface::class);
        $cache->has(SimpleCacheAdaptor::normalizeKey($class))
            ->shouldBeCalled()->willReturn($result);

        $this->assertSame($result, $this->makeAdaptor($cache->reveal())->has($class));
    }

    public function testReadShouldReturnFalseOnMiss()
    {
        $class = __CLASS__;
        $cache = $this->prophesize(CacheInterface::class);
        $cache->get(SimpleCacheAdaptor::normalizeKey($class))
            ->shouldBeCalled()->willReturn(null);

        $this->assertFalse($this->makeAdaptor($cache->reveal())->read($class));
    }

    public function testRead()
    {
        $class = __CLASS__;
        $metadata = $this->prophesize(ClassMetadata::class);
        $cache = $this->prophesize(CacheInterface::class);
        $cache->get(SimpleCacheAdaptor::normalizeKey($class))
            ->shouldBeCalled()->willReturn($metadata->reveal());

        $this->assertSame($metadata->reveal(), $this->makeAdaptor($cache->reveal())->read($class));
    }

    public function testWrite()
    {
        $class = __CLASS__;
        $metadata = $this->prophesize(ClassMetadata::class);
        $metadata->getClassName()->shouldBeCalled()->willReturn($class);
        $cache = $this->prophesize(CacheInterface::class);
        $cache->set(SimpleCacheAdaptor::normalizeKey($class), $metadata->reveal())
            ->shouldBeCalled();

        $this->makeAdaptor($cache->reveal())->write($metadata->reveal());
    }

    /**
     * @param CacheInterface $cache
     *
     * @return SimpleCacheAdaptor
     */
    private function makeAdaptor(CacheInterface $cache)
    {
        return new SimpleCacheAdaptor($cache);
    }
}
