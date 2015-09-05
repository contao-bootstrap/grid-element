<?php

/**
 * @package    contao-bootstrap
 * @author     David Molineus <david.molineus@netzmacht.de>
 * @copyright  2015 netzmacht creative David Molineus
 * @license    LGPL 3.0
 * @filesource
 *
 */

namespace Netzmacht\Contao\Bootstrap\GridElement;

use Netzmacht\Bootstrap\Grid\Event\GetGridsEvent;

/**
 * Class Subscriber.
 *
 * @package Netzmacht\Contao\Bootstrap\GridElement
 */
class Subscriber
{
    /**
     * Get the grid options.
     *
     * @param GetGridsEvent $event The event.
     *
     * @return void
     */
    public static function getGrids(GetGridsEvent $event)
    {
        if ($event->getModel() && $event->getModel()->type === 'bootstrap_grid') {
            $grids  = $event->getGrids();
            $query  = 'SELECT * FROM tl_columnset WHERE published=1 ORDER BY title';
            $result = \Database::getInstance()->query($query);

            while ($result->next()) {
                $grids[$result->columns][$result->id] = $result->title;
            }
        }
    }
}
