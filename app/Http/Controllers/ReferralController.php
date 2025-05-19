<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Referral;
use Illuminate\Support\Facades\Http;

class ReferralController extends Controller
{
    public function referralLink(Request $request, $code = null)
    {
        if($code != null){
            $referral = Referral::where('code', $code)
            ->with('images', 'tags')
            ->withCount('images')
            ->where('is_deleted', false)
            ->where('status', 'active')
            ->first();
        }else{
            $referral = Referral::where('code', $request->code)
            ->with('images', 'tags')
            ->withCount('images')
            ->where('is_deleted', false)
            ->where('status', 'active')
            ->first();
        }

        $referral ?: abort(404);

        $rss = [];
        if ($referral->rss) {
            try {
                $response = Http::get($referral->rss);
                $feed = simplexml_load_string($response->body());

                for ($i = 0; $i < 10; $i++) {
                    $rss[$i] = $feed->channel->item[$i];
                }
            } catch (\Exception $e) {
            }
        }

        $referral = [
            'referral' => $referral,
            'rss' => $rss
        ];

        return view('referral_link.index',compact('referral'));

    }

}
