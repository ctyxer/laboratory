<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Interest;
use App\Models\Photo;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    function createAlbumPhoto($values)
    {
        Photo::factory()->create([
            'title' => $values[0],
            'file_path' => $values[1]
        ]);
    }

    function createIntrerest($values)
    {
        Interest::factory()->create([
            'title' => $values[0],
            'description' => $values[1],
            'category_id' => $values[2]
        ]);
    }

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /** Seed Album */
        $this->createAlbumPhoto(['Фото Марии Степаненко', 'storage/photos/Tul2D_mUPMo.jpg']);
        $this->createAlbumPhoto(['Макияж', 'storage/photos/IMG_4731.JPG']);
        $this->createAlbumPhoto(['Симеиз', 'storage/photos/IMG_1682.jpeg']);
        $this->createAlbumPhoto(['Аквамарин', 'storage/photos/IMG_3400.JPG']);
        $this->createAlbumPhoto(['Аквамарин др Штанько', 'storage/photos/IMG_3402.JPG']);
        $this->createAlbumPhoto(['Когда еще была блондиночкой)', 'storage/photos/IMG_4038.jpg']);
        $this->createAlbumPhoto(['Прогулка на природе', 'storage/photos/IMG_4683.jpeg']);
        $this->createAlbumPhoto(['Стела', 'storage/photos/IMG_5514.JPG']);
        $this->createAlbumPhoto(['с. Буша, Гайдаматский яр', 'storage/photos/IMG_6138.jpeg']);
        $this->createAlbumPhoto(['Xеллоуин', 'storage/photos/IMG_7849.jpeg']);
        $this->createAlbumPhoto(['Happy New Year!', 'storage/photos/IMG_8454.jpg']);
        $this->createAlbumPhoto(['С Мариной, поход Черная речка', 'storage/photos/IMG_5742.jpg']);
        $this->createAlbumPhoto(['С самой сладкой девочкой Асенькой', 'storage/photos/IMG_5111.jpg']);
        $this->createAlbumPhoto(['Графская пристань', 'storage/photos/IMG_6783.jpg']);
        $this->createAlbumPhoto(['Фото с Настей', 'storage/photos/IMG_2285.jpg']);

        /** Seed Interests */
        $myHobby = Category::factory()->create([
            'title' => 'Мои хобби'
        ]);
        $favoriteFilms = Category::factory()->create([
            'title' => 'Любимые фильмы'
        ]);
        $favoriteBooks = Category::factory()->create([
            'title' => 'Любимые книги'
        ]);

        $this->createIntrerest(['Макияж', 'Увлекаюсь всем хоть сколько-нибудь творческим', $myHobby->id]);
        $this->createIntrerest(['Фотография', 'Увлекаюсь всем хоть сколько-нибудь творческим', $myHobby->id]);
        $this->createIntrerest(['Мода', 'Увлекаюсь всем хоть сколько-нибудь творческим', $myHobby->id]);

        
        $this->createIntrerest(['Гордость и предубеждение', 'Читаю романтику, фэнтези и сюжеты с глубоким смыслом', $favoriteFilms->id]);
        $this->createIntrerest(['Цветы для Элджерона', 'Читаю романтику, фэнтези и сюжеты с глубоким смыслом', $favoriteFilms->id]);
        $this->createIntrerest(['Гарри Поттер', 'Читаю романтику, фэнтези и сюжеты с глубоким смыслом', $favoriteFilms->id]);
        
        $this->createIntrerest(['Невидимый гость', 'В основном смотрю психологические триллеры и романтические комедии', $favoriteBooks->id]);
        $this->createIntrerest(['Гарри Поттер', 'В основном смотрю психологические триллеры и романтические комедии', $favoriteBooks->id]);
        $this->createIntrerest(['Отпуск по обмену', 'В основном смотрю психологические триллеры и романтические комедии', $favoriteBooks->id]);
    
        /**Seed users */
        $roleDefault = Role::factory()->create([
            'name' => 'Обычный'
        ]);
        
        $roleAdmin = Role::factory()->create([
            'name' => 'Администратор'
        ]);

        $admin = User::factory()->create([
            'full_name' => 'Степаненко Мария Денисовна',
            'login' => 'mashasua2', 
            'email' => 'mail@mail.com',
            'password' => Hash::make('admin'),
            'role_id' => $roleAdmin->id
        ]);
    }
}