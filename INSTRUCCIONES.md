# Instrucciones
**Nota**: *Agregue docker para el manejo facil de redis, Base de datos y las tareas programdas*

## Paso a paso:
- Clonar el proyecto esta en la ruta **git@github.com:abrito393/beeping-challenge.git**
- El archivo **.env.example** tiene todas las variables de entorno necesarias para el funcionamiento del proyecto correctamente, solo se debe renombrar a **.env**
- Levantar el contenedor docker con el comando `./vendor/bin/sail up -d`
- Ejecutar el comando `./vendor/bin/sail artisan migrate` para generar la estructura de la BD
- Ejecutar el comando  `./vendor/bin/sail artisan db:seed` para llenar de datos de productos, ordenes y items de las ordenes
- para que se procesen las colas, que se estan almacenandas en redis y obtenga el costo total de todos los productos vendidos se debe ejecutar el siguiente comando `./vendor/bin/sail artisan queue:work`
- cuando se acceda a la ruta principal del proyecto http://localhost podras observar un listado de ordenes el cual al final del listado tiene el dato calculado de total pedidos y coste total de todos los pedidos
