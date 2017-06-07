<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* @property hlibs $hlibs */
class Auth extends CI_Controller {

	public function __construct()
	{
		// Constructor to auto-load hlibs
		parent::__construct();
		$this->load->library('Hlibs');
	}

	public function index()
	{
		// Send to the view all permitted services as a user profile if authenticated
		$login_data['providers'] = $this->hlibs->getProviders();
		foreach($login_data['providers'] as $provider=>$d) {
			if ($d['connected'] == 1) {
				$login_data['providers'][$provider]['user_profile'] = $this->hlibs->authenticate($provider)->getUserProfile();
			}
		}

		$this->load->view('login', $login_data);
	}

	public function login($provider)
	{
		log_message('debug', "controllers.Auth.login($provider) called");

		try
		{
			$this->load->library('Hlibs');

			if ($this->hlibs->providerEnabled($provider))
			{
				$service = $this->hlibs->authenticate($provider);

				if ($service->isUserConnected())
				{
					$data['providers'] = $this->hlibs->getProviders();
					foreach($data['providers'] as $provider=>$d) {
						if ($d['connected'] == 1) {
							$data['providers'][$provider]['user_profile'] = $this->hlibs->authenticate($provider)->getUserProfile();
						}
					}

					// $user_profile = $service->getUserProfile();
					// $data['user_profile'] = $user_profile;
					$this->load->view('home',$data);
					// redirect('auth/index');
				}
				else // Cannot authenticate user
				{
					show_error('Cannot authenticate user');
				}
			}
			else // This service is not enabled.
			{
				log_message('error', 'controllers.Auth.login: This provider is not enabled ('.$provider.')');
				show_404($_SERVER['REQUEST_URI']);
			}
		}
		catch(Exception $e)
		{
			$error = 'Unexpected error';
			switch($e->getCode())
			{
				case 0 : $error = 'Unspecified error.'; break;
				case 1 : $error = 'Hybriauth configuration error.'; break;
				case 2 : $error = 'Provider not properly configured.'; break;
				case 3 : $error = 'Unknown or disabled provider.'; break;
				case 4 : $error = 'Missing provider application credentials.'; break;
				case 5 : log_message('debug', 'controllers.Auth.login: Authentification failed. The user has canceled the authentication or the provider refused the connection.');
				         //redirect();
				         if (isset($service))
				         {
				         	log_message('debug', 'controllers.Auth.login: logging out from service.');
				         	$service->logout();
				         }
				         show_error('User has cancelled the authentication or the provider refused the connection.');
				         break;
				case 6 : $error = 'User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again.';
				         break;
				case 7 : $error = 'User not connected to the provider.';
				         break;
			}

			if (isset($service))
			{
				$service->logout();
			}

			log_message('error', 'controllers.Auth.login: '.$error);
			show_error('Error authenticating user.');
		}
	}

	public function endpoint()
	{

		log_message('debug', 'controllers.Auth.endpoint called.');
		log_message('info', 'controllers.Auth.endpoint: $_REQUEST: '.print_r($_REQUEST, TRUE));

		if ($_SERVER['REQUEST_METHOD'] === 'GET')
		{
			log_message('debug', 'controllers.Auth.endpoint: the request method is GET, copying REQUEST array into GET array.');
			$_GET = $_REQUEST;
		}

		log_message('debug', 'controllers.Auth.endpoint: loading the original HybridAuth endpoint script.');
		require_once APPPATH.'/third_party/hybridauth/index.php';

	}

	function logout(){
		$this->hlibs->logoutAllProviders();
		$this->session->sess_destroy();
		redirect('Auth');
	}
}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */
