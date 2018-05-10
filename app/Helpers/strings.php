<?php

if ( ! function_exists('cleanup'))
{
    /**
     * Cleanup string from extra empty spaces and html tags
     *
     * @param  string  $string
     * @return string
     */
    function cleanup($string)
    {
        return cleanupEmptySpaces(html_entity_decode(strip_tags($string)));
    }
}