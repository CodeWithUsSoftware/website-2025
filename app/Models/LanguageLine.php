<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\TranslationLoader\LanguageLine As SpatieLanguageLine;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;

class LanguageLine extends Model
{
    protected $table = 'language_lines';

     public $translatable = ['text'];

     public $guarded = ['id'];

     protected $casts = ['text' => 'array'];

     public static function boot()
     {
         parent::boot();

         $flushGroupCache = function (self $languageLine) {
             $languageLine->flushGroupCache();
         };

         static::saved($flushGroupCache);
         static::deleted($flushGroupCache);
     }

     public static function getTranslationsForGroup(string $locale, string $group): array
     {

         return static::query()
                 ->where('group', $group)
                 ->get()
                 ->reduce(function ($lines, self $languageLine) use ($group, $locale) {
                     $translation = $languageLine->getTranslation($locale);

                     if ($translation !== null && $group === '*') {
                         // Make a flat array when returning json translations
                         $lines[$languageLine->key] = $translation;
                     } elseif ($translation !== null && $group !== '*') {
                         // Make a nested array when returning normal translations
                         Arr::set($lines, $languageLine->key, $translation);
                     }

                     return $lines;
                 }) ?? [];
     }

     public static function getCacheKey(string $group, string $locale): string
     {
         return "spatie.translation-loader.{$group}.{$locale}";
     }

     /**
      * @param string $locale
      *
      * @return string
      */
     public function getTranslation(string $locale): ?string
     {
         if (! isset($this->text[$locale])) {
             $fallback = config('app.fallback_locale');

             return $this->text[$fallback] ?? null;
         }

         return $this->text[$locale];
     }

     /**
      * @param string $locale
      * @param string $value
      *
      * @return $this
      */
     public function setTranslation(string $locale, string $value)
     {
         $this->text = array_merge($this->text ?? [], [$locale => $value]);

         return $this;
     }

     public function flushGroupCache()
     {
         foreach ($this->getTranslatedLocales() as $locale) {
             Cache::forget(static::getCacheKey($this->group, $locale));
         }
     }

     protected function getTranslatedLocales(): array
     {
         return array_keys($this->text);
     }
}
