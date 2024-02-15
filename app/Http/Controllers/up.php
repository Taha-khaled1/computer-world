<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class up extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function about()
    {
        return view('about');

    }
    public function show_user()
    {
        $users =user::all();
        return view('users.show',["users"=>$users]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $query = $request->get('query');
        if ($request->ajax()) {
            $data = User::where('name', 'LIKE', $query . '%')
                ->limit(10)
                ->get();
            $output = '';
            if (count($data) > 0) {
                $output = '<ul class="list-group">';
                foreach ($data as $row) {
                    $output .= '<li class="list-group-item">' . $row->name . '</li>';
                }
                $output .= '</ul>';
            } else {
                $output .= '<li class="list-group-item">' . 'No results' . '</li>';
            }
            return $output;
        }
        $Users = User::where('name', 'LIKE', '%' . $query . '%')
            ->simplePaginate(10);

        return view('welcome', ['users'=>$Users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
        $users =user::findorfail($id);

        return view('users.edit',["users"=>$users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $users =user::findorfail($id);
        $users->name =$request->name;
        $users->email =$request->email;
        $users->admin =$request->admin;
        $users->save();
        return redirect()->route('show_user')->with('update','تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $users =user::findorfail($id)->delete();

        return redirect()->route('show_user')->with('delete','تم حذف المستخدم بنجاح');
    }
}
