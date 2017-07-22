<?php

namespace App\Http\Controllers;

use App\Institute;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Chat_group;
use App\Chat_msg;
use Auth;
use App\User;
use App\Unread_msg;
class ChatController extends Controller
{
    public function __construct(){
        parent::__construct();
    }
    public function inbox_index(){
        $userID = Auth::user()->id;
        $data['unread_chat'] = 0;
        $data['groups_detail'] = Chat_group::whereRaw("find_in_set('{$userID}',user_ids)")->orderBy('group_id', 'desc')->get();
        if(Unread_msg::where('user_id',Auth::user()->id)->exists()){
            $data['unread_chat'] = Unread_msg::where('user_id',Auth::user()->id)->get();
        }
        return view('message.inbox')->with($data)
            ->with('your_note_count', $this->your_note_count)
            ->with('logo_file', $this->logo_file)
            ->with('tutor_globalflag',  $this->tutor_globalflag);
    }
    public function ajax_get_chat_msg($id){
        $data = Chat_msg::where('group_id',$id)->get();
        if(Unread_msg::where('user_id',Auth::user()->id)->exists()){
            Unread_msg::where('user_id',Auth::user()->id)->delete();
        }
        $users_all = Chat_group::where('group_id',$id)->first();
        $inst_flag = Institute::where('institute_name',$users_all->group_name)->exists();
        $users_all = explode(',',$users_all->user_ids);
        $user = '';

        //Group Users add Dropdown Creation
          $institutes = array();
          $users = array();
            foreach($users_all as $users){
                if($users != Auth::user()->id){
                    $username = User::select('username')->where('id',$users)->first();
                    $user .= '<li><a href="#">'.$username->username.'</a></li>';
                }
                //Getting Group users institute id
                $institute = User::select('institute_id')->where('id',$users)->first();
                if(!in_array($institute->institute_id, $institutes)){
                    array_push($institutes,$institute->institute_id);
                }
            }

            //Getting other users of given Institute in current group chat.
             $other_users = User::select('users.email', 'users.id')
                                ->whereIn('institute_id', $institutes)
                                ->whereNotIn('users.id', $users_all)
                                ->get();

        //End






        $html = '';
        $group_id = $id;
        foreach($data as $msg){
            if($msg->user_id != Auth::user()->id){
                $username = User::select('username')->where('id',$msg->user_id)->first();
                $html .= '<div class="row pd">
                            <div class="col-lg-2 col-md-2 fleft chat_pic">
                                <a class="text-center"><img src="'.asset('/public/images/chat_user.png').'" class="img-responsive img-circle"/>
                                <br>
                                <small class="text-center">'.$username->username.'</small></a>
                            </div>
                            <div class="col-lg-10 col-md-10 fleft mg-rt">
                                <div class="inbox-details">
                                 '.$msg->msg_text.'    
                                </div>
                            </div>
                           </div>';
            }
            else{
                $html .= '<div class="row pd">
                        <div class="col-lg-2 col-md-2 fright chat_pic">
                                <a class="text-center"><img src="'.asset('/public/images/chat_user.png').'" class="img-responsive img-circle"/>
                                <br>
                                <small class="text-center">'.Auth::user()->username.'</small></a>
                            </div>
                        <div class="col-lg-10 col-md-10 fright mg-rt">
                            <div class="inbox-details">
                                '.$msg->msg_text.' 
                            </div>
                        </div>
                    </div>';
            }
        }// end foreach

        return \Response::json(array('success' => true,'inst_flag'=>$inst_flag,'otherUsers'=>$other_users,'group_id'=> $group_id,'users'=>$user, 'html'=> $html, 'data' => 'Chat Successfully Added'), 200);
        exit();
    }

    public function create_group(Request $request){

        $chat_group = new Chat_group();
        $chat_group->group_name = $request->input('group_name');
        $chat_group->user_ids = $request->input('tutor_id');
        $chat_group->user_ids .= ',';
        $chat_group->user_ids .= Auth::user()->id;

        if($chat_group->save()){
            return \Response::json(array('success' => true, 'msg' => 'Chat Successfully Added'), 200);
        }else{
            return \Response::json(array('success' => false, 'msg' => 'Chat Couldnot be Added'), 422);
        }
    }

    public function newMsgPost(Request $request){
        $new_chat_msg = new Chat_msg();
        $new_chat_msg->group_id = $request->input('group_id');
        $new_chat_msg->msg_text = $request->input('chatmsg');
        $new_chat_msg->user_id = Auth::user()->id;

        if($new_chat_msg->save()){
            $msg_id = $new_chat_msg->id;
            $gr_id = $request->input('group_id');
            $user_ids = Chat_group::select('user_ids')->where('group_id',$gr_id)->first();
            $user_ids = explode(',',$user_ids->user_ids);
            foreach($user_ids as $user_id){
                if($user_id != Auth::user()->id){
                    \DB::table('unread_msgs')->insert([
                        ['grp_id' => $gr_id, 'user_id' => $user_id]
                    ]);
                }
            }
            return \Response::json(array('success' => true, 'msg' => 'Chat Successfully Added'), 200);
        }else{
            return \Response::json(array('success' => false, 'msg' => 'Chat Could not be Added'), 422);
        }
    }
    public function newGroupUsr(){
        $userid = $_POST['new_usr'];
        $gr_id = $_POST['gr_id'];
        $model = Chat_group::where('group_id',$gr_id)->first();
        $model->user_ids .= ','.$userid;
        $values = array('user_ids' => $model->user_ids);
        $update = Chat_group::where('group_id', $gr_id)->update($values);
        if($update){
            return redirect(route('inbox_index'));
            print_r('all set');
        }
        else{
         print_r('something went wrong');
        }
    }
}
