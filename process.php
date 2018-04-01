<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
	header("HTTP/1.0 405 Method Not Allowed");
	header("Allow: POST, HEAD");
	die('Method disallowed');
}

date_default_timezone_set('America/Monterrey');


$posted = json_decode(file_get_contents('php://input'), true);


// Build body

$now = date('Y-m-d H:i:s');
$topic_map = ['Educacion', 'Relaciones Internacionales', 'Politicas Publicas / Reformas Estructurales', 'Otro'];
$topic = "";

if(!empty($posted['category']) && $posted['category'] != ""){
	$topic = $topic_map[intval($posted['category'])-1];
}

$body = [$posted['name'], $topic, $now, $posted['pregunta']];

// Post to Google Sheets
require_once __DIR__ . '/vendor/autoload.php';

// TODO: Change this to real path
putenv('GOOGLE_APPLICATION_CREDENTIALS=./service-account.json');
define('SCOPES', implode(' ', [
 	Google_Service_Sheets::SPREADSHEETS
]
));

$client = new Google_Client();

// TODO: remove after test
// $client->setHttpClient(new \GuzzleHttp\Client(array(
// 	'verify' => 'C:\Program Files\Git\mingw64\ssl\certs\ca-bundle.crt',
// )));

$client->setApplicationName('Actua MX Manda tu Pregunta');
$client->setScopes(SCOPES);
$client->useApplicationDefaultCredentials();
$service = new Google_Service_Sheets($client);
$spreadsheetId = "1u0-7FpEanWWGa5Vr7zrDpYAg5RgKzdFfc890TkixYnE";
$range = "Sheet1";

// Build sheets row
$request_body = new Google_Service_Sheets_ValueRange();
$request_body->setValues([$body]);

$options = ['insertDataOption' => 'INSERT_ROWS', 'valueInputOption' => 'USER_ENTERED'];

// Send the request
$response = $service->spreadsheets_values->append($spreadsheetId, $range, $request_body, $options);
$updates = $response->getUpdates();


if($updates->updatedCells > 0) {
	// Success
	echo json_encode(['success' => 'success', 'msg' => 'Form sent succesfully']);
	exit();
}

echo json_encode(['error' => 'error', 'msg' => 'Could not be inserted']);



