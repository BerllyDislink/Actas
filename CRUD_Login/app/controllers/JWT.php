<?php
class Jwt
{
    public function __construct(private string $key)
    {

    }

    private function base64URLDecode(string $text): string
    {
        return base64_decode(str_replace(['-', '_'], ['+', '/'], $text));
    }

    public function encode(array $payload): string
    {
        // Construir el header
        $header = json_encode([
            "alg" => "HS256",
            "typ" => "JWT"
        ]);
        $header = $this->base64URLEncode($header);
    
        // Construir el payload
        $payload["exp"] = time() + 3600; // Expira en 1 hora (3600 segundos)
        $payload = json_encode($payload);
        $payload = $this->base64URLEncode($payload);
    
        // Calcular la firma
        $signature = hash_hmac("sha256", $header . "." . $payload, $this->key, true);
        $signature = $this->base64URLEncode($signature);
    
        // Concatenar el header, payload y firma para formar el token JWT
        return $header . "." . $payload . "." . $signature;
    }

    public function decode(string $token): array
    {
        $parts = explode('.', $token);
        $payload = $this->base64URLDecode($parts[1]);
        return json_decode($payload, true);
    }

    private function base64URLEncode(string $text): string
    {
        return str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($text));
    }
}
?>
