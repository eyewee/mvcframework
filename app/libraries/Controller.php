<?php 
	//Load the model and view
	class Controller {
		public function model($model) {
			require_once '../app/models/' . $model . '.php';
			//instantiate model found
			return new $model();
		}

		//Load the view (check if exist also) to render final result of any page
		public function view($view, $data = []) {
			if (file_exists('../app/views/' . $view . '.php')) {
				require_once '../app/views/' . $view . '.php';
			} else {
				die("View doesn't exist.");
			}
		}
	}