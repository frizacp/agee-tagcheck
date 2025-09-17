@echo off
TITLE Git Pull - Racetec Project

echo ===========================================
echo  Menjalankan Git Pull untuk Racetec Project
echo ===========================================
echo.

echo Pindah ke direktori proyek: C:\laragon\www\agee-tagcheck
cd "C:\laragon\www\agee-tagcheck"

echo.
echo Menjalankan 'git pull'...
echo -------------------------------------------
git pull
echo -------------------------------------------
echo.
echo Proses selesai.

REM Menjaga jendela tetap terbuka agar Anda bisa melihat hasilnya.
pause