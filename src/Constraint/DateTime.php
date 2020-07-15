<?php

namespace DealNews\Constraints\Constraint;

use DealNews\Constraints\Constraint;
use DealNews\Constraints\Interfaces\ConstraintInterface;

/**
 * DateTime Filter
 *
 * Converts any valid datetime string into a formatted datetime string
 *
 * @author      Brian Moon <brianm@dealnews.com>
 * @copyright   1997-Present DealNews.com, Inc
 * @package     Constraints
 */
class DateTime extends AbstractConstraint implements ConstraintInterface {
    const DESCRIPTION = 'A value describing an absolute or relative date and time';

    const EXAMPLE = "'2018-07-21T01:21:58-05:00', Sat, 21 Jul 2018 01:22:01 -0500', 2018-07-21 01:22:07', 'July 21, 2018 1:23am', 'now', '-2 hours'";

    const PRIMITIVE = 'string';

    /**
     * Filter function for this abstract type
     *
     * @param  mixed      $value      Value to filter
     * @param  array      $constraint Constraint array
     * @param  Constraint $dc         Constraint class
     *
     * @return string
     *
     * @suppress PhanUnusedPublicMethodParameter
     */
    public static function filter($value, array $constraint, Constraint $dc) {
        $ts = strtotime($value);
        if ($ts === false || $ts <= 0) {
            $value = null;
        } else {
            $value = date('Y-m-d H:i:s', $ts);
        }

        return $value;
    }
}
