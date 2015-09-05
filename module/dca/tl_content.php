<?php

/**
 * @package    contao-bootstrap
 * @author     David Molineus <david.molineus@netzmacht.de>
 * @copyright  2015 netzmacht creative David Molineus
 * @license    LGPL 3.0
 * @filesource
 *
 */

/*
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_content']['metapalettes']['bootstrap_grid'] = array(
    'type'      => array('type', 'headline'),
    'grid'      => array('bootstrap_grid', 'bootstrap_infinite'),
    'template'  => array(':hide', 'customTpl'),
    'protected' => array(':hide', 'protected'),
    'expert'    => array(':hide', 'guests', 'cssID', 'space'),
    'invisible' => array(':hide', 'invisible', 'start', 'stop'),
);

/*
 * Fields
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['bootstrap_infinite'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['bootstrap_infinite'],
    'exclude'                 => true,
    'inputType'               => 'checkbox',
    'eval'                    => array('tl_class' => 'w50 m12'),
    'sql'                     => "char(1) NOT NULL default ''"
);
