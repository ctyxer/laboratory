<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Настройка поекта

## Загрузка зависимостей

Установка зависимостей

    composer install; 
    npm install;

Загрузка фотогдафий для фотоальбома. Для этого cначала нужно подключить публичный диск

    php artisan storage:link

Теперь необходимо создать папку photos по пути storage/app/public

    mkdir storage/app/public/photos

В созданную папку storage/app/public/photos нужно положить следующие фотографии(взяты из предоставленного архива)

- IMG_2285.jpg
- IMG_6783.jpg
- IMG_5111.jpg
- IMG_5742.jpg
- IMG_8454.jpg
- IMG_7849.jpeg
- IMG_6138.jpeg
- IMG_5514.JPG
- IMG_4683.jpeg
- IMG_4038.jpg
- IMG_3402.JPG
- IMG_3400.JPG
- IMG_1682.jpeg
- IMG_4731.JPG
- Tul2D_mUPMo.jpg


Теперь необходимо созадть новый файл для сохранения сообщений пользователей в гостевую книгу. Для этого надо создать файл messages.inc в папке storage/app/messages

    mkdir storage/app/messages;
    echo "[]" > storage/app/messages/messages.inc;

---

## Инициализация проекта

Нужно скопировать файл ".env.example" и переименовать в ".env"

    cp .env.example .env

Далее нужно создать ключ приложения

    php artisan key:generate

Подключить СУБД можно в файле ".env", изменив следующие поля(Используется MySQL и значение порта по умолчанию)

    DB_DATABASE={Название базы данных}
    DB_USERNAME={Логин пользователя СУБД}
    DB_PASSWORD={Пароль пользователя СУБД}

Запустить миграции и сидер базы данных, для использования моделей Photo и Interest

    php artisan migrate --seed

Подготовить дополнительные файлы(.css, .js) для использования на странице
    npx mix