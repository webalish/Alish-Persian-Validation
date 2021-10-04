<?php

use Alishpersian\Validation\ValidationRules as ValidationRules;

/**
 * unit test class
 * @author Alish <git@alish.io>
 * @since April 11, 2021
 */
class AlishValidationTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @var null
	 */
    protected $attribute;

	/**
	 * @var string
	 */
    protected $value;

	/**
	 * @var array
	 */
    protected $parameters;

    /**
     * @var null
     */
    protected $validator;

	/**
     * @var object
	 */
	protected $PersianValidation;

	/**
	 * create instance of ValidationRules class
     * @author Alish <git@alish.io>
     * @since April 11, 2021
	 * @return void
	 */
    public function __construct() 
    {
        $this->PersianValidation = new ValidationRules();
    }

    /**
     * unit test of persian alphabet
     * @author Alish <git@alish.io>
     * @since April 11, 2021
     * @return void
     */
    public function testAlpha()
    {

        $this->value = "Mahboub Hosseinzadeh";

        $this->assertEquals(false, $this->PersianValidation->Alpha($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "محبوب";

        $this->assertEquals(true, $this->PersianValidation->Alpha($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value =  "1111 محبوب";

        $this->assertEquals(false, $this->PersianValidation->Alpha($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "محبوب حسین زاده";

        $this->assertEquals(true, $this->PersianValidation->Alpha($this->attribute, $this->value, $this->parameters, $this->validator));
	    
	    $this->value = "وَحِیُدّ‌الٍمٌاًسی";

        $this->assertEquals(true, $this->PersianValidation->Alpha($this->attribute, $this->value, $this->parameters, $this->validator));

    }

    /**
     * unit test of persian number
     * @author Alish <git@alish.io>
     * @since April 11, 2021
     * @return void
     */
    public function testNum()
    {

        $this->value = "1234";

        $this->assertEquals(false, $this->PersianValidation->Num($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "۱۲۳۴";

        $this->assertEquals(true, $this->PersianValidation->Num($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value =  "۱۲۳123";

        $this->assertEquals(false, $this->PersianValidation->Num($this->attribute, $this->value, $this->parameters, $this->validator));

    }

    /**
     * unit test of persian alphabet and number
     * @author Alish <git@alish.io>
     * @since April 11, 2021
     * @return void
     */
    public function testAlpha_Num()
    {

        $this->value = "Hassan1234";

        $this->assertEquals(false, $this->PersianValidation->AlphaNum($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "1111حسن";

        $this->assertEquals(false, $this->PersianValidation->AlphaNum($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value =  "1111محمد زاده۱۲۳۴";

        $this->assertEquals(false, $this->PersianValidation->AlphaNum($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value =  "حسن";

        $this->assertEquals(true, $this->PersianValidation->AlphaNum($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value =  "۱۲۳۴";

        $this->assertEquals(true, $this->PersianValidation->AlphaNum($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value =  "Hassan۱۲۳۴حسن";

        $this->assertEquals(false, $this->PersianValidation->AlphaNum($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value =  "۱۲۳۴ حسن";

        $this->assertEquals(true, $this->PersianValidation->AlphaNum($this->attribute, $this->value, $this->parameters, $this->validator));
	
	    $this->value = "";
	    
	    $this->assertEquals(true, $this->PersianValidation->AlphaNum($this->attribute, $this->value, $this->parameters, $this->validator));

    }

    /**
     * unit test of iran mobile number
     * @author Alish <git@alish.io>
     * @since April 11, 2021
     * @return void
     */
    public function testIranMobile()
    {

        $this->value = "+989030264300";

        $this->assertEquals(true, $this->PersianValidation->IranMobile($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "989030264300";

        $this->assertEquals(true, $this->PersianValidation->IranMobile($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "00989030264300";

        $this->assertEquals(true, $this->PersianValidation->IranMobile($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "09030264300";

        $this->assertEquals(true, $this->PersianValidation->IranMobile($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "09142766601";

        $this->assertEquals(true, $this->PersianValidation->IranMobile($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "9142766601";

        $this->assertEquals(true, $this->PersianValidation->IranMobile($this->attribute, $this->value, $this->parameters, $this->validator));

    }

    /**
     * unit test of sheba number
     * @author Alish <git@alish.io>
     * @since April 11, 2021
     * @return void
     */
    public function testSheba()
    {

        $this->value = "IR062960000000100854200001";

        $this->assertEquals(true, $this->PersianValidation->Sheba($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "IR06296000000010096420000";

        $this->assertEquals(false, $this->PersianValidation->Sheba($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "00062960000000100024200001";

        $this->assertEquals(false, $this->PersianValidation->Sheba($this->attribute, $this->value, $this->parameters, $this->validator));

    }

    /**
     * unit test of melli code number
     * @author Alish <git@alish.io>
     * @since April 11, 2021
     * @return void
     */
    public function testMelliCode()
    {
        $this->value = "0013542414";

        $this->assertEquals(true, $this->PersianValidation->MelliCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "3240175801";

        $this->assertEquals(true, $this->PersianValidation->MelliCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "3240164170";

        $this->assertEquals(true, $this->PersianValidation->MelliCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "3370075023";

        $this->assertEquals(true, $this->PersianValidation->MelliCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "0010532121";

        $this->assertEquals(true, $this->PersianValidation->MelliCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "0860170473";

        $this->assertEquals(true, $this->PersianValidation->MelliCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "324411122";

        $this->assertEquals(false, $this->PersianValidation->MelliCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "3215213";

        $this->assertEquals(false, $this->PersianValidation->MelliCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "0000000000";

        $this->assertEquals(false, $this->PersianValidation->MelliCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "1111111111";

        $this->assertEquals(false, $this->PersianValidation->MelliCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "2222222222";

        $this->assertEquals(false, $this->PersianValidation->MelliCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "3333333333";

        $this->assertEquals(false, $this->PersianValidation->MelliCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "4444444444";

        $this->assertEquals(false, $this->PersianValidation->MelliCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "5555555555";

        $this->assertEquals(false, $this->PersianValidation->MelliCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "6666666666";

        $this->assertEquals(false, $this->PersianValidation->MelliCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "7777777777";

        $this->assertEquals(false, $this->PersianValidation->MelliCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "8888888888";

        $this->assertEquals(false, $this->PersianValidation->MelliCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "9999999999";

        $this->assertEquals(false, $this->PersianValidation->MelliCode($this->attribute, $this->value, $this->parameters, $this->validator));

    }

    /**
     * unit test of not persian alphabet and number
     * @author Alish <git@alish.io>
     * @since April 11, 2021
     * @return void
     */
    public function testIsNotPersian()
    {

      $this->value = "محبوب۱۲۳۴";

      $this->assertEquals(false, $this->PersianValidation->IsNotPersian($this->attribute, $this->value, $this->parameters, $this->validator));

      $this->value = "Mahboub";

      $this->assertEquals(true, $this->PersianValidation->IsNotPersian($this->attribute, $this->value, $this->parameters, $this->validator));

      $this->value = "Mahboubمحبوب۱۲۳۴";

      $this->assertEquals(false, $this->PersianValidation->IsNotPersian($this->attribute, $this->value, $this->parameters, $this->validator));

      $this->value = "Mahboubw3289834(!!!%$$(@_)_)_";

      $this->assertEquals(true, $this->PersianValidation->IsNotPersian($this->attribute, $this->value, $this->parameters, $this->validator));

      $this->value = 1213131313131;

      $this->assertEquals(false, $this->PersianValidation->IsNotPersian($this->attribute, $this->value, $this->parameters, $this->validator));

      $this->value = ["Mahboub"];

      $this->assertEquals(false, $this->PersianValidation->IsNotPersian($this->attribute, $this->value, $this->parameters, $this->validator));

    }

    /**
     * unit test of check array with custom array count
     * @author Alish <git@alish.io>
     * @since April 11, 2021
     * @return void
     */
    public function testLimitedArray()
    {
        $this->value = [];

        $this->assertEquals(true, $this->PersianValidation->LimitedArray($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = [];
        $this->parameters[0] = 1;

        $this->assertEquals(true, $this->PersianValidation->LimitedArray($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = ["a"];
        $this->parameters[0] = 2;

        $this->assertEquals(true, $this->PersianValidation->LimitedArray($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = ["a", "b"];
        $this->parameters[0] = 2;

        $this->assertEquals(true, $this->PersianValidation->LimitedArray($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = ["a", "b", "c"];
        $this->parameters[0] = 2;

        $this->assertEquals(false, $this->PersianValidation->LimitedArray($this->attribute, $this->value, $this->parameters, $this->validator));

    }

    /**
     * unit test of unsigned number
     * @author Alish <git@alish.io>
     * @since April 11, 2021
     * @return void
     */
    public function testUnSignedNum()
    {

        $this->value = 11;

        $this->assertEquals(true, $this->PersianValidation->UnSignedNum($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = -11;

        $this->assertEquals(false, $this->PersianValidation->UnSignedNum($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = 11.22;

        $this->assertEquals(false, $this->PersianValidation->UnSignedNum($this->attribute, $this->value, $this->parameters, $this->validator));

    }

    /**
     * unit test of alpha space
     * @author Alish <git@alish.io>
     * @since April 11, 2021
     * @return void
     */
    public function testAlphaSpace()
    {

        $this->value = "Mahboub Hosseinzadeh";

        $this->assertEquals(true, $this->PersianValidation->AlphaSpace($this->attribute, $this->value, $this->parameters, $this->validator, $this->parameters, $this->validator));

        $this->value = "Mahboub 121";

        $this->assertEquals(false, $this->PersianValidation->AlphaSpace($this->attribute, $this->value, $this->parameters, $this->validator, $this->parameters, $this->validator));
	    
	    $this->value = "وَحِیُدّ‌الٍمٌاًسی";
	    
	    $this->assertEquals(true, $this->PersianValidation->AlphaSpace($this->attribute, $this->value, $this->parameters, $this->validator, $this->parameters, $this->validator));

    }

    /**
     * unit test of url
     * @author Mahboub Hosseinzadeh <git@alish.io>
     * @since Agu 17, 2016
     * @return void
     */
    public function testUrl()
    {

        $this->value = "http://hello.com";

        $this->assertEquals(true, $this->PersianValidation->Url($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "http/df;fdl";

        $this->assertEquals(false, $this->PersianValidation->Url($this->attribute, $this->value, $this->parameters, $this->validator));

    }

    /**
     * unit test of domain
     * @author Mahboub Hosseinzadeh <git@alish.io>
     * @since Agu 17, 2016
     * @return void
     */
    public function testDomain()
    {

        $this->value = "www.adele.com";

        $this->assertEquals(true, $this->PersianValidation->Domain($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "xn--pgba0a.com";

        $this->assertEquals(true, $this->PersianValidation->Domain($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "alish.co.ir";

        $this->assertEquals(true, $this->PersianValidation->Domain($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "dshgf---df.w";

        $this->assertEquals(false, $this->PersianValidation->Domain($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "www.ad#le.com";

        $this->assertEquals(false, $this->PersianValidation->Domain($this->attribute, $this->value, $this->parameters, $this->validator));
        
        $this->value = "www.adele.co,m";

        $this->assertEquals(false, $this->PersianValidation->Domain($this->attribute, $this->value, $this->parameters, $this->validator));

    }

    /**
     * unit test of more
     * @author Mahboub Hosseinzadeh <git@alish.io>
     * @since Agu 24, 2016
     * @return void
     */
    public function testMore()
    {

        $this->value = 10;

        $this->parameters[0] = 9;

        $this->assertEquals(true, $this->PersianValidation->More($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->parameters[0] = 11;

        $this->assertEquals(false, $this->PersianValidation->More($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->parameters[0] = 10;

        $this->assertEquals(false, $this->PersianValidation->More($this->attribute, $this->value, $this->parameters, $this->validator));

    }

    /**
     * unit test of less
     * @author Mahboub Hosseinzadeh <git@alish.io>
     * @since Agu 24, 2016
     * @return void
     */
    public function testLess()
    {

        $this->value = 10;

        $this->parameters[0] = 11;

        $this->assertEquals(true, $this->PersianValidation->Less($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->parameters[0] = 9;

        $this->assertEquals(false, $this->PersianValidation->Less($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->parameters[0] = 10;

        $this->assertEquals(false, $this->PersianValidation->Less($this->attribute, $this->value, $this->parameters, $this->validator));

    }

    /**
     * unit test of iran phone number
     * @author Mahboub Hosseinzadeh <git@alish.io>
     * @since Agu 24, 2016
     * @return void
     */
    public function testIranPhone()
    {

        $this->value = '07236445';

        $this->assertEquals(false, $this->PersianValidation->IranPhone($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = '7236445';

        $this->assertEquals(false, $this->PersianValidation->IranPhone($this->attribute, $this->value, $this->parameters, $this->validator));

		$this->value = '17236445';

		$this->assertEquals(false, $this->PersianValidation->IranPhone($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = '37236445';

        $this->assertEquals(true, $this->PersianValidation->IranPhone($this->attribute, $this->value, $this->parameters, $this->validator));

    }

    /**
     * unit test of iran phone number with the area code
     * @author Alish <git@alish.io>
     * @since April 11, 2021
     * @return void
     */
    public function testIranPhoneWithAreaCode()
    {

        $this->value = '07236445';

        $this->assertEquals(false, $this->PersianValidation->IranPhoneWithAreaCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = '7236445';

        $this->assertEquals(false, $this->PersianValidation->IranPhoneWithAreaCode($this->attribute, $this->value, $this->parameters, $this->validator));

		$this->value = '17236445';

		$this->assertEquals(false, $this->PersianValidation->IranPhoneWithAreaCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = '37236445';

        $this->assertEquals(false, $this->PersianValidation->IranPhoneWithAreaCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = '02137236445';

        $this->assertEquals(true, $this->PersianValidation->IranPhoneWithAreaCode($this->attribute, $this->value, $this->parameters, $this->validator));

    }

    /**
     * unit test of payment card number
     * @author Alish <git@alish.io>
     * @since April 11, 2021
     * @return void
     */
    public function testCardNumber()
    {
        $this->value = '6274-1290-0547-3742';

        $this->assertEquals(false, $this->PersianValidation->CardNumber($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = '6274129107473842';

        $this->assertEquals(false, $this->PersianValidation->CardNumber($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = '6274 1290 0547 3742';

        $this->assertEquals(false, $this->PersianValidation->CardNumber($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = '627412900742';

        $this->assertEquals(false, $this->PersianValidation->CardNumber($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = '62741290054737423252';

        $this->assertEquals(false, $this->PersianValidation->CardNumber($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = '6274129005473742';

        $this->assertEquals(true, $this->PersianValidation->CardNumber($this->attribute, $this->value, $this->parameters, $this->validator));
    }

	/**
	 * unit test of alpha and special characters
	 * @author Mahboub Hosseinzadeh <git@alish.io>
	 * @since May 7, 2021
	 * @return void
	 */
	public function testAdress()
	{

		$this->value = "Iran, Khoy - Valiasr";

		$this->assertEquals(true, $this->PersianValidation->Address($this->attribute, $this->value, $this->parameters, $this->validator));

		$this->value = "ایران، خوی - ولیعصر";

		$this->assertEquals(true, $this->PersianValidation->Address($this->attribute, $this->value, $this->parameters, $this->validator));

		$this->value = "Iran / Khoy / delshad / 16";

		$this->assertEquals(true, $this->PersianValidation->Address($this->attribute, $this->value, $this->parameters, $this->validator));

		$this->value = "ایران \ خوی \ ولیعصر \ ۶";

		$this->assertEquals(true, $this->PersianValidation->Address($this->attribute, $this->value, $this->parameters, $this->validator));

		$this->value = "Iran, Khoy & Delshad";

		$this->assertEquals(false, $this->PersianValidation->Address($this->attribute, $this->value, $this->parameters, $this->validator));

	}

    /**
     * unit test of iran postal code
     * @author Mahboub Hosseinzadeh <git@alish.io>
     * @since Apr 5, 2017
     * @return void
     */
    public function testIranPostalCode()
    {

        $this->value = "1619735744";

        $this->assertEquals(true, $this->PersianValidation->IranPostalCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "16197-35744";

        $this->assertEquals(true, $this->PersianValidation->IranPostalCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "116197-35744";

        $this->assertEquals(false, $this->PersianValidation->IranPostalCode($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "11619735744";

        $this->assertEquals(false, $this->PersianValidation->IranPostalCode($this->attribute, $this->value, $this->parameters, $this->validator));

    }


    /**
     * unit test of apk packge name
     * @author Mahboub Hosseinzadeh <git@alish.io>
     * @since May 31, 2017
     * @return void
     */
    public function testPackageName()
    {

        $this->value = "com.adele";

        $this->assertEquals(true, $this->PersianValidation->PackageName($this->attribute, $this->value, $this->parameters, $this->validator));

         $this->value = "com.adele.adele";

        $this->assertEquals(true, $this->PersianValidation->PackageName($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "com.";

        $this->assertEquals(false, $this->PersianValidation->PackageName($this->attribute, $this->value, $this->parameters, $this->validator));

        $this->value = "com.adele.";

        $this->assertEquals(false, $this->PersianValidation->PackageName($this->attribute, $this->value, $this->parameters, $this->validator));

    }

}
