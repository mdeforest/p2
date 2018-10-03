<?php
namespace Resume;

use DWA\Form;

class MyForm extends Form
{
    /**
     * Get a value from the request, with the option of including a default
     * if the value is not set; name is an array to allow multiple depths
     */
    public function get_depth(array $name, string $default = null)
    {
        $curRequest = $this->request;

        foreach ($name as $depth) {
            $curRequest = $curRequest[$depth];
        }

        return $curRequest[0];

    }

    /**
     * Returns boolean as to whether a value is present in the request
     */
    public function has_depth(array $name)
    {
        $curRequest = $this->request;

        foreach ($name as $depth) {
            $curRequest = $curRequest[$depth];

            if (!isset($curRequest)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Given an array of fields => validation rules
     * Will loop through each field's rules
     * Returns an array of error messages
     * Stops after the first error for a given field
     * Available rules:
     * required, alpha, alphaNumeric, digit, numeric,
     * email, url, min:x, max:x, minLength:x, maxLength:x
     */
    public function validate_depth(array $fieldsToValidate, string $namespace)
    {
        $errors = [];

        foreach ($fieldsToValidate as $fieldName => $rules) {
            # Each rule is separated by a |
            $rules = explode('|', $rules);

            foreach ($rules as $rule) {
                # Get the value for this field from the request
                $value = $this->get_depth([$namespace, $fieldName]);

                # Handle any parameters with the rule, e.g. max:99
                $parameter = null;
                if (strstr($rule, ':')) {
                    list($rule, $parameter) = explode(':', $rule);
                }

                # Run the validation test with the given rule
                $test = $this->$rule($value, $parameter);

                # Test failed
                if (!$test) {
                    $method = $rule . 'Message';
                    $errors[] = 'The value for ' . $fieldName . ' ' . $this->$method($parameter);

                    # Only indicate one error per field
                    break;
                }
            }
        }

        # Set public property hasErrors as Boolean
        $this->hasErrors = !empty($errors);

        return $errors;
    }
}