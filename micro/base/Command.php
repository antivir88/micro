<?php /** MicroCommand */

namespace Micro\base;

/**
 * Command class file.
 *
 * @author Oleg Lunegov <testuser@mail.linpax.org>
 * @link https://github.com/lugnsk/micro
 * @copyright Copyright &copy; 2013 Oleg Lunegov
 * @license /LICENSE
 * @package micro
 * @version 1.0
 * @since 1.0
 * @abstract
 */
abstract class Command
{
    /** @var array $args arguments for command */
    public $args = [];
    /** @var bool $result status of execute command */
    public $result = false;
    /** @var string $message status message of execute command */
    public $message = '';
    /** @var Registry $container Container config */
    protected $container;


    /**
     * Set arguments class
     *
     * @access public
     *
     * @param array $params configuration array
     *
     * @result void
     */
    public function __construct(array $params)
    {
        $this->container = $params['container'];
        $this->args = $params['args'];
    }

    /**
     * Execute command
     * @abstract
     */
    public abstract function execute();
}