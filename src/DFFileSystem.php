<?php

namespace Lander931\DF;


class DFFileSystem
{
    /**
     * @var string
     */
    public $name;
    /**
     * @var integer|string
     */
    public $size;
    /**
     * @var integer|string
     */
    public $used;
    /**
     * @var integer|string
     */
    public $available;
    /**
     * @var float
     */
    public $percent_used;
    /**
     * @var string
     */
    public $mounted_on;

    /**
     * DFFileSystem constructor.
     * @param string $file_system_name
     * @param integer|string $size
     * @param integer|string $used
     * @param integer|string $available
     * @param float $percent_used
     * @param string $mounted_on
     */
    public function __construct($file_system_name, $size, $used, $available, $percent_used, $mounted_on)
    {
        $this->name = $file_system_name;
        $this->size = $size;
        $this->used = $used;
        $this->available = $available;
        $this->percent_used = $percent_used;
        $this->mounted_on = $mounted_on;
    }
}