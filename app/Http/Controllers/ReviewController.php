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
// Instantiate the user's setup
$setup = $airtable->getContent('Setup')->getResponse()['records'][0]->fields;
// Get the specific review from the base and instantiate the variables.
$clientparams =  array("filterByFormula" => "AND(RECORD_ID() = '{$record}')");
$client = $airtable->getContent('Clients', $clientparams)->getResponse()['records'][0]->fields;
$before_photo_exists = property_exists($client, "Before_photo" );
$after_photo_exists = property_exists($client, "After_photo" );
$logo_exists = property_exists($setup, "Logo" );


// Return a view with these variables.
return view('form2', [
'client' => $client,
'setup' => $setup,
'user' => $user,
'record' => $record,
'before' => $before_photo_exists,
'after' => $after_photo_exists,
'logo' => $logo_exists
]);
}
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request, $user, $record)
{
// Validate the request
$validated = $request->validate([
'review' => 'required | min:10 | max:255',
'star1' => 'required | numeric | min:1',
'star2' => 'required | numeric | min:1',
'star3' => 'required | numeric | min:1',
]);
// Fetch the user's Airtable Base
$base = Base::where('user_id', $user)->first();
$airtable = new Airtable(array(
'api_key' => $base->key,
'base'    => $base->base_id
));
// Instantiate the user's setup
$setup = $airtable->getContent('Setup')->getResponse()['records'][0]->fields;
$logo_exists = property_exists($setup, "Logo" );
// Create a new record in the reviews base
$new_review_details = array(
'Client'        => array($record),
'Rating_1'     => intval($request->star1),
'Rating_2'     => intval($request->star2),
'Rating_3'     => intval($request->star3),
'Review' => $request->review
);
$new_review = $airtable->saveContent("Reviews", $new_review_details);

// Determine if the review is great
$average_reviews = (intval($request->star1) + intval($request->star2) + intval($request->star3))/ 3;

// If it's great, return a view asking them to post to google
if($average_reviews >= 4.5)
{
return view('greatreview', [
'setup' => $setup,
'review' => $request->review,
'logo' =>$logo_exists
]);
}
// If it's not great, return a view that just thanks them for their time and promises to do better.
if($average_reviews < 4.5)
{
return view('badreview', [
'setup' => $setup,
'logo' => $logo_exists
]);
}
}
}