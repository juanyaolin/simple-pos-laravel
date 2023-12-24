<?php

foreach (glob(__DIR__ . '/*.php') as $filename) {
    if (__FILE__ != $filename) {
        require_once $filename;
    }
}
