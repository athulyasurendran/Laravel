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

    public static function getbyId($id){
        return DB::table('packages')->where('packages.id', '=', $id)->select('packages.*')->first();
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

    public static function searchPackages($lat, $lng) {
        $circle_radius = 3959;
        $max_distance = 500;
        $lat = $lat;
        $lng = $lng;
        if(!$lat || !$lng){
            $lat = 25.354826;
            $lng = 51.183884;
        }

     $result = DB::select('SELECT * FROM
                (SELECT *, (' . $circle_radius . ' * acos(cos(radians(' . $lat . ')) * cos(radians(lat)) *
                    cos(radians(lng) - radians(' . $lng . ')) +
                    sin(radians(' . $lat . ')) * sin(radians(lat))))
                    AS distance
                    FROM packages) AS distances
                    WHERE distance < ' . $max_distance . '
                    ORDER BY distance
                    LIMIT 20;');
        return $result;
    }

    public static function updatePackage($data, $id) {
        $image = '';
        
        if ($data->image) {
            $image = $data->title . time() . '.' . $data->image->getClientOriginalExtension();
            $data->image->move(public_path('images'), $image);
        }
        Package::find($id)->update([
            'title' => $data->title,
            'type' => $data->type,
            'location' => $data->location,
            'lat' => $data->lat,
            'lng' => $data->lng,
            'short_description' => $data->short_description,
            'description' => $data->description,
            'phone' => $data->phone,
            'email' => $data->email,
            'image' => $image
        ]);
    }

}
