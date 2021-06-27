<?php
function render_template($dir, $data = []) {
    ob_start();
    extract($data);
    require $dir;
    return ob_get_clean();
}