<?php

namespace Aaran\Aadmin\Src;

class Customise
{
    public static function enabled(string $feature): bool
    {

        return match (config('aadmin.app_code')) {


            config('software.DEVELOPER') => in_array($feature, config('developer.customise', [])),

        };
    }

    #region[Common]
    public static function hasCommon(): bool
    {
        return static::enabled(static::common());
    }

    public static function common(): string
    {
        return 'common';
    }
    #endregion

}
