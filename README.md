## Dependencias

-   **[Docker](https://www.docker.com/)**
-   **[Cuenta en MailTrap](https://mailtrap.io/)**

## Instalación y configuración

1. Al haber creado el proyecto con [Laravel sail](https://laravel.com/docs/9.x/sail), este nos brinda cierta configuración para que no tengamos que instalar manualmente php, composer, ni mysql que son dependencias del proyecto, por consiguiente después de haber instalado Docker debemos ejecutamos el siguiente comando para descargar e instalar las dependencias del proyecto

```
$ ./vendor/bin/sail up
```

2. Después de haber instalado las dependencias del proyecto vamos a ejecutar los comandos de Laravel para su configuración inicial

```
$ ./vendor/bin/sail composer install
$ cp .env.example .env
$ ./vendor/bin/sail artisan key:generate
```

3. Para el siguiente paso y ya teniendo las credenciales de mailtrap nos dirigimos al archivo `.env` que creamos en el paso anterior y agregamos las credenciales en sus respectivas variables de entorno

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=xxxxxxxxxxxxxx
MAIL_PASSWORD=xxxxxxxxxxxxxx
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="no-reply@test.com"
```

4. Con el siguiente comando generaremos la documentación de la API para poderla consumir desde la web de una manera mucho más fácil y podrmos acceder desde [documentación](http://localhost/api/documentation) despues de haber ejecutado el comando

```
$ ./vendor/bin/sail artisan l5-swagger:generate
```
