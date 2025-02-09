# To-Do List en Laravel

## Descripción
Esta es una aplicación de lista de tareas (To-Do List) desarrollada con Laravel, que permite a los usuarios autenticarse, crear, editar, completar y eliminar tareas. Además, está preparada para ser desplegada en Heroku, con integración de base de datos PostgreSQL.

## Requisitos

Antes de empezar, asegúrate de tener instalados los siguientes programas en tu máquina:

- **PHP 8.x** (preferido, pero compatible con 7.4)
- **Composer** (gestor de dependencias para PHP)
- **MySQL** o **PostgreSQL**
- **Git** y una cuenta en **GitHub**
- **Cuenta en Heroku** y **Heroku CLI** (si planeas desplegarlo)
-**"Node.js"**

## Instalación

### 1. Clonar el repositorio

Clona el repositorio desde GitHub y navega a la carpeta del proyecto:

```bash
git clone https://github.com/DanielZambrano06/To-Do-List-en-Laravel.git
cd todo-app

2. Instalar dependencias
Ejecuta los siguientes comandos para instalar las dependencias del proyecto:


composer install
npm install && npm run dev

3. Configuración del archivo .env
Copia el archivo .env.example a un archivo .env en la raíz del proyecto:

cp .env.example .env

Abre el archivo .env y configura las variables de entorno necesarias:

Base de Datos
Asegúrate de que la configuración de la base de datos esté correcta. Si estás usando PostgreSQL en Heroku, el DATABASE_URL debe ser algo como esto:

DB_CONNECTION=pgsql
DB_HOST=cd27da2sn4hj7h.cluster-czrs8kj4isg7.us-east-1.rds.amazonaws.com
DB_PORT=5432
DB_DATABASE=d5e814ll2rv9jp
DB_USERNAME=u8kfveh5mihcfj
DB_PASSWORD=p86eebd61864a47081eab364d558588433b120290569989de70092b13928f47ad

Si estás usando MySQL en tu entorno local, la configuración debería ser algo así:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=todo_db
DB_USERNAME=root
DB_PASSWORD=secret

Generación de la clave de la aplicación

Genera la clave de la aplicación con el siguiente comando:

php artisan key:generate

4. Migraciones de la base de datos
Ejecuta las migraciones para crear las tablas en la base de datos:

php artisan migrate

5. Servir la aplicación localmente
Para ejecutar la aplicación en tu entorno local, usa el siguiente comando:

php artisan serve
La aplicación estará disponible en http://localhost:8000.


Despliegue en Heroku
1. Iniciar sesión en Heroku
Asegúrate de estar logueado en Heroku con el siguiente comando:

heroku login
2. Crear la aplicación en Heroku
Crea la aplicación en Heroku y agrega la base de datos PostgreSQL:

heroku create todo-app-laravel
heroku addons:create heroku-postgresql:hobby-dev --app todo-app-laravel

3. Configurar las variables de entorno en Heroku
Establece las variables de entorno necesarias en Heroku:

heroku config:set APP_KEY=$(php artisan key:generate --show) --app todo-app-laravel
heroku config:set DB_CONNECTION=pgsql --app todo-app-laravel
heroku config:set APP_ENV=production --app todo-app-laravel

4. Subir el código a Heroku
Realiza un commit de los cambios y sube el código a Heroku:

git add .
git commit -m "Deploy to Heroku"
git push heroku main

5. Ejecutar las migraciones en Heroku
Una vez que el código esté en Heroku, ejecuta las migraciones en la base de datos de Heroku:

heroku run php artisan migrate --app todo-app-laravel


Uso
Rutas disponibles
Registro e inicio de sesión: La aplicación tiene autenticación lista para usar, permitiendo a los usuarios registrarse e iniciar sesión.

Ruta para tareas: Los usuarios pueden ver, crear, editar, completar y eliminar tareas.

Contribuciones
Si deseas contribuir a este proyecto, siéntete libre de hacer un fork del repositorio y enviar un pull request.

Autor
Desarrollado por [Daniel Enrique Zambrano Montenegro]


### Explicación de cada sección del `README.md`:

- **Descripción**: Explica qué hace la aplicación.
- **Requisitos**: Lista los programas necesarios para trabajar con el proyecto.
- **Instalación**: Describe cómo clonar el repositorio, instalar dependencias, configurar el archivo `.env`, ejecutar migraciones y ejecutar la aplicación localmente.
- **Despliegue en Heroku**: Instrucciones detalladas sobre cómo desplegar la aplicación en Heroku, configurar variables de entorno y ejecutar migraciones.
- **Uso**: Explica qué funcionalidades tiene la aplicación.
- **Contribuciones**: Da instrucciones sobre cómo otros desarrolladores pueden contribuir al proyecto.
