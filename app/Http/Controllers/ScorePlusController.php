<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;

class ScorePlusController extends Controller
{

    /**
     * @throws GuzzleException
     */
    public function scorePlus(Request $request)
    {
        $json = new Client(
            [
                'base_uri' => 'https://splus.crazycarlyday.kiwigdc.fr/api/launchscoring',
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ]
            ]
        );



            $jsonData = [];
            foreach (User::all() as $user) {
                $ateliers = $user->demands2ateliers;
                if($ateliers->count() <= 0){
                    continue;
                }
                $orderPref = [];
                foreach ($ateliers->all() as $atelier) {
                    $orderPref[] = Theme::find($atelier->theme_id)->name;
                }
                $jsonData = [
                    'id' => $user->id,
                    'name' => $user->name,
                    'nbRequest' => $ateliers->count(),
                    'remaningRequest' => $ateliers->count(),
                    "orderPref" => $orderPref,
                ];
            }

        $json->request('POST', 'https://splus.crazycarlyday.kiwigdc.fr/api/launchscoring', [
            'body' => [
                $jsonData
            ]
        ]);

        return $this->respondJson(true, 'ScorePlus retrieved successfully', 200, $json);
    }

}
