<?php
namespace app\components;

class SupabaseStorage
{public static function upload($file)
{
    $supabaseUrl = 'https://ldqcpnoijpfptugiilut.supabase.co';
    $apiKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImxkcWNwbm9panBmcHR1Z2lpbHV0Iiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTc2ODgyNzk0OCwiZXhwIjoyMDg0NDAzOTQ4fQ.8kN0O8RzbhbKoAksPe6Ykji8cz3hfo73YwKUnYxo984'; // 🔴 usa la correcta

    $bucket = 'productos';
    $fileName = uniqid() . '.' . $file->extension;

    $url = "$supabaseUrl/storage/v1/object/$bucket/$fileName";

    $ch = curl_init($url);

    curl_setopt_array($ch, [
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => file_get_contents($file->tempName),
        CURLOPT_HTTPHEADER => [
            "Authorization: Bearer $apiKey",
            "apikey: $apiKey",
            "Content-Type: {$file->type}"
        ],
        CURLOPT_RETURNTRANSFER => true
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    if ($httpCode !== 200) {
        var_dump($httpCode);
        var_dump($response);
        die;
    }

    return "$supabaseUrl/storage/v1/object/public/$bucket/$fileName";
}
}
