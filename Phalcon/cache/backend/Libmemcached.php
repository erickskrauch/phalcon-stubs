<?php

namespace Phalcon\Cache\Backend;

/**
 * Phalcon\Cache\Backend\Libmemcached
 * Allows to cache output fragments, PHP data or raw data to a libmemcached backend.
 * Per default persistent memcached connection pools are used.
 * <code>
 * use Phalcon\Cache\Backend\Libmemcached;
 * use Phalcon\Cache\Frontend\Data as FrontData;
 * // Cache data for 2 days
 * $frontCache = new FrontData([
 * 'lifetime' => 172800
 * ]);
 * // Create the Cache setting memcached connection options
 * $cache = new Libmemcached($frontCache, [
 * 'servers' => [
 * [
 * 'host' => 'localhost',
 * 'port' => 11211,
 * 'weight' => 1
 * ],
 * ],
 * 'client' => [
 * \Memcached::OPT_HASH => Memcached::HASH_MD5,
 * \Memcached::OPT_PREFIX_KEY => 'prefix.',
 * ]
 * ]);
 * // Cache arbitrary data
 * $cache->save('my-data', [1, 2, 3, 4, 5]);
 * // Get data
 * $data = $cache->get('my-data');
 * </code>
 */
class Libmemcached extends \Phalcon\Cache\Backend implements \Phalcon\Cache\BackendInterface
{

    protected $_memcache = null;


    /**
     * Phalcon\Cache\Backend\Memcache constructor
     *
     * @param	Phalcon\Cache\FrontendInterface frontend
     * @param	array options
     * @param mixed $frontend 
     * @param mixed $options 
     */
    public function __construct(\Phalcon\Cache\FrontendInterface $frontend, $options = null) {}

    /**
     * Create internal connection to memcached
     */
    public function _connect() {}

    /**
     * Returns a cached content
     *
     * @param string $keyName 
     * @param int $lifetime 
     * @return mixed|null 
     */
    public function get($keyName, $lifetime = null) {}

    /**
     * Stores cached content into the file backend and stops the frontend
     *
     * @param int|string $keyName 
     * @param string $content 
     * @param long $lifetime 
     * @param boolean $stopBuffer 
     * @return bool 
     */
    public function save($keyName = null, $content = null, $lifetime = null, $stopBuffer = true) {}

    /**
     * Deletes a value from the cache by its key
     *
     * @param int|string $keyName 
     * @return boolean 
     */
    public function delete($keyName) {}

    /**
     * Query the existing cached keys
     *
     * @param string $prefix 
     * @return array 
     */
    public function queryKeys($prefix = null) {}

    /**
     * Checks if cache exists and it isn't expired
     *
     * @param string $keyName 
     * @param long $lifetime 
     * @return boolean 
     */
    public function exists($keyName = null, $lifetime = null) {}

    /**
     * Increment of given $keyName by $value
     *
     * @param string $keyName 
     * @param mixed $value 
     * @param long $lifetime 
     * @return long 
     */
    public function increment($keyName = null, $value = null) {}

    /**
     * Decrement of $keyName by given $value
     *
     * @param string $keyName 
     * @param long $value 
     * @return long 
     */
    public function decrement($keyName = null, $value = null) {}

    /**
     * Immediately invalidates all existing items.
     * Memcached does not support flush() per default. If you require flush() support, set $config["statsKey"].
     * All modified keys are stored in "statsKey". Note: statsKey has a negative performance impact.
     * <code>
     * $cache = new \Phalcon\Cache\Backend\Libmemcached($frontCache, ["statsKey" => "_PHCM"]);
     * $cache->save('my-data', array(1, 2, 3, 4, 5));
     * //'my-data' and all other used keys are deleted
     * $cache->flush();
     * </code>
     *
     * @return bool 
     */
    public function flush() {}

}
