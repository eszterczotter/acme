<?php

namespace Acme\Support\Http\View;

interface View
{
    /**
     * Render template with data.
     *
     * @param string $template
     * @param array $data
     * @return string
     */
    public function render($template, $data = []);
}
