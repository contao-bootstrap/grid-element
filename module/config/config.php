<?php

/**
 * @package    contao-bootstrap
 * @author     David Molineus <david.molineus@netzmacht.de>
 * @copyright  2015 netzmacht creative David Molineus
 * @license    LGPL 3.0
 * @filesource
 *
 */

$GLOBALS['TL_CTE']['nodes']['bootstrap_grid'] = 'Netzmacht\Contao\Bootstrap\GridElement\GridElement';
$GLOBALS['TL_CONTENT_NODE']['bootstrap_grid'] = array(
    'class' => 'Netzmacht\Contao\Bootstrap\GridElement\GridNode'
);

if (TL_MODE === 'BE') {
    $GLOBALS['TL_CSS'][] = 'system/modules/bootstrap-grid-element/assets/backend.css';
}
