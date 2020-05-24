<?php

use Illuminate\Database\Seeder;

class ManagerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //借助循环，每次生成得数据不一样 faker代码依赖 这个faker不需要自己安装，框架自己带
        $faker = \Faker\Factory::create('zh_CN');
        //访问具体得属性来获取数据
        $data=[];
        for($i=0;$i<100;$i++){
            $data[]=[
                'username' =>  $faker->userName,
                'password' => bcrypt('123456'),//使用框架内置bcrypt方法加密密码
                'gender'   =>   rand(1,3),//随机性别
                'mobile'   =>   $faker->phoneNumber,
                'email'    =>   $faker->email,
                'role_id'  =>   rand(1,6),
                'created_at' => date('Y-m-d H:i:s',time()),
                'status'  => rand(1,2)
            ];
        }
        DB::table('manager')->insert($data);
    }
}
