<?php

use Illuminate\Database\Seeder;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dishes = [
            [
                'name' => 'Khoai lang luộc',
                'farina_amount' => 28.5,
                'protein_amount' => 0.8,
                'lipid_amount' => 0.2,
                'calories_amount' => 119,
                'description' => 'Nếu bạn thích ăn khoai lang luộc nhưng chưa biết cách luộc khoai lang sao cho thơm ngon mà không bị nát thì bạn đã tìm đúng địa chỉ rồi đó.',
                'picture' => 'product-1.jpg',
                'like_number' => 1637,
                'owner_id' => 1,
                'slug' => 'khoai-lang-luoc',
            ], [
                'name' => 'Đậu cô ve luộc',
                'farina_amount' => 54.9,
                'protein_amount' => 21.8,
                'lipid_amount' => 1.6,
                'calories_amount' => 321,
                'description' => 'Cách làm món Đậu cô ve luộc ngon tuyệt của nhà mình ;) Món này tuy đơn giản nhưng mẹ yêu cầu Như phải luộc sao cho có màu xanh và giữ màu lâu.',
                'picture' => 'product-2.jpg',
                'like_number' => 242,
                'owner_id' => 1,
                'slug' => 'dau-co-ve-luoc',
            ], [
                'name' => 'Đậu phụ xốt tứ xuyên',
                'farina_amount' => 70.5,
                'protein_amount' => 60.2,
                'lipid_amount' => 2.0,
                'calories_amount' => 150,
                'description' => 'Đậu phụ xốt mang hương vị cay nồng của tứ xuyên, món ăn dành cho các tín đồ chay thích ăn cay :v',
                'picture' => 'product-3.jpg',
                'like_number' => 2730,
                'owner_id' => 2,
                'slug' => 'dau-phu-xot-tu-xuyen',
            ], [
                'name' => 'Bún xào chay',
                'farina_amount' => 30.4,
                'protein_amount' => 15.8,
                'lipid_amount' => 1.3,
                'calories_amount' => 132,
                'description' => 'Bún xào nghe lạ hoắc nhưng thử một lần là nghiện đấy nhé',
                'picture' => 'product-4.jpg',
                'like_number' => 782,
                'owner_id' => 2,
                'slug' => 'bun-xao-chay',
            ], [
                'name' => 'Đậu hũ cay xốt',
                'farina_amount' => 55.9,
                'protein_amount' => 26.8,
                'lipid_amount' => 1.9,
                'calories_amount' => 159,
                'description' => 'Đậu hũ xốt cà chua, thêm mùi thơm thơm của nấm hương, hành tươi',
                'picture' => 'product-5.jpg',
                'like_number' => 652,
                'owner_id' => 2,
                'slug' => 'dau-hu-xot-cay',
            ], [
                'name' => 'Đậu hũ la hán',
                'farina_amount' => 60.6,
                'protein_amount' => 21.2,
                'lipid_amount' => 1.0,
                'calories_amount' => 95,
                'description' => 'Đậu hũ la hán với hương vị vô cùng độc đáo, đậm chất trung hoa',
                'picture' => 'product-6.jpg',
                'like_number' => 3452,
                'owner_id' => 3,
                'slug' => 'dau-hu-la-han',
            ], [
                'name' => 'Rau củ kho chay',
                'farina_amount' => 30.7,
                'protein_amount' => 23.4,
                'lipid_amount' => 0.9,
                'calories_amount' => 105,
                'description' => 'Rau củ quả kho là món ăn chay phổ biến, rất tốt cho những người bệnh tim mạch',
                'picture' => 'product-7.jpg',
                'like_number' => 241,
                'owner_id' => 3,
                'slug' => 'rau-cu-kho-chay',
            ], [
                'name' => 'Chả giò bắp chay',
                'farina_amount' => 64.9,
                'protein_amount' => 51.8,
                'lipid_amount' => 2.6,
                'calories_amount' => 223,
                'description' => 'Món chay này sẽ khiến chúng ta thèm ăn chay hơn bao giờ hết',
                'picture' => 'product-8.jpg',
                'like_number' => 421,
                'owner_id' => 4,
                'slug' => 'cha-gio-bap-chay',
            ], [
                'name' => 'Bún bò huế chay',
                'farina_amount' => 54.9,
                'protein_amount' => 21.8,
                'lipid_amount' => 1.6,
                'calories_amount' => 112,
                'description' => 'Cách làm món Bún bò huế chay ! ngon tuyệt của nhà mình ;) Bún bò huế là một món ăn ngon nổi tiếng với hương vị đậm đà nồng nàn quyến rũ sa tế sả ớt.',
                'picture' => 'product-9.jpg',
                'like_number' => 2834,
                'owner_id' => 4,
                'slug' => 'bun-bo-hue-chay',
            ], [
                'name' => 'Salad cà chua bi',
                'farina_amount' => 24.9,
                'protein_amount' => 11.8,
                'lipid_amount' => 0.2,
                'calories_amount' => 59,
                'description' => 'Món salad hấp dẫn đây các chế',
                'picture' => 'product-10.jpg',
                'like_number' => 1455,
                'owner_id' => 5,
                'slug' => 'salad-ca-chua-bi',
            ], [
                'name' => 'Rau chân vịt trộn bơ lạc',
                'farina_amount' => 54.9,
                'protein_amount' => 21.8,
                'lipid_amount' => 1.9,
                'calories_amount' => 155,
                'description' => 'Mấy thím ghiền rau chân vịt thì ko thể nào bỏ qua',
                'picture' => 'product-11.jpg',
                'like_number' => 1223,
                'owner_id' => 5,
                'slug' => 'rau-chan-vit-tron-bo-lac',
            ], 
        ];
        
        DB::table('dishes')->insert($dishes);
    }
}
