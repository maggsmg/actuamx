<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
	header("HTTP/1.1 405 Method Not Allowed");
	header("Allow: POST, HEAD");
	die('Method disallowed');
}

// Post to Google Sheets
require_once __DIR__ . '/vendor/autoload.php';

date_default_timezone_set('America/Monterrey');

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$posted = json_decode(file_get_contents('php://input'), true);

if($posted == null) {
	header("HTTP/1.1 500 Internal Server Error");
	die('No arguments passed');
}

// Build body

$now = date('Y-m-d H:i:s');
$topic_map = ['Educacion', 'Relaciones Internacionales', 'Politicas Publicas / Reformas Estructurales', 'Otro'];
$topic = "";

if(!empty($posted['category']) && $posted['category'] != ""){
	$topic = $topic_map[intval($posted['category'])-1];
}

$body = [$posted['name'], $topic, $now, $posted['pregunta']];


// TODO: Change this to real path
define('SCOPES', implode(' ', [
 	Google_Service_Sheets::SPREADSHEETS
]
));

$client = new Google_Client();

// TODO: remove after test
$client->setHttpClient(new \GuzzleHttp\Client(array(
	'verify' => 'C:\Program Files\Git\mingw64\ssl\certs\ca-bundle.crt',
)));

$client->setApplicationName('Actua MX Manda tu Pregunta');
$client->setScopes(SCOPES);
$client->useApplicationDefaultCredentials();
$service = new Google_Service_Sheets($client);
$spreadsheetId = $_ENV['GOOGLE_SPREADSHEET_ID'];
$range = "Sheet1";

// Build sheets row
$request_body = new Google_Service_Sheets_ValueRange();
$request_body->setValues([$body]);

$options = ['insertDataOption' => 'INSERT_ROWS', 'valueInputOption' => 'USER_ENTERED'];

// Send the request
$response = $service->spreadsheets_values->append($spreadsheetId, $range, $request_body, $options);
$updates = $response->getUpdates();


header('Content-Type: application/json');

if($updates->updatedCells > 0) {
	// Success
	echo json_encode(['success' => 'success', 'msg' => 'Form sent succesfully']);
	exit();
}

echo json_encode(['error' => 'error', 'msg' => 'Could not be inserted']);



