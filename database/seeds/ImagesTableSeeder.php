<?php

use App\Models\Apartment;
use App\Models\Image;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = [
            'https://a0.muscache.com/im/pictures/miso/Hosting-36169784/original/124ed841-12cf-4cdc-8560-6d37c610ba73.jpeg?im_w=1200',
            'https://a0.muscache.com/im/pictures/7bf39cf6-1d86-4994-a13e-a39915b4259e.jpg?im_w=1440',
            'https://a0.muscache.com/im/pictures/37d300df-f3c5-4d92-af69-7d755f2066cf.jpg?im_w=1440',
            'https://a0.muscache.com/im/pictures/20437fc2-e194-4459-8318-b68289d870be.jpg?im_w=1440',
            'https://a0.muscache.com/im/pictures/miso/Hosting-36169784/original/e94b129c-19ca-405c-a3b1-418bf012a7d8.jpeg?im_w=1440',
            'https://a0.muscache.com/im/pictures/9e4e009a-294e-483a-9e6e-7dbd2bf5fca3.jpg?im_w=1440',
            'https://a0.muscache.com/im/pictures/638302a2-8908-499c-820f-9db8d4dda91d.jpg?im_w=1440',
            'https://a0.muscache.com/im/pictures/59275654/2dcde5dc_original.jpg?im_w=1200',
            'https://a0.muscache.com/im/pictures/59275835/15576ad0_original.jpg?im_w=1440',
            'https://a0.muscache.com/im/pictures/59275754/dda6841d_original.jpg?im_w=1440',
            'https://a0.muscache.com/im/pictures/60074790/9703155a_original.jpg?im_w=1440',
            'https://a0.muscache.com/im/pictures/59274232/2ba0ecf6_original.jpg?im_w=1440',
            'https://a0.muscache.com/im/pictures/59275600/63a3a2fa_original.jpg?im_w=1440',
            'https://a0.muscache.com/im/pictures/19b293bc-8dfd-4a61-b9d1-a6c7deece75b.jpg?im_w=1440',
            'https://a0.muscache.com/im/pictures/60074746/a6254276_original.jpg?im_w=1440',
            'https://a0.muscache.com/im/pictures/monet/Luxury-660649704045467259/original/50434f11-d7bd-4986-a78a-fac692d0e062?im_w=1440',
            'https://a0.muscache.com/im/pictures/monet/Luxury-660649704045467259/original/08155438-9751-401c-b0d7-fa31be950053?im_w=1440',
            'https://a0.muscache.com/im/pictures/monet/Luxury-660649704045467259/original/d15bc9d6-7fed-44f4-8762-9a4c94658a50?im_w=1440',
            'https://a0.muscache.com/im/pictures/monet/Luxury-660649704045467259/original/f5787391-ca20-4a9e-a1b4-263914fc5612?im_w=1440',
            'https://a0.muscache.com/im/pictures/monet/Luxury-660649704045467259/original/98ddd50b-d901-4f3f-8e06-9f06dd836dc9?im_w=1440',
            'https://a0.muscache.com/im/pictures/monet/Luxury-660649704045467259/original/bca1b121-b2a4-44e1-9cf7-b4042ef33450?im_w=1440',
            'https://a0.muscache.com/im/pictures/monet/Luxury-660649704045467259/original/49a15cf6-49b8-4b8a-a59e-a4bb653bdf54?im_w=1440',
            'https://a0.muscache.com/im/pictures/monet/Luxury-660649704045467259/original/06df802a-d61b-4b18-8e78-0da813f8ec17?im_w=1440',
            'https://a0.muscache.com/im/pictures/monet/Luxury-660649704045467259/original/8cf90014-7042-44f3-b7af-6da7cecd48af?im_w=1440',
            'https://a0.muscache.com/im/pictures/monet/Luxury-660649704045467259/original/5bef30e7-660f-4f24-99d6-276e912b2793?im_w=1440',
            'https://a0.muscache.com/im/pictures/monet/Luxury-660649704045467259/original/5971b9c9-172c-409e-8d8a-759023c48615?im_w=1440',
            'https://a0.muscache.com/im/pictures/prohost-api/Hosting-49359713/original/9e602b02-08db-4b63-bd27-b15eeb326169.jpeg?im_w=1200',
            'https://a0.muscache.com/im/pictures/prohost-api/Hosting-49359713/original/efce3fef-fdce-4723-ac8a-4a1beb546c65.jpeg?im_w=1440',
            'https://a0.muscache.com/im/pictures/prohost-api/Hosting-49359713/original/2a01b563-425b-4d15-b1ef-cf91ababa8fc.jpeg?im_w=1440',
            'https://a0.muscache.com/im/pictures/prohost-api/Hosting-49359713/original/cdd69db6-b157-44b7-a3e0-2ae6bc79df14.jpeg?im_w=1440',
            'https://a0.muscache.com/im/pictures/prohost-api/Hosting-49359713/original/3bd9b736-240e-45d0-bb60-33f3c95e4762.jpeg?im_w=1440',
            'https://a0.muscache.com/im/pictures/72669850/fcadcb4a_original.jpg?im_w=1440',
            'https://a0.muscache.com/im/pictures/9bfe3f1f-7a8e-4875-897d-2157f326b52c.jpg?im_w=1440',
            'https://a0.muscache.com/im/pictures/72670009/a77ae020_original.jpg?im_w=1440',
            'https://a0.muscache.com/im/pictures/1b8fa944-2434-442d-ac01-0fcaf53e0c90.jpg?im_w=1440',
            'https://a0.muscache.com/im/pictures/459c989a-f9f6-43b4-8ac8-be24adab10f5.jpg?im_w=720'

        ];

        $apartments = Apartment::all();

        foreach ($apartments as $apartment) {
            $isFirst = true;
            $randomItems = Arr::random($images, 5);
            foreach ($randomItems as $randomItem => $value) {
                $newImage = new Image();
                $newImage->image = $value;
                $newImage->apartment_id = $apartment->id;
                if ($isFirst) {
                    $newImage->is_cover = true;
                } else {
                    $newImage->is_cover = false;
                }
                $isFirst = false;
                $newImage->save();
            }
        }
    }
}
