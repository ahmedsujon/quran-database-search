<?php

namespace App\Livewire\App\QueriesSearch;

use Livewire\Component;
use App\Models\MainMenu;

class QueryMenusComponent extends Component
{
    public function render()
    {
        $menu_name = request()->menu_name;
        if ($menu_name) {
            session(['menu_name' => $menu_name]);
        }

        $main_menus = MainMenu::all();
        return view('livewire.app.queries-search.query-menus-component', ['main_menus' => $main_menus])
            ->layout('livewire.app.layouts.base');
    }

}
