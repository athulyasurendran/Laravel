<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Package extends Model {

    protected $fillable = ['title', 'type', 'location', 'lat', 'lng', 'short_description', 'description', 'phone', 'email', 'image'];
    protected $table = 'packages';

    public static function getPackages() {
        return DB::table('packages')
                        ->select('packages.*')
                        ->get();
    }

    public static function savePackage($data) {
        $image = '';
        
        if ($data->image) {
            $image = $data->title . time() . '.' . $data->image->getClientOriginalExtension();
            $data->image->move(public_path('images'), $image);
        }
        $package = Package::create([
            'title' => $data->title,
            'type' => $data->type,
            'location' => $data->location,
            'lat' => $data->lat,
            'lng' => $data->lng,
            'short_description' => $data->short_description,
            'description' => $data->description,
            'phone' => $data->phone,
            'email' => $data->email,
            'image' => $image,
        ]);
        $package_id = $package->id;
        return true;
    }

    public static function getbyId($id) {
        return DB::table('packages')->where('packages.id', '=', $id)->select('packages.*', 'slugs.id as slug_id', 'slugs.name as slug', 'slugs.title as meta_title', 'slugs.description as meta_description', 'slugs.keywords as meta_keywords')
                        ->leftJoin('slugs', function($join) {
                            $join->on('slugs.type_id', '=', 'packages.id')
                            ->where('slugs.type', '=', 'package');
                        })
                        ->first();
    }

    public static function getImagebyId($id) {
        return DB::table('packages')->where('id', $id)->value('image');
    }

    public static function getIconbyId($id) {
        return DB::table('packages')->where('id', $id)->value('icon');
    }

    public static function updatePackage($data, $id) {
        $imageName = '';
        $icon = Package::getIconbyId($id);
        
        if ($data->icon) {
            if ($icon != "") {
                if (file_exists(public_path('images/' . $icon))) {
                    unlink(public_path('images/' . $icon));
                }
            }
            $icon = $data->slug . time() . '.' . $data->icon->getClientOriginalExtension();
            $data->icon->move(public_path('images'), $icon);
        }
        Package::find($id)->update([
            'name' => $data->name,
            'icon' => $icon,
            'starting_price' => $data->starting_price,
            'short_description' => $data->short_description,
            'image' => $imageName,
            'order' => $data->order,
            'show_front' => $data->show_front,
            'status' => $data->status,]);


        return DB::table('slugs')->where(array('type_id' => $id, 'type' => 'package'))->update([
                    'name' => $data->slug,
                    'type' => 'package',
                    'type_id' => $id,
                    'title' => $data->meta_title,
                    'description' => $data->meta_description,
                    'keywords' => $data->meta_keywords,]);
    }

}
