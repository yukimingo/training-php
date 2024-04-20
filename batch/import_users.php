<?php
$username = "root";
$password = "udemy";
$hostname = "db";
$db = "udemy_db";
$pdo = new PDO("mysql:host={$hostname};dbname={$db};charset=utf8", $username, $password);

$fp = fopen(__DIR__ . "/import_usres.csv", "r");

$pdo->beginTransaction();

while($data = fgetcsv($fp)) {
    $sql = "SELECT COUNT(*) AS count FROM users WHERE id = :id";
    $param = [":id" => $data[0]];
    $stmt->execute($param);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if($result["count"] === "0"){
        $sql = "INSERT INTO users ( ";
        $sql .= " id, ";
        $sql .= " name, ";
        $sql .= " name_kara, ";
        $sql .= " birthday, ";
        $sql .= " gender, ";
        $sql .= " organization, ";
        $sql .= " post, ";
        $sql .= " start_date, ";
        $sql .= " tel, ";
        $sql .= " mail_address, ";
        $sql .= " created, ";
        $sql .= " updated, ";
        $sql .= ") VALUES (";
        $sql .= " :id, ";
        $sql .= " :name, ";
        $sql .= " :name_kana, ";
        $sql .= " :birthday, ";
        $sql .= " :gender, ";
        $sql .= " :organization, ";
        $sql .= " :post, ";
        $sql .= " :start_date, ";
        $sql .= " :tel, ";
        $sql .= " :mail_address, ";
        $sql .= " NOW(), ";
        $sql .= " NOW(), ";
        $sql .= ")";
    }else{
        $sql = "UPDATE users ";
        $sql .= "SET name = :name, ";
        $sql .= " name_kana = :name_kana, ";
        $sql .= " birthday = :birthday, ";
        $sql .= " gender = :gender, ";
        $sql .= " organization = :organization, ";
        $sql .= " post = :post, ";
        $sql .= " start_date = :start_date, ";
        $sql .= " tel = :tel, ";
        $sql .= " mail_address = :mail_address, ";
        $sql .= " updated = :NOW() ";
        $sql .= "WHERE id = :id ";
    }
    $param = array(
        "id" => $data[0],
        "name" => $data[1],
        "name_kana" => $data[2],
        "birthday" => $data[3],
        "gender" => $data[4],
        "organization" => $data[5],
        "post" => $data[6],
        "start_date" => $data[7],
        "tel" => $data[8],
        "mail_address" => $data[9],
    );
    $stmt = $pdo->prepare($sql);
    $stmt->execute($param);
}


$pdo->commit();

fclose($fp);