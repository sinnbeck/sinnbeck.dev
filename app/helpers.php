<?php
function cache_bust($path) {
    $bust = filemtime(public_path($path));
    return $path . '?v=' . $bust;
}