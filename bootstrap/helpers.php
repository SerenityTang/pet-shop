<?php

function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}

function sld_prefix($type)
{
    $url = \Illuminate\Support\Facades\URL::current();
    $delimiter1 = explode('//', $url);
    $delimiter2 = explode('.', $url);
    return str_replace($delimiter2[0], $delimiter1[0] . '//' . $type, $url);
}