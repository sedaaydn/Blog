<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('user.index', compact('user'));

    }
    public function user_posts()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $postCount = $user->posts->count();
        return view('user.user_posts')->with('user',$user)->with('postCount',$postCount);
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit',compact('user'));
    }


    public function update(Request $request, $id)
    {

        $file = $request->file('file'); // dosyayı al.

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        if ($file) // Eğer dosya yüklendiyse...
        {
            $title = uniqid(); // fotoğrafın adı (uniqid fonksiyonu rastgele bir id veriyor)
            $extension = $file->getClientOriginalExtension(); // fotoğrafın uzantısı ne? .jpg, .png vs.

            $filename = $title . '.' . $extension; // dosya ismi "9239823.jpg"

            $user->image = $filename; // veritabanına ismi kaydet.

            $file->move(public_path('uploads'), $filename);
        }

        $user->save();
        toastr()->success('Profile has been successfully edited', 'Successful !');
        return redirect()->route('user.index');

    }


    public function destroy($id)
    {
        $user = User::find($id); // delete my accoun'a basınca javascript ile bir confirm çıkart return confirm fonksiyonuna bak interntten ne işe ypıyo tarayıcı emin misiniz diye sorcak iştehe biliyom temada var ondan onu kullanırım tamam onun haricinde süper afferim yiiaaa utandımmm:D tamam hadi kaçtım b
        $user->comments()->delete();
        $user->posts()->delete();
        $user->delete();
        return redirect()->route('login');
    }
}
?>
