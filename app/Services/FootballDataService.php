<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

// This is a service to retrieve football data for the application from a 3rd party.
class FootballDataService {

    private string $apiKey;
    private string $baseUrl;

    public function __construct($apiKey, $baseUrl) {
        $this->apiKey = $apiKey;
        $this->baseUrl = $baseUrl;
    }

    // API only lets free plans query 2021 to 2023, cannot query the current season without a premium plan.
    public function getStandings(int $id, int $season) {
        $endpointUrl = $this->baseUrl.'standings';
        $response = Http::withHeaders(['x-rapidapi-key'=>$this->apiKey])->get($endpointUrl, [
            'league'=>$id,
            'season'=>$season,
        ]);

        $returnedData = $response->json();

        // Get the actual standings from the JSON received by the HTTP GET request to narrow it down further. 
        // Structure of the JSON obtained by dd() on the request
        $standings = $returnedData['response'][0]['league']['standings'][0];

        return $standings;
    }
}
