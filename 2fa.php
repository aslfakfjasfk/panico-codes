<?php 

require_once 'GoogleAuthenticator.php';

header('Content-Type: application/json');

try {
    if (isset($_GET['key'])) {
        $key = trim($_GET['key']);
        $ga = new PHPGangsta_GoogleAuthenticator();
        $code = $ga->getCode($key);

        $response = [
            "panicocode" => $code
        ];
        
        echo json_encode($response, JSON_PRETTY_PRINT);
    } else {
        echo json_encode([
            "error" => "Nenhuma chave fornecida"
        ], JSON_PRETTY_PRINT);
    }
} catch (Exception $e) {
    echo json_encode([
        "error" => "Erro no servidor: " . $e->getMessage()
    ], JSON_PRETTY_PRINT);
}
?>
