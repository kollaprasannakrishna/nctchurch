<?php

namespace App\Http\Controllers;

use App\Email;
use App\Group;
use App\Member;
use App\User;
use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
class EmailController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

    }
    public function create(){
        $members=Member::all();
        $groups=Group::all();
        $grps=array();
        $usr=array();
        foreach ($members as $member){
            $usr[$member->id]=$member->firstname;
        }
        foreach ($groups as $group){
            $grps[$group->id]=$group->name;
        }
        return view('controlPanel.emails.create')->with('groups',$grps)->with('members',$usr);
    }
    public function index(){
        $emails=Email::orderBy('id','desc')->paginate(10);

        return view('controlPanel.emails.index')->with('emails',$emails);
    }


    public function memberSave(Request $request){
        //dd($request);
        $this->validate($request,[

            'subject'=>'min:3',
            'body'=>'min:3|required'
        ]);


        $email=new Email();

        $email->subject=$request->subject;
        $email->body=$request->body;

        $request->user()->emails()->save($email);

        if(isset($request->to)){
            $email->members()->sync($request->to,false);
        }else{
            $email->members()->sync(array(),false);
        }
        $emails=array();

        foreach ($request->to as $em){
            $mem=Member::find($em);
            $emails[$mem->id]=$mem->email;
        }
        if($request->save == 'Save'){
            $email->status='draft';
            $email->save();
            $request->session()->flash('success','Email save successfully');

            return redirect()->route('emails.create');

        }else{
            $this->send($request,$emails);

            $request->session()->flash('success','Your email sent successfully');
            $email->status='sent';
            $email->save();
            return redirect()->route('emails.create');
        }



    }
    public function groupSave(Request $request){
        $this->validate($request,[

            'subject'=>'min:3',
            'body'=>'min:3|required'
        ]);

        $group_emails=array();
        foreach ($request->to as $tos){
            $group=Group::find($tos);
            //dd($tos);
            foreach ($group->members as $t){
                $group_emails[$t->id]=$t->email;
            }
        }
        //dd($group_emails);

        $email=new Email();

        $email->subject=$request->subject;
        $email->body=$request->body;

        $request->user()->emails()->save($email);

        if(isset($request->to)){
            $email->groups()->sync($request->to,false);
        }else{
            $email->groups()->sync(array(),false);
        }

        if($request->save == 'Save'){
            $email->status='draft';
            $email->save();
            $request->session()->flash('success','Email save successfully');
            return redirect()->route('emails.create');
        }else{
            $this->send($request,$group_emails);
            $request->session()->flash('success','Your email sent successfully');
            $email->status='sent';
            $email->save();
            return redirect()->route('emails.create');
        }
    }
    public function send(Request $request,$emails){
        //dd($request);
        $this->validate($request,[

            'subject'=>'min:3',
            'body'=>'min:3|required'
        ]);


            $data = array(
                'to' => $emails,
                'subject' => $request->Subject,
                'bodymessage' => $request->body
            );

        //to access the data array in the view we can used individual items as variables
        // as $email instead of $data['email']
        Mail::send('controlPanel.emails.templates.general', $data,function ($message) use($data){
            $message->from('test@littleflock.org');
            $message->to($data['to']);
            $message->subject($data['subject']);
        });
        $request->session()->flash('success','Your email sent successfully');
        return redirect()->route('emails.create');
    }
    public function editEmail($id){
        $email=Email::find($id);
        if($email->type == 'group'){
            $groups=Group::all();
            $grps=array();
            foreach ($groups as $group){
                $grps[$group->id]=$group->name;
            }
            return view('controlPanel.emails.edit')->with('email',$email)->with('groups',$grps);
        }else{
            $members=Member::all();
            $mem=array();
            foreach ($members as $member){
                $mem[$member->id]=$member->firstname;
            }
            return view('controlPanel.emails.edit')->with('email',$email)->with('members',$mem);

        }
    }
    public function update(Request $request,$id){
        $email=Email::find($id);

        $this->validate($request,[

            'subject'=>'min:3',
            'body'=>'min:3|required'
        ]);

        $email->subject=$request->Subject;
        $email->body=$request->body;

        $request->user()->emails()->save($email);

        if($email->type == 'group'){

            if(isset($request->to)){
                $email->groups()->sync($request->to,false);
            }else{
                $email->groups()->sync(array(),false);
            }

            if($request->save == 'Save'){
                $email->status='draft';
                $email->save();
                $request->session()->flash('success','Email save successfully');
                return redirect()->route('emails.create');
            }else{
                $group_emails=array();
                foreach ($request->to as $tos){
                    $group=Group::find($tos);
                    //dd($tos);
                    foreach ($group->members as $t){
                        $group_emails[$t->id]=$t->email;
                    }
                }
                $this->send($request,$group_emails);
                $request->session()->flash('success','Your email sent successfully');
                $email->status='sent';
                $email->save();
                return redirect()->route('emails.create');
            }
        }else{
            if(isset($request->to)){
                $email->members()->sync($request->to,false);
            }else{
                $email->members()->sync(array(),false);
            }
            $emails=array();

            foreach ($request->to as $em){
                $mem=Member::find($em);
                $emails[$mem->id]=$mem->email;
            }
            if($request->save == 'Save'){
                $email->status='draft';
                $email->save();
                $request->session()->flash('success','Email save successfully');

                return redirect()->route('emails.create');

            }else{
                $this->send($request,$emails);

                $request->session()->flash('success','Your email sent successfully');
                $email->status='sent';
                $email->save();
                return redirect()->route('emails.create');
            }
        }
    }

}
