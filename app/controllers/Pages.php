<?php 
	// controllers/Pages.php extends libraries/Controller.php
	class Pages extends Controller {
		public function __construct() {
			//echo "Pages loaded";

			//instantiating 'User' model
			$this->userModel = $this->model('User');
		}

		// every page in 'views' will have it's own method to render the page
		public function index() { 

			$users = $this->userModel->getUsers();
			$data = [
				'title' => 'Home Page',
				'users' => $users
			]; // <-- this variable is used in pages/index.php

			//first level, i.e. what will be done by default
			//by default, we call 'view' method inside the Controller.php 
			$this->view('pages/index', $data);
		}

		public function about() { 
			//second level
			//echo "About";
			$this->view('pages/about');
		}
	}	