<?php
    /**
     * Returns url route.
     */
    function getRoute():string {
        if (isset($_REQUEST['url'])){
            $url=$_REQUEST['url'];
        } else {
            $url='home';
        }
        switch($url){
            case 'login';
                return 'login';
            case 'register';
                return 'register';
            case 'to_do_list';
                return 'to_do_list';
            case 'login_action';
                return 'login_action';
            case 'register_action';
                return 'register_action';
            case 'to_do_list_action';
                return 'to_do_list_action';
            case 'logout_action';
                return 'logout_action';
            default:
                return 'home';

        }
    }