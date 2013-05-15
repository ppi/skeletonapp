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
 * Memory cache driver.
 *
 * @author     Paul Dragoonis <paul@ppi.io>
 * @author     Vítor Brandão <vitor@ppi.io>
 * @package    PPI
 * @subpackage Cache
 */
class MemoryCache implements CacheInterface
{
    /**
     * @var array $data
     */
    protected $data = array();

    /**
     * {@inheritdoc}
     */
    public function get($key)
    {
        return isset($this->data[$key]) ? new CacheItem($key, $this->data[$key]) : false;
    }

    /**
     * {@inheritdoc}
     */
    public function set($key, $value, $ttl = null)
    {
        $this->data[$key] = $value;

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function remove($key)
    {
        unset($this->data[$key]);

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function getMultiple($keys)
    {
        $items = array();
        foreach ($keys as $key) {
            $items[$key] = $this->get($key);
        }

        return $items;
    }

    /**
     * {@inheritdoc}
     */
    public function setMultiple($items, $ttl = null)
    {
        $results = array();
        foreach ($items as $key => $item) {
            $this->data[$key] = $item;
            $results[$key] = true;
        }

        return $results;
    }

    /**
     * {@inheritdoc}
     */
    public function removeMultiple($keys)
    {
        $results = array();
        foreach ($keys as $key) {
            unset($this->data[$key]);
            $results[$key] = true;
        }

        return $results;
    }

    /**
     * {@inheritdoc}
     */
    public function clear()
    {
        $this->data = array();

        return true;
    }
}
