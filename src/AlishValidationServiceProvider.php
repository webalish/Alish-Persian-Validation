<?php

namespace Alishpersian\Validation;

use Illuminate\Support\ServiceProvider;
use Validator;
use App;

/**
 * @author Alish <git@alish.io>
 * @since April 11, 2021
 */
class AlishValidationServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    private $validationRules = [
        'alish_alpha'                 => 'Alpha',
        'alish_num'                   => 'Num',
        'alish_alpha_num'             => 'AlphaNum',
        'iran_mobile'                   => 'IranMobile',
        'sheba'                         => 'Sheba',
        'melli_code'                    => 'MelliCode',
        'is_not_persian'                => 'IsNotPersian',
        'limited_array'                 => 'LimitedArray',
        'unsigned_num'                  => 'UnSignedNum',
        'alpha_space'                   => 'AlphaSpace',
        'a_url'                         => 'Url',
        'a_domain'                      => 'Domain',
        'more'                          => 'More',
        'less'                          => 'Less',
        'iran_phone'                    => 'IranPhone',
        'iran_phone_with_area_code'     => 'IranPhoneWithAreaCode',
        'card_number'                   => 'CardNumber',
        'address'                       => 'Address',
        'iran_postal_code'              => 'IranPostalCode',
        'package_name'                  => 'PackageName',
    ];

    /**
     * create custom validation rules and messages
     * @author Alish <git@alish.io>
     * @since April 11, 2021
     * @return void
     */
    public function boot()
    {
        // publish lang file to resources/lang/validation
        $this->publishes([
            __DIR__ . '/../lang/' . App::getLocale() . '.php' => resource_path('lang/validation/' . App::getLocale() . '.php'),
        ]);

        foreach($this->validationRules as $name => $method)
        {
            Validator::extend($name, 'ValidationRules@'.$method);

            Validator::replacer($name, 'ValidationMessages@Msg');
        }

    }

    /**
     * register PersianValidation service
     * @author Alish <git@alish.io>
     * @since April 11, 2021
     * @return void
     */
    public function register()
    {
        $this->app->bind('ValidationRules', 'Alishpersian\Validation\ValidationRules');

        $this->app->bind('ValidationMessages', 'Alishpersian\Validation\ValidationMessages');

    }
}
