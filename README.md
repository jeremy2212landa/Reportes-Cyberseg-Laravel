# Aplicacion para gestion de proyectos de pentesting con Laravel

Aplicaciones para Gestionar proyectos de pentesting web desarrollada con PHP (**Laravel**), jetstream con inertia (vue.js) y la libreria para gestionar .docx (**PHPWord**).


### Modelo conceptual de la Base de Datos

![Database Modeling](https://raw.githubusercontent.com/jeremy2212landa/Reportes-Cyberseg-Laravel/main/.others/Reportes_cyberseg.png)

---
## Route List

```PHP
route::class
```

---
## Require

- [Laravel](https://laravel.com) versión  9.0.0.
- [Vue](https://vuejs.org/)  versión 3.
- [Vuetify](https://vuetifyjs.com) versión .
- [Vuex](https://vuex.vuejs.org/).
- [Vue Router](https://router.vuejs.org/).
- Base de datos MySQL
- Real time Pusher o Firebase (según convenga)

---
 ## Instalación

- Clonar el repositorio
- En la raíz del proyecto, crear archivo .env y copiar con código de env.example (no borrar el archivo env.example)
- Crear base de datos y poner datos de conexión en el archivo .env
- Abrir consola con la ubicación del proyecto.
- Comando: composer update
- Comando: npm install
- Comando: php artisan migrate --seed
- Comando: php artisan key:generate
- Comando: npm run watch (Correr en consola diferente cada vez que se inicie el proyecto.)
- Comando: php artisan serve (Correr en consola diferente cada vez que se inicie el proyecto.)

---
## Licencia

Este proyecto es propiedad de [GJMJ C.A](https://google.com).

2022 © GJMJ C.A
---
***
