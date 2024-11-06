<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\View\View;
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');


class Urabancontroller extends Controller
{
     public function home_view():View{
        return view('home');
     }
     public function adminhome_view():View{
      $id=session()->get('session_id');
      $data=DB::table('user_info')->where('User_id','=',$id)->get();
      $dataad=DB::table('user_info')->where('User_type','=','Client')->get();
       return View   ('/adminhome')->with(['userinfo'=>$dataad,'Info'=>$data]);
     }
     public function userhome_view():View{
      $id=session()->get('session_id');
      $data=DB::table('user_info')->where('User_id','=',$id)->get();
      //$addata=DB::table('project1')->where('User_type','=','Client')->get();
      return View('/userhome')->with(['Info' => $data]);
     }
     public function adminpanel_view():View{
        $id=session()->get('session_id');
        $data=DB::table('user_info')->where('User_id','=',$id)->get();
      return view('/adminpanel')->with(['Info'=>$data]);
     }
     public function about_view():View{
        $id=session()->get('session_id');
      $data=DB::table('user_info')->where('User_id','=',$id)->get();
      //$addata=DB::table('project1')->where('User_type','=','Client')->get();
      return View('/about')->with(['Info' => $data]);
     }
     public function servies_view():View{
        $id=session()->get('session_id');
        $data=DB::table('user_info')->where('User_id','=',$id)->get();
        //$addata=DB::table('project1')->where('User_type','=','Client')->get();
        return View('/servies')->with(['Info' => $data]);
     }
     public function contact_view():View{
        $id=session()->get('session_id');
        $data=DB::table('user_info')->where('User_id','=',$id)->get();
        //$addata=DB::table('project1')->where('User_type','=','Client')->get();
        return View('/contact')->with(['Info' => $data]);
     }
     public function registration_view():View{
      return view('registrationform');
     }
     public function login_view():View{
      return view('loginform');
     }
     public function registration_submit(Request $req){
      $req->validate([
         'name'=>"required|regex:/^[a-zA-Z ]{3,30}$/",
                           'email'=>"required|regex:/^[a-z0-9. ]+@[a-z0-9._]+\.[a-z]{2,3}$/",
                            'phone'=>"required|regex:/^[6789][0-9]{9}$/",
                            'gender'=>"required",
                            'avatar'=>"required|mimes:png,jpg,jpeg,jfif",
                            'address'=>"required|between:10,200",
                            'password'=>"required|between:4,16"
     ]);
           $name=$req->input('name');
           $email=$req->input('email');
           $phone=$req->input('phone');
           $gender=$req->input('gender');
           $address=$req->input('address');
           $password=$req->input('password');
           $usertype='Client';
           $auth=0;
           if($req->file('avatar'))
           $file=$req->file('avatar');
         $filename=time().$file->getClientOriginalName();
         $filelocation='./upload';
         $file->move($filelocation,$filename);
         $submit=[
             'Name'=>$name,
             'Email'=>$email,
             'Phone'=>$phone,
             'Gender'=>$gender,
             'Address'=>$address,
             'Photo'=>$filelocation.'/'.$filename,
             'Password'=>$password,
             'User_type'=>$usertype,
             'Auth'=>$auth
         ];
         // dd($submit);
         // DB::table('user_info')->insert($submit);
         DB::table('user_info')->insert($submit);
         return redirect('/loginform');


     }
     public function login_submit(Request $obj){
      $user=$obj->input('username');
      $pass=$obj->input('password');
      $logdata=DB::table('user_info')->where('Email','=',$user)->orWhere('Phone','=',$user)->get();
    
      if(empty($logdata[0])){
          return redirect('/loginform')->with('message','User Not Found');
      }else{
          $dbpass=$logdata[0]->Password;
          $role=$logdata[0]->User_type;
          $auth=$logdata[0]->Auth;
          $obj->session()->put('session_role',$role);
          if($pass==$dbpass){
              $uid=$logdata[0]->User_id;
              $uname=$logdata[0]->Name;
              $uemail=$logdata[0]->Email;
              $uphone=$logdata[0]->Phone;
              $obj->session()->put('session_id',$uid);
              
              if ($auth==0) {
                  if ($role=='Admin') {
                    $obj->session()->put('session_name',$uname);
                    $obj->session()->put('session_email',$uemail);
                    $obj->session()->put('session_phone',$uphone);
                      return redirect('/adminhome');
                  }else{
                    $obj->session()->put('session_name',$uname);
              $obj->session()->put('session_email',$uemail);
              $obj->session()->put('session_phone',$uphone);
                      return redirect('/userhome');
                  }
              }else{
                  return redirect('/loginform')->with('message','User Block Contact Admin');
              }
              
          }else{
              return redirect('/loginform')->with('message','Password Not matched');
          }
      }
     }
    
