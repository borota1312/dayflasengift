<?php



namespace App\Http\Controllers\Auth;

use App\Helpers\RoleHelper;
use App\Http\Controllers\Controller;

use App\Providers\RouteServiceProvider;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;



class LoginController extends Controller

{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()

    {
        $this->middleware('guest')->except('logout');
    }



    public function login(Request $request)

    {

        $input = $request->all();

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('username' => $input['username'], 'password' => $input['password']))) {

            if (auth()->user()->type == RoleHelper::AdminText) {
                return redirect()->route('ad_user');
            }
        } else {
            return redirect()->route('login')

                ->with('error', 'Username And Password Are Wrong.');
        }
    }
}
