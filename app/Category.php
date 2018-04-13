<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

// use App\Category;

class Category extends Model {

    protected $fillable = ['name', 'image', 'status'];
    protected $table = 'categories';

    public static function saveCategory($data) {
        $imageName = '';

        if ($data->image) {
            $imageName = $data->name . time() . '.' . $data->image->getClientOriginalExtension();
            $data->image->move(public_path('images'), $imageName);
        }
        $category = Category::create([
                    'name' => $data->name,
                    'image' => $imageName,
                    'status' => $data->status,
        ]);
        $category_id = $category->id;
        
        return true;
    }

public static function updateCategory($data, $id) {
    $imageName = Category::getImagebyId($id);

    if ($data->image) {
        if ($imageName != "") {
            if (file_exists(public_path('images/' . $imageName))) {
                unlink(public_path('images/' . $imageName));
            }
        }
        $imageName = $data->slug . time() . '.' . $data->image->getClientOriginalExtension();
        $data->image->move(public_path('images'), $imageName);
    }
    Category::find($id)->update([
        'name' => $data->name,
        'description' => $data->description,
        'image' => $imageName,
        'parent' => $data->parent,
        'top' => $data->show,
        'order' => $data->order,
        'status' => $data->status,]);


    return DB::table('slugs')->where(array('type_id'=> $id,'type'=> 'category'))->update([
                'name' => $data->slug,
                'type' => 'category',
                'type_id' => $id,
                'title' => $data->meta_title,
                'description' => $data->meta_description,
                'keywords' => $data->meta_keywords,]);
}

}
