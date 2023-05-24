<?php
/**
 * Webkul Software.
 *
 * @category  Webkul
 * @package   Webkul_Knockout
 * @author    Webkul
 * @copyright Webkul Software Private Limited (https://webkul.com)
 * @license   https://store.webkul.com/license.html
 */
namespace AHT\Eav\Model;

/**
 * Interface ConfigProviderInterface
 * @api
 */
interface ConfigProviderInterface
{

    /**
     * Retrieve assoc array of checkout configuration
     *
     * @return array
     */
    public function getConfig();
}