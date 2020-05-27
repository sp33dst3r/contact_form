<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Saver;
use App\Contact;
use Validator;


class ContactController extends Controller
{
    public $factory;

    public function __construct(Saver $factory)
    {
        $this->factory = $factory;
    }

    public function handle(Request $request){

        $rules = [
            'name' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $errorsCollection = $validator->errors();
                $errors = [];
                foreach($errorsCollection->all() as $error){
                    array_push($errors, $error);
                }
                return response()->json(['errors'=>$errors]);
        }

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();


        try{
            $this->factory->save("one", $request); // You can change class here.
        }
        catch(\Throwable $e){
            return response()->json([
                'errors' => ['Please check your e-mail configurations'],
            ]);
        }


        return response()->json([
            'success' => true
        ]);
    }
}
