<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class GotenbergApiService
{
    private $httpClient;
    private $gotenbergUrl;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
        $this->gotenbergUrl = 'http://localhost:3000/forms/chromium/convert/url';
    }

    public function callGotenbergApi($htmlContent)
    {
        
        $response = $this->httpClient->request('POST', $this->gotenbergUrl, [
            'headers' => [
                'Content-Type'=>'multipart/form-data'
            ],
            'body' => ['url'=> $htmlContent ],
                
            ],
        );

        $statusCode = $response->getStatusCode();
        // $statusCode = 200
      
        $contentType = $response->getHeaders()['content-type'][0];
        // $contentType = 'application/json'
        
	    $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        
      	//$content = $response->toArray();
        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]

        return $content;
    }
}