<?php
/**
 * Global helpers file with misc functions.
 */
if (!function_exists('gravatar')) {
    /**
     * Access the gravatar helper.
     *
     * @return \Creativeorange\Gravatar\Gravatar|\Illuminate\Foundation\Application|mixed
     */
    function gravatar()
    {
        return app('gravatar');
    }
}
if (!function_exists('to_js')) {
    /**
     * Access the javascript helper.
     */
    function to_js($key = null, $default = null)
    {
        if (is_null($key)) {
            return app('tojs');
        }
        if (is_array($key)) {
            return app('tojs')->put($key);
        }
        return app('tojs')->get($key, $default);
    }
}
if (!function_exists('meta')) {
    /**
     * Access the meta helper.
     */
    function meta()
    {
        return app('meta');
    }
}
if (!function_exists('meta_tag')) {
    /**
     * Access the meta tags helper.
     */
    function meta_tag($name = null, $content = null, $attributes = [])
    {
        return app('meta')->tag($name, $content, $attributes);
    }
}
if (!function_exists('meta_property')) {
    /**
     * Access the meta tags helper.
     */
    function meta_property($name = null, $content = null, $attributes = [])
    {
        return app('meta')->property($name, $content, $attributes);
    }
}
if (!function_exists('protection_context')) {
    /**
     * @return \NetLicensing\Context
     */
    function protection_context()
    {
        return app('netlicensing')->context();
    }
}
if (!function_exists('protection_context_basic_auth')) {
    /**
     * @return \NetLicensing\Context
     */
    function protection_context_basic_auth()
    {
        return app('netlicensing')->context(\NetLicensing\Context::BASIC_AUTHENTICATION);
    }
}
if (!function_exists('protection_context_api_key')) {
    /**
     * @return \NetLicensing\Context
     */
    function protection_context_api_key()
    {
        return app('netlicensing')->context(\NetLicensing\Context::APIKEY_IDENTIFICATION);
    }
}
if (!function_exists('protection_shop_token')) {
    /**
     * @param \App\Models\Auth\User\User $user
     * @param null $successUrl
     * @param null $cancelUrl
     * @param null $successUrlTitle
     * @param null $cancelUrlTitle
     * @return \App\Models\Protection\ProtectionShopToken
     */
    function protection_shop_token(\App\Models\Auth\User\User $user, $successUrl = null, $cancelUrl = null, $successUrlTitle = null, $cancelUrlTitle = null)
    {
        return app('netlicensing')->createShopToken($user, $successUrl, $cancelUrl, $successUrlTitle, $cancelUrlTitle);
    }
}
if (!function_exists('protection_validate')) {
    /**
     * @param \App\Models\Auth\User\User $user
     * @return \App\Models\Protection\ProtectionValidation
     */
    function protection_validate(\App\Models\Auth\User\User $user)
    {
        return app('netlicensing')->validate($user);
    }
}
if (!function_exists('invoice_number')) {
    /**
     * @return string
     */
    function invoice_number()
    {
        return sprintf(
            '#%s%s', 
            now()->format('ymd'),
            substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 3)
        );
    }
}

if (!function_exists('remove_specials_symbols')) {
    /**
     * @return string
     */
    function remove_specials_symbols($value)
    {
        $chars = array("\r\n", '\\n', '\\r', "\n", "\r", "\t", "\0", "\x0B");
        
        return str_replace($chars, "" , $value);
    }
}

if (!function_exists('get_global_delivery')) {
    /**
     * @return string
     */
    function get_global_delivery($weight)
    {
       switch(true) {
            case ($weight <= 13): return 38;
            case ($weight > 13   && $weight <= 26): return 52;
            case ($weight > 26   && $weight <= 39): return 90;
            case ($weight > 39   && $weight <= 65): return 450;
            case ($weight > 65   && $weight <= 80): return 482;
            case ($weight > 80   && $weight <= 110): return 600;
            case ($weight > 110   && $weight <= 130): return 650;
            case ($weight > 130  && $weight <= 260): return 800;
            case ($weight > 260  && $weight <= 390): return 900;
            case ($weight > 390  && $weight <= 650): return 1100;
            case ($weight > 650  && $weight <= 975): return 1200;
            case ($weight > 975  && $weight <= 1300): return 1300;
            case ($weight > 1300 && $weight <= 1950): return 1500;
            case ($weight > 1950 && $weight <= 2600): return 1700;
            case ($weight > 2600 && $weight <= 3900): return 1980;
            case ($weight > 3900 && $weight <= 6500): return 2250;
            case ($weight > 6500 && $weight <= 9100): return 2720;
            case ($weight > 9100 && $weight <= 11700): return 3200;
            case ($weight > 11700): return 3600;
            default: return 0;
        } 
    }
}