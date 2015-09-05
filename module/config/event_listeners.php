<?php

/**
 * @package    contao-bootstrap
 * @author     David Molineus <david.molineus@netzmacht.de>
 * @copyright  2015 netzmacht creative David Molineus
 * @license    LGPL 3.0
 * @filesource
 *
 */

use Netzmacht\Bootstrap\Grid\Event\GetGridsEvent;

return array(
    GetGridsEvent::NAME => array(
        array('Netzmacht\Contao\Bootstrap\GridElement\Subscriber', 'getGrids')
    )
);
