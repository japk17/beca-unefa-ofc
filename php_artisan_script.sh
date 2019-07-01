#!/bin/dash

clear
echo "----------MENU DE OPCIONES----------"
echo ""

while :
do
echo " Escoja una opcion "
echo "1. php artisan config:clear"
echo "2. php artisan cache:clear"
echo "3. php artisan config:cache"
echo "4. php artisan migrate"
echo "5. php artisan migrate:fresh"
echo "6. php artisan migrate:refresh"
echo "7. php artisan db:seed"
echo "8. php artisan migrate:fresh --seed"
echo "9. php artisan serve"
echo "10. salir"
echo -n "Seleccione una opcion [1 - 10]"
read opcion
case $opcion in
1) echo "Ejecutando:";
php artisan config:clear;;
2) echo "Ejecutando: ";
php artisan cache:clear;;
3) echo "Ejecutando:";
php artisan config:cache;;
4) echo "Ejecutando: ";
php artisan migrate;;
5) echo "Ejecutando:";
php artisan migrate:fresh;;
6) echo "Ejecutando: ";
php artisan migrate:refresh;;
7) echo "Ejecutando:";
php artisan db:seed;;
8) echo "Ejecutando: ";
php artisan migrate:fresh --seed;;
9) echo "Ejecutando: ";
php artisan serve;;
10) echo "Fin";
exit 1;;
*) echo "$opc es una opcion invalida?";
echo "Presiona una tecla para continuar...";
read foo;;
