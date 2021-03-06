<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Auth;
use App\Note;
use App\Dynamic_content;
use App\Tutor;
use Carbon\Carbon;
use App\Unread_msg;
use App\Std_subscription;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
    
    public $your_note_count;
    public $logo_file;

 	public function __construct(){

        $dynamic_content = new Dynamic_content();
        $this->logo_file = $dynamic_content->get_logo_file();
          	
        if(Auth::check()){
    	$this->your_note_count = Note::where('user_id', Auth::user()->id)->count();
    	$this->tutor_globalflag = Tutor::where('users_id', Auth::user()->id)->exists();
        $this->unread_msgs = 0;
    	if(Unread_msg::where('user_id',Auth::user()->id)->exists()){
    	$this->unread_msgs = Unread_msg::where('user_id',Auth::user()->id)->count();
        }
            \Config::set('unread_msgs', $this->unread_msgs);
        }else{
    	$this->your_note_count = 0;
            $this->tutor_globalflag = 0;
    	}

    	$TutorData = Tutor::where('expiry_date','<',Carbon::now())->update(['is_paid'=>0]);
    	Std_subscription::where('expiry_date','<',Carbon::now())->delete();
    }
}
