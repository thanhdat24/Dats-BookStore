<?php
function get_header()
{
    $file = 'inc/header.php';
    if (file_exists($file)) {
        require $file;
    }
}

function get_footer()
{
    $file = 'inc/footer.php';
    if (file_exists($file)) {
        require $file;
    }
}
