<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \TANIOS\Airtable\Airtable;
use App\Models\Base;

class ReviewController extends Controller
{
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user, $record)
    {
        $base = Base::where('user_id', $user)->first();
        // If the base doesn't exist or doesn't include the correct params, show a "the user hasn't setup their account page"
        if(!$base || !$base->key || !$base->base_id)
        {
            return view('setuperror');
        }
        // Fetch the user's Airtable Base
        $airtable = new Airtable(array(
            'api_key' => $base->key,
            'base'    => $base->base_id
        ));
        $clients = $airtable->getContent('Clients');

        dd($clients);
        // Instantiate the user's setup
        // Get the specific review from the base and instantiate the variables.
        // Return a view with these variables.
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Fetch the user's Airtable Base
        // Create a new record in the reviews base
        // Determine if the review is great
        // If it's great, return a view asking them to post to google
        // If it's not great, return a view that just thanks them for their time and promises to do better.

    }

}
