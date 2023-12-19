<?php
/*
Plugin Name: FDK DevOps WP External API Plugin
Description: Connects to an external API and retrieves data.
Version: 1.0
Author: Faisal Dad Khan
*/

// Hook to WordPress init
add_action('init', 'external_api_request');

function external_api_request() {
    // API endpoint
    $api_url = 'https://api.example.com/data';

    // Make the API request
    $response = wp_remote_get($api_url);

    // Check for errors
    if (is_wp_error($response)) {
        error_log('Error connecting to the API: ' . $response->get_error_message());
        return;
    }

    // Get the API response body
    $body = wp_remote_retrieve_body($response);

    // Process the API data (you can modify this part based on your API response format)
    $api_data = json_decode($body, true);

    // Output the data (for demonstration purposes)
    echo '<pre>';
    print_r($api_data);
    echo '</pre>';
}
