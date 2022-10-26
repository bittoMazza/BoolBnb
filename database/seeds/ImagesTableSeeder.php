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
            'https://a0.muscache.com/im/pictures/prohost-api/Hosting-50768459/original/440eca9f-f5c8-4e0a-815b-5d6141f707d0.jpeg?im_w=1200',
            'https://a0.muscache.com/im/pictures/prohost-api/Hosting-50768459/original/384a4abe-f18c-4eec-9cc8-b4a3b7a78632.jpeg?im_w=1200',
            'https://a0.muscache.com/im/pictures/prohost-api/Hosting-50768459/original/d74a1a78-3476-47ae-ba3f-eb42c1af0e98.jpeg?im_w=1200',
            'https://a0.muscache.com/im/pictures/prohost-api/Hosting-656456202599059844/original/4dd9802c-0f7b-4eae-b535-e28c7904f332.jpeg?im_w=1200',
            'https://a0.muscache.com/im/pictures/prohost-api/Hosting-656456202599059844/original/fbab0534-222f-4e42-9e12-ed9996b2e224.jpeg?im_w=1200',
            'https://a0.muscache.com/im/pictures/prohost-api/Hosting-656456202599059844/original/915d371f-be15-46ae-9c6c-03e29aad475d.jpeg?im_w=720',
            'https://a0.muscache.com/im/pictures/337660c5-939a-439b-976f-19219dbc80c7.jpg?im_w=1200',
            'https://a0.muscache.com/im/pictures/0fa1fc47-6fe4-4d32-8673-ba4f6df847aa.jpg?im_w=720',
            'https://a0.muscache.com/im/pictures/fa535a77-3858-4431-ba2c-87d8490adbdc.jpg?im_w=720',
            'https://a0.muscache.com/im/pictures/00370466-e3f6-4213-aaff-10b2a51a7e15.jpg?im_w=1200',
            'https://a0.muscache.com/im/pictures/921df750-d057-421b-936c-d8bfd5178c07.jpg?im_w=1200',
            'https://a0.muscache.com/im/pictures/miso/Hosting-16484810/original/e77b42ca-f330-4118-a5a0-7ab7f671ee1d.jpeg?im_w=720',
            'https://a0.muscache.com/im/pictures/22aadc1a-c141-490b-80e9-c176ab1b5993.jpg?im_w=720',
            'https://a0.muscache.com/im/pictures/74103406/f2fbf5b7_original.jpg?im_w=1200',
            'https://a0.muscache.com/im/pictures/74103492/69b4479d_original.jpg?im_w=1200',
            'https://a0.muscache.com/im/pictures/57814185/fe69ab96_original.jpg?im_w=720',
            'https://a0.muscache.com/im/pictures/58586665/e0c322b5_original.jpg?im_w=1200',
            'https://a0.muscache.com/im/pictures/28f2a34e-c2aa-4206-8a84-b96c40b46faf.jpg?im_w=1200',
            'https://a0.muscache.com/im/pictures/19ec2039-2f4e-4168-a603-0b41f0077667.jpg?im_w=720',
            'https://a0.muscache.com/im/pictures/2693109b-eb83-4d8a-b3f9-d30c51789204.jpg?im_w=1200',
            'https://a0.muscache.com/im/pictures/c3fa3c40-4c21-4775-a478-599198f1979f.jpg?im_w=1200',
            'https://a0.muscache.com/im/pictures/809ca1df-4009-4c7d-bc76-700ced9610ba.jpg?im_w=720',
            'https://a0.muscache.com/im/pictures/40ab55f2-c0bf-4aee-8370-61d1044f5ec7.jpg?im_w=720',
            'https://a0.muscache.com/im/pictures/df7b3603-5ee7-43ee-bdeb-25517afaae5d.jpg?im_w=1200',
            'https://a0.muscache.com/im/pictures/eecd974e-9dde-49f9-9044-f9b65e817cc3.jpg?im_w=720',
            'https://a0.muscache.com/im/pictures/94cbedf6-8ef6-4d9c-a000-e68347210955.jpg?im_w=720',
            'https://a0.muscache.com/im/pictures/d0e3bb05-a96a-45cf-af92-980269168096.jpg?im_w=1200',
            'https://a0.muscache.com/im/pictures/c2120b84-291d-4738-a911-97672d2ab3f2.jpg?im_w=720',
            'https://a0.muscache.com/im/pictures/8bbe2dae-f9a5-4d5e-b682-5a8c2bc2231a.jpg?im_w=720',
            'https://a0.muscache.com/im/pictures/prohost-api/Hosting-49359713/original/9e602b02-08db-4b63-bd27-b15eeb326169.jpeg?im_w=1200',
            'https://a0.muscache.com/im/pictures/prohost-api/Hosting-49359713/original/efce3fef-fdce-4723-ac8a-4a1beb546c65.jpeg?im_w=1440',
            'https://a0.muscache.com/im/pictures/prohost-api/Hosting-49359713/original/2a01b563-425b-4d15-b1ef-cf91ababa8fc.jpeg?im_w=1440',
            'https://a0.muscache.com/im/pictures/prohost-api/Hosting-49359713/original/cdd69db6-b157-44b7-a3e0-2ae6bc79df14.jpeg?im_w=1440',
            'https://a0.muscache.com/im/pictures/prohost-api/Hosting-49359713/original/3bd9b736-240e-45d0-bb60-33f3c95e4762.jpeg?im_w=1440',
            'https://a0.muscache.com/im/pictures/72669850/fcadcb4a_original.jpg?im_w=1440',
            'https://a0.muscache.com/im/pictures/9bfe3f1f-7a8e-4875-897d-2157f326b52c.jpg?im_w=1440',
            'https://a0.muscache.com/im/pictures/72670009/a77ae020_original.jpg?im_w=1440',
            'https://a0.muscache.com/im/pictures/1b8fa944-2434-442d-ac01-0fcaf53e0c90.jpg?im_w=1440',
            'https://a0.muscache.com/im/pictures/459c989a-f9f6-43b4-8ac8-be24adab10f5.jpg?im_w=720',
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
