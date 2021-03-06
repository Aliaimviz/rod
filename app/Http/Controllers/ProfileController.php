<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Citie;
use App\State;
use App\Language;
use App\Lesson;
use App\Http\Requests;
use App\Tutor;
use Auth;
use DB;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Std_subscription;

class ProfileController extends Controller
{

    public function __construct(){
       parent::__construct();
    }

    public function profile_index(){

    	$tutor = Tutor::where('users_id', Auth::user()->id)
    		->select('tutors.*', 'countries.name as country_name', 'languages.name as languages_name'
    			//,'states.name as state_name')
    			,'states.name as state_name', 'lessons.lesson_desc as lesson_desc')
    		->join('countries', 'countries.id','=', 'tutors.country_id')
//    		->join('cities', 'cities.id','=', 'tutors.city_id')
    		->join('states', 'states.id','=', 'tutors.state_id')
    		->join('languages', 'languages.id','=', 'tutors.languag_id')
    		->join('lessons', 'lessons.tutor_id','=', 'tutors.tutor_id')
    		->first();
        $my_institute = User::join('institutes', 'users.institute_id', '=', 'institutes.institute_id')->where('users.id', Auth::user()->id)->first(['institutes.institute_name']);
         $data['myProfileFlag'] = true;
         $data['total_subscribers'] = Std_subscription::where('author_id',Auth::user()->id)->count();

        return view('dashboard.profile.profile_view')->with('tutor', $tutor)->with('my_institute', $my_institute)->with($data)
        ->with('your_note_count', $this->your_note_count)
             ->with('logo_file', $this->logo_file)
            ->with('tutor_globalflag',  $this->tutor_globalflag);
    }

    public function editprofile_index(){

        $data['countries'] = Country::all();

        //dd($data['cities']);
        $data['languages'] = Language::all();

    	$editTutor = Tutor::where('users_id', Auth::user()->id)
                    		->select('tutors.*','states.id as state_id','countries.id as country_id' ,'countries.name as country_name', 'cities.name as city_name', 'languages.name as languages_name'
                    			//,'lessons.lesson_desc as lesson_detail')
                    			,'states.name as state_name', 'lessons.lesson_desc as lesson_desc')
                    		->join('countries', 'countries.id','=', 'tutors.country_id')
                    		->join('cities', 'cities.id','=', 'tutors.city_id')
                    		->join('states', 'states.id','=', 'tutors.state_id')
                    		->join('languages', 'languages.id','=', 'tutors.languag_id')
                    		->join('lessons', 'lessons.tutor_id','=', 'tutors.tutor_id')
                    		->first();
    	if($this->tutor_globalflag){
        $data['states'] = State::where('country_id',$editTutor->country_id)->get();
        $data['cities'] = DB::table('cities')->where('state_id',$editTutor->state_id)->get();//Citie::all();
        }
    	return view('dashboard.profile.edit_profile')->with('editTutor', $editTutor)->with($data)
                                                    ->with('your_note_count', $this->your_note_count)
                                                    ->with('logo_file', $this->logo_file)
        ->with('tutor_globalflag',  $this->tutor_globalflag);
    }

