<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Client;
use Session;

class ClientController extends Controller
{

    public function show()
    {
    
      //$clients = Client::all();
      
      $clients = DB::table('clients')
                ->select('users.id as user_id', 'users.first_name as user_name', 'clients.*')
                ->leftJoin('users', 'users.id', '=', 'clients.created_user_id')
                ->get();
      
       return view('clients.index')->withClients($clients);
       
    }
    
    public function view($id){
        
        $client = DB::table('clients')
        ->select('users.id as user_id', 'users.first_name as user_name', 'clients.*')
        ->leftJoin('users', 'users.id', '=', 'clients.created_user_id')
        ->where('clients.id', '=', $id)->get();
        //dd($client);
        return view('clients.view')->withClient($client)->withClientid($id);
        
    }
    
    public function store(Request $request){
      
      $this->validate($request, [
        'name' => 'required'
      ]);

      $input = $request->all();
      
      Client::create($input);

      Session::flash('flash_message', 'Success! New Client captured successfully. View Details');

      $clients = DB::table('clients')
      ->select('users.id as user_id', 'users.first_name as user_name', 'clients.*')
      ->leftJoin('users', 'users.id', '=', 'clients.created_user_id')
      ->get();
      
      return view('clients.index')->withClients($clients);
    
    }
    
    public function update(Request $request, $id){
    
        $this->validate($request, [
            'name' => 'required'
        ]);
        
        $input = $request->all();
        
        $affected = DB::update('update clients set name = ? where id = ?', [$input['name'], $id]);
        
        Session::flash('flash_message', 'Success! Client successfully updated.');
        
        $clients = DB::table('clients')
        ->select('users.id as user_id', 'users.first_name as user_name', 'clients.*')
        ->leftJoin('users', 'users.id', '=', 'clients.created_user_id')
        ->get();
        
        return view('clients.index')->withClients($clients);
      
    }
    
    /*
     * There are two ways to delete, you could delete the record
     * or set deteled_at field to a current date, if deleted_at is not null, then 
     * the record is deleted
     * */
    public function delete($id){
        
        //Either delete or set date
        $deleted = DB::delete('delete from clients where id = ?', [$id]);
        
        Session::flash('flash_message', 'Success! Client successfully deleted.');
        
        $clients = DB::table('clients')
        ->select('users.id as user_id', 'users.first_name as user_name', 'clients.*')
        ->leftJoin('users', 'users.id', '=', 'clients.created_user_id')
        ->get();
        
        return view('clients.index')->withClients($clients);
    
    }
    
    public function createClientForm(){
    
      $userid = \Auth::user()->id;
      
      return view('clients.create')->withUserid($userid);
      
    }
    
    public function editClientForm($id){
        
        $client = DB::table('clients')
        ->where('id', '=', $id)->get();
        
        return view('clients.edit')->withClient($client)->withClientid($id);
        
    }
    
}
