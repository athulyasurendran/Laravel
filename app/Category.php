<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

// use App\Category;

class Category extends Model {

    protected $fillable = ['name', 'parent', 'top', 'order', 'status'];
    protected $table = 'categories';

    public static function tree() {

    return static::with(implode('.', array_fill(0, 4, 'children')))
        ->select('categories.id', 'categories.name', 'categories.top', 'categories.order', 'categories.status')
        ->where('parent', '=', 0)
         ->orderBy('order')->orderBy('name')->get();
    }

	public function children() {
    	return $this->hasMany(Category::class, 'parent', 'id')
            ->select('categories.*')
            ->orderBy('order')->orderBy('name');
	}

    public static function saveCategory($data) {
	    $category = Category::create([
	        'name' => $data->name,
	        'parent' => $data->parent,
	        'top' => $data->show,
	        'order' => $data->order,
	        'status' => $data->status,
	    ]);
	    return true;
	}

	public static function updateCategory($data, $id) {
	    Category::find($id)->update([
	        'name' => $data->name,
	        'parent' => $data->parent,
	        'top' => $data->show,
	        'order' => $data->order,
	        'status' => $data->status,]);
	    return;
	}
}
