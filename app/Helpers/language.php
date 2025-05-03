<?php

use App\Services\LanguageService;

if (!function_exists('trans')) {
    function trans($key, $lang = null)
    {
        if (is_null($lang)) {
            $lang = app()->getLocale();
        }

        $file = __DIR__ . '/../Lang/' . $lang . '/' . $key . '.php';

        if (file_exists($file)) {
            return require $file;
        }

        return null;
    }
    {

    }
}

//default_lang,current_lang,get_language_by_code,languages

function languages()
{
    return LanguageService::getInstance()->getLanguages();
}

function default_lang()
{
    return LanguageService::getInstance()->getDefaultLang();
}

function current_lang()
{
    return LanguageService::getInstance()->getCurentLang();
}

function get_language_by_code($code)
{
    return LanguageService::getInstance()->getLanguageByCode($code);
}
