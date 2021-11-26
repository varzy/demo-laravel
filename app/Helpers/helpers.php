<?php

if (!function_exists('route_class')) {
    function route_class($separation = '_')
    {
        return str_replace('.', $separation, Route::currentRouteName());
    }
}
