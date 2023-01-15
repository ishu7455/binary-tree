<?php

namespace App\Http\Controllers;

use App\Models\binary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BinaryController extends Controller
{
    public function view(){
        return view('binary-view');
    }

    public function store(Request $req)
    {
      // $user = binary::all();
      // $child = $user[0]->id;
      // $m = binary::where(['id' => $child])->get();;
      // return $m;

     // die;
      $validated = $req->validate([
        'name' => 'required|max:20',
        'Direct_sponsr' => 'required|exists:binaries,customer_id',
        // 'Direct_sponsr' => 'required|exists:binaries,customer_id',
      ]);
      $flag = true;
      $child = 0;
      $user = new binary();
      $user->name = $req['name'];
      $p = $user->position = $req['position'];
      $s = $user->Direct_sponsr = $req['Direct_sponsr'];
      $user->customer_id = random_int(100000, 9999999);
      
  
      //  $c = binary::where('position', $user->position)->where('Direct_sponsr', $user->sponsr)->orderByDesc('id')->get();
      //  return $c;
      $child_on_position = binary::where(['sponsr' => $req['Direct_sponsr'], 'position' => $req['position']])->get();
       //return $child_on_position;
       
      //$childr = binary::where(['sponsr' => $req['Direct_sponsr'], 'position' => $req['position']])->get();
      //  return $childr;
      // $g = count($child_on_position);
      // return $g;
      // $b=binary::where('position', $req['position'])->count();
      // return $b;
      // die;
      if (empty(count($child_on_position))) {
        $user = new binary();
        $user->name = $req['name'];
        $user->password = $req['password'];
        $p = $user->position = $req['position'];
        $s = $user->Direct_sponsr = $req['Direct_sponsr'];
        $user->customer_id = random_int(100000, 9999999);
        $user->sponsr = $user->Direct_sponsr;
        $user->save();
        echo "save";
      } else {
  
        $child = $child_on_position[0]->customer_id;
     // return $child;
    
        $flag = true;
  
        while ($flag) {
  
          $parent_data = binary::where(['sponsr' => $child, 'position' => $req['position']])->get();
         //return $parent_data;
          // $y = count($parent_data);
          // return $y;
          if (count($parent_data) == 0) {
            $parent_info = binary::where(['customer_id' => $child])->get();
            $user = new binary();
            $user->name = $req['name'];
            $user->password = $req['password'];
            $p = $user->position = $req['position'];
            $s = $user->Direct_sponsr = $req['Direct_sponsr'];
            $user->customer_id = random_int(100000, 9999999);
            $user->sponsr = $parent_info[0]->customer_id;
            $user->save();
            echo "save next";
            //echo $y;
            $flag = false;
          } else {
  
            $child = $parent_data[0]->customer_id;
           // return $child;
            //echo "b";
          }
        }
      }
    }
  }