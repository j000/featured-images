<?php namespace Ribsousa\Featuredimages;

use System\Classes\PluginBase;
//use RainLab\Blog\Controllers\Categories as CategoriesController;
// RainLab\Pages\Controllers\Index
//use RainLab\Blog\Models\Category as CategoryModel;
// RainLab\Pages\Classes\MenuItem

class Plugin extends PluginBase
{
    public $require = ['RainLab.Pages'];

    public function pluginDetails()
    {
        return [
            'name'        => 'j000.featuredimages::lang.plugin.name',
            'description' => 'j000.featuredimages::lang.plugin.description',
            'author'      => 'Jarosław Rymut',
            'icon'        => 'icon-file'
        ];
    }

    public function boot()
    {
        /*
        CategoryModel::extend(function ($model) {
            $model->attachMany['featured_images'] = [
                'System\Models\File', 'order' => 'sort_order', 'delete' => true
            ];
        });
        CategoriesController::extendFormFields(function ($form, $model) {
            if (!$model instanceof CategoryModel) return;
            $form->addFields([
                'featured_images' => [
                    'label'     => 'j000.featuredimages::lang.plugin.name',
                    'type'      => 'mediafinder',
                    'mode'      => 'image',
                ]
            ]);
        });
         */
        Event::listen('backend.form.extendFields', function ($widget) {

            if (
                !$widget->getController() instanceof \RainLab\Pages\Controllers\Index ||
                !$widget->model instanceof \RainLab\Pages\Classes\MenuItem
            ) {
                return;
            }

            $widget->addTabFields([
                'viewBag[featured]' => [
                    'label'     => 'j000.featuredimages::lang.plugin.name',
                    'type'      => 'mediafinder',
                    'mode'      => 'image',
                ]
            ]);
        });
    }
}
