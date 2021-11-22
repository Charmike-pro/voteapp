<?php
if (!isset($_GET['id'])){
    $type = 'error';
    $msg = 'Tried to do something stupid!';
    header("Location: ../index.php?type={$type}&msg={$msg}");
}
$poll_id = $_GET['id'];

include_once 'pdo-connect.php';

$data = array();

try {
    // Deleting options
    $stmt = $conn->prepare("DELETE FROM option WHERE poll_id = :pollid;");
    $stmt->bindParam(':pollid', $poll_id);

    if ($stmt->execute() == false){
        $data['error']['options']=  'Error occured deleting options!';
    } else {
        $data['success']['options'] = 'Deleting options successfull!';
    }

    // Deleting polls
    $stmt = $conn->prepare("DELETE FROM poll WHERE id = :pollid;");
    $stmt->bindParam(':pollid', $poll_id);

    if ($stmt->execute() == false){
        $data['error']['poll'] = 'Error occured deleting poll!';
    } else {
        $data['success']['poll'] = 'Deleting pol successfull!';
    }

} catch (PDOException $e) {
    $data = array(
        'error' => 'Error occured in SQL statement'
    );
}

header("Content-type: application/json;charset=utf-8");
echo json_encode($data);

