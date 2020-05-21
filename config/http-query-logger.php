<?php

return [
    'driver' => env('HTTP_QUERY_LOGGER_DRIVER', 'file'),
    'filename' => env('HTTP_QUERY_LOGGER_FILENAME_FORMAT', 'log-{Y-m-d}.log'),
    'informational_responses' => env('HTTP_QUERY_LOGGER_INFORMATIONAL_RESPONSES', true),
    'successful_responses' => env('HTTP_QUERY_LOGGER_SUCCESSFUL_RESPONSES', true),
    'redirects' => env('HTTP_QUERY_LOGGER_REDIRECTS', true),
    'client_errors' => env('HTTP_QUERY_LOGGER_CLIENT_ERRORS', true),
    'server_errors' => env('HTTP_QUERY_LOGGER_SERVER_ERRORS', true),
    'admin_middleware' => env('HTTP_QUERY_LOGGER_ADMIN_MIDDLEWARE', 'web,auth'),
    'email_notification' => env('HTTP_QUERY_LOGGER_EMAIL_NOTIFICATION', false),
    'email_notification_address' => env('HTTP_QUERY_LOGGER_EMAIL_NOTIFICATION_ADDRESS', 'attention@change.me'),
    'dont_log' => [
        'password',
        'password_confirmation',
        'new_password',
        'old_password'
    ],
];
