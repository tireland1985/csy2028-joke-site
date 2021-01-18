<?php
function loadTemplate($filename, $templateVars) {
    extract($templateVars);
    ob_start();
    require $filename;
    $contents = ob_get_clean();
    return $contents;
}