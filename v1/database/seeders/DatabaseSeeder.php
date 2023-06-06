<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Photo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    function createAlbumPhoto($values)
    {
        Photo::factory()->create([
            'title' => $values[0],
            'file_path' => $values[1]
        ]);
    }

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->createAlbumPhoto(['Фото Марии Степаненко', 'photos/Tul2D_mUPMo.jpg']);
        $this->createAlbumPhoto(['Макияж', 'photos/IMG_4731.JPG']);
        $this->createAlbumPhoto(['Симеиз', 'photos/IMG_1682.jpeg']);
        $this->createAlbumPhoto(['Аквамарин', 'photos/IMG_3400.JPG']);
        $this->createAlbumPhoto(['Аквамарин др Штанько', 'photos/IMG_3402.JPG']);
        $this->createAlbumPhoto(['Когда еще была блондиночкой)', 'photos/IMG_4038.jpg']);
        $this->createAlbumPhoto(['Прогулка на природе', 'photos/IMG_4683.jpeg']);
        $this->createAlbumPhoto(['Стела', 'photos/IMG_5514.JPG']);
        $this->createAlbumPhoto(['с. Буша, Гайдаматский яр', 'photos/IMG_6138.jpeg']);
        $this->createAlbumPhoto(['Xеллоуин', 'photos/IMG_7849.jpeg']);
        $this->createAlbumPhoto(['Happy New Year!', 'photos/IMG_8454.jpg']);
        $this->createAlbumPhoto(['С Мариной, поход Черная речка', 'photos/IMG_5742.jpg']);
        $this->createAlbumPhoto(['С самой сладкой девочкой Асенькой', 'photos/IMG_5111.jpg']);
        $this->createAlbumPhoto(['Графская пристань', 'photos/IMG_6783.jpg']);
        $this->createAlbumPhoto(['Фото с Настей', 'photos/IMG_2285.jpg']);
    }
}