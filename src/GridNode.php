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
use Netzmacht\Contao\ContentNode\Node\BaseNode;

class GridNode extends BaseNode
{
    /**
     * Grid walkers for the backend.
     *
     * @var Walker[]
     */
    private $walkers = array();

    /**
     * Get the grid walker.
     *
     * @param int $pid The parent id.
     *
     * @return Walker
     */
    private function getWalker($pid)
    {
        if (!isset($this->walkers[$pid])) {
            try {
                $parent  = \ContentModel::findByPk($pid);
                $factory = new Factory();
                $grid    = $factory->createById($parent->bootstrap_grid);

                $this->walkers[$pid] = new Walker($grid, true, (bool) $parent->bootstrap_infinite);;
            } catch (\Exception $e) {
                $this->walkers[$pid] = null;
            }
        }

        return $this->walkers[$pid];
    }

    /**
     * {@inheritDoc}
     */
    public function generateChildInBackendView(array $child, $generated)
    {
        $walker = $this->getWalker($child['pid']);

        if (!$walker) {
            return sprintf(
                '<div class="bootstrap-grid-meta invalid-grid">%s</div>',
                $this->getTranslator()->translate('bootstrap_grid_invalid', 'tl_content')
            ) . $generated;
        }

        $classes = $walker->walk();

        return sprintf('<div class="bootstrap-grid-meta">%s <span class="tl_gray">[%s]</span></div>',
            $this->getTranslator()->translate('bootstrap_grid_current', 'tl_content', [($walker->getIndex() + 1)]),
            $classes
        ) . $generated;
    }
}
