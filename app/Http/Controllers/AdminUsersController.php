<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\User;
use App\Models\Role;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $user = User::find();
      $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {

      //modifing for password field
      if (trim($request->password) == '') {
        $input = $request->except('password');
      } else {
        $input = $request->all();
        $input['password'] = bcrypt($request->password);
      }


      //flash messege for update feild.
      Session::flash('created_user', 'CONGRATULATIONS! NEW USER HAS BEEN CREATED.'); // Use Session class on top.

              //return view('admin.users.create');
            // return $request->all();
            //User::create($request->all());
            // $input = $request->all();
            if ($file =$request->file('photo_id')) {
              //return "photo exits";

              //get photo name with extension
              $name = time() . $file->getClientOriginalName();
              //create images folder in public directory
              $file-> move('images', $name);

              $photo  = Photo::create(['file' => $name]);
              $input['photo_id'] = $photo->id;
            }
            // $input['password'] = bcrypt($request->password);
            User::create($input);
            return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
          $roles = Role::pluck('name','id')->all();
          
          return view('admin.users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
         //return $request->all();
         $user = User::findOrFail($id);

         //flash messege for update feild.
         Session::flash('upadated_user', 'HOORRAYH!! THE USER HAS BEEN UPDATED.'); // Use Session class on top.

         //modifing for password field
         if (trim($request->password) == '') {
           $input = $request->except('password');
         } else {
           $input = $request->all();
           $input['password'] = bcrypt($request->password);
         }

         if ($file =$request->file('photo_id')) {
           //return "photo exits";

           //get photo name with extension
           $name = time() . $file->getClientOriginalName();
           //create images folder in public directory
           $file-> move('images', $name);

           $photo  = Photo::create(['file' => $name]);
           $input['photo_id'] = $photo->id;
         }
         // $input['password'] = bcrypt($request->password);
         $user->update($input);
         return redirect('/admin/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //return('User Destroyed'); //for checkout

        //find user.
        $user = User::findOrFail($id);

        //delete user photo from database with deleting user.
        //unlink(public_path() . "/images/" .  $user->photo->file);
        unlink(public_path() . $user->photo->file); // here don't need "/images/", beucause we allready put path accessor in Photo.php.
        $user->delete();

          // flash messege for delete user.
          Session::flash('deleted_user', 'DELETED!! THE USER HAS BEEN DELETED.'); // Use Session class on top.
          return redirect('/admin/users');
    }
}
