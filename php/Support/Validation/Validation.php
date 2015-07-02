<?php

namespace Acme\Support\Validation;

interface Validation
{
    const EMAIL = 'email';

    /**
     * Check the data, whether it is valid.
     *
     * @param array $data
     * @param array $rules
     * @return array
     */
    public function check($data, $rules);
}
