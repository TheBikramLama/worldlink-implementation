<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Worldlink;

class SiteController extends Controller
{
    public function index() {
    	return view('home');
    }

    public function query( Request $request ) {
    	$data = $request->validate([
    		'username' => 'required'
    	], [
    		'username.required' => 'Please enter a Worldlink Username.'
    	]);

    	// Query Worldlink User
    	$worldlink = new Worldlink;
    	$response = $worldlink->query( $request->username );
    	// Check if the username is valid
    	if ( json_decode($response)->error ?? 0 == true ) {
    		return redirect()->route('home')->withErrors([
				'username' => json_decode($response)->message
			]);
    	}

    	return view('worldlink', compact('response', 'worldlink'));
    }
}
