<?php

//app/Helpers içindeki bütün dosyaları yükle

$files = glob(__DIR__ . '/*.php');

$files = array_diff($files, [__FILE__]);

foreach ($files as $file) {
    if (is_file($file)) {
        require_once $file;
    }
}
