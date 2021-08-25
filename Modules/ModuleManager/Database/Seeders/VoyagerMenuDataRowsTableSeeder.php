<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;

class VoyagerMenuDataRowsTableSeeder extends Seeder
{
    public function run()
    {
        $this->createMainMenu();
    }

    protected function createMainMenu()
    {

        $menu = Menu::where('name', 'admin')->firstOrFail();

        // Fill out that menu
        $this->createMenuItem($menu->id,
            'Module Manager',
            '/modulemanager',
            1,
            '_blank',
            'voyager-compass');

    }


    protected function createMenuItem($menuId, $title, $url, $order, $target = '_self', $icon = '')
    {
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menuId,
            'title' => $title,
            'url' => $url,
            'route' => null,
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target' => $target,
                'icon_class' => $icon,
                'color' => null,
                'parent_id' => null,
                'order' => $order,
            ])->save();
        }

        return $menuItem;
    }
}
