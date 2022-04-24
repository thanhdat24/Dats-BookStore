<?php
function get_header()
{
    $file = 'include/header.php';
    if (file_exists($file)) {
        require $file;
    }
}

function get_footer()
{
    $file = 'include/footer.php';
    if (file_exists($file)) {
        require $file;
    }
}
