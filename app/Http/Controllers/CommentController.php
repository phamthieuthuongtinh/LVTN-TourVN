<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Rating;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::with('tour')->where(function($query) {
            $query->where('status', 0)
                  ->orWhere('status', 2);
        })
        ->whereNull('comment_parent_comment')
        ->orderBy('comment_id', 'DESC')
        ->get();

        return view('admin.comments.index',compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $comments= Comment::where('status',1)->whereNull('comment_parent_comment')->orderby('comment_id','DESC')->get();
        $comment_reply = Comment::with('tour')->orderby('status', 'DESC')->get();
        return view('admin.comments.create',compact('comments','comment_reply'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data= $request->all();
        if($data['comment_content']){
            $comment = new Comment();
            $comment->comment_name = $data['comment_name'];
            $comment->comment_content = $data['comment_content'];
            $comment->comment_tour_id = $data['comment_tour_id'];
            $comment->customer_id = $data['customer_id'];
            $comment->status = 0;
            $comment->save();
            $commentId = $comment->comment_id;
        }
        
        if($data['star_rating']){
            $rating = new Rating();
            $rating->tour_id = $data['comment_tour_id'];
            $rating->rating = $data['star_rating'];
            $rating->comment_id = $commentId;
            $rating->save();
        }
    
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
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comment = Comment::where('comment_id', $id)->first();
        if($comment->status==0){
            $comment->status=1;
            toastr()->success('Duyệt thành công!');
        }else{
            $comment->status=0;
            toastr()->success('Bỏ duyệt thành công!');
        }
        
        $comment->save();
        
        return redirect()->route('comment.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::where('comment_id', $id)->first();
        if($comment->status==2){
            $comment->status=0;
            toastr()->success('Khôi phục thành công!');
            $comment->save();
           
        }elseif($comment->comment_parent_comment!=null){
            $comment->delete();
            toastr()->success('Xoá thành công!');
           
        }else{
            $comment->status=2;
            toastr()->success('Xóa thành công!');
            $comment->save();
           
        }
        return redirect()->back();
       
    }
    public function reply(Request $request)
    {
        $data = $request->all();
        $comment = new Comment();
        $comment->comment_content = $data['comment'];
        $comment->comment_tour_id = $data['comment_tour_id'];
        $comment->comment_parent_comment = $data['comment_id'];
        $comment->status = 1;
        $comment->comment_name = 'Admin';
        $comment->save();
    }
}