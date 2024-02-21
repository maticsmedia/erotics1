<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{

    public function AllUsers()
    {
        $member = DB::table('members')->orderBy('id', 'desc')->paginate(5);
        return view('Users.all_users', compact('member'));
    } // End Method

    public function AddUser()
    {
        return view('Users.add_user');
    } // End Method


    public function StoreUser(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'about' => 'required',
            'age' => 'required',
            'image' => 'required',
        ]);

        if ($request->file('image')) {
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $request->file('image')->getClientOriginalExtension();
            $img = $manager->read($request->file('image'));
            $img = $img->resize(300, 300);

            $img->toJpeg(80)->save(base_path('public/upload/users/' . $name_gen));
            $save_url = 'upload/users/' . $name_gen;

            Member::insert([

                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'about' => $request->about,
                'age' => $request->age,
                'verified' => $request->input('verified', false),
                'vip' => $request->input('vip', false),
                'image' => $save_url,
                'created_at' => Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'User Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.users')->with($notification);
    } // End Method



    public function EditUser($id)
    {

        $member = Member::findOrFail($id);
        return view('Users.edit_user', compact('member'));
    } // End Method



    public function UpdateUser(Request $request)
    {

        $member_id = $request->id;

        if ($request->file('image')) {

            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $request->file('image')->getClientOriginalExtension();
            $img = $manager->read($request->file('image'));
            $img = $img->resize(300, 300);

            $img->toJpeg(80)->save(base_path('public/upload/users/' . $name_gen));
            $save_url = 'upload/users/' . $name_gen;

            Member::findOrFail($member_id)->update([

                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'about' => $request->about,
                'age' => $request->age,
                'verified' => $request->verified,
                'vip' => $request->vip,
                'image' => $save_url,
                'created_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'User Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.users')->with($notification);
        } else {

            Member::findOrFail($member_id)->update([

                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'about' => $request->about,
                'age' => $request->age,
                'verified' => $request->verified,
                'vip' => $request->vip,
                'image' => $request->image,
                'created_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'User Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.users')->with($notification);
        } // End else Condition


    } // End Method


    public function DeleteUser($id)
    {

        $user_img = Member::findOrFail($id);
        $img = $user_img->image;
        unlink($img);

        Member::findOrFail($id)->delete();

        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method
}
