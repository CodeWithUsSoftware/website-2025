<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolPage;
use Illuminate\Support\Facades\Http;

class SchoolPageController extends Controller
{
      public function allCountries(Request $request)
    {
        $country_names = SchoolPage::where('status','active')->orderBy('title')->where('slug','!=','united-states')->get();
        $united_state_page_data = SchoolPage::where('slug','united-states')->first();

        $p = array();
        if($united_state_page_data->rss)
        {
            try {
                $response = Http::get($united_state_page_data->rss);
                $feed = simplexml_load_string($response->body());

                for ($i = 0; $i < 10; $i++) {
                    $rss[$i] = $feed->channel->item[$i];
                }
                $p['rss_data'] = $rss;
            } catch (\Exception $e){}

        }

        $data = array(
            'country_names' => $country_names,
            'united_state_page_data' => $united_state_page_data,
            'rss_data' => $p
        );

        return view('computer-science-standards.united-states',compact('data'));

    }

    public function schoolPages($slug)
    {
        $school_pages = SchoolPage::where('slug',$slug)->where('status','active')->first() ?? null;
        $country_names = SchoolPage::where('status','active')->orderBy('title')->where('slug','!=','united-states')->get();
        // dd( $country_names);
        $p = array();

        if(!is_null($school_pages) && $school_pages->rss)
        {
            try {
                $response = Http::get($school_pages->rss);
                $feed = simplexml_load_string($response->body());

                for ($i = 0; $i < 10; $i++) {
                    $rss[$i] = $feed->channel->item[$i];
                }
                $p['rss_data'] = $rss;
            } catch (\Exception $e){}

        }else{
            return view('errors.404');
        }

        $data = array(
            'school_pages' => $school_pages,
            'country_names' => $country_names,
            'rss_data' => $p,
            'slug'=> $slug
        );

        //dd($data);

        return view('computer-science-standards.united-states.index',compact('data'));
    }
}
