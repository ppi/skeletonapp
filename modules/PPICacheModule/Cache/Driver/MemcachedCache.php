<?php
/**
 * This file is part of the PPI Framework.
 *
 * @copyright  Copyright (c) 2011-2013 Paul Dragoonis <paul@ppi.io>
 * @license    http://opensource.org/licenses/mit-license.php MIT
 * @link       http://www.ppi.io
 */

namespace PPICacheModule\Cache\Driver;

use PPICacheModule\Cache\CacheInterface;

/**
 * Memcached cache driver.
 *
 * @author     Paul Dragoonis <paul@ppi.io>
 * @author     Vítor Brandão <vitor@ppi.io>
 * @package    PPI
 * @subpackage Cache
 */
class MemcachedCache implements CacheInterface
{
    protected $memcached;

    public function __construct(\Memcached $memcached)
    {
        $this->memcached = $memcached;
    }

    public function get($key)
    {
        $value = $this->memcached->get($key);
        $exists = $this->memcached->getResultCode() !== \Memcached::RES_SUCCESS;

        return new CacheItem($key, $value, $exists);
    }

    public function set($key, $value = null, $ttl = null)
    {
        return $this->memcached->set($key, $value, $ttl);
    }

    public function getMultiple($keys)
    {
        $cacheValues = $this->memcached->getMulti($keys, array(), \Memcached::GET_PRESERVE_ORDER);
        if ($cacheValues === false) {
            return array();
        }

        $ret = array();
        foreach ($cacheValues as $key => value) {
        // @todo - identify the value when a cache item is not found.
        $ret[$key] = new PsrCacheItem($key, $value, true)
        }

        return $ret;
    }

    public function setMultiple($items, $ttl = null)
    {
        return $this->memcached->setMulti($items, $ttl);
    }

    public function remove($key)
    {
        return $this->memcached->delete($key);
    }

    public function removeMultiple($keys)
    {
        return $this->memcached->deleteMulti($keys);
    }

    public function clear()
    {
        return $this->memcached->flush();
    }
}
