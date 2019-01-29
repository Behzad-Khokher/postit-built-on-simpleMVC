<?php
    class Pages extends Controller{
        public function __construct(){

        }

        public function index(){

            if(isLoggedIn()){
                redirect('posts');
            }
            $data =  [
                'title' => SITENAME,
                'description' => "Simple Social Network Built on SimpleMVC PHP Framework"
            ];



            $this->view('pages/index', $data);
        }

        public function about(){
            $data =  [
                'title' => 'About Us',
                'description' => 'App To Share Posts with other users in the communnity'
            ];
            $this->view('pages/about', $data);
        }

    }