      public function logout(Request $req){
         $req->session()->invalidate();
         $req->session()->flush();
         $req->session()->regenerateToken();
         $cookie = \Cookie::forget($req->session()->getName());
         return redirect('/home')->withCookie($cookie);
     }
     public function sedan_section():View{
      return view('sedansection');
     } 
     public function suv_section():View{
      return view('suvsection');
     }   
     public function luxurysection():View{
      return view('luxurysection');
     } 
    public function user_details():View{
      $id=session()->get('session_id');
      $dataad=DB::table('user_info')->where('User_type','=','Client')->get();
      return view('userdetails')->with(['userinfo'=>$dataad]);
    }
    public function adminabout_view():View{
        $id=session()->get('session_id');
        $data=DB::table('user_info')->where('User_id','=',$id)->get();
        return view('/adminabout')->with(['Info'=>$data]);
    }
    public function adminservies_view():View{
        $id=session()->get('session_id');
        $data=DB::table('user_info')->where('User_id','=',$id)->get();
        return view('/adminservies')->with(['Info'=>$data]);
    }
    public function admincontact_view():View{
        $id=session()->get('session_id');
        $data=DB::table('user_info')->where('User_id','=',$id)->get();
        return view('/admincontact')->with(['Info'=>$data]);
    }
    public function sedanadd_view():View{
        return view('sedanadd');
    }
    public function sedanadd_submit(Request $req){
              $s_name=$req->input('s_name');
              $s_model=$req->input('s_model');
              $s_detail=$req->input('s_detail');
              $s_price=$req->input('s_price');
              if($req->file('s_avatar'))
           $files=$req->file('s_avatar');
         $filesname=time().$files->getClientOriginalName();
         $fileslocation='./upload';
         $files->move($fileslocation,$filesname);
         $sedan_submit=[
            'Car_id'=>$s_model,
            'Name'=>$s_name,
            'Details'=>$s_detail,
            'Price'=>$s_price,
            'Image'=>$fileslocation.'/'.$filesname

         ];
         DB::table('sedan_details')->insert($sedan_submit);
         return redirect('/sedanadd');
    }
    public function sedan_view():View{
        $sdata=DB::table('sedan_details')->get();
        return view('/sedanview')->with(['s_info'=>$sdata]);
    }
    public function sedaned_view(){
        $sed=DB::table('sedan_details')->get();
        return view('/sedaneditview')->with(['s_ed'=>$sed]);
    }
    public function sedan_delete($sedan_del){
        $sedan_delete=$sedan_del;
        DB::table('sedan_details')->where('User_id','=',$sedan_delete)->delete();
       return redirect('/sedaneditview');
    }
    public function sedanedit_form($sedan_ed):View{
          $sedan_edit=$sedan_ed;
          $sed_ed=DB::table('sedan_details')->where('User_id','=',$sedan_edit)->get();
          $oldse_img=$sed_ed[0]->Image;
          session()->put('session_sedig',$oldse_img);
          return view('sedaneditform')->with(['sedan_edit'=>$sed_ed]);
    }
    public function sedanedit_submit(Request $req){
        $id = $req->input('sedan');
        $s_name = $req->input('s_name');
        $s_model = $req->input('s_model');
        $s_detail = $req->input('s_detail');
        $s_price = $req->input('s_price');
        $oldimg = session()->get('session_sedig');
        $imagePath = $oldimg;
        if ($req->hasFile('s_avatar')) {
            $file = $req->file('s_avatar');
            $filename = time().$file->getClientOriginalName();
            $filelocation = './upload';
            $file->move($filelocation, $filename);
            $imagePath = $filelocation . '/' . $filename;            // Update image path if new image is uploaded
        }
        $sedanedsub = [
            'Car_id'=>$s_model,
            'Name'=>$s_name,
            'Details'=>$s_detail,
            'Price'=>$s_price,
            'Image' => $imagePath
        ];
      
        DB::table('sedan_details')->where('User_id', '=', $id)->update($sedanedsub);
        return redirect('/sedaneditview');
    }
    public function luxuryadd_view():View{
        return view('luxuryadd');
    }
    public function luxuryadd_submit(Request $req){
        $l_name=$req->input('l_name');
        $l_model=$req->input('l_model');
        $l_detail=$req->input('l_detail');
        $l_price=$req->input('l_price');
        if($req->file('l_avatar'))
     $filel=$req->file('l_avatar');
   $filelname=time().$filel->getClientOriginalName();
   $filellocation='./upload';
   $filel->move($filellocation,$filelname);
   $luxury_submit=[
      'Car_id'=>$l_model,
      'Name'=>$l_name,
      'Details'=>$l_detail,
      'Price'=>$l_price,
      'Image'=>$filellocation.'/'.$filelname

   ];
   DB::table('luxury_details')->insert($luxury_submit);
   return redirect('/luxuryadd');
    }
    public function luxury_view():View{
        $ldata=DB::table('luxury_details')->get();
        return view('/luxuryview')->with(['linfo'=>$ldata]);
    }
    public function luxuryed_view():View{
        $luxury_ed=DB::table('luxury_details')->get();
        return view('luxuryeditview')->with(['l_ed'=>$luxury_ed]);
    }
    public function luxury_delete($luxury_del){
        $luxury_delete=$luxury_del;
        DB::table('luxury_details')->where('User_id','=',$luxury_delete)->delete();
        return redirect('/luxuryeditview');
    }
    public function luxuryedit_form($luxury_ed):View{
        $luxury_edit=$luxury_ed;
        $lux_ed=DB::table('luxury_details')->where('User_id','=',$luxury_edit)->get();
        $oldlux_img=$lux_ed[0]->Image;
        session()->put('session_luxig',$oldlux_img);
        return view('luxuryeditform')->with(['luxury_edit'=>$lux_ed]);

    }
    public function luxuryedit_submit(Request $req){
        $id = $req->input('luxury');
        $l_name = $req->input('l_name');
        $l_model = $req->input('l_model');
        $l_detail = $req->input('l_detail');
        $l_price = $req->input('l_price');
        $oldimg = session()->get('session_luxig');
        $imagePath = $oldimg;
        if ($req->hasFile('l_avatar')) {
            $file = $req->file('l_avatar');
            $filename = time().$file->getClientOriginalName();
            $filelocation = './upload';
            $file->move($filelocation, $filename);
            $imagePath = $filelocation . '/' . $filename;            // Update image path if new image is uploaded
        }
        $luxuryedsub = [
            'Car_id'=>$l_model,
            'Name'=>$l_name,
            'Details'=>$l_detail,
            'Price'=>$l_price,
            'Image' => $imagePath
        ];
      
        DB::table('luxury_details')->where('User_id', '=', $id)->update($luxuryedsub);
        return redirect('/luxuryeditview');
    }
    public function suvadd_view():View{
        return view('suvadd');
    }
    public function suvadd_submit(Request $req){
        $su_name=$req->input('su_name');
        $su_model=$req->input('su_model');
        $su_detail=$req->input('su_detail');
        $su_price=$req->input('su_price');
        if($req->file('su_avatar'))
     $filesu=$req->file('su_avatar');
   $filesuname=time().$filesu->getClientOriginalName();
   $filesulocation='./upload';
   $filesu->move($filesulocation,$filesuname);
   $suv_submit=[
      'Car_id'=>$su_model,
      'Name'=>$su_name,
      'Details'=>$su_detail,
      'Price'=>$su_price,
      'Image'=>$filesulocation.'/'.$filesuname

   ];
   DB::table('suv_details')->insert($suv_submit);
   return redirect('/suvadd');
    }
    public function suv_view():View{
        $suv_data=DB::table('suv_details')->get();
        return view('/suvview')->with(['suinfo'=>$suv_data]);
    }
    public function suvedit_view():View{
        $suv_ed=DB::table('suv_details')->get();
        return view('suveditview')->with(['su_ed'=>$suv_ed]);
    }
    public function suv_delete($suv_del){
        $suv_delete=$suv_del;
        DB::table('suv_details')->where('User_id','=',$suv_delete)->delete();
        return redirect('/suveditview');
    }
    public function suvedit_form($suv_ed):View{
        $suv_edit=$suv_ed;
        $suv_ed=DB::table('suv_details')->where('User_id','=',$suv_edit)->get();
        $oldsuv_img=$suv_ed[0]->Image;
        session()->put('session_suvig',$oldsuv_img);
        return view('suveditform')->with(['su_edit'=>$suv_ed]);

    }
    public function suvedit_submit(Request $req){
        $id = $req->input('suv');
        $su_name = $req->input('su_name');
        $su_model = $req->input('su_model');
        $su_detail = $req->input('su_detail');
        $su_price = $req->input('su_price');
        $oldimg = session()->get('session_suvig');
        $imagePath = $oldimg;
        if ($req->hasFile('su_avatar')) {
            $file = $req->file('su_avatar');
            $filename = time().$file->getClientOriginalName();
            $filelocation = './upload';
            $file->move($filelocation, $filename);
            $imagePath = $filelocation . '/' . $filename;            // Update image path if new image is uploaded
        }
        $suvedsub = [
            'Car_id'=>$su_model,
            'Name'=>$su_name,
            'Details'=>$su_detail,
            'Price'=>$su_price,
            'Image' => $imagePath
        ];
      
        DB::table('suv_details')->where('User_id', '=', $id)->update($suvedsub);
        return redirect('/suveditview');
    }
    public function user_block($bl){
        $block_id=$bl;
        DB::table('user_info')->where('User_id','=',$block_id)->update(['Auth'=>1]);
        return redirect('/userdetails');
    }
    public function user_unblock($unblk){
        $unblock_id=$unblk;
        DB::table('user_info')->where('User_id','=',$unblock_id)->update(['Auth'=>0]);
        return redirect('/userdetails');
    }
    public function userinfo_view():View{
        $id=session()->get('session_id');
        $user_info=DB::table('user_info')->where('User_id','=',$id)->get();
         return view('userinfo')->with(['U_info'=>$user_info]);
    }
    public function changepass_view():View{
        return view('changepassword');
    }
   public function changepass_submit(Request $req){
    $req->validate([
        'oldpass'=>"required|between:4,16",
        'newpass'=>"required|between:4,16",
        'confpass'=>"required|between:4,16|same:newpass"
    ]);
    $oldpass=$req->input('oldpass');
    $newpass=$req->input('newpass');
    $confpass=$req->input('confpass');
    $passid=session()->get('session_id');
    $datapass=DB::table('user_info')->where('User_id','=',$passid)->get();
    $dbpass=$datapass[0]->Password;
    if ($dbpass==$oldpass) {
        if($oldpass!=$newpass){
            if($newpass==$confpass){
                DB::table('user_info')->where('User_id','=',$passid)->update(['Password'=>$confpass]);
                return redirect('/userinfo');
            }

        }else{
            return redirect('/changepassword')->with('message','Old Password and New Password same');
        }
        
    }else{
        return redirect('/changepassword')->with('message','Password Not Match');
    }
   }
   public function userinfoedit_view():View{
    $ed_id=session()->get('session_id');
    $user_edit=DB::table('user_info')->where('User_id','=',$ed_id)->get();
    $oldig=$user_edit[0]->Photo;
    session()->put('session_img',$oldig);
    return view('userinfoedit')->with(['User_edit'=>$user_edit]);
   }
   public function userinfoedit_submit(Request $req){
    $req->validate([
        'name'=>"required|regex:/^[a-zA-Z ]{3,30}$/",
                          'email'=>"required|regex:/^[a-z0-9. ]+@[a-z0-9._]+\.[a-z]{2,3}$/",
                           'phone'=>"required|regex:/^[6789][0-9]{9}$/",
                           'gender'=>"required",
                           'avatar'=>"nullable|mimes:png,jpg,jpeg,jfif",
                           'address'=>"required|between:10,200"
                           
    ]);   $uid=$req->input('userinfo_ed');
          $name=$req->input('name');
          $email=$req->input('email');
          $phone=$req->input('phone');
          $gender=$req->input('gender');
          $address=$req->input('address');
          $oldimg=session()->get('session_img');
          $imagePath = $oldimg;
        if ($req->hasFile('avatar')) {
            $file = $req->file('avatar');
            $filename = time().$file->getClientOriginalName();
            $filelocation = './upload';
            $file->move($filelocation, $filename);
            $imagePath = $filelocation . '/' . $filename;            // Update image path if new image is uploaded
        }
        $user_Edit_sub=[
            'Name'=>$name,
            'Email'=>$email,
            'Phone'=>$phone,
            'Gender'=>$gender,
            'Address'=>$address,
            'Photo'=>$imagePath
        ];
        DB::table('user_info')->where('User_id','=',$uid)->update($user_Edit_sub);
        return redirect('/userinfo');

   }
   public function feedback_submit(Request $req){
         $name=$req->input('yourname');
         $email=$req->input('youremail');
         $subject=$req->input('subject');
         $feedback=$req->input('feedback');
         $feedback_data=[
            'Name'=>$name,
            'Email'=>$email,
            'Subject'=>$subject,
            'Feedback'=>$feedback
         ];
         Db::table('feedback')->insert($feedback_data);
         return redirect('/contact');
   }
   public function feedback_view():View{
    $feedback_data=DB::table('feedback')->get();
    return view('feedbackview')->with(['feed_back'=>$feedback_data]);
   }
   public function feedback_delete($feeddel){
    $feed_delete=$feeddel;
    DB::table('feedback')->where('User_id','=',$feed_delete)->delete();
    return redirect('/feedbackview');
   }
   public function booking_View($Car_id):View{
    $carid=$Car_id;
    return view('bookingView')->with(['car_id'=>$carid]);
   }
   public function termscondition_view():View{
    return view('termscondition');
   }
   public function booking_submit(Request $req){
    $id=session()->get('session_id');
    $name=session()->get('session_name');
    $email=session()->get('session_email');
    $phone=session()->get('session_phone');
    $carname=$req->input('car_name');
    $pick_loc=$req->input('pic_loc');
    $desti=$req->input('desti');
    $pick_date=$req->input('pick_date');
    if($req->file('document'))
           $file=$req->file('document');
         $filename=time().$file->getClientOriginalName();
         $filelocation='./upload';
         $file->move($filelocation,$filename);
    $address=$req->input('address');
    $no_day=$req->input('nod');
    $payment=$req->input('payment');
    $auth=0;
    $status='Request';
    $book_data=[
        'Name'=>$name,
        'Email'=>$email,
        'Phone'=>$phone,
        'Car_name'=>$carname,
        'Pick_up_loc'=>$pick_loc,
        'Destination'=>$desti,
        'Pick_up_date'=>$pick_date,
        'Document'=>$filelocation.'/'. $filename,
        'Address'=>$address,
        'Num_of_day'=>$no_day,
        'Payment'=>$payment,
        'Auth'=>$auth,
        'Status'=>$status
    ];
    DB::table('booking_details')->insert($book_data);
    return redirect('/bookingdetail');
   }
   public function bookdetails_view():View{
    $b_email=session()->get('session_email');
    $bData=DB::table('booking_details')->where('Email','=',$b_email)->get();
    $bdData=DB::table('driver_book')->where('Customer_email','=',$b_email)->get();
    return view('bookingdetail')->with(['BData'=>$bData,'BDrData'=>$bdData]);
   }
   public function adminbook_view():View{
    $adminbookdata=DB::table('booking_details')->get();
    return view('adminbookdetail')->with(['adbook'=>$adminbookdata]);
   }
   public function cancel_trip($cancel){
    $cancel_id=$cancel;
    $userType=session()->get('session_role');
    DB::table('booking_details')->where('User_id','=',$cancel_id)->update(['Auth'=>1,'Status'=>'Cancel']);
    if($userType=='Admin'){
        return redirect('/adminbookdetail');
    }else{
        return redirect('/bookingdetail');
    }
  
   }
   public function confirm_trip($confirm){
    $confirm_id=$confirm;
    DB::table('booking_details')->where('User_id','=',$confirm_id)->update(['Auth'=>2,'Status'=>'Confirm']);
    return redirect('/adminbookdetail');
   }
   public function usertrip_cancel($ucancel){
    $u_cancel=$ucancel;
    DB::table('booking_details')->where('User_id','=',$u_cancel)->update(['Auth'=>3,'Status'=>'User-Cancel']);
    return redirect('/bookingdetail');
   }
   public function driversection_view():View{
    return view('driversection');
   }
  
public function driveredit_view():View{
    $d_ed=DB::table('driver_detail')->get();
    return view('drivereditview')->with(['D_ed'=>$d_ed]);
}
public function driver_delete($d_del){
    $del_id=$d_del;
    DB::table('driver_detail')->where('User_id','=',$del_id)->delete();
    return redirect('/drivereditview');
}
public function driver_view():View{
    $dr_view=DB::table('driver_detail')->get();
    return view('driverview')->with(['DR_VIEW'=>$dr_view]);
}
public function bookdriver_view($email): View
{
   $drem=$email;
   $drdata=DB::table('driver_detail')->where('Email','=',$email)->get();
    return view('bookdriverView')->with(['dr_INFO'=>$drdata]);
}
public function driverbook_submit(Request $req){
    $dr_name=$req->input('d_name');
    $dr_email=$req->input('d_email');
    $dr_phone=$req->input('d_phone');
    $c_name=session()->get('session_name');
    $c_email=session()->get('session_email');
    $c_phone=session()->get('session_phone');
    $ploc=$req->input('pic_loc');
    $desti=$req->input('desti');
    $picd=$req->input('pick_date');
    $nod=$req->input('nod');
    $payment=$req->input('payment');
    $auth=0;
    $status='Request';
    if($req->file('document'))
    $file=$req->file('document');
   $filename=time().$file->getClientOriginalName();
   $filelocation="./upload";
   $file->move($filelocation,$filename);
   $book_driver=[
    'Driver_name'=>$dr_name,
    'Diver_email'=>$dr_email,
    'Driver_phone'=>$dr_phone,
    'Customer_name'=>$c_name,
    'Customer_email'=>$c_email,
    'Customer_phone'=>$c_phone,
    'Pick_up_loc'=>$ploc,
    'Destination'=>$desti,
    'Pick_date'=>$picd,
    'Customer_doc'=>$filelocation.'/'.$filename,
    'No_day'=>$nod,
    'Payment'=>$payment,
    'Auth'=>$auth,
    'Status'=>$status
   ];
   DB::table('driver_book')->insert($book_driver);
   return redirect('/bookingdetail');
}
public function admindriverbook_details():View{
    $data=DB::table('driver_book')->get();
    return view('admindriverbook')->with(['DBOOK'=>$data]);
}
public function cancel_driver($cdri){
    $can_dri=$cdri;
    DB::table('driver_book')->where('User_id','=',$can_dri)->update(['Auth'=>1,'Status'=>'Cancel']);
    return redirect('/admindriverbook');
}
public function confirm_driver($condr){
    $con_dri=$condr;
    DB::table('driver_book')->where('User_id','=',$con_dri)->update(['Auth'=>2,'Status'=>'Confirm']);
    return redirect('/admindriverbook');
}
public function ucancel_drive($ucandr){
    $ucan_dir=$ucandr;
    DB::table('driver_book')->where('User_id','=',$ucan_dir)->update(['Auth'=>3,'Status'=>'User Cancel']);
    return redirect('/bookingdetail');

}
public function showpage_view():View{
    return view('showpage');
}
public function driverlogin_view():View{
    return view('driverloginform');
}
public function driverregistration_view():View{
    return view('driverregistrationform');
}
public function driverregistration_submit(Request $req){
    // $req->validate([
    //                        'name'=>"required|regex:/^[a-zA-Z ]{3,30}$/",
    //                        'email'=>"required|regex:/^[a-z0-9. ]+@[a-z0-9._]+\.[a-z]{2,3}$/",
    //                        'phone'=>"required|regex:/^[6789][0-9]{9}$/",
    //                        'gender'=>"required",
    //                        'avatar'=>"required",
    //                        'address'=>"required|between:3,200",
    //                        'exp'=>"required",
    //                        'password'=>"required|between:4,16"
    // ]);
    $name=$req->input('name');
    $email=$req->input('email');
    $phone=$req->input('phone');
    $gender=$req->input('gender');
    $address=$req->input('address');
    $exp=$req->input('exp');
    $pass=$req->input('password');
    $price=700;
    $auth=0;
    $status='Unblock';
    if($req->file('avatar'))
           $file=$req->file('avatar');
         $filename=time().$file->getClientOriginalName();
         $filelocation='./upload';
         $file->move($filelocation,$filename);
    $D_submit=[
        'Name'=>$name,
        'Email'=>$email,
        'Phone'=>$phone,
        'Gender'=>$gender,
        'Image'=>$filelocation.'/'.$filename,
        'Address'=>$address,
        'Exp'=>$exp,
        'Price'=>$price,
        'Password'=>$pass,
        'Auth'=>$auth,
        'Status'=>$status
    ];
    // dd($D_submit);
    DB::table('driver_detail')->insert($D_submit);
    return redirect('/driverloginform');
}
public function driverlogin_submit(Request $req){
    $user=$req->input('username');
    $pass=$req->input('password');
    $logdr=DB::table('driver_detail')->where('Email','=',$user)->orWhere('Phone','=',$user)->get();
  
    // dd($logdr);
    if (empty($logdr[0])) {
     return redirect('/driverloginform')->with('message','User not Find');   
    }else{
        $dbpass=$logdr[0]->Password;
        $id=$logdr[0]->User_id;
        $driverem=$logdr[0]->Email;
        $auth=$logdr[0]->Auth;
        //dd($driverem);
        if($pass==$dbpass){
            $req->session()->put('d_id',$id);
            $req->session()->put('session_drem',$driverem);
    if ($auth==0) {
        return redirect('/driverhome');
    }else{
        return redirect('/driverloginform')->with('message','Driver block contact Admin');
    }
    }else{
        return redirect('/driverloginform')->with('message','Password not match');
               
        }
    }
}
public function driverhome_view():View{
    $did=session()->get('d_id');
    $ddata=DB::table('driver_detail')->where('User_id','=',$did)->get();
    return view('driverhome')->with(['Info'=>$ddata]);
}
public function driverinfo_view():View{
    $id=session()->get('d_id');
    $d_info=DB::table('driver_detail')->where('User_id','=',$id)->get();
    return view('driverinfo')->with(['Dinfo'=>$d_info]);
}
public function driverchangepass_view():View{
    return view('driverchangepassword');
}
public function drchangepass_submit(Request $req){
    $req->validate([
        'oldpass'=>"required|between:4,16",
        'newpass'=>"required|between:4,16",
        'confpass'=>"required|between:4,16|same:newpass"
    ]);
    $oldpass=$req->input('oldpass');
    $newpass=$req->input('newpass');
    $confpass=$req->input('confpass');
    $passid=session()->get('d_id');
    $datapass=DB::table('driver_detail')->where('User_id','=',$passid)->get();
    $dbpass=$datapass[0]->Password;
    if ($dbpass==$oldpass) {
        if($oldpass!=$newpass){
            if($newpass==$confpass){
                DB::table('driver_detail')->where('User_id','=',$passid)->update(['Password'=>$confpass]);
                return redirect('/driverinfo');
            }

        }else{
            return redirect('/driverchangepassword')->with('message','Old Password and New Password same');
        }
        
    }else{
        return redirect('/driverchangepassword')->with('message','Password Not Match');
    }

}
public function driverinfoedit_view():View{
    $dred=session()->get('d_id');
    $dr_data=DB::table('driver_detail')->where('User_id','=',$dred)->get();
    $doldg=$dr_data[0]->Image;
    session()->put('s_dig',$doldg);
    return view('driverinfoedit')->with(['DR_inFo'=>$dr_data]);
}
public function driverinfoedit_submit(Request $req){
    $req->validate([
        'avatar'=>"nullable"
    ]);
    $id=$req->input('drid');
    $name=$req->input('name');
    $email=$req->input('email');
    $phone=$req->input('phone');
    $gender=$req->input('gender');
    $address=$req->input('address');
    $exp=$req->input('exp');
    $pass=$req->input('password');
    $price=700;
    $auth=0;
    $status='Unblock';
    $doldimg=session()->get('s_dig');
    $imagePath = $doldimg;
        if ($req->hasFile('avatar')) {
            $file = $req->file('avatar');
            $filename = time().$file->getClientOriginalName();
            $filelocation = './upload';
            $file->move($filelocation, $filename);
            $imagePath = $filelocation . '/' . $filename;            // Update image path if new image is uploaded
        }
    $Ded_submit=[
        'Name'=>$name,
        'Email'=>$email,
        'Phone'=>$phone,
        'Gender'=>$gender,
        'Image'=>$imagePath,
        'Address'=>$address,
        'Exp'=>$exp,
        'Price'=>$price,
        
        'Auth'=>$auth,
        'Status'=>$status
    ];
    DB::table('driver_detail')->where('User_id','=',$id)->update($Ded_submit);
    return redirect('/driverinfo');
    
}
public function driverlist_view():View{
    $delist=DB::table('driver_detail')->get();
    return view('/driverlist')->with(['DRLIST'=>$delist]);
}
public function drblock_action($drbl){
    $dr_block=$drbl;
    DB::table('driver_detail')->where('User_id','=',$dr_block)->update(['Auth'=>1,'Status'=>'Block']);
    return redirect('/driverlist');
}
public function drunblock_action($drunbl){
    $dr_unblock=$drunbl;
    DB::table('driver_detail')->where('User_id','=',$dr_unblock)->update(['Auth'=>0,'Status'=>'Unblock']);
    return redirect('/driverlist');
}
public function driverbookingdetail_view():View{
    $driveremdr=session()->get('session_drem');
    //dd($driveremdr);
     $drBook=DB::table('driver_book')->where('Diver_email','=',$driveremdr)->get();
     //dd($drBook);
     return view('driverbookingdetail')->with(['DrbOOK'=>$drBook]);
}
public function driver_cancel_tr($cndri){
    $cdr_tr=$cndri;
    DB::table('driver_book')->where('User_id','=',$cdr_tr)->update(['Auth'=>4,'Status'=>'Driver Cancel']);
    return redirect('/driverbookingdetail');
}
public function driver_confirm_tr($confdr){

    $conf_dr_t=$confdr;
    DB::table('driver_book')->where('User_id','=',$conf_dr_t)->update(['Auth'=>5,'Status'=>'Driver Confirm']);
    return redirect('/driverbookingdetail');
}
public function drivercontact_view():View{
    $id=session()->get('d_id');
    $nm=DB::table('driver_detail')->where('User_id','=',$id)->get();
    return view('drivercontact')->with(['DRc'=>$nm]);
}
public function drfeedback_submit(Request $req){

    $name=$req->input('drname');
    $email=$req->input('dremail');
    $subject=$req->input('subject');
    $feedback=$req->input('feedback');
    $drfeed_sub=[
        'Name'=>$name,
        'Email'=>$email,
        'Subject'=>$subject,
        'Feedback'=>$feedback
    ];
    DB::table('driver_feedback')->insert($drfeed_sub);
    return redirect('/drivercontact');
}
public function driverfeed_view():View{
    $dr_Feed=DB::table('driver_feedback')->get();
    return view('driverfeedbackview')->with(['DRFEED_V'=>$dr_Feed]);
}
public function drfeeddel_action($drfeedd){
        $dr_feed=$drfeedd;
        DB::table('driver_feedback')->where('User_id','=',$dr_feed)->delete();
        return redirect('/driverfeedbackview');
}
}