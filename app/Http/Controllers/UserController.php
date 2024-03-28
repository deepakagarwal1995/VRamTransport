<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $keyword = request()->keyword;
        $rows = request()->rows ?? 25;

        if ($rows == 'all') {
            $rows = User::count();
        }

        // Get the table columns
        $allColumns = Schema::getColumnListing((new User())->getTable());


        $items = User::when(isset($keyword), function ($query) use ($keyword, $allColumns) {
            $query->where(function ($query) use ($keyword, $allColumns) {
                // Dynamically construct the search query
                foreach ($allColumns as $column) {
                    $query->orWhere(
                        $column,
                        'LIKE',
                        "%$keyword%"
                    );
                }
            });
        })
            ->latest()
            ->paginate($rows);

        // $payments = PartyPayment::all();
        $title = 'View User Details';
        return view('user.view', compact('items', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $title = 'Add User';

        return view('user.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'role' => 'required',
            'password' => 'required',
            'cpassword' => 'required'
        ]);
        if(request()->password == request()->cpassword){
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = $request->role;

            $user->save();

        return redirect()->route('user.index')->with('success', 'user has been successfully created.');
        }else{
            return redirect()->back()->with('error', 'password does not match');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show(User $User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $User = User::find($id);
        $title = 'Edit user Details';

        return view('user.edit', compact('User', 'title'));
    }
    public function view(Request $request, $id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $orderTransport = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' =>
            'required|unique:users,email,' . $id,
            'role' => 'required',
        ]);
        if (request()->password == request()->cpassword) {

          $orderTransport->name = $request->name;
          $orderTransport->email = $request->email;
          $orderTransport->role = $request->role;
            if (request()->password != '') {
                $orderTransport->password = Hash::make($request->password);
            }

          $orderTransport->save();



        return redirect()->route('user.index')->with('success', 'user Details has been successfully updated.');
        } else {
            return redirect()->back()->with('error', 'password does not match');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $orderDetail = User::find($id);
        $orderDetail->delete();
        return redirect()->route('user.index')->with('success', 'user has been successfully deleted.');
    }
}
