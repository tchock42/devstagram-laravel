# 📸 Devstagram

Un clon de Instagram construido con **Laravel** que permite a los usuarios compartir posts, interactuar con otros usuarios y construir una red social personalizada.

## ✨ Características Principales

- 👤 **Autenticación de Usuarios**: Registro e inicio de sesión sin validación
- 📝 **Crear y Editar Posts**: Comparte tus momentos con imágenes y descripciones
- 💬 **Sistema de Comentarios**: Comenta en los posts de otros usuarios
- ❤️ **Sistema de Likes**: Dale me gusta a los posts que te gusten
- 👥 **Sistema de Followers**: Sigue a otros usuarios y mira su actividad
- 🎨 **Perfiles Personalizados**: Crea tu perfil con imagen de usuario y bio
- 🔒 **Políticas de Autorización**: Controla quién puede editar o eliminar tus posts
- ⚡ **Componentes Interactivos**: Interfaz dinámica con Livewire

## 🛠️ Stack Tecnológico

- **Backend**: Laravel 11
- **Frontend**: Livewire
- **Styling**: Tailwind CSS
- **Database**: MySQL/SQLite
- **Build Tool**: Vite
- **Testing**: PHPUnit

## 📦 Requisitos Previos

- PHP 8.2 o superior
- Composer
- Node.js y npm
- MySQL (o SQLite)

## 🚀 Instalación y Configuración

### 1. Clonar el repositorio
```bash
git clone <url-del-repositorio>
cd devstagram
```

### 2. Instalar dependencias de PHP
```bash
composer install
```

### 3. Crear archivo .env
```bash
cp .env.example .env
```

### 4. Generar clave de aplicación
```bash
php artisan key:generate
```

### 5. Instalar dependencias de Node
```bash
npm install
```

### 6. Ejecutar migraciones
```bash
php artisan migrate
```

### 7. Llenar la base de datos (opcional)
```bash
php artisan db:seed
```

## 💻 Ejecución del Proyecto

### Ejecutar el servidor Backend
```bash
php artisan serve
```
El servidor estará disponible en `http://localhost:8000`

### Ejecutar el servidor Frontend (en otra terminal)
```bash
npm run dev
```

### Para compilar para producción
```bash
npm run build
```

## 📁 Estructura del Proyecto

```
devstagram/
├── app/
│   ├── Http/Controllers/       # Controladores de la aplicación
│   ├── Livewire/               # Componentes Livewire (Like, etc)
│   ├── Models/                 # Modelos (User, Post, Comentario, Like, Follower)
│   └── Policies/               # Políticas de autorización
├── database/
│   ├── migrations/             # Migraciones de base de datos
│   ├── seeders/                # Seeders para datos iniciales
│   └── factories/              # Factories para testing
├── resources/
│   ├── css/                    # Estilos (Tailwind CSS)
│   ├── js/                     # JavaScript de la aplicación
│   └── views/                  # Vistas Blade
├── routes/                     # Definición de rutas
└── storage/
    └── app/public/             # Almacenamiento de imágenes de usuarios y posts
```

## 🗄️ Modelos y Relaciones

- **User**: Usuario del sistema
  - Relación: Muchos Posts, Muchos Comentarios, Muchos Likes
  - Relación: Muchos Followers (seguidores)

- **Post**: Publicación del usuario
  - Relación: Pertenece a User
  - Relación: Muchos Comentarios, Muchos Likes

- **Comentario**: Comentario en un post
  - Relación: Pertenece a User y Post

- **Like**: Me gusta en un post
  - Relación: Pertenece a User y Post

- **Follower**: Relación de seguimiento
  - Relación: Pertenece a User (follower y following)

## 📝 Licencia

Este proyecto es de código abierto bajo la licencia MIT.

## 👨‍💻 Autor

Proyecto desarrollado como práctica de Laravel y desarrollo web.

