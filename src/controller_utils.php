<?php

function &get_gallery()
{
    if (!isset($_SESSION['gallery'])) {
        $_SESSION['gallery'] = [];
    }

    return $_SESSION['gallery'];
}