<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Institute;
use App\Http\Requests;
use App\Country;
use App\Citie;
use App\State;
use App\Language;
use App\Lesson;
use DB;
use App\Note;
use Illuminate\Support\Facades\Auth;
use App\Tutor;
use App\On_trail;
use Carbon\Carbon;
use App\Slider_dynamic;

class HomeController extends Controller
{
    public function __construct(){
       parent::__construct();
    }

    public function social_shared($id){
               
        if($id){
            $trail_row = On_trail::where('user_id', $id)->update(['expiry_date' => Carbon::now()->addDays(30)]);
            //$on_trail->expiry_date = Carbon::now()->addDays(30);

            if($trail_row){
                $tutor_update = Tutor::where('users_id', Auth::user()->id)->update(['has_shared' => 1]);
                
                if($tutor_update){
                    return \Response::json(array('success' => true, 'update_trail_status' => true), 200);
                }else{
                    return \Response::json(array('success' => false, 'update_trail_status' => true), 422);
                }

            }else{
                return \Response::json(array('success' => false, 'update_trail_status' => true), 422);
            }

        }else{
                return \Response::json(array('success' => false), 422);
        }

        
        exit();
    }

    public function index(){
        $data['recent_notes'] = Note::orderBy('notes_id', 'desc')->join('users','users.id','=','notes.user_id')->take(6)->get();
        $tutor_flag = null;

        $sliders = Slider_dynamic::all();

        if(Auth::check()){

           $id = Auth::user()->id;
           $data['tutor_flag'] = Tutor::where('users_id', $id)->exists();
        }   
           return view('home')->with($data)->with('your_note_count', $this->your_note_count)
                                           ->with('logo_file',  $this->logo_file)
                                            ->with('tutor_globalflag',  $this->tutor_globalflag)
                                           ->with('sliders', $sliders);
        
    }

    public function auth_view(){
        $data['institutes'] = Institute::all();
        return view('auth.signup_signin')->with($data)->with('your_note_count', $this->your_note_count)
            ->with('tutor_globalflag',  $this->tutor_globalflag)
            ->with('logo_file',  $this->logo_file);;
    }
    public function login_view(){
        define("site_url", 'localhost/rod/rod/');
        return view('auth.signin')
            ->with('tutor_globalflag',  $this->tutor_globalflag)
            ->with('your_note_count', $this->your_note_count)->with('logo_file',  $this->logo_file);;
    }

    public function tutor_register_view(){


        $data['countries'] = Country::all();

//        $data['states'] = State::all();

//         $data['cities'] = DB::table('cities')->get();//Citie::all();
        //dd($data['cities']);
        $data['languages'] = Language::all();

        return view('tutor.tutorRegister')->with($data)
        ->with('your_note_count', $this->your_note_count)
        ->with('your_note_count', $this->your_note_count)
            ->with('tutor_globalflag',  $this->tutor_globalflag);
    }

    public function notes_view(){
        if(Auth::check()) {
            $id = Auth::user()->id;
            $data['notes'] = Note::where('user_id',$id)->orderBy('notes.notes_id', 'desc')->paginate(9);
            return view('notes.your_notes')->with($data)
                    ->with('your_note_count', $this->your_note_count)
                ->with('tutor_globalflag',  $this->tutor_globalflag)
                    ->with('logo_file', $this->logo_file);
        }
        else{
            return redirect('/');
        }
    }

    public function about(){
        return view('aboutus')->with('your_note_count', $this->your_note_count)
            ->with('logo_file', $this->logo_file)
            ->with('tutor_globalflag',  $this->tutor_globalflag);
    }

    public function download($file_name) {

        // $file_path = asset('/public/notes/'.$file_name);
        // //http://localhost:8000/dashboard/download/1493801739-answers.docx
        // //return redirect()->route('download_file', ['path' => 'uploads/buyTools/'.$file_name]);
        // return $file_path;


        $file=  asset('/public/notes/'.$file_name);

        $headers = array(
                    'Content-Type: application/pdf',
                    );

        return response()->file($file, $headers); // return \Response::download($file, 'filename.pdf', $headers);
        //return response()->download($file_path);
    }
}
