<?php
// givVote.php - Save vote for option in database

if (!isset($_GET['id'])){
    header('Locaton: ../index.php');
}

$optionid = $_GET['id'];

include_once 'pdo-connect.php';

$data = array();

try {
    
    $stmt = $conn->prepare("SELECT id, start, end FROM poll WHERE id = (SELECT poll_id FROM option WHERE id = :optionid);");
        $stmt->bindParam(":optionid", $optionid);

    if ($stmt->execute() == false){
        $data['error'] = 'error occured';
    } else {

        $poll = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // haetaan äänestyksen id
        $pollid = $poll['id'];
        
        // Muodostetaan start ja end päivämääristä timestamp tyyppiset arvot
        $current_timestamp = time();
        $start_timestamp = strtotime($poll['start']);
        $end_timestamp = strtotime($poll['end']);


        //selvitettään onko käyttäjä jo äänestänyt kyseistä äänestystä
     $cookie_name = "poll_$pollid";
     if (isset($_COOKIE[$cookie_name])){
            $data['warning'] = 'you already voted this poll';
        }  else if ($end_timestamp < $current_timestamp) {
            $data['warning'] = 'Poll is out of date and no longer available for voting!';
        }  else if ($start_timestamp > $current_timestamp) {
            $data['warning'] = 'Poll is not yet available for voting!';
        }
    }

        // jos ei tullut varoitusta, niin voidaan tallentaa ääni
        if (!array_key_exists('warning',$data)){

            $stmt = $conn->prepare("UPDATE option SET votes = votes + 1 WHERE (id = :optionid);");
            $stmt->bindParam(':optionid', $optionid);
        
        if ($stmt->execute() == false){
            $data ['error'] = 'Error occured';
            
        } else {
            $data['success'] = 'Vote successfull!';

            // eväste
            $cookie_name = "poll_$pollid";
            $cookie_value = 1;
            setcookie($cookie_name, $cookie_value, time() + (86400*30), "/");
                
            }
    }
 
} catch (PDOException $e) {
    $data = array(
        'error' => 'tapahtui virhe tallennuksessa!!'
    );

}


header("Content-type: application/json;charset=utf-8");
echo json_encode($data);