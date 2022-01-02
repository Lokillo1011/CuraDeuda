<p align="center"><a target="_blank"><img src="https://static.wikia.nocookie.net/pk-unlimitednova/images/e/eb/Logo_Liga_Pok%C3%A9mon.png/revision/latest?cb=20190125000914&path-prefix=es" width="200"></a></p>

## Prueba técnica Desarrollador Front-end CuraDeuda.

La prueba consiste en realizar un sitio web en base a una temática propuesta por CuraDeuda.

## Puntos a cubrir:

1. Diseña un sitio web full responsive sin utilizar frameworks como Bootstrap o
Foundation, el diseño es a tu elección.
2. Conectate a alguna de las API proporcionadas en las temáticas.
3. Agrega la opción de búsqueda de información.
4. Interactúa con la información obtenida del API, flujo básico de navegación de
recursos.
5. Agrega un menú de hamburguesa y un botón flotante.
6. Añade estados.
7. Añade Redux.
8. Muestra tu proyecto live en alguna plataforma en la nube.
9. Agrega un preprocesador de estilos.
10. Empaqueta tu aplicación en un contenedor de Docker.

## Herramientas utilizadas:

1. Laravel (Entorno de desarrollo).
2. HTML, CSS3 y JavaScript.
3. Preprocesador scss.
4. NodeJs.
5. **[PokeApi](https://pokeapi.co)**

# Para comenzar
## Instalación

Clona el repositorio

    git clone https://github.com/Lokillo1011/CuraDeuda.git

Cambie al directorio del proyecto

    cd CuraDeuda

Instale todas las dependencias usando composer

    composer install

Copia el archivo de ejemplo .env.example, ya que es necesario para ejecutar el proyecto

    copy .env.example .env

Genere una nueva key para la aplicación

    php artisan key:generate
    
Inicie el proyecto de manera local con el comando

    php artisan serve
