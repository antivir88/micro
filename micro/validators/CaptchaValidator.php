<?php /** MicroCaptchaValidator */

namespace Micro\validators;

use Micro\base\Registry;
use Micro\base\Validator;
use Micro\db\Model;

/**
 * CaptchaValidator class file.
 *
 * @author Oleg Lunegov <testuser@mail.linpax.org>
 * @link https://github.com/lugnsk/micro
 * @copyright Copyright &copy; 2013 Oleg Lunegov
 * @license /LICENSE
 * @package micro
 * @subpackage validators
 * @version 1.0
 * @since 1.0
 */
class CaptchaValidator extends Validator
{
    /** @var string $captcha compiled captcha */
    protected $captcha = '';


    /**
     * Constructor validator
     *
     * @access public
     * @global      Registry
     *
     * @param array $rule validation rule
     *
     * @result void
     */
    public function __construct(array $rule = [])
    {
        parent::__construct($rule);

        $this->captcha = Registry::get('user')->getCaptcha();
    }

    /**
     * Validate on server, make rule
     *
     * @access public
     * @global      Registry
     *
     * @param Model $model checked model
     *
     * @return bool
     */
    public function validate($model)
    {
        foreach ($this->elements AS $element) {
            if (!$model->checkAttributeExists($element)) {
                $this->errors[] = 'Parameter ' . $element . ' not defined in class ' . get_class($model);
                return false;
            }

            $convert = Registry::get('user')->makeCaptcha($model->$element);
            if ($convert !== $this->captcha) {
                return false;
            }
        }
        return true;
    }
}