<?php

namespace Tests\Unit;

use App\Models\NewsOld;
use PHPUnit\Framework\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $model = new NewsOld();
        $data = $model->getByCategoryId(3);
        $this->assertIsArray($data);
        $this->assertNotEmpty($data);

        foreach ($data as $item) {
            $this->assertEquals(3, $item['category_id']);
        }
        //проверить что массив
        //массив не пустой
        //Все ключи есть
        // Тип данных по каждому ключу
    }
}
