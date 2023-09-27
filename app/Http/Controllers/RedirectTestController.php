<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Psr\Http\Message\ResponseInterface;
use Laravel\Dusk\Browser;

class RedirectTestController extends Controller
{
    public function performTest(Request $request){
        $url = $request->input('feedUrl');
        try {
            $response = Http::post(config('services.redirect-app.base_url') . "/redirect-history", [
                'url'=>$url,
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'error'=>'Something went wrong, try again !'
            ]);
        }
        $request->flash();
        if($response->successful()){
            $alert = "Our domain not found.";
            $redirects = $response->json();
            foreach ($redirects as $key => $redirect) {
                $url = $redirect['url'];
                if(strpos($url, env('ALERT_URL') && ($key > 0))){
                    $alert = "Our domain found.";
                }
                if(substr($url, -4) == ".png" || substr($url, -4) == ".ico" || substr($url, -4) == ".jpg" || substr($url, -5) == ".jpeg" || substr($url, -3) == ".js" || substr($url, -4) == ".css"){
                    unset($redirects[$key]);
                }
            }
            $redirects = array_values($redirects);
            $count = count($redirects);
            $result = null;
            if ($count > 0) {
                # code...
                $splitedString = explode('/', $redirects[count($redirects)-1]['url']);
                $result = $splitedString[0] . '//' . $splitedString[2];
            }
            return view('feeds.redirect-test', compact('count', 'result', 'redirects', 'alert'));
        } else {
            return redirect()->back()->with([
                'error'=>'Time-out , try again !'
            ]);
        }
    }

    public function search1(Request $request)
    {
        $url = $request->input('feedUrl');

        // Use Laravel HTTP client to make a request to the provided URL
        $response = Http::get($url);
        // dd($response);
        // Check if the request was successful
        if ($response->successful()) {
            $history = $response->history();
            $redirectCount = count($history);

            return $response; //view('redirect-test', compact('url', 'redirectCount', 'history'));
        } else {
            // Handle the case when the request was not successful
            return redirect()->back();
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search2(Request $request)
    {
        $url = $request->input('feedUrl');
        $handlerStack = HandlerStack::create();
        $redirects = [];

        $handlerStack->push(Middleware::history($redirects));

        $client = new Client(['handler' => $handlerStack]);

        $response = $client->get($url);

        // return $redirects;
        // dd($response);
        // Now, you can access the number of redirects and the history of redirects
        $redirectCount = count($redirects);
        return $redirectHistory = collect($redirects)->map(function ($transaction) {
            return [
                'url' => $transaction['request']->getUri()->__toString(),
                'status_code' => $transaction['response']->getStatusCode(),
            ];
        })->toArray();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function  search3(Request $request)
    {
        $url = $request->input('feedUrl');

        $redirectHistory = [];

        while ($url) {
            $client = new Client();
            return $response = $client->get($url, ['allow_redirects' => ['track_redirects' => true]]);

            $statusCode = $response->getStatusCode();

            if ($statusCode >= 300 && $statusCode < 400) {
                // Handle redirect
                $redirectHistory[] = $url;
                $url = $response->getHeaderLine('Location');
            } else {
                // No more redirects
                $url = null;
            }
        }

        // Show redirect history
        dd($redirectHistory);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // $url = 'https://fastsearch.link/1082?q=23423';
        $url = 'https://fastsearch.link/1082/?q=23423';

        // $url = 'https://bing.com/?q=23423';
        // $url='https://navigate.984pzuwjq9s8f4yag.online?q=23423&pid=4db30a61471254012c02e9808100c02d&n=2026';
        // $url = 'https://www.customboxesus.com/product/custom-apparel-boxes';
        $response = Http::withHeaders([
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36',
            'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
            'Accept-Language' => 'en-US,en;q=0.5',
        ])
        ->withOptions([
            'allow_redirects' => [
                'track_redirects' => true, // Enable tracking redirects
                'max_redirects' => 10
            ],
        ])->get($url);
        dd($response->headers());

        $ch = curl_init($url);

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

   $response = curl_exec($ch);
//    dd($response);
  dd(curl_getinfo($ch));
            // dd($response);
  return curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);

        // $curl = curl_init($url);
// curl_setopt($curl, CURLOPT_POSTFIELDS, "foo");
// curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
// curl_setopt($curl, CURLOPT_POST, true);
// curl_exec($curl);

        // $response = Http::withResponseMiddleware(
        //     function (ResponseInterface $response) {
        //         $header = $response->getHeader('X-Example');

        //         dd($response->getHeaders());

        //         return $response;
        //     }
        // )->get($url);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $redirects = [];
        return view("feeds.redirect-test", compact('redirects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
