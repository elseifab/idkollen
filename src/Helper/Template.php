<?php

namespace ElseifAB\IDKollen\Helper;

/**
 * Class Template
 * @package ElseifAB\IDKollen\Helper
 */
class Template
{

    public $folder;

    /**
     * Find and attempt to render a template with variables
     *
     * @param $suggestions
     * @param $variables
     *
     * @return string
     */
    public static function render($suggestions, $variables = array())
    {
        $me = new static();
        $me->folder = realpath(__DIR__ . '/../../templates');
        $template = $me->findTemplate($suggestions);
        $output = '';
        if ($template) {
            $output = $me->renderTemplate($template, $variables);
        }
        return $output;
    }

    /**
     * Look for the first template suggestion
     *
     * @param $suggestions
     *
     * @return bool|string
     */
    protected function findTemplate($suggestions)
    {
        if (!is_array($suggestions)) {
            $suggestions = array($suggestions);
        }
        $suggestions = array_reverse($suggestions);
        $found = false;
        foreach ($suggestions as $suggestion) {
            $separator = DIRECTORY_SEPARATOR;
            $file = "{$this->folder}{$separator}{$suggestion}.php";
            if (file_exists($file)) {
                $found = $file;
                break;
            }
        }
        return $found;
    }

    /**
     * Execute the template by extracting the variables into scope, and including
     * the template file.
     *
     * @internal param $template
     * @internal param $variables
     *
     * @return string
     */
    protected function renderTemplate()
    {
        ob_start();
        foreach (func_get_args()[1] as $key => $value) {
            ${$key} = $value;
        }
        include func_get_args()[0];
        return ob_get_clean();
    }
}
