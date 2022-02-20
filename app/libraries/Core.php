<?php 
	class Core {
		//if no other controllers exist, this page will be loaded automatically
		protected $currentController = 'Pages'; //by default
		protected $currentMethod = 'index'; //index method will be loaded inside pages folder

		protected $params = []; 
		//exp: we have mvcframework/shop/glasses/man and we want every word be inside this array (1 word per cell) that we called $params


		public function __construct() {
			$url = $this->getUrl();

			//looks in 'controllers' for the first value, ucwords will capitalize the first letter
			if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
				//will set a new controller instead of the default 'index'
				$this->currentController = ucwords($url[0]);
				unset($url[0]);
			}

			//now require the controller found
			require_once '../app/controllers/' . $this->currentController . '.php';
			$this->currentController  = new $this->currentController;

			//Check the 2nd part of the url (i.e. '1' in 'app/controllers/0/1')
			if(isset($url[1])) {
				if(method_exists($this->currentController, $url[1])) {
					$this->currentMethod = $url[1];
					unset($url[1]);
				}
			}

			//Get parameters of that url if they exist
			$this->params = $url ? array_values($url) : [];

			//Call a callback with array of those params (i.e call user defined funct with our params)
			//and params are arrays that user defined funct will work with
			call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
		}


		// gets the url in an array where every segment between '/' is in a separate cell
		public function getUrl() {
			if(isset($_GET['url'])) {
				$url = rtrim($_GET['url'], '/'); //get rid of last slash inside a link

				//allow filter vars as string/number
				$url = filter_var($url, FILTER_SANITIZE_URL); //prohibit chars that url shouldn't have

				//break url into array with '/' being a separator
				$url = explode('/', $url);

				return $url;
			}
		}
	}