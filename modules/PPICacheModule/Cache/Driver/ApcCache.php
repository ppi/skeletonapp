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
use PPICacheModule\Cache\CacheItem;

/**
 * Apc cache driver.
 *
 * @author     Paul Dragoonis <paul@ppi.io>
 * @package    PPI
 * @subpackage Cache
 */
class ApcCache implements CacheInterface
{
    /**
     * @param  string                                             $key
     * @return \PPICacheModule\Cache\CacheItemInterface|CacheItem
     */
    public function get($key)
    {
        $exists = false;
        $value = apc_fetch($key, $exists);

        return new CacheItem($key, $value, $exists === false);
    }

    /**
     * @param  string     $key
     * @param  null       $value
     * @param  null       $ttl
     * @return array|bool
     */
    public function set($key, $value = null, $ttl = null)
    {
        return apc_store($key, $value, $ttl);
    }

    /**
     * @param  array $keys
     * @return array
     */
    public function getMultiple($keys)
    {
        $exists = false;
        $cacheValues = apc_fetch($keys, $exists);

        $ret = array();
        foreach ($cacheValues as $key => value) {
            // @todo - identify the value when a cache item is not found.
            $ret[$key] = new CacheItem($key, $value, true);
        }

        return $ret;
    }

    /**
     * @param  array      $keys
     * @param  null       $ttl
     * @return array|bool
     */
    public function setMultiple($keys, $ttl = null)
    {
        return apc_store($keys, null, $ttl);
    }

    /**
     * @param  string         $key
     * @return bool|\string[]
     */
    public function remove($key)
    {
        return apc_delete($key);
    }

    /**
     * @param  array      $keys
     * @return array|void
     */
    public function removeMultiple($keys)
    {
        foreach ($keys as $key) {
            apc_delete($key);
        }
    }

    /**
     * @return bool
     */
    public function clear()
    {
        return apc_clear_cache('user');
    }
}
