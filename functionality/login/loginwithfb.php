<?php
/*	FACEBOOK LOGIN BASIC - PHP SDK V4.0
 *	file 			- index.php
 * 	Developer 		- Krishna Teja G S
 *	Website			- http://packetcode.com/apps/fblogin-basic/
 *	Date 			- 27th Sept 2014
 *	license			- GNU General Public License version 2 or later
*/

/* INCLUSION OF LIBRARY FILEs*/
    echo "<link href='../../css/app.css' rel='stylesheet' />";
	require_once( '../../lib/Facebook/FacebookSession.php');
	require_once( '../../lib/Facebook/FacebookRequest.php' );
	require_once( '../../lib/Facebook/FacebookResponse.php' );
	require_once( '../../lib/Facebook/FacebookSDKException.php' );
	require_once( '../../lib/Facebook/FacebookRequestException.php' );
	require_once( '../../lib/Facebook/FacebookRedirectLoginHelper.php');
	require_once( '../../lib/Facebook/FacebookAuthorizationException.php' );
	require_once( '../../lib/Facebook/GraphObject.php' );
	require_once( '../../lib/Facebook/GraphUser.php' );
	require_once( '../../lib/Facebook/GraphSessionInfo.php' );
	require_once( '../../lib/Facebook/Entities/AccessToken.php');
	require_once( '../../lib/Facebook/HttpClients/FacebookCurl.php' );
	require_once( '../../lib/Facebook/HttpClients/FacebookHttpable.php');
	require_once( '../../lib/Facebook/HttpClients/FacebookCurlHttpClient.php');

/* USE NAMESPACES */
	
	use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;
	use Facebook\FacebookRequest;
	use Facebook\FacebookResponse;
	use Facebook\FacebookSDKException;
	use Facebook\FacebookRequestException;
	use Facebook\FacebookAuthorizationException;
	use Facebook\GraphObject;
	use Facebook\GraphUser;
	use Facebook\GraphSessionInfo;
	use Facebook\FacebookHttpable;
	use Facebook\FacebookCurlHttpClient;
	use Facebook\FacebookCurl;

/*PROCESS*/
	
	//1.Stat Session
	 session_start();
	 
	 if(isset($_REQUEST['logout'])) {
	 unset($_SESSION['fb_token']);
	 }
	//2.Use app id,secret and redirect url
	 $app_id = '583542278435832';
	 $app_secret = '245318541b5460d215ac294bebb128c8';
	 $redirect_url='http://jyotirmaysenapati.com/functionality/login/loginwithfb.php';
	 
	 //3.Initialize application, create helper object and get fb sess
	 FacebookSession::setDefaultApplication($app_id,$app_secret);
	 $helper = new FacebookRedirectLoginHelper($redirect_url);
	 $sess = $helper->getSessionFromRedirect();

	 if(isset($_SESSION['fb_token'])) {
	 $sess = new facebookSession($_SESSION['fb_token']);
	 }
	 
	 $logout = 'http://jyotirmaysenapati.com/functionality/login/loginwithfb.php?logout=true';
	//4. if fb sess exists echo name 
	 	if(isset($sess)){
	 		//create request object,execute and capture response
			$_SESSION['fb_token'] = $sess->getToken();
		$request = new FacebookRequest($sess, 'GET', '/me');
		// from response get graph object
		$response = $request->execute();
		$graph = $response->getGraphObject(GraphUser::className());
		// use graph object methods to get user details
		$name= $graph->getName();
		$id = $graph->getId();
		$profilepic = 'https://graph.facebook.com/'.$id.'/picture?width = 300';
		$email = $graph->getProperty('email');
		echo 'your email is '. $email .'<br> <br>';
		echo "<img src='$profilepic'><br><br>";
		echo "hi $name";
		echo '<a href = '.$logout.'><button>LogOut</button></a>';
	}else{
		//else echo login
		echo '<a href ='.$helper->getLoginUrl(array('email')).' ><img class = "fbloginimg" src = "../../images/fblogin.png" /></a> ';
	}

