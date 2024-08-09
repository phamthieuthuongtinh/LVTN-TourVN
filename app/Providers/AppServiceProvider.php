<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Banner;
use App\Models\Statistical;
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
    public function getStatistics(){
        $statistics = Statistical::selectRaw('MONTH(order_date) as month, SUM(sales) as total_sales, SUM(profit) as total_profit')
        ->groupByRaw('MONTH(order_date)')
        ->get();
        return  $statistics;
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
            $statistics=$this->getStatistics();
            $view->with('categories',$categories)->with('banners',$banners)->with('statistics',$statistics);
        });
    }
}
