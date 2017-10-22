<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Specialist;

class UploadController extends Controller
{
    
    public function search(Request $request) {
        
        $specialists = null;
        if($request->isMethod('post') && (isset($request->firstName) || isset($request->lastName) || isset($request->keywords))) {
            $firstName = isset($request->firstName) ? $request->firstName : '';
            $lastName = isset($request->lastName) ? $request->lastName : '';
            $keywords = isset($request->keywords) ? $request->keywords : '';
            
            $arrKeys = explode(',', $request->keywords);
            foreach($arrKeys as $key => &$value) {
                $value = trim($value);
                if($value === '')
                    unset($arrKeys[$key]);          
            }
            unset($value);
            
            $rules = array();
            $i = 0;
            foreach($arrKeys as $keyword) {
                $rules[$i++] = ['keywords', 'LIKE', '%'.$keyword.'%'];
            }
                
            $specialists = Specialist::where('firstName', 'LIKE', '%'.$firstName.'%')
                                       ->where('lastName', 'LIKE', '%'.$lastName.'%')
                                        ->where($rules)->get();  
            $request->flash();
        }
        
        return view('welcome', ['spec'=>$specialists]);
        
    }
    
    
    
    public function store(Request $request) {
        
        $saved = null;
        $request->session()->forget('errors');
        
        if($request->isMethod('post')) {
            
            $messages = [];
            $rules = [
                'firstName'=>'required|alpha',
                'lastName' => 'required|alpha',
                'keywords' => 'required',
                'file'=>'required|mimes:doc,docx,pdf,txt',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            
            if($validator->fails()) {
                $errors = $validator->errors()->getMessages();
                $request->session()->put('errors', $errors);
                return redirect()->route('store');
            }
        
            $strKeys = $request->keywords;
            $arrKeys = explode(',', $strKeys);
            foreach($arrKeys as $key => &$value) {
                $value = trim($value);
                if($value === '')
                    unset($arrKeys[$key]);          
            }
            $strKeys = implode(', ', $arrKeys);
            unset($value);
            if($request->hasFile('file')) {
                $path = $request->file->store('public/resumes');
                $fileName = basename($path);
                $spec = new Specialist;
                $spec->firstName = $request->firstName;
                $spec->lastName = $request->lastName;
                $spec->keywords = $strKeys;
                $spec->fileName = $fileName;
                $spec->save();
                $saved = 'Your resume has been created successfully!';
            }
        }
        return view('upload', ['saved' => $saved]);
    }
}
