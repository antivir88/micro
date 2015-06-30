<?php /** MicroMenuWidget */

namespace Micro\widgets;

use Micro\mvc\Widget;
use Micro\wrappers\Html;

/**
 * MenuWidget class file.
 *
 * @author Oleg Lunegov <testuser@mail.linpax.org>
 * @link https://github.com/lugnsk/micro
 * @copyright Copyright &copy; 2013 Oleg Lunegov
 * @license /LICENSE
 * @package micro
 * @subpackage widgets
 * @version 1.0
 * @since 1.0
 *
 * @deprecated
 */
class MenuWidget extends Widget
{
    /** @var array $menu multiple menu array */
    public $menu = [];
    /** @var array $attributes attributes of menu */
    public $attributes = [];

    /**
     * Constructor for widget
     *
     * @access public
     *
     * @param array $items menu items
     * @param array $attributes menu attributes
     *
     * @result void
     */
    public function __construct(array $items = [], array $attributes = [])
    {
        parent::__construct();

        $this->menu = $items;
        $this->attributes = $attributes;
    }

    /**
     * Initialize widget
     *
     * @access public
     * @return void
     */
    public function init()
    {
    }

    /**
     * Running widget
     *
     * @access public
     * @return void
     */
    public function run()
    {
        echo Html::lists($this->menu, $this->attributes);
    }
}