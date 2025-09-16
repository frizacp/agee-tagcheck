<?php
// 1. Minta input race code
echo "Masukkan Race Code: ";
$race = trim(fgets(STDIN));

// 2. Path file .env
$envPath = __DIR__.'/.env';
$envContent = file_get_contents($envPath);

// 3. Cari apakah ada baris RACE_CODE=... sebelumnya
if (preg_match('/^RACE_CODE=.*$/m', $envContent)) {
    // replace
    $envContent = preg_replace('/^RACE_CODE=.*$/m', "RACE_CODE={$race}", $envContent);
} else {
    // append
    $envContent .= "\nRACE_CODE={$race}\n";
}

// 4. Tulis balik ke file .env
file_put_contents($envPath, $envContent);

echo "✅ RACE_CODE diset ke {$race} di file .env\n";

// 5. Jalankan artisan schedule:work
// pakai passthru biar realtime output
passthru('php artisan schedule:work');
