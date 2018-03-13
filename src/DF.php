<?php

namespace Lander931\DF;


class DF
{

    /**
     * @var bool
     */
    private $human_readable;
    /**
     * @var array
     */
    private $out;
    /**
     * @var array
     */
    private $collection = [];

    /**
     * DF constructor.
     * @param bool $human_readable
     */
    public function __construct($human_readable = false)
    {
        $this->human_readable = $human_readable;
    }

    /**
     * @param string|null $file_system
     * @return array|DFFileSystem|null
     */
    public function info($file_system = null)
    {
        $command = 'df';
        if ($this->human_readable) $command .= ' -h';
        exec($command, $this->out);
        $this->parse();

        if ($file_system) {
            return $this->search('name', $file_system);
        } else {
            return $this->collection;
        }
    }

    private function parse()
    {
        $output = $this->out;
        if (isset($output[0])) unset($output[0]);
        array_walk($output, function (&$row) {
            $row = explode(' ',preg_replace('/\s+/', ' ', $row));
        });

        foreach ($output as $item) {
            $this->collection[] = new DFFileSystem(
                $item[0],
                $item[1],
                $item[2],
                $item[3],
                (float) str_replace('%', '', $item[4]),
                $item[5]
            );
        }
    }

    /**
     * @param string $field
     * @param string|integer $value
     * @return DFFileSystem|null
     */
    private function search($field, $value)
    {
        foreach ($this->collection as $item) {
            if (isset($item->$field) && $item->$field == $value) return $item;
        }
        return null;
    }
    
}