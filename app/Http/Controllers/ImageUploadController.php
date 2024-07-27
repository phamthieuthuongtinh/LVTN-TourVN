<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function upload(Request $request)
    {
        // Kiểm tra nếu có lỗi
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = time() . '-' . $file->getClientOriginalName();

            // Lưu tệp vào thư mục 'public/uploads'
            $file->move(public_path('uploads'), $filename);

            // Trả về URL của hình ảnh vừa tải lên
            $url = asset('uploads/' . $filename);

            return response()->json([
                'uploaded' => true,
                'url' => $url
            ]);
        }

        return response()->json(['uploaded' => false]);
    }
}