    public function editprofile_post(Request $request){

        $this->validate($request, [
            'tutor_name' => 'required',
            'tutor_qualification' => 'required',
            'tutor_majors' => 'required',
            'tutor_skills' =>  'required',
            'per_hour_charges' => 'required',
            'tutor_about' => 'required',
            'lesson_desc' => 'required',
        ]);


        $user = Auth::user();
        //return 123;
        if($request->ajax()) {

            $newTutor = Tutor::find($request->input('tutor_id'));
            $newTutor->users_id = $user->id;
            $newTutor->tutor_unique = $request->input('tutor_name');
            $newTutor->country_id = $request->input('tutor_country');
            $newTutor->state_id = $request->input('tutor_state');
            $newTutor->city_id = $request->input('tutor_city');
            $newTutor->languag_id = $request->input('tutor_lanuage');
            $newTutor->other_languages = $request->input('tutor_other_lang');

            $newTutor->tutor_about = $request->input('tutor_about');
            $newTutor->tutor_qualification = $request->input('tutor_qualification');
            $newTutor->intro_video_link = $request->input('video_link');
            $newTutor->tutor_gender = $request->input('tutor_gender');
            $newTutor->tutor_majors = $request->input('tutor_majors');
            $newTutor->tutor_skills = $request->input('tutor_skills');
            $newTutor->per_hour_charges = $request->input('per_hour_charges');
            $newTutor->tutor_rating = '5';

            if(Input::hasFile('profile_pic')) {
                $file = Input::file('profile_pic');
                $tmpFilePath = '/profile_pics/';
                $tmpFileName = preg_replace('/\s+/', '', (time() . '-' . $file->getClientOriginalName()));
                $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
                $path =   $tmpFileName;
                $finalpath = $path;
            $newTutor->profile_pic = $finalpath;
                    $tutorData = Tutor::select('profile_pic')->where('tutor_id', $request->input('tutor_id'))->first();
                    if(isset($tutorData->profile_pic) && !empty($tutorData->profile_pic)){
                    unlink(public_path('profile_pics/'.$tutorData->profile_pic));
                    }
            }
            //$response = $newTutor->save();
            if($newTutor->update()){
                  $lesson = Lesson::where('tutor_id', $request->input('tutor_id'))
                                    ->update(['lesson_desc' => $request->input('lesson_desc')]);
                   if($lesson){
                            return \Response::json(array('success' => true, 'last_insert_id' => true), 200);
                   }
            }
            else{
                 return \Response::json(array('success' => false), 422);
            }
        }

        //return view();
    }

    public function public_profile_view($id){

        $tutor = Tutor::where('users_id', $id)
            ->select('tutors.*', 'countries.name as country_name', 'cities.name as city_name', 'languages.name as languages_name'
                //,'states.name as state_name')
                ,'states.name as state_name', 'lessons.lesson_desc as lesson_desc')
            ->join('countries', 'countries.id','=', 'tutors.country_id')
            ->join('cities', 'cities.id','=', 'tutors.city_id')
            ->join('states', 'states.id','=', 'tutors.state_id')
            ->join('languages', 'languages.id','=', 'tutors.languag_id')
            ->join('lessons', 'lessons.tutor_id','=', 'tutors.tutor_id')
            ->first();
        $my_institute = User::join('institutes', 'users.institute_id', '=', 'institutes.institute_id')->where('users.id', $id)->first(['institutes.institute_name']);
        $data['myProfileFlag'] = false;

        return view('dashboard.profile.profile_view')->with('tutor', $tutor)->with('my_institute', $my_institute)
        ->with($data)->with('logo_file', $this->logo_file)->with('your_note_count', $this->your_note_count)
            ->with('tutor_globalflag',  $this->tutor_globalflag);

    }

    public function std_profile_edit(Request $request){
        $id = Auth::user()->id;
        $update = User::where('id', $id)
            ->update(['location' => $request->input('std_location'),'about' => $request->input('std_about'), 'gender' => $request->input('std_gender')]);
        if($update){
            return \Response::json(array('success' => true), 200);
        }
        else{
            return \Response::json(array('success' => false), 422);
        }
    }
    public function std_profile_pic(Request $request){
        $id = Auth::user()->id;

        if($request->std_profile) {
          $fileName = substr($request->std_profile->getClientOriginalName(), -4);
          if($fileName == '.jpg' || $fileName == 'jpeg' || $fileName == '.png') {
            $old_profile_pic = User::select('profile_pic')->where('id',$id)->first();
            unlink(public_path('profile_pics/'.$old_profile_pic->profile_pic));
            $file = $request->std_profile;
            $tmpFilePath = '/profile_pics/';
            $tmpFileName = time() . '.' . $request->std_profile->getClientOriginalExtension();
            $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
//            $path =   $tmpFileName;
//            $finalpath = $path;
            $profile_pic = $tmpFileName;
          }
          else{
            return redirect()->back()->withErrors(['Wrong formate! Use .jpg or .jpeg or .png']);;
          }
        }
        else{
            return redirect('/profile');
        }
        $update = User::where('id', $id)
            ->update(['profile_pic'=>$profile_pic]);
        if($update){
            return redirect('/profile');
        }
        else{
            return redirect('/profile');
        }
    }



}
