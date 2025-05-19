<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LanguageLine;

class LanguageLineController extends Controller
{
     public function get()
    {
        $allWebsiteStrings = LanguageLine::all();
        $groups = array();

        foreach($allWebsiteStrings as $websiteString)
        {
            array_push($groups, $websiteString->group);
        }

        $groups = array_unique($groups);

        $localizedStrings = array();

        foreach($groups as $group)
        {
            $data = array();
            $stringsOfTheGroup = LanguageLine::where('group',$group)->get();
            foreach($stringsOfTheGroup as $stringOfTheGroup){
                $textLocales = $stringOfTheGroup->text;
                foreach($textLocales as $key => $value){
                    $data[$stringOfTheGroup->key] =  stripslashes($value);
                }
            }

            $localizedStrings[$group] = $data;
        }

         return $localizedStrings;
    }
}
