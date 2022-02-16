<?php 
	class Pages extends Controller {
		public function __construct() {
			//echo "Pages loaded";
			//instantiating 'User' model
			$this->userModel = $this->model('User');
		}

		public function index() { 

			$users = $this->userModel->getUsers();
			$data = [
				'title' => 'Home Page',
				'users' => $users
			];
			//first level, i.e. what will be done by default
			//by default, we call view method inside the controller 
			$this->view('pages/index', $data);
		}

		public function about() { //second level
			//echo "About";
			$this->view('pages/about');
		}
	}	