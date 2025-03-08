<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use libphonenumber\PhoneNumberUtil;
use libphonenumber\NumberParseException;

class PhoneNumber implements ValidationRule
{
  /**
   * Run the validation rule.
   */
  public function validate(string $attribute, mixed $value, Closure $fail): void
  {
    $phoneUtil = PhoneNumberUtil::getInstance();

    try {
      $phoneNumber = $phoneUtil->parse($value);

      if (!$phoneUtil->isValidNumber($phoneNumber)) {
        $fail('The :attribute must be a valid phone number.');
        return;
      }

      // Check if the number belongs to one of our supported countries
      $supportedCountries = ['MW', 'ZA', 'ZM', 'ZW'];
      $region = $phoneUtil->getRegionCodeForNumber($phoneNumber);

      if (!in_array($region, $supportedCountries)) {
        $fail('The phone number must be from one of our supported countries (Malawi, South Africa, Zambia, or Zimbabwe).');
        return;
      }

    } catch (NumberParseException $e) {
      $fail('The :attribute must be a valid phone number.');
      return;
    }
  }
}
