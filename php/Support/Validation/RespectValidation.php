<?php

namespace Acme\Support\Validation;

use Respect\Validation\Factory;
use Acme\Support\Validation\Validation as V;
use Respect\Validation\Validatable;

class RespectValidation implements V
{
    private $respects = [
        V::EMAIL => 'email',
    ];

    /**
     * @var Factory
     */
    private $factory;

    public function __construct(Factory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @inheritdoc
     */
    public function check($data, $rules)
    {
        $validator = $this->all($this->fields($rules));

        return $validator->validate($data);
    }

    /**
     * @param array $rules
     * @return Validatable[]
     */
    private function fields(array $rules)
    {
        return array_map(function ($field, $rules) {

            return $this->field($field, $this->all($this->rules((array) $rules)));

        }, array_keys($rules), $rules);
    }

    /**
     * @param string $field
     * @param Validatable $rule
     * @return Validatable
     */
    private function field($field, $rule)
    {
        return $this->rule('key', [$field, $rule]);
    }

    /**
     * @param array $rules
     * @return Validatable[]
     */
    private function rules(array $rules)
    {
        return array_map(function ($rule, $parameters) {

            if (is_int($rule)) {
                $rule = $parameters;
                $parameters = [];
            }

            return $this->rule($this->translate($rule), $parameters);

        }, array_keys($rules), $rules);
    }

    /**
     * @param string $rule
     * @param null|array $parameters
     * @return Validatable
     * @throws \Respect\Validation\Exceptions\ComponentException
     */
    private function rule($rule, $parameters = [])
    {
        return $this->factory->rule($rule, $parameters);
    }

    /**
     * @param Validatable[] $rules
     * @return Validatable
     * @throws \Respect\Validation\Exceptions\ComponentException
     */
    private function all($rules)
    {
        return $this->factory->rule('allof', $rules);
    }

    /**
     * @param string $rule
     * @return string
     */
    private function translate($rule)
    {
        return $this->respects[$rule];
    }
}
