<?php

function callAPI($url)
{
    $json = @file_get_contents($url);

    if (!$json) {
        return null;
    }

    return json_decode($json, true);
}

function sanitize($text)
{
    return htmlspecialchars($text ?? '', ENT_QUOTES, 'UTF-8');
}

function formatDate($date)
{
    if (!$date) return "Unknown";
    return date("F j, Y", strtotime($date));
}



?>