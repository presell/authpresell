<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the request data
    $data = json_decode(file_get_contents('php://input'), true);

    global $wpdb;
    $table_name = $wpdb->prefix . "testingtbl";

    $access_token = isset($data['access_token']) ? $data['access_token'] : "";
    $ad_account_id = isset($data['ad_account_id']) ? $data['ad_account_id'] : "";
    $name = isset($data['name']) ? $data['name'] : "";
    $objective = isset($data['objective']) ? $data['objective'] : "";
    $status = isset($data['status']) ? $data['status'] : "";
    $special_ad_categories = isset($data['special_ad_categories']) ? $data['special_ad_categories'] : "[]";

    $wpdb->insert(
        $table_name,
        array(
            'access_token' => $access_token,
            'ad_account_id' => $ad_account_id,
            'name' => $name,
            'objective' => $objective,
            'status' => $status,
            'special_ad_categories' => $special_ad_categories
        )
    );

    $response = array(
        'status' => 'success',
        'message' => 'Record inserted successfully.',
        'data' => $data
    );

    // Set the response headers
    header('Content-Type: application/json');
    http_response_code(200);

    // Send the response
    echo json_encode($response);
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Invalid request method.'
    );

    // Set the response headers
    header('Content-Type: application/json');
    http_response_code(405);

    // Send the response
    echo json_encode($response);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   

</body>
</html>
