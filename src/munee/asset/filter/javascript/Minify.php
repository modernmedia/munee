<?php
/**
 * Munee: Optimising Your Assets
 *
 * @copyright Cody Lundquist 2012
 * @license http://opensource.org/licenses/mit-license.php
 */

namespace munee\asset\filter\javascript;

use munee\asset\Filter;

/**
 * Minify Filter for JavaScript
 *
 * @author Cody Lundquist
 */
class Minify extends Filter
{
    /**
     * @var array
     */
    protected $_allowedParams = array(
        'minify' => array(
            'alias' => 'm',
            'regex' => 'true|false|t|f|yes|no|y|n',
            'default' => 'false',
            'cast' => 'boolean'
        )
    );

    /**
     * JavaScript Minification
     *
     * @param string $file
     * @param array $arguments
     *
     * @return void
     */
    public function filter($file, $arguments)
    {
        if (! $arguments['minify']) {
            return;
        }

        file_put_contents($file, \JShrink\Minifier::minify(file_get_contents($file)));
    }
}