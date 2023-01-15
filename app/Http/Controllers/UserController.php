<?php

namespace App\Http\Controllers;

use App\Models\percentage;
use App\Models\Reward;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;



class UserController extends Controller
{
    
    public function show()
    {
        return view('sign');
    }

    public function store(Request $req)
    {
        $user = DB::table('rewards')
         ->join('percentage','rewards.user_id', '=', 'percentage.id')
         ->select('percentage')
         ->get()->toArray();
         $data = compact('user');
        
         foreach($user as $users){
             $income[] = $users->percentage;
           }
      

        $validated = $req->validate([
            'name' => 'required|max:20',
            'email' => 'required|unique:users,email',
            'password' => 'required|max:8',
            'confirm_password' => 'required|max:8|same:password',
            'referal_id' => 'required|exists:users,customer_id',
        ]);

        $user = new User();
        $user->name = $req['name'];
        $user->email = $req['email'];
        $user->password =  Hash::make($req['password']);
        $user->referal_id = $req['referal_id'];
        $user->customer_id = random_int(100000, 9999999);
        $user->save();
        DB::beginTransaction();
         try {
          
            $reward_val = 100;
                $flag = true;
                $reward_array = [0.3, 0.2, 0.1];
                $i = 0;
                $parent_id = $req->referal_id;
                $parent_rew = 100;
             
        
                while ($flag) {
                    if ($i == 3) {
                        $flag = false;
                        break;
                    }

                  
                    $parent = User::where('customer_id', $parent_id)->first();
                    if (!empty($parent)) {
                        $Reward =  $income[$i];
                        $bal = $Reward + $parent_rew;
                        Reward::create([
                            'user_id' => $parent->id,
                            'cashback' =>  $Reward,
                             'balence' => $bal
                        ]);
                        $parent_id = $parent->referal_id;

                    } else {
                        $flag = false;
                    }

                    $i++;
                }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
           echo "not inserted";
        }
       
        return redirect('sign')->with('iserted succesfully');
    }
    
    public function login_show()
    {
        if (Auth::check()) {
            return view('dashboard');
        } else {
            return view('login');
        }
    }

    public function login(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $req->only('email', 'password');

        if (Auth::attempt($credentials)) {
            echo "login";
        } else {
            echo "not";
        }
    }
     public function view()
    {
        $user = DB::table('users')
        ->join('rewards','rewards.user_id', '=', 'users.id')
        ->select('*')
        ->get();
        // $data = compact('user');
         return view('view',compact('user'))->with('no',1);
         
     }

     public function view_rt()
     {
    //    $user=users::all();
       
    //      return $user;
    //   foreach($user as $users){
    //          $income[] = $users->percentage;
    //        }
    //       return $income;
   
//     $users = DB::table('users')
//              ->select(DB::raw('count(*) as ishu, id ,name,email,reward'))
//              ->where('id', '<>', 1)
//              ->groupBy('id')
//              ->get();
// //return $users;
// return view('def',compact('users'));
// $orders = DB::table('users')
// ->selectRaw('reward * ? as price_with_tax', [1])
// ->get(); 

$orders = DB::table('users')
                ->whereRaw('reward > IF(reward = "TX", ?, 100)', [200])
                ->get();

return $orders;
}
   
}


