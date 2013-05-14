<?php
/**
 * This file is part of the PPI Framework.
 *
 * @copyright  Copyright (c) 2011-2013 Paul Dragoonis <paul@ppi.io>
 * @license    http://opensource.org/licenses/mit-license.php MIT
 * @link       http://www.ppi.io
 */

namespace PPICacheModule\Cache;

/**
 * CacheItemInterface.
 *
 * @author     Paul Dragoonis <paul@ppi.io>
 * @author     Vítor Brandão <vitor@ppi.io>
 * @package    PPI
 * @subpackage Cache
 */
interface CacheItemInterface
{

    /**
     * Get the key associated with this CacheItem
     *
     * @return string
     */
    public function getKey();

    /**
     * Obtain the value of this cache item
     *
     * @return mixed
     */
    public function getValue();

    /**
     * This boolean value tells us if our cache item is currently in the cache or not
     *
     * @return boolean
     */
    public function isHit();
}
