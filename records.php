<?php

// Headers
header('Content-Type: application/json');
/* header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With'); */

include_once './config/Database.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$query = 'SELECT * FROM main ORDER BY row ASC';
$stmt = $db->prepare($query);
$stmt->execute();

$population = 32255684;
$totalCases = 0;
$totalRecovered = 0;
$totalDeath = 0;

$newCases = [];
$activeCases = [];
$differences = 0;
$populationInfected = 0;
$growthFactor = 0;
$num = 1;

$recordArray = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
   $newCases[$num - 1] = $row['new_case'];

   $totalCases = $totalCases + $row['new_case'];
   $totalRecovered = $totalRecovered + $row['recovered'];
   $totalDeath = $totalDeath + $row['death'];

   $activeCases[$num - 1] = $totalCases - $totalRecovered - $totalDeath;
   $populationInfected = round($totalCases / $population * 100, 6);

   if ($num > 1) {
      $differences = $activeCases[$num - 1] - $activeCases[$num - 2];
      ($newCases[$num - 2] != 0 ? $growthFactor = round($newCases[$num - 1] / $newCases[$num - 2], 3) :  $growthFactor = "NaN");
   }

   $recordItem = array(
      'num' => $num,
      'date' => $row['date'],
      'new_case' => $row['new_case'],
      'recovered' => $row['recovered'],
      'death' => $row['death'],
      'totalCases' => $totalCases,
      'totalRecovered' => $totalRecovered,
      'totalDeath' => $totalDeath,
      'activeCases' => $activeCases[$num - 1],
      'differences' => $differences,
      'populationInfected' => $populationInfected,
      'growthFactor' => $growthFactor
   );
   array_push($recordArray, $recordItem);
   $num++;
}

echo json_encode($recordArray);