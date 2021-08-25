<?php

namespace Modules\ModuleManager\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;

class ModuleManagerDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->createMainMenu();

    }


    protected function createMainMenu()
    {

        $menu = Menu::where('name', 'admin')->firstOrFail();

        // Fill out that menu
        $this->createMenuItem($menu->id,
            'Module Manager',
            'admin/modulemanager',
            1,
            '_self',
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
