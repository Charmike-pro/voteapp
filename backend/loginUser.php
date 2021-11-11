<?php

session_start();

if (!isset($_POST['username']) || !isset($_POST['password'])){
    $data = array(
        'error' => 'POST-dataa ei saatavilla!'
    );
    die();
}

$username = $_POST['username'];
$password = $_POST['password'];

include_once 'pdo-connect.php';

try {
    // Luodaan pdo-statement
    $stmt = $conn->prepare("SELECT id, username, pwd FROM user WHERE username = :username");
    $stmt->bindParam(':username', $username);

    if($stmt->execute() == false){
        $data = array(
            'error' => 'Tapahtui joku virhe!'
        );
    } else {
        // Käyttäjä löytyi...
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (password_verify($password, $result['pwd'])) {
            $data = array(
                'success' => 'Kirjautuminen onnistui!'
            );

            $_SESSION['logged_in'] = true;
            $_SESSION['user_id'] = $result['id'];
            $_SESSION['username'] = $result['username'];

        } else {
            $data = array(
                'error' => 'Salasana on väärä!'
            );
        }
        
    }
} catch (PDOException $e) {
    $data = array(
        'error' => 'Tapahtui joku virhe!!'
    );
}

header("Content-type: application/json;charset=utf-8");
echo json_encode($data);