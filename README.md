I independently developed web app on Year 2025 for R&D purpose
 
 Installation tools
_____________________
- Herd-1.14.0-setup
- xampp-windows-x64-8.2.12-0-VS16-installer
 
 create new project
_____________________
- access window PowerShell
- cd [location name]
- Laravel new [project name]

 Lesson php
______________
- npm run build
- php artisan make:model [tablename] -mfs
- php artisan migrate:fresh --seed
- php artisan migrate:reset
- php artisan migrate:rollback -h
- php artisan make:controller AuthController
- php artisan make:migration create_[tablename]_table
- php artisan migrate
- php artisan make:middleware EnsureEmailIsVerified
