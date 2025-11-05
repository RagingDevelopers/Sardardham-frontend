<?php

function ci()
{
    $CI = &get_instance();
    return $CI;
}

function langSelect($column = null)
{

    $language_id = ci()->session->userdata('language_id') ?? 1;

    $key = null;

    if ($language_id == 1) {
        $key = "eng_{$column} as $column";
    } else if ($language_id == 2) {
        $key = "guj_{$column} as $column";
    }
    return $key;

}
function langColumn($column = null)
{

    $language_id = ci()->session->userdata('language_id') ?? 1;

    $key = null;

    if ($language_id == 1) {
        $key = "eng_{$column}";
    } else if ($language_id == 2) {
        $key = "guj_{$column}";
    }
    return $key;

}

function queryLang()
{
    $ci = ci();
    $language_id = $ci->session->userdata('language_id') ?? 1;
    return $ci->db->where([
        "language_id" => $language_id
    ]);
}


if (!function_exists('get_setting')) {
    function get_setting($key)
    {
        $CI = ci();

        $query = $CI->db->get_where('settings', ['s_key ' => $key]);
        if ($query->num_rows() > 0) {
            return $query->row()->s_value;
        } else {
            return null;
        }
    }
}

if (!function_exists('set_setting')) {
    function set_setting($key, $value)
    {
        $CI = ci();
        $CI->db->where('s_key ', $key);
        $CI->db->update('settings', ['s_value' => $value]);
    }
}


if (!function_exists('increment_visitor_counter')) {
    function increment_visitor_counter()
    {
        $current_count = (int) get_setting('VISITOR_COUNT');
        $new_count = $current_count + 1;
        set_setting('VISITOR_COUNT', $new_count);
    }
}


function pre($data, $exit = false)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    $exit && exit;
}

if (!function_exists('is_active')) {
    function is_active($uris = [])
    {
        $current_uri = ci()->uri->uri_string();

        if (is_array($uris)) {
            return in_array($current_uri, $uris) ? 'active' : '';
        }

        return ($current_uri == $uris) ? 'active' : '';
    }
}

// application/helpers/slug_helper.php
if (!function_exists('generate_slug')) {
    function generate_slug($string)
    {
        // Normalize to NFC so base + matras stay combined (needs intl extension)
        if (class_exists('Normalizer')) {
            $string = Normalizer::normalize($string, Normalizer::FORM_C);
        }

        // Lowercase (UTF-8 safe)
        $slug = mb_strtolower($string, 'UTF-8');

        // Keep letters, numbers, combining marks, spaces and hyphen; drop everything else
        // IMPORTANT: the 'u' flag is required for Unicode
        $slug = preg_replace('/[^\p{L}\p{N}\p{M}\s\-]+/u', ' ', $slug);

        // Collapse spaces/hyphens to single hyphen
        $slug = preg_replace('/[\s\-]+/u', '-', trim($slug));

        // Trim hyphens
        return trim($slug, '-');
    }
}
