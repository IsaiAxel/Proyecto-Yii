<?php
namespace app\components;

class SupabaseStorage
{
    public static function upload($file)
    {
        $supabaseUrl = 'https://ldqcpnoijpfptugiilut.supabase.co';
        $apiKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImxkcWNwbm9panBmcHR1Z2lpbHV0Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3Njg4Mjc5NDgsImV4cCI6MjA4NDQwMzk0OH0._w42lGfeDeQ4lmewakgpiD9UiR7iY6kSQGfWAcd1B5w'; // ⚠️ NO la publishable key

        $bucket = 'productos';

        $fileName = uniqid() . '.' . $file->extension;
        $filePath = "$bucket/$fileName";

        $ch = curl_init("$supabaseUrl/storage/v1/object/$filePath");

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

        curl_exec($ch);
        curl_close($ch);

        return "$supabaseUrl/storage/v1/object/public/$filePath";
    }
}
