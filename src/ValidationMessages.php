<?php
namespace Alishpersian\Validation;

use App;

/**
 * @author Alish <git@alish.io>
 * @since April 11, 2021
 */
class ValidationMessages
{
	 /**
	  * @var string
	  */
	  protected $lang;

	  /**
	   * @var array
	   */
	   protected $config;

  	  /**
	   * @var array
	   */
	   protected static $messages;

	  /**
	   * @var array
	   */
	   protected static $app;

	  /**
	  * @author Alish <git@alish.io>
       * @since April 11, 2021
	   */
	 public function __construct() 
	 {
		 $this->lang = App::getLocale();

		if(! file_exists(resource_path('lang/validation/' . $this->lang . '.php'))){
            $this->config = include __DIR__ . '/../lang/' . $this->lang . '.php';
        } else {
            $this->config = include resource_path('lang/validation/' . $this->lang . '.php');
        }
	 }

	 /**
	  * set user custom messeages
	  * @param $validator
      * @author Alish <git@alish.io>
      * @since April 11, 2021
	  */
	 public static function setCustomMessages( $validator )
	 {	
	 	self::$app = include __DIR__ . '/Config.php';

	 	if ( $validator ) {
	 		if ( round(floatval(App::version()), 1) > self::$app['version'] ) {
	 			self::$messages = $validator->customMessages;
	 		} else {
	 			self::$messages = $validator->getCustomMessages();
	 		}
	 	}
	 }

	 /**
	  * get validations message
	  * @param $message
	  * @param $attribute
	  * @param $rule
      * @author Alish <git@alish.io>
      * @since April 11, 2021
	  * @return string
	  */
	 public function Msg($message, $attribute, $rule)
	 {
		if ( isset( self::$messages[$rule] ) ) {
	 		return str_replace($message, self::$messages[$rule], $message);
	 	}

		return str_replace($message, $this->config[ $rule ], $message);
	 }

}
