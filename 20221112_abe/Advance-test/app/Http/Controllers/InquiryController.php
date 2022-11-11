<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ClientRequest;


class InquiryController extends Controller
{
    public function check(ClientRequest $request){
        $data = $request->all();
        //dd($data);
        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $name = $firstName.' '.$lastName;
        //$s_sex = $request->sex;
       
        if($request->sex === '1'){
            $sex = '男性';
        }else{
            $sex = '女性';
        }
       
        $email = $request->email;
        $zipcode = $request->zipcode;
        $address = $request->address;
        $buildings = $request->buildings;
        $opinion = $request->opinion;
         $datas = [
            'name' => $name,
            'sex' => $sex,
            'sex_code' =>$request->sex,
            'email' => $email,
            'zipcode' => $zipcode,
            'address' => $address,
            'buildings' => $buildings,
            'opinion'=> $opinion,
        ];

        $s_datas = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'sex_code' =>$request->sex,
            'email' => $email,
            'zipcode' => $zipcode,
            'address' => $address,
            'buildings' => $buildings,
            'opinion'=> $opinion,
        ];
        
        $request->session()->put('txt',$s_datas);

        return view('check',$datas);

    }

    public function register(Request $request){
        $register_data = $request->all();
        unset($register_data['_token']);
        Contact::create($register_data);
        return view('thanks');
    }

    public function back(Request $request)
    {
        $datas = $request->session()->get('txt');
        return view('index',$datas);
        $request->session()->forget('txt');
    }

    public function management()
    {
        $sraech_datas = Contact::where('fullname', )->get();
        return view('management',['search_datas' =>$sraech_datas]);
    }

    public function search(Request $request)
    {
       $contact = Contact::paginate(2);




       $search_name = $request->name;
       //dd$search_name);
       if($request->sex === "0"){
            $sraech_datas = Contact::where('fullname','LIKE BINARY',"%{$search_name}%",)->whereIn('gender',[1,2])->
            whereBetween('created_at',[$request->dateFrom,$request->dateTo])->where('email','LIKE BINARY',"%{$request->email}%")->paginate(2);
        }else{
            $sraech_datas = Contact::where('fullname','LIKE BINARY',"%{$search_name}%")->where('gender',$request->sex)->
            whereBetween('created_at',[$request->dateFrom,$request->dateTo])->where('email','LIKE BINARY',"%{$request->email}%")->paginate(2);
        }

      return view('management',['search_datas' => $sraech_datas,'contacts'=> $contact]);

    }

    public function delete(Request $request)
    {   

       Contact::find( $request->id)->delete();
       return redirect('/search');
    }
    

}
