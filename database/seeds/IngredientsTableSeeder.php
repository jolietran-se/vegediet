<?php

use Illuminate\Database\Seeder;

class IngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingredients = [
            [
                'name' => 'Gạo nếp',
                'farina' => 0.749,
                'protein' => 0.084,
                'lipid' => 0.016,
                'calories' => 3.46,
            ], [
                'name' => 'Gạo tẻ',
                'farina' => 0.75,
                'protein' => 0.081,
                'lipid' => 0.013,
                'calories' => 3.44,
            ], [
                'name' => 'Gạo lứt',
                'farina' => 0.728,
                'protein' => 0.075,
                'lipid' => 0.027,
                'calories' => 3.45,
            ], [
                'name' => 'Kê',
                'farina' => 0.69,
                'protein' => 0.07,
                'lipid' => 0.03,
                'calories' => 3.31,
            ], [
                'name' => 'Sắn',
                'farina' => 0.364,
                'protein' => 0.011,
                'lipid' => 0.002,
                'calories' => 1.52,
            ], [
                'name' => 'Sắn dây',
                'farina' => 0.28,
                'protein' => 0.016,
                'lipid' => 0.001,
                'calories' => 1.19,
            ], [
                'name' => 'Khoai lang',
                'farina' => 0.285,
                'protein' => 0.008,
                'lipid' => 0.002,
                'calories' => 1.19,
            ], [
                'name' => 'Đậu cô ve',
                'farina' => 0.549,
                'protein' => 0.218,
                'lipid' => 0.016,
                'calories' => 3.21,
            ], [
                'name' => 'Mỳ Ý',
                'farina' => 0.31,
                'protein' => 0.06,
                'lipid' => 0.009,
                'calories' => 1.57,
            ], [
                'name' => 'Súp lơ xanh',
                'farina' => 0.029,
                'protein' => 0.03,
                'lipid' => 0.029,
                'calories' => 0.26,
            ], [
                'name' => 'Mộc nhĩ',
                'farina' => 0.65,
                'protein' => 0.106,
                'lipid' => 0.002,
                'calories' => 3.04,
            ], [
                'name' => 'Rau muống',
                'farina' => 0.021,
                'protein' => 0.032,
                'lipid' => 0.004,
                'calories' => 0.25,
            ], [
                'name' => 'Đậu phụ',
                'farina' => 0.019,
                'protein' => 0.08,
                'lipid' => 0.048,
                'calories' => 0.76,
            ], [
                'name' => 'Nấm hương khô',
                'farina' => 0.24,
                'protein' => 0.13,
                'lipid' => 0.35,
                'calories' => 2.74,
            ], [
                'name' => 'Nấm hương tươi',
                'farina' => 0.06,
                'protein' => 0.055,
                'lipid' => 0.005,
                'calories' => 0.4,
            ], [
                'name' => 'Nấm mỡ',
                'farina' => 0.045,
                'protein' => 0.04,
                'lipid' => 0.003,
                'calories' => 0.33,
            ], [
                'name' => 'Nẫm rơm',
                'farina' => 0.045,
                'protein' => 0.04,
                'lipid' => 0.003,
                'calories' => 0.31,
            ], [
                'name' => 'Hành tươi',
                'farina' => 0.09,
                'protein' => 0.01,
                'lipid' => 0,
                'calories' => 0.3,
            ], [
                'name' => 'Hành khô',
                'farina' => 0.09,
                'protein' => 0.01,
                'lipid' => 0,
                'calories' => 0.4,
            ], [
                'name' => 'Tỏi',
                'farina' => 0.33,
                'protein' => 0.06,
                'lipid' => 0,
                'calories' => 1.49,
            ], [
                'name' => 'Tỏi tây',
                'farina' => 0.14,
                'protein' => 0.01,
                'lipid' => 0,
                'calories' => 0.61,
            ], [
                'name' => 'Cà chua xanh',
                'farina' => 0.05,
                'protein' => 0.01,
                'lipid' => 0,
                'calories' => 0.23,
            ], [
                'name' => 'Cà chua vàng',
                'farina' => 0.03,
                'protein' => 0.01,
                'lipid' => 0,
                'calories' => 0.15,
            ], [
                'name' => 'Gừng',
                'farina' => 0.18,
                'protein' => 0.02,
                'lipid' => 0,
                'calories' => 0.8,
            ], [
                'name' => 'Sả',
                'farina' => 0.25,
                'protein' => 0.015,
                'lipid' => 0,
                'calories' => 0.99, 
            ], [
                'name' => 'Chanh',
                'farina' => 0.11,
                'protein' => 0.01,
                'lipid' => 0,
                'calories' =>0.3, 
            ], [
                'name' => 'Chanh dây',
                'farina' => 0.23,
                'protein' => 0.02,
                'lipid' => 0.01,
                'calories' => 0.97,
            ], [
                'name' => 'Ớt xanh',
                'farina' => 0.09,
                'protein' => 0.02,
                'lipid' => 0,
                'calories' => 0.4, 
            ], [
                'name' => 'Ớt xanh ngọt',
                'farina' => 0.05,
                'protein' => 0.01,
                'lipid' => 0,
                'calories' => 0.2, 
            ], [
                'name' => 'Ớt đỏ ngọt',
                'farina' => 0.06,
                'protein' => 0.01,
                'lipid' => 0,
                'calories' => 0.31, 
            ], [
                'name' => 'Ớt khô',
                'farina' => 0.7,
                'protein' => 0.11,
                'lipid' => 0.06,
                'calories' => 3.24,
            ], [
                'name' => 'Rau thì là',
                'farina' => 0.07,
                'protein' => 0.03,
                'lipid' => 0.01,
                'calories' => 0.43,
            ], [
                'name' => 'Rau mùi (ngò tây)',
                'farina' => 0.06,
                'protein' => 0.03,
                'lipid' => 0.01,
                'calories' => 0.36,
            ], [
                'name' => 'Rau bina (bó xôi)',
                'farina' => 0.04, 
                'protein' => 0.04,
                'lipid' => 0,
                'calories' => 0.23, 
            ], [
                'name' => 'Xà lách búp Mỹ',
                'farina' => 0.03,
                'protein' => 0.01,
                'lipid' => 0,
                'calories' => 0.14, 
            ], [
                'name' => 'Xà lách xanh',
                'farina' => 0.03,
                'protein' => 0,
                'lipid' => 0,
                'calories' => 0.15, 
            ], [
                'name' => 'Xà lách đỏ',
                'farina' => 0.02,
                'protein' => 0.01,
                'lipid' => 0,
                'calories'=> 0.16,
            ], [
                'name' => 'Cần tây',
                'farina' => 0.04,
                'protein' => 0.01,
                'lipid' => 0,
                'calories' => 0.16,
            ], [
                'name' => 'Ngải cứu',
                'farina' => 0.08,
                'protein' => 0.05,
                'lipid' => 0.05,
                'calories' =>  0.5,
            ], [
                'name' => 'Rau ngổ',
                'farina' => 0.045,
                'protein' => 0.015,
                'lipid' => 0,
                'calories' => 0.16,
            ], [
                'name' => 'Tía Tô',
                'farina' => 0.07,
                'protein' => 0.03,
                'lipid' => 0,
                'calories' => 0.26,  
            ], [
                'name' => 'Rau kinh giới',
                'farina' => 0.065,
                'protein' => 0.027,
                'lipid' => 0,
                'calories' =>0.23,  
            ], [
                'name' => 'Rau muống',
                'farina' => 0.035,
                'protein' => 0.03,
                'lipid' => 0,
                'calories' => 0.3,   
            ], [
                'name' => 'Rau đay',
                'farina' => 0.05,
                'protein' => 0.028,
                'lipid' => 0,
                'calories' => 0.3,   
            ], [
                'name' => 'Rau mồng tơi',
                'farina' => 0.04,
                'protein' => 0.02,
                'lipid' => 0,
                'calories' => 0.14,   
            ], [
                'name' => 'Rau ngót',
                'farina' => 0.06,
                'protein' => 0.53,
                'lipid' => 0,
                'calories' => 0.36,   
            ], [
                'name' => 'Rau bí',
                'farina' => 0.035,
                'protein' => 0.027,
                'lipid' => 0,
                'calories' => 0.18,   
            ], [
                'name' => 'Rau húng',
                'farina' => 0.055,
                'protein' => 0.022,
                'lipid' => 0,
                'calories' => 0.18,   
            ], [
                'name' => 'Húng quế',
                'farina' => 0.03,
                'protein' => 0.03,
                'lipid' => 0.01,
                'calories' =>   0.23,
            ], [
                'name' => 'Rau khoai lang',
                'farina' => 0.04,
                'protein' => 0.026,
                'lipid' => 0,
                'calories' => 0.22,   
            ], [
                'name' => 'Rau kinh giới',
                'farina' => 0.065,
                'protein' => 0.027,
                'lipid' => 0,
                'calories' => 0.23,   
            ], [
                'name' => 'Dọc mùng',
                'farina' => 0.038,
                'protein' => 0.0025,
                'lipid' => 0,
                'calories' => 0.14,   
            ], [
                'name' => 'Hoa chuối',
                'farina' => 0.055,
                'protein' => 0.015,
                'lipid' => 0,
                'calories' => 0.2,   
            ], [
                'name' => 'Giá đỗ',
                'farina' => 0.075,
                'protein' => 0.055,
                'lipid' => 0,
                'calories' => 0.44,   
            ], [
                'name' => 'Me chua',
                'farina' => 0.07,
                'protein' => 0.02,
                'lipid' => 0,
                'calories' => 0.27,   
            ], [
                'name' => 'Dưa cải bắp',
                'farina' => 0.05, 
                'protein' => 0.01,
                'lipid' => 0,
                'calories' => 0.25,   
            ], [
                'name' => 'Mướp',
                'farina' => 0.035,
                'protein' => 0.01,
                'lipid' => 0,
                'calories' => 0.16,   
            ], [
                'name' => 'Đậu bắp',
                'farina' => 0.07,
                'protein' => 0.02,
                'lipid' => 0,
                'calories' => 0.31,   
            ], [
                'name' => 'Măng tre',
                'farina' => 0.06,
                'protein' => 0.02,
                'lipid' => 0,
                'calories' => 0.14,   
            ], [
                'name' => 'Súp lơ',
                'farina' => 0.05,
                'protein' => 0.02,
                'lipid' => 0,
                'calories' => 0.25,   
            ], [
                'name' => 'Khổ qua (mướp đắng)',
                'farina' => 0.04,
                'protein' => 0.01,
                'lipid' => 0,
                'calories' => 0.17,   
            ], [
                'name' => 'Bí đao',
                'farina' => 0.03,
                'protein' => 0,
                'lipid' => 0,
                'calories' => 0.14,   
            ], [
                'name' => 'Bạc hà lục',
                'farina' => 0.08,
                'protein' => 0.03,
                'lipid' => 0.01,
                'calories' => 0.44,
            ], [
                'name' => 'Rau dền',
                'farina' => 0.04,
                'protein' => 0.02,
                'lipid' => 0,
                'calories' => 0.23,   
            ], [
                'name' => 'Đậu nành (xanh)	',
                'farina' => 0.1,
                'protein' => 0.13,
                'lipid' => 0.07,
                'calories' => 1.47,
            ], [
                'name' => 'Bí xanh (mùa hè)',
                'farina' => 0.03,
                'protein' => 0.01,
                'lipid' => 0,
                'calories' => 0.16,   
            ], [
                'name' => 'Quả hồng bì',
                'farina' => 0.1,
                'protein' => 0.02,
                'lipid' => 0,
                'calories' => 0.4,   
            ], [
                'name' => 'Quả na',
                'farina' => 0.25,
                'protein' => 0.02,
                'lipid' => 0.01,
                'calories' => 1.01,
            ], [
                'name' => 'Quả nhãn	',
                'farina' => 0.15,
                'protein' => 0.01,
                'lipid' => 0,
                'calories' => 0.6,   
            ], [
                'name' => 'Lá diếp xoắn',
                'farina' => 0.05,
                'protein' => 0.02,
                'lipid' => 0,
                'calories' => 0.23,   
            ], [
                'name' => 'Củ diếp xoắn',
                'farina' => 0.18,
                'protein' => 0.01,
                'lipid' => 0,
                'calories' => 0.73,   
            ], [
                'name' => 'Dưa chuột',
                'farina' => 0.04,
                'protein' => 0.01,
                'lipid' => 0,
                'calories' =>0.15,   
            ], [
                'name' => 'Cải thìa',
                'farina' => 0.02,
                'protein' => 0.01,
                'lipid' => 0,
                'calories' => 0.09,   
            ], [
                'name' => 'Cải bắp',
                'farina' => 0.06,
                'protein' => 0.01,
                'lipid' => 0,
                'calories' => 0.25,   
            ], [
                'name' => 'Cải thảo',
                'farina' => 0.03,
                'protein' => 0.01,
                'lipid' => 0,
                'calories' => 0.16,   
            ], [
                'name' => 'Cải xoong',
                'farina' => 0.01,
                'protein' => 0.02,
                'lipid' => 0,
                'calories' => 0.11,   
            ], [
                'name' => 'Cải cúc',
                'farina' => 0.03,
                'protein' => 0.03,
                'lipid' => 0.01,
                'calories' => 0.24,
            ], [
                'name' => 'Cà tím',
                'farina' => 0.06,
                'protein' => 0.01,
                'lipid' => 0,
                'calories' => 0.24,   
            ], [
                'name' => 'Cây atiso',
                'farina' => 0.11,
                'protein' => 0.03,
                'lipid' => 0,
                'calories' => 0.47,   
            ], [
                'name' => 'Măng tây',
                'farina' => 0.04,
                'protein' => 0.02,
                'lipid' => 0,
                'calories' => 0.2,   
            ], [
                'name' => 'Quả bơ',
                'farina' => 0.09,
                'protein' => 0.02,
                'lipid' => 0.15,
                'calories' => 1.6,
            ], [
                'name' => 'Củ đậu',
                'farina' => 0.09,
                'protein' => 0.008,
                'lipid' => 0,
                'calories' => 0.38,   
            ], [
                'name' => 'Quả bí ngô',
                'farina' => 0.06,
                'protein' => 0.01,
                'lipid' => 0,
                'calories' => 0.61,   
            ], [
                'name' => 'Su su',
                'farina' => 0.05,
                'protein' => 0.01,
                'lipid' => 0,
                'calories' => 0.19,   
            ], [
                'name' => 'Ngọn su su',
                'farina' => 0.06,
                'protein' => 0.003,
                'lipid' => 0.004,
                'calories' => 0.18,
            ], [
                'name' => 'Su hào',
                'farina' => 0.06,
                'protein' => 0.02,
                'lipid' => 0,
                'calories' =>0.27   
            ]
        ];

        DB::table('ingredients')->insert($ingredients);
    }
}
