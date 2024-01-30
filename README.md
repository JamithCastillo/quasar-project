# quasar-project
# ejecutar la siguiente lineas de comandos
php artisan migrate --seed
php artisan db:seed --class=TamanoSeeder

# para migrar toda la base de datos y cargar informacion del tamano del perro

# el usuario super admin es:  
user: admin@admin.com
password : admin

# Despues de iniciar sesion veremos el menu del aplicativo (perros, administradores,razas y dueños)

# PERROS///
crea toda la informacion del cachorro incluyendo el importe y la bonificacion del spa. pero antes de poder ingresar toda la informacion del perro se tendria que haber creado un dueño y tiene que haber razas creadas  en el spa. Despues de haber creado el perro a continuacion se muestra el index con la tabla y cards.

# Tabla: todas la tablas tienen la opcion de exportar informacion del pdf. Tambien se puede imprimir la tabla y copiar su informacion. la tabla de perros a diferencias de las otras tiene la opcion de exportar por excel.

# Cards: en el index de perros podemos visualizar card informativo donde categoriza el importe total por cada raza de perros ingresados.

# podemos tambien filtrar la informacion por tamaño y raza.

# Dueños /// el apartado se ha creado con la finalidad de que sus dueños tengan informacion de los cachorros y puedan recibir mensajes. (desarrollo pensado a futuro)

# Razas/// el apartado de Razas tendria como finalidad crear un maestro de datos en cuanto a la raza de los perros

# Administrativos/// este apartado se ha creado con la finalidad del que programa pueda ser usado para distintas empresas y asi poder separar su informacion
 

# para ejecutar el proyecto nesecita ejecutar en powershell ejecutalo en dos terminales distintas
php artisan serve //
npm run build
