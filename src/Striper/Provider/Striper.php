<?php

namespace Striper\Provider;
/**
 * Striper provider adapter based on OAuth2 protocol
 * 
 */
class Striper extends Hybrid_Provider_Model_OAuth2
{ 
	/**
	* IDp wrappers initializer 
	*/
	function initialize() 
	{
		parent::initialize();

		// Provider apis end-points
		$this->api->api_base_url  = "https://api.foursquare.com/v2/";
		$this->api->authorize_url = "https://foursquare.com/oauth2/authenticate";
		$this->api->token_url     = "https://foursquare.com/oauth2/access_token"; 

		$this->api->sign_token_name = "oauth_token";
	}

	/**
	* load the user profile from the IDp api client
	*/
	function getUserProfile()
	{
		$data = $this->api->api( "users/self", "GET", array( "v" => "20120401" ) ); 

		if ( ! isset( $data->response->user->id ) ){
			throw new Exception( "User profile request failed! {$this->providerId} returned an invalid response.", 6 );
		}

		$data = $data->response->user;

		$this->user->profile->identifier    = $data->id;
		$this->user->profile->firstName     = $data->firstName;
		$this->user->profile->lastName      = $data->lastName;
		$this->user->profile->displayName   = trim( $this->user->profile->firstName . " " . $this->user->profile->lastName );
		$this->user->profile->photoURL      = $data->photo;
		$this->user->profile->profileURL    = "https://www.foursquare.com/user/" . $data->id;
		$this->user->profile->gender        = $data->gender;
		$this->user->profile->city          = $data->homeCity;
		$this->user->profile->email         = $data->contact->email;
		$this->user->profile->emailVerified = $data->contact->email;

		return $this->user->profile;
	}
}
