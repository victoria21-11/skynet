<?php

    use App\Models\GlobalSetting;

    function globalSetting($name)
    {
        $globalSetting = GlobalSetting::ofName($name)->published()->first();
        if($globalSetting) {
            return $globalSetting->value;
        }
        return $globalSetting;
    }
