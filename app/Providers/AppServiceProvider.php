<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Banner;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    public function getCategoriesProduct(){
        $categories= Category::orderBy('id','ASC')->get();
        $listCategory=[];
        Category::recursive($categories,$parents=0,$level=1,$listCategory);
        return $listCategory;
    }
    public function getBanners(){
        $banners= Banner::orderBy('banner_id','DESC')->get();
        return $banners;
    }
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
        View::composer('*',function($view){
            $categories = $this->getCategoriesProduct();
            $banners=$this->getBanners();
            $view->with('categories',$categories)->with('banners',$banners);
        });
    }
}
