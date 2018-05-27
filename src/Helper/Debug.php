<?php

namespace ElseifAB\IDKollen\Helper;

/**
 * Debug logger singleton
 *
 * Class Debug
 * @package ElseifAB\IDKollen\Helper
 */
class Debug
{
    const OPTION_KEY = 'id-kollen-debug';

    protected static $instance;
    protected $log;
    protected $enabled;

    protected function __construct()
    {
        //feel free to do stuff that should only happen once here.
        $this->enabled = true;
    }

    /**
     * @return \ElseifAB\IDKollen\Helper\Debug
     */
    public static function current()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    /**
     * @param $message
     */
    public function info($message)
    {
        $this->log[] = "(info) {$message}";
    }

    /**
     * @param $message
     */
    public function warning($message)
    {
        $this->log[] = "(warning) {$message}";
    }

    /**
     * @param $message
     */
    public function error($message)
    {
        $this->log[] = "(error) {$message}";
    }

    /**
     * @param $message
     */
    public function critical($message)
    {
        $this->log[] = "(critical) {$message}";
    }

    public function enabled()
    {
        return get_option(self::OPTION_KEY, false);
    }

    public function disable()
    {
        delete_option(self::OPTION_KEY);
    }

    public function enable()
    {
        update_option(self::OPTION_KEY, 1);
    }

    /**
     * @return string
     */
    public function toString()
    {
        $result = "";
        foreach ($this->toArray() as $log) {
            $result .= "$log\n";
        }
        return $result;
    }

    /**
     * @return []
     */
    public function toArray()
    {
        return $this->log;
    }
}
