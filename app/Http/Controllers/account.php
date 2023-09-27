<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Exception;
use PhpParser\Node\Stmt\TryCatch;

class account extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = user::paginate(25);
        return view('account.account',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                'role'=>   ['required'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'role'=> $request->role,
                'password' => Hash::make($request->password),
            ]);
            event(new Registered($user));
            return redirect()->back()->with(['success'=>'created successfull']);

        }catch (Exception $message) {
            return redirect()->back()->with(['msg'=>$message]);
        }

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id = null)
    {
        $data = User::findOrFail($id);
        return view('account.profile',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        try {
            $user = User::findOrFail($id);
            // return dd($user);
            if(User::where('email',$request->email)->exists()){
                return Redirect::route('admin.profile.edit',['id'=>$user->id])->with('status', 'error');
            }
            else{
                $user->name = $request->name ;
                $user->email = $request->email;
                $user->save();
                return Redirect::route('admin.profile.edit',['id'=>$user->id])->with('status', 'profile-updated');
            }
        } catch (Exception $msg) {
            return Redirect::route('admin.profile.edit',['id'=>$user->id])->with('msg', $msg);
        }




    }

    public function updatepassword( Request $request ,  $id = null):RedirectResponse
    {
        try {
            $user = User::findOrFail($id);
            $resetpassword = Hash::make('Password_123');
            $user->password = $resetpassword;
            $user->update();
            return back()->with('status', 'password-updated');
        } catch (Exception $e) {
            //throw $th;
            return back()->with('msg',$e);
        }
    }

    public function updaterole(Request $request, $id = null)
    {

        try {
            $user = User::findOrFail($id);
            $user->role = $request->role;
            $user->update();
            return redirect()->back()->with(['success'=>'created successfull']);
        } catch (Exception $e) {
            return redirect()->back()->with(['msg'=>$e]);
        }



    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
