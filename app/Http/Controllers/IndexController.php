<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Category;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Departure;
use App\Models\Type;
use App\Models\Service;
use App\Models\Like;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(){
        if(Session::get('customer_id')){
            $recommends= collect();
            $customer_id=Session::get('customer_id');
            $likes=Like::where('customer_id',$customer_id)->get();
            $like_tour_id=$likes->pluck ('tour_id')->toArray();
            $tour=Tour::wherein('id',$like_tour_id)->get();
            $cate_id=$tour->pluck ('category_id')->toArray();

            $recommends_1=Tour::whereIn('category_id',$cate_id)->whereNotIn('id',$like_tour_id)->get();

            //Lấy recommend theo loại tour đã đặt
            $ordered_list=Order::where('customer_id',$customer_id)->get();
            $ordered_ordercode=$ordered_list->pluck('order_code')->toArray();
            $orderdetails=Orderdetail::whereIn('order_code',$ordered_ordercode)->get();
            $tourId_list=$orderdetails->pluck('tour_id')->toArray();
            $tour_list=Tour::wherein('id',$tourId_list)->get();
            $type_id=$tour_list->pluck('type_id')->toArray();
           
            // dd($customer_id);
            $recommends_2=Tour::whereIn('type_id',$type_id)->whereNotIn('id',$tourId_list)->get();
        
            $recommends = $recommends_1->merge($recommends_2)->unique('id');
            // $customerPreference = 'Khám phá nét văn hóa nhiều nơi';
            // $otherPreference = 'thám hiểm ở nhiều nơi';
    
            // $result = $this->analyzePreferences($customerPreference, $otherPreference);
    
            // // Xử lý kết quả phân tích (nếu cần)
            // $similarity = $result['similarity'] ?? 'không';
            // return view('pages.home',compact('recommends','likes','similarity'));
            return view('pages.home',compact('recommends','likes'));
        }  
        else{
            return view('pages.home');
        }      
    }
    // Xử lý ngôn ngữ tự nhiên NLP
    public function analyzePreferences($text1, $text2)
    {
        $scriptPath = base_path('public/python/nlp_analysis.py');
        
        // Escape the text inputs for shell command
        $escapedText1 = escapeshellarg($text1);
        $escapedText2 = escapeshellarg($text2);
    
        // Run the Python script and capture the output
        $command = "python $scriptPath $escapedText1 $escapedText2";
        $output = shell_exec($command);
    
        // Decode JSON output
        $result = json_decode($output, true);
    
        return $result;
    }    

    public function login_customer()
    {
        return view('pages.login'); 
    }
    public function register_customer()
    {
        return view('pages.register_customer'); 
    }
    public function payment_success()
    {
        return view('pages.payment_success'); 
    }
    public function search(Request $request){
        $query = Tour::query(); // Khởi tạo một query builder cho model Tour
     
        if ($request->has('tour_to') && $request->tour_to != null) {
            $query->where('title', 'like', '%' . $request->tour_to . '%');
        }
    
        if ($request->has('price') && $request->price != null) {
            switch ($request->price) {
                case 'under5':
                    $query->where('price', '<', 5000000);
                    break;
                case '5to10':
                    $query->whereBetween('price', [5000000, 10000000]);
                    break;
                case '10to20':
                    $query->whereBetween('price', [10000000, 20000000]);
                    break;
                case 'over20':
                    $query->where('price', '>', 20000000);
                    break;
            }
        }
        $tours_get = $query->get();
        // Kiểm tra nếu người dùng chọn ngày khởi hành
        if ($request->has('departure_date') && $request->departure_date != null) {
            $departure_date = Carbon::createFromFormat('d/m/Y', $request->departure_date)->format('Y-m-d');
            $tour_ids=$tours_get->pluck('id')->toArray();
           
            $tour_get_2=Departure::whereIn('tour_id',$tour_ids)->where('departure_date',$departure_date)->get();
            $tour_get_2=$tour_get_2->pluck('tour_id')->toArray();
            $tours_get=Tour::whereIn('id',$tour_get_2)->get();
            // dd($request->departure_date);
        }
        $tours=$tours_get;
        // Thực hiện truy vấn và lấy kết quả
       
        if(Session::get('customer_id')){
            $customer_id=Session::get('customer_id');
            $likes=Like::where('customer_id',$customer_id)->get();
            return view('pages.search',compact('tours','likes'));
           
        }
       else{
            return view('pages.search',compact('tours'));
       }
    }

//     public function filterTours(Request $request)
// {
//     $category = Category::where('slug', $request->slug)->first();
//     $query = Tour::where('category_id', $category->id)
//                  ->where('status', 3)
//                  ->with('category')
//                  ->with(['departures' => function ($query) {
//                      $query->where('status', 1)
//                            ->where('departure_date', '>=', Carbon::today())
//                            ->orderBy('departure_date', 'ASC');
//                  }]);

//     // Lọc theo giá
//     if ($request->price) {
//         switch ($request->price) {
//             case 'under5':
//                 $query->where('price', '<', 5000000);
//                 break;
//             case '5to10':
//                 $query->whereBetween('price', [5000000, 10000000]);
//                 break;
//             case '10to20':
//                 $query->whereBetween('price', [10000000, 20000000]);
//                 break;
//             case 'over20':
//                 $query->where('price', '>', 20000000);
//                 break;
//         }
//     }

//     // Lọc theo loại tour
//     if ($request->tour_type) {
//         $query->where('type_id', $request->tour_type);
//     }

//     // Lọc theo phương tiện
//     if ($request->tour_from) {
//         $query->where('tour_from', $request->tour_from);
//     }

//     // Paginate
//     $tours = $query->paginate(2);

//     return response()->json(['tours' => $tours]);
// }

    
    
}
