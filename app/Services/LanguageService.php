<?php

namespace App\Services;


use App\Models\Language;
use Illuminate\Support\Collection;

class LanguageService
{
    protected static ?LanguageService $instance = null;
    protected ?Collection $languages = null;
    protected ?Language $currentLanguage = null;

    protected function __construct() {}

    public static function getInstance(): ?LanguageService
    {
        if (is_null(self::$instance)) {
            self::$instance = new LanguageService();
        }

        return self::$instance;
    }

    public function getLanguages()
    {
        if (empty($this->languages)) {
            $this->languages = Language::where('is_active', 1)->orderBy('id', 'asc')->get();
        }

        return $this->languages;
    }

    public function getCurentLang()
    {
        if (is_null($this->currentLanguage)) {
            $this->currentLanguage = $this->getLanguageByCode(
                code: app()->getLocale(),
            );
        }

        return $this->currentLanguage;
    }

    public function getLanguageByCode($code)
    {
        return $this->getLanguages()->where('code', $code)->first();
    }

    public function getDefaultLang()
    {
        return $this->getLanguages()->where('is_default', 1)->first() ?: $this->getLanguages()->first();
    }

    /*public static function __callStatic($name, $arguments)
    {
        return self::getInstance()->$name(...$arguments);
    }*/
}
