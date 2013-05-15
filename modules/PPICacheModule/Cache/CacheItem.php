<?php
/**
 * This file is part of the PPI Framework.
 *
 * @copyright  Copyright (c) 2011-2013 Paul Dragoonis <paul@ppi.io>
 * @license    http://opensource.org/licenses/mit-license.php MIT
 * @link       http://www.ppi.io
 */

namespace PPICacheModule\Cache;

use PPICacheModule\Cache\CacheItemInterface;

/**
 * CacheItem.
 *
 * @author     Paul Dragoonis <paul@ppi.io>
 * @author     Vítor Brandão <vitor@ppi.io>
 * @package    PPI
 * @subpackage Cache
 */
class CacheItem implements CacheItemInterface
{
    /**
     * @var string
     */
    private $key;

    /**
     * @var bool
     */
    private $isHit;

    /**
     * @var mixed
     */
    private $value;

    /**
     * Constructor.
     *
     * @param $key
     * @param null $value
     * @param bool $isHit
     */
    public function __construct($key, $value = null, $isHit = true)
    {
        $this->key = $key;
        $this->value = $value;
        $this->isHit = $isHit;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return mixed|null
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param null $value
     */
    public function setValue($value = null)
    {
        $this->value = $value;
    }

    /**
     * @return bool
     */
    public function isHit()
    {
        return $this->isHit;
    }
}
