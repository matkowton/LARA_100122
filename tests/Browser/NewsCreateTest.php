<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NewsCreateTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                    ->assertSee('Create news')
                    ->assertSee('Заголовок')
                    ->type('title', '')
                    ->press('Save')
                    ->assertSee('Поле Заголовок обязательно для заполнения')
                    ->type('title', '11')
                    ->press('Save')
                    ->assertSee('Количество символов в поле Заголовок должно быть не меньше 10');
        });
    }
}
