<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Member extends Model
{
    public static function updateMember($data, $id){
    	return User::find($id)->update([
        'name' => $data->name,
        'email' => $data->email,]);
    }
}
