<?php
namespace Resume;

use DWA\Form;

class MyForm extends Form
{
    /**
     * Get a value from the request, with the option of including a default
     * if the value is not set; name is an array to allow multiple depths
     */
    public function get($name, $default = null)
    {
        $field = explode('|', $name);
        $curRequest = $this->request;

        foreach ($field as $depth) {
            if (is_numeric($depth)) {
                $depth = intval($depth);
            }

            $curRequest = $curRequest[$depth] ?? $default;
        }

        return $curRequest;
    }

    /**
     * Returns boolean as to whether a value is present in the request
     */
    public function has($name)
    {
        $field = explode('|', $name);
        $curRequest = $this->request;

        foreach ($field as $depth) {
            if (is_numeric($depth)) {
                $depth = intval($depth);
            }

            $curRequest = $curRequest[$depth];

            if (!isset($curRequest)) {
                return false;
            }
        }

        return true;
    }

}