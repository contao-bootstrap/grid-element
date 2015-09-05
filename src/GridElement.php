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

use Netzmacht\Bootstrap\Grid\Factory;
use Netzmacht\Bootstrap\Grid\Walker;
use Netzmacht\Contao\ContentNode\NodeElement;

/**
 * The grid content element.
 *
 * @package Netzmacht\Contao\Bootstrap\GridElements\Element
 */
class GridElement extends NodeElement
{
    /**
     * The template name.
     *
     * @var string
     */
    protected $strTemplate = 'ce_bootstrap_grid';

    /**
     * Create the grid walker.
     *
     * @return Walker
     */
    protected function createGridWalker()
    {
        $factory = new Factory();
        $grid    = $factory->createById($this->bootstrap_grid);

        return new Walker($grid, false, (bool)$this->bootstrap_finite);
    }

    /**
     * Compile the grid.
     *
     * @return void
     */
    protected function compile()
    {
        parent::compile();

        $this->Template->walker = $this->createGridWalker();
    }
}
