<?php

use Jenssegers\Blade\Blade;

function view($filename, $data = []) {
    $blade = new Blade(VIEW_FOLDER, APP. 'cache');
    return $blade->make($filename, $data);
}