<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use App\Models\Category;
class AdminController extends Controller
{
   // protected $redirectTo = '/admin';
    public function __construct() {
        $this->middleware('auth');
      }



    public function home()
    {
        $users = DB::table('users')
        ->orWhere('role', 'participant')
        ->orWhere('role', 'demandeur')
        ->count();       
         $categories = DB::table('categories')->count();
        $events = DB::table('events')->count();
        $feedbacks = DB::table('feedbacks')->count();

        return view('Admin.home.home',compact('users','categories','events','feedbacks' ));
    }

    public function categories()
    {
        $categories = DB::table('categories')->paginate(4);
        return view('Admin.category.index ',compact('categories'));
    }

    public function showPageAddCategory()
    {
    
        return view('Admin.category.ajouterCategory');
    }
    


    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/login');
    }

    protected function guard()
    {
        return Auth::guard();
    }
    protected function loggedOut(Request $request)
    {
        //
    }





public function AddCategory(Request $request)
{
    $request->validate([
        'Nom' => 'required|unique:categories|max:255',
       
    ]);
    DB::table('categories')->insert([
        'Nom' => $request->Nom,
       
    ]);
    return redirect()->route('categories')->with('success','Categorie ajouté avec succés');

}

public function deleteCategory(Request $request)
{
  
    DB::table('categories')->where('id', '=', $request->id)->delete();
    return redirect()->route('categories')->with('supprimer','Categorie supprimé avec succés');

}

public function updateCategory(Request $request)
{

    $id=$request['id'];
   
    $category=Category::find($id);

   
        $category->Nom =  $request['Nom'];
        $category->update();
        return redirect()->route('categories')->with('modifier','Categorie modifié avec succés');
   
    
   
}























































































}