<?php

namespace App\Hellpers\RegionCode;

use libphonenumber\PhoneNumberUtil;

class Region
{
    public static function getCountryFromPhone($phone)
    {

        $phoneUtil = PhoneNumberUtil::getInstance();
        try {
            $phoneNumberObject = $phoneUtil->parse($phone, null);
            $countryCode = $phoneNumberObject->getCountryCode();
            $regionCode = $phoneUtil->getRegionCodeForCountryCode($countryCode);

            return $regionCode;
        } catch (\Exception $e) {

            return null;
        }
    }
}