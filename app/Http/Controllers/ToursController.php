<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Category;
use App\Models\Departure;
use App\Models\Comment;
use App\Models\Rating;
use App\Models\Itinerary;
use App\Models\Service;
use App\Models\Itinerarydetail;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ToursController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tours=Tour::with('category')->Orderby('status','DESC')->get();
        return view('admin.tours.index',compact('tours'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories= Category::Orderby('id','DESC')->get();
        return view('admin.tours.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|unique:tours|max:255',
            'description' => 'required|max:220',
            
            'category_id' => 'required',
            'price' => 'required',
            'price_treem' => 'required',
            'price_trenho' => 'required',
            'price_sosinh' => 'required',
            'vehicle' => 'required',
            'tour_from' => 'required',
            'tour_to' => 'required',
            'image' => 'required',
            'status' => 'required',

            'so_ngay' => 'required',
            'so_dem' => 'required',
        ],[
            'title.required' => 'Bạn chưa nhập tiêu đề',
            'title.unique' => 'Tiêu đề này đã có',
            'description.required' => 'Bạn chưa nhập mô tả',
            
            'price.required' => 'Bạn chưa nhập giá',
            'vehicle.required' => 'Bạn chưa nhập phương tiện',
            'tour_from.required' => 'Bạn chưa nhập nơi xuất phát',
            'tour_to.required' => 'Bạn chưa nhập nơi đến',
            'image.required' => 'Bạn chưa chọn hình ảnh',
            'status.required' => 'Bạn chưa chọn trạng thái hiển thị',

            'so_ngay.required' => 'Bạn chưa nhập số ngày',
            'so_dem.required' => 'Bạn chưa nhập số đêm',
            
        ]);
        $tour = new Tour();
        $tour->title = $data['title'];
        $tour->description = $data['description'];
        $tour->status = $data['status'];
      
        $tour->category_id = $data['category_id'];
        $tour->price = $data['price'];
        $tour->price_treem = $data['price_treem'];
        $tour->price_trenho = $data['price_trenho'];
        $tour->price_sosinh = $data['price_sosinh'];
        $tour->vehicle = $data['vehicle'];
        $tour->so_ngay = $data['so_ngay'];
        $tour->so_dem = $data['so_dem'];
        $tour->tour_from = $data['tour_from'];
        $tour->tour_to = $data['tour_to'];
       
        $tour->slug =  Str::slug($data['title']);
        $tour->tour_code =  rand(0000,9999);
        
        $get_image = $request->image;
        $path = 'upload/tours/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path,$new_image);
        $tour->image= $new_image;
        toastr()->success('Tạo tour thành công!');
        $tour->save();
        return redirect()->route('tours.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories= Category::Orderby('id','DESC')->get();
        $tour= Tour::find($id);
        return view('admin.tours.edit',compact('tour','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:220',
           
            'category_id' => 'required',
            'price' => 'required',
            'price_treem' => 'required',
            'price_trenho' => 'required',
            'price_sosinh' => 'required',
            'vehicle' => 'required',
            'so_ngay' => 'required',
            'so_dem' => 'required',
            'tour_from' => 'required',
            'tour_to' => 'required',
           
            
            'status' => 'required',
        ],[
            'title.required' => 'Bạn chưa nhập tiêu đề',
            'title.unique' => 'Tiêu đề này đã có',
            'description.required' => 'Bạn chưa nhập mô tả',
           
            'price.required' => 'Bạn chưa nhập giá',
            'vehicle.required' => 'Bạn chưa nhập phương tiện',
            'so_ngay.required' => 'Bạn chưa nhập số ngày',
            'so_dem.required' => 'Bạn chưa nhập số đêm',
            'tour_from.required' => 'Bạn chưa nhập nơi xuất phát',
            'tour_to.required' => 'Bạn chưa nhập nơi đến',
            'status.required' => 'Bạn chưa chọn trạng thái hiển thị',
            
        ]);
        $tour = Tour::find($id);
        $tour->title = $data['title'];
        $tour->description = $data['description'];
        $tour->status = $data['status'];
       
        $tour->category_id = $data['category_id'];
        $tour->price = $data['price'];
        $tour->price_treem = $data['price_treem'];
        $tour->price_trenho = $data['price_trenho'];
        $tour->price_sosinh = $data['price_sosinh'];
        $tour->vehicle = $data['vehicle'];
        $tour->so_ngay = $data['so_ngay'];
        $tour->so_dem = $data['so_dem'];
        $tour->tour_from = $data['tour_from'];
        $tour->tour_to = $data['tour_to'];
       
        $tour->slug =  Str::slug($data['title']);
        $tour->tour_code = $tour->tour_code;
        
        $get_image = $request->image;
        if($get_image){
            $path = 'upload/tours/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $tour->image= $new_image;
        }
        
        toastr()->success('Cập nhật tour thành công!');
        $tour->save();
        return redirect()->route('tours.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tour= Tour::find($id);
        if($tour->status==0){
            $tour->status=1;
            toastr()->success('Khôi phục tour thành công!');
        }else{
            $tour->status=0;
            toastr()->success('Xoá tour thành công!');
        }
        
        $tour->save();
        
        return redirect()->route('tours.index');
    }
    public function tour($slug){
        $category= Category::where('slug',$slug)->first();
        $tours= Tour::where('category_id',$category->id)->with('category')->with(['departures' => function($query) {
            $query->where('status',1)->where('departure_date', '>=', Carbon::today())
                  ->orderBy('departure_date', 'ASC');
        }])->get();

        $nearestDeparture = null;
        foreach ($tours as $tour) {
            if ($tour->departures->isNotEmpty()) {
                $nearestDeparture = $tour->departures->first(); // Lấy ngày khởi hành gần nhất của tour đầu tiên
                break; // Nếu đã tìm thấy ngày khởi hành gần nhất, thoát vòng lặp
            }
            
        }

        return view('pages.tour',compact('tours','nearestDeparture'));
    }
    public function detail_tour($slug){
        
        $tour = Tour::where('slug', $slug)->first();
        $service = Service::where('tour_id', $tour->id)->first();
        $comments = Comment::where('comment_tour_id', $tour->id)->where('status', 1)->whereNull('comment_parent_comment')->get();
        $reply=Comment::where('comment_tour_id',$tour->id)->where('status',1)->whereNotNull('comment_parent_comment')->get();
        $ratings=Rating::where('tour_id',$tour->id)->get();
        $departures=Departure::where('tour_id',$tour->id)->where('departure_date', '>=', Carbon::today())->orderby('departure_date','ASC')->get();
        $nearestDeparture = $departures->filter(function($depart) {
            return Carbon::parse($depart->departure_date) >= Carbon::today();
        })->sortBy('departure_date')->first();


         // Lấy thông tin lịch trình
            $itineraries = Itinerary::where('tour_id', $tour->id)
                ->orderby('day_number', 'ASC')
                ->get();

            // Lấy chi tiết từng hoạt động
            // $itineraryDetails = ItineraryDetail::whereIn('ite_id', $itineraries->pluck('id'))
            //             ->get()
            //             ->groupBy('ite_id');

            // // Nhóm dữ liệu lịch trình theo ngày
            // $itinerariesByDay = $itineraries->groupBy('day_number')->map(function ($items) use ($itineraryDetails) {
            // return $items->map(function ($itinerary) use ($itineraryDetails) {
            // $details = isset($itineraryDetails[$itinerary->id]) ? $itineraryDetails[$itinerary->id] : collect();
            // return [
            // 'location' => $itinerary->location,
            // 'description' => $itinerary->description,
            // 'details' => $details
            // ];
            // });
            // });

        return view('pages.detailtour',compact('tour','departures','nearestDeparture','comments','reply','ratings','itineraries','service'));
    }


    public function manage_departure(){
        $tours=Tour::where('status',1)->orderby('id','desc')->get();
        
        return view('admin.departures.index',compact('tours'));
    }
    public function manage_itinerary(){
        $tours=Tour::where('status',1)->orderby('id','desc')->get();
        
        return view('admin.itineraries.index',compact('tours'));
    }
    public function manage_service(){
        $tours=Tour::where('status',1)->orderby('id','desc')->get();
        
        return view('admin.services.index',compact('tours'));
    }
}
