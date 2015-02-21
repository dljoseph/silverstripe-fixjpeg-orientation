<?php

if(!defined('FIXJPEG_ORIENTATION_MODULE_DIR')) {
    define('FIXJPEG_ORIENTATION_MODULE_DIR', 'fixjpeg-orientation');

    if (basename(__DIR__) != FIXJPEG_ORIENTATION_MODULE_DIR) {
        throw new Exception('Image Orientation module not installed in correct directory.  Please rename directory to ' . FIXJPEG_ORIENTATION_MODULE_DIR . '.');
    }
}
