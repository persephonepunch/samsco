<?php

namespace YOOtheme\Theme;

class Customizer
{
    /**
     * @var boolean
     */
    protected $active;

    /**
     * @var array
     */
    protected $data = [];

    /**
     * @var array
     */
    protected $sections = [];

    /**
     * Constructor.
     *
     * @param boolean $active
     */
    public function __construct($active = false)
    {
        $this->active = $active;
    }

    /**
     * Gets the data values.
     *
     * @return array
     */
    public function getData()
    {
        $data = $this->data;

        if ($this->sections) {
            $data['sections'] = $this->sections;
        }

        return $data;
    }

    /**
     * Adds a data value to an existing key name.
     *
     * @param  string $name
     * @param  mixed  $value
     */
    public function addData($name, $value)
    {
        if (isset($this->data[$name]) && is_array($this->data[$name])) {
            $value = array_replace_recursive($this->data[$name], $value);
        }

        $this->data[$name] = $value;
    }

    /**
     * Gets a section.
     *
     * @param  string $name
     * @return array
     */
    public function getSection($name)
    {
        return isset($this->sections[$name]) ? $this->sections[$name] : null;
    }

    /**
     * Adds a section.
     *
     * @param string $name
     * @param array  $options
     */
    public function addSection($name, array $options)
    {
        $this->sections[$name] = array_replace([
            'title' => $name,
            'priority' => 100
        ], $options);
    }

    /**
     * Checks if is active.
     *
     * @return bool
     */
    public function isActive()
    {
        return $this->active;
    }
}
