@echo off
TITLE Menjalankan Scheduler Agee

REM --- Langkah 1: Menjalankan skrip pembersihan database ---
echo Menjalankan skrip pembersihan database...
php "C:\laragon\www\pmr-tagcheck\cleardb.php"

echo.
echo Database telah dibersihkan. Melanjutkan...
echo ===========================================
echo.
timeout /t 3 >nul

REM --- Langkah 2: Menjalankan Laravel Scheduler ---

cd "C:\laragon\www\pmr-tagcheck"
php run.php