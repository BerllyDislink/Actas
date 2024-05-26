<?php
class Auth {
    private $jwt;

    public function __construct($jwt) {
        $this->jwt = $jwt;
    }

    public function verifyToken($token) {
        try {
            $decoded = $this->jwt->decode($token);

            // Verificar si el token ha expirado
            if ($decoded->exp < time()) {
                return false; // Token expirado
            }

            // Puedes agregar más verificaciones si es necesario (por ejemplo, verificar el usuario)

            return $decoded; // Token válido
        } catch (Exception $e) {
            return false; // Token inválido
        }
    }
}

?>
