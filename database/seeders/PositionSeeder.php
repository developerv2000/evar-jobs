<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = ['Администратор', 'Завсклад', 'Служба безопасности', 'Оператор базы данных', 'Кассир', 'Продавец-консультант', 'Мерчендайзер', 'Маркетолог', 'HR специалист', 'SMM-менеджер', 'Графический дизайнер', 'Уборщица', 'Повар', 'Пиццемейкер ', 'Садовник', 'Пекарь'];

        foreach($positions as $postition) {
            Position::create([
                'name' => $postition
            ]);
        }
    }
}
