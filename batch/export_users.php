<?php
$username = "root";
$password = "udemy";
$hostname = "db";
$db = "udemy_db";
$pdo = new PDO("mysql:host={$hostname};dbname={$db};charset=utf8", $username, $password);

$sql = "SELECT * FROM users ORDER BY id";
// $param = array(":name" => "田中");
$stmt = $pdo->prepare($sql);
$stmt->execute();

$outputData = [];
$dataCount = 0;
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $outputData[$dataCount]["id"] = $row["id"];
    $outputData[$dataCount]["name"] = $row["name"];
    $outputData[$dataCount]["name_kana"] = $row["name_kana"];
    $outputData[$dataCount]["birthday"] = $row["birthday"];
    $outputData[$dataCount]["gender"] = $row["gender"];
    $outputData[$dataCount]["organization"] = $row["organization"];
    $outputData[$dataCount]["post"] = $row["post"];
    $outputData[$dataCount]["start_date"] = $row["start_date"];
    $outputData[$dataCount]["tel"] = $row["tel"];
    $outputData[$dataCount]["mail_address"] = $row["mail_address"];
    $outputData[$dataCount]["created"] = $row["created"];
    $outputData[$dataCount]["updated"] = $row["updated"];
    $dataCount++;
}

// var_dump($outputData);
$fpOut = fopen(__DIR__ . "/export_users.csv", "w");

$header = [
    "社員番号",
    "社員名",
    "社員名カナ",
    "生年月日",
    "性別",
    "所属部署",
    "役職",
    "入社年月日",
    "電話番号",
    "メールアドレス",
    "作成日時",
    "更新日時"
];

fputcsv($fpOut, $header);

foreach($outputData as $data){
    fputcsv($fpOut, $data);
}

fclose($fpOut);