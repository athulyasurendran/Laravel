<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Package extends Model {

    protected $fillable = ['title', 'description', 'listing_type_menu', 'location', 'lat', 'lng', 'phone', 'company_tagline', 'company_website', 'company_facebook', 'company_email', 'company_twitter', 'company_instagram', 'rate', 'background_image', 'profile_image'];
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

        $profileimage = '';
        if ($data->profileimage) {
            $profileimage = $data->title . time() . '.' . $data->profileimage->getClientOriginalExtension();
            $data->profileimage->move(public_path('images'), $profileimage);
        }

        $package = Package::create([
            'title' => $data->title,
            'description' => $data->description,
            'listing_type_menu' => $data->category_id,
            'location' => $data->location,
            'lat' => $data->lat,
            'lng' => $data->lng,
            'phone' => $data->phone,
            'company_tagline' => $data->company_tagline,
            'company_website' => $data->company_website,
            'company_facebook' => $data->company_facebook,
            'company_email' => $data->company_email,
            'company_twitter' => $data->company_twitter,
            'company_instagram' => $data->company_instagram,
            'rate' => $data->rate,
            //'fetured_post' => $data->fetured_post,
            'background_image' => $image,
            'profile_image' => $profileimage,
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
        
        $profileimage = '';
        if ($data->profileimage) {
            $profileimage = $data->title . time() . '.' . $data->profileimage->getClientOriginalExtension();
            $data->profileimage->move(public_path('images'), $profileimage);
        }
        Package::find($id)->update([
            'title' => $data->title,
            'description' => $data->description,
            'listing_type_menu' => $data->category_id,
            'location' => $data->location,
            'lat' => $data->lat,
            'lng' => $data->lng,
            'phone' => $data->phone,
            'company_tagline' => $data->company_tagline,
            'company_website' => $data->company_website,
            'company_facebook' => $data->company_facebook,
            'company_email' => $data->company_email,
            'company_twitter' => $data->company_twitter,
            'company_instagram' => $data->company_instagram,
            'rate' => $data->rate,
            //'fetured_post' => $data->fetured_post,
            'background_image' => $image,
            'profile_image' => $profileimage,
        ]);
    }

}
