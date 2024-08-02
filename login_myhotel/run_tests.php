<?php
include("connection.php");

function send_post_request($url, $post_data) {
    $options = [
        'http' => [
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($post_data),
        ],
    ];
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    return $result;
}

function run_tests() {
    global $con;

    // Test 1: Username already taken
    $post_data = [
        'name' => 'Test User',
        'username' => 'testuser2',
        'phone' => '1234567890',
        'password' => 'password123',
        'confirm_password' => 'password123',
    ];
    send_post_request('signup.php', $post_data);

    // Try to sign up with the same username
    $result = send_post_request('signup.php', $post_data);
    if (strpos($result, 'Username is already taken!') !== false) {
        echo "Test 1 passed: Duplicate username was detected.\n";
    } else {
        echo "Test 1 failed: Duplicate username was not detected.\n";
    }

    // Cleanup
    $query = "DELETE FROM users WHERE username = 'testuser2'";
    $con->query($query);

    // Test 2: Passwords do not match
    $post_data = [
        'name' => 'Test User',
        'username' => 'testuser3',
        'phone' => '1234567890',
        'password' => 'password123',
        'confirm_password' => 'differentpassword',
    ];
    $result = send_post_request('signup.php', $post_data);
    if (strpos($result, 'Passwords do not match!') !== false) {
        echo "Test 2 passed: Password mismatch was detected.\n";
    } else {
        echo "Test 2 failed: Password mismatch was not detected.\n";
    }
}

run_tests();
?>
