## Funcionalidades Completadas

● Autenticación básica de Laravel: posibilidad de iniciar sesión como administrador (El
administrador es un usuario normal, no es necesario manejar permisos.).

● Utilice las semillas/seeds de la base de datos para crear el primer usuario con el correo
	electrónico admin@admin.com y la contraseña "contraseña".

● Funcionalidad CRUD (Crear / Leer / Actualizar / Eliminar) para dos elementos del menú:
	Empresas y Empleados.

● La tabla de bases de datos de empresas consta de estos campos: Nombre (obligatorio),
	correo electrónico (obligatorio), logotipo (mínimo 100 × 100), sitio web (URL)

● La tabla de la base de datos de empleados consta de estos campos: nombre
	(obligatorio), apellido (obligatorio), empresa (clave externa para empresas), correo
	electrónico, teléfono.

● Utilice migraciones de base de datos para crear los esquemas anteriores

● Almacene los logotipos de las empresas en almacenamiento / aplicación / carpeta
	pública y hágalos accesibles desde el público.

● Use controladores de recursos básicos de Laravel con métodos predeterminados:
	indexar, crear, almacenar, etc.

● Usa la función de validación de Laravel, usando clases de solicitud / request classes

● Use la paginación de Laravel para mostrar la lista de Empresas / Empleados, 10
	entradas por página

## Extras
● Carga del proyecto a un servidor web: Utilizando NGINX o Apache subir el proyecto a
un servidor, junto con un BDD para que este sea funcional desde internet.

## Notas
● Las imagenes de los logos son guardadas en el Storage del servidor y no en el lado publico, no se implemento un servidor independiente(AWS s3, GCP)

● Se separo la logica de manejo de imagenes en un controlador independiente

●En el modulo de empresas se añadio una pequeña validacion required en el fronted con JS y la validacion de laravel en el servidor,  en el modulo de Empleados solo se manejo la validacion de laravel, esto con la finalidad de que se puedan apreciar los dos tipos de validacion.