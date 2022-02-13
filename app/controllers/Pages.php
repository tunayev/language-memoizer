<?php

class Pages extends Controller {
    public function __construct() {

    }

    public function index() {
        if(isLoggedIn()) {
            redirect('vocabs');
        }
        $data = [
            'title' => 'Share Posts',
            'description' => 'Simple app for users sharing posts'
        ];
        $this->view('pages/index', $data);
    
    }
    public function about() {
        $data = [
            'title' => 'About',
            'description' => 'Developed for learning purposes.'

        ];
        $this->view('pages/about', $data);
    }
    public function contact() {
    $data = [
        'title' => 'Contact',
    ];
    $this->view('pages/contact', $data);
}
}