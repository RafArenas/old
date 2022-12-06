<?php

class Redirect{    
    /**
     * to
     *
     * @param  mixed $route
     * @return void
     * @description redirect to route
     */
    public static function to($route) {
        return header("location: $route");
    }
}