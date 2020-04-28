<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use \DB;
use Cookie;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers {
     // change the name of the name of the trait's method in this class
     // so it does not clash with our own register method
        register as registration;
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'fullname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    public function register(Request $request)
    {
        //dd($request->email);
        //Validate the incoming request using the already included validator method
        $this->validator($request->all());
        //dd($this->validator($request->all()));
        // Initialise the 2FA class
        $google2fa = app('pragmarx.google2fa');
        //dd($google2fa->generateSecretKey());

        // Save the registration data in an array
        $registration_data = $request->all();
        //dd($registration_data['email']);

        // Add the secret key to the registration data
        $registration_data["google2fa_secret"] = $google2fa->generateSecretKey();

        // Save the registration data to the user session for just the next request
        $request->session()->put('registration_data', $registration_data);

        // Generate the QR image. This is the image the user will scan with their app
     // to set up two factor authentication
        $QR_Image = $google2fa->getQRCodeInline(
            config('app.name'),
            $registration_data['email'],
            $registration_data['google2fa_secret']
        );
        //dd($registration_data);
        // Pass the QR barcode image to our view
        return view('google2fa.register', ['QR_Image' => $QR_Image, 'secret' => $registration_data['google2fa_secret']]);
    }
     public function create_register(Request $request){
        if(Cookie::get('table')=='admin'){
            $id=Cookie::get('ID');
            $user=DB::table('admin') 
                ->where('id',$id)
                ->first();
            $google2fa = app('pragmarx.google2fa');
            if($user->google2fa_secret==null) $user->google2fa_secret=$google2fa->generateSecretKey();
            $registration_data["email"] = $user->email;
            $registration_data["username"] = $user->username;
            $registration_data["fullname"] = $user->fullname;
            $registration_data['google2fa_secret']=$user->google2fa_secret;
            $registration_data['id'] = $user->id;
            $request->session()->put('registration_data', $registration_data);
            $QR_Image = $google2fa->getQRCodeInline(
            config('app.name'),
            $registration_data['email'],
            $registration_data['google2fa_secret']
            );
            return view('google2fa.register', ['QR_Image' => $QR_Image, 'secret' => $registration_data['google2fa_secret']]);
        }else{
            $id=Cookie::get('ID');
            $user=DB::table('users') 
                ->where('id',$id)
                ->first();
            $google2fa = app('pragmarx.google2fa');
            if($user->google2fa_secret==null) $user->google2fa_secret=$google2fa->generateSecretKey();
            $registration_data['email'] = $user->email;
            $registration_data["username"] = $user->username;
            $registration_data["fullname"] = $user->fullname;
            $registration_data['google2fa_secret']=$user->google2fa_secret;
            $registration_data['id'] = $user->id;
            $request->session()->put('registration_data', $registration_data);
            $QR_Image = $google2fa->getQRCodeInline(
            config('app.name'),
            $registration_data['email'],
            $registration_data['google2fa_secret']
            );
            return view('google2fa.register', ['QR_Image' => $QR_Image, 'secret' => $registration_data['google2fa_secret']]);
        }
    }

    public function completeRegistration(Request $request)
    {   
        // dd(session('registration_data'));
        // // add the session data back to the request input
        // $request->merge(session('registration_data'));
        // dd($request);
        // Call the default laravel authentication
        if(Cookie::get('table')==null){
            $data=session('registration_data');
            DB::table('users')
            ->insert(
                [ 'username'=>$data['username'],
                'fullname'=>$data['fullname'] , 
                'email'=>$data['email'] , 
                'password'=>Hash::make($data['password']),
                'google2fa_secret'=>$data['google2fa_secret']]);
            $request->session()->forget('registration_data');
            return redirect()->action('LoginController@login');
        }
        if(Cookie::get('table')=='admin'){
            $data=session('registration_data');
            DB::table('admin')
            ->where("id",$data['id'])
            ->update(
                [ 'username'=>$data['username'],
                'fullname'=>$data['fullname'] , 
                'email'=>$data['email'] , 
                'google2fa_secret'=>$data['google2fa_secret']]);
            $request->session()->forget('registration_data');
            return redirect()->action('LoginController@login');
        }
        if(Cookie::get('table')=='user'){
            $data=session('registration_data');
            DB::table('users')
            ->where("id",$data['id'])
            ->update(
                [ 'username'=>$data['username'],
                'fullname'=>$data['fullname'] , 
                'email'=>$data['email'] , 
                'google2fa_secret'=>$data['google2fa_secret']]);
            $request->session()->forget('registration_data');
            return redirect()->action('LoginController@login');           
        }

    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    
}
