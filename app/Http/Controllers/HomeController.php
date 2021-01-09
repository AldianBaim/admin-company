<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Company;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //get data companies table
        $companies = Company::paginate(5);

        return view('home', compact('companies'));
    }

    public function create()
    {
        return view('company.add');
    }

    public function store(Request $request)
    {
        $company = new Company;
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'website' => 'required',
            'email' => 'required',
            'logo' => 'max:2000'
        ]);

        $file = $request->file('logo');
        $path = 'image';
        $logo = $file->move($path, $file->getClientOriginalName());

        $company->name = $request->name;
        $company->address = $request->address;
        $company->website = $request->website;
        $company->email = $request->email;
        $company->logo = $logo;
        $company->save();

        return redirect('/home')->with('message', 'New company has been added!');
    }

    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    public function update(Company $company, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'website' => 'required',
            'email' => 'required',
            'logo' => 'max:2000'
        ]);

        if ($request->file('logo')) {
            $file = $request->file('logo');
            $path = 'image';
            $logo = $file->move($path, $file->getClientOriginalName());
        } else {
            $logo = $company->logo;
        }

        $company->name = $request->name;
        $company->address = $request->address;
        $company->website = $request->website;
        $company->email = $request->email;
        $company->logo = $logo;
        $company->save();

        return redirect('/home')->with('message', 'Company has been updated!');
    }

    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();
        return back()->with('message', 'Company has been deleted!');
    }
}
