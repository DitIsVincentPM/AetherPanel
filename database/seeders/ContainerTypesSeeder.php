<?php

namespace Database\Seeders;

use App\Models\ContainerType;
use Illuminate\Database\Seeder;

class ContainerTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        ContainerType::create([
            'name' => 'Minecraft',
            'json' => '{"test": "test"}',
            'docker_image' => 'test/test:latest',
            'image' => 'https://store-images.s-microsoft.com/image/apps.29741.14581193029730121.5999c68b-7fd8-48ec-b0cb-3e37e1d7ec03.38839d35-0654-480a-b909-a5107b3f9d14',
        ]);

        ContainerType::create([
            'name' => 'ARK: Survival Evolved',
            'json' => '{"test": "test"}',
            'docker_image' => 'test/test:latest',
            'image' => 'https://www.nintendo.com/eu/media/images/10_share_images/games_15/nintendo_switch_4/H2x1_NSwitch_ARKSurvivalEvolved.jpg',
        ]);

        ContainerType::create([
            'name' => 'Rust',
            'json' => '{"test": "test"}',
            'docker_image' => 'test/test:latest',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQLzWsB-_S3W--SqVXSeG05VLGDAWxoJ1VFPQ&s',
        ]);

        ContainerType::create([
            'name' => 'Terraria',
            'json' => '{"test": "test"}',
            'docker_image' => 'test/test:latest',
            'image' => 'https://play-lh.googleusercontent.com/NpMliVjbQx0qLgZHLk0YHaxdjTaLEzxbCxoAOsGJbzYmsCN7ZFBSBWHDHF4tqCqsx84=w526-h296-rw',
        ]);
    }
}
