<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandingPageCategory;
use App\Models\LandingPage;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class LandingPageController extends Controller
{
   public function getLandingPageCategory($category)
    {
        $landing_page_category = LandingPageCategory::where('slug', $category)
            ->where('is_deleted', 0)
            ->with(['created_by', 'updated_by', 'landing_pages'])
            ->first();

        if($landing_page_category)
        {
            return view('categories',compact('landing_page_category'));
        }
        else
        {
            return view('categories', ['message' => 'Page not found!']);
        }
            
    }

    public function getLandingPage($slug)
    {
        $client = new Client();
        $landing_page = LandingPage::where('slug', $slug)
            ->where('is_deleted',false)
            ->with(['created_by','updated_by', 'category'])
            ->first();

        if(!$landing_page)
        {
            return view('category-page',[ 'message' => 'Page not found!']);
        }

        if($landing_page->rss)
        {
           
            try {
                // $response = Http::get($landing_page->rss);
                // $feed = simplexml_load_string($response->body());
                // $rssResponse = Http::head($landing_page->rss);
                $response = $client->get($landing_page->rss);
                $xmlContent = $response->getBody()->getContents();
                $rss = simplexml_load_string($xmlContent);
               
                $items = [];
                for ($i = 0; $i < 10; $i++) {
                    $items[$i] = $rss->channel->item[$i];
                }
                // dd($items);
                $landing_page['rss_data'] = $items;
            } catch (\Exception $e){}

        }

        return view('category-page',compact('landing_page'));
      

    }


}
