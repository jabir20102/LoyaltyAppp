<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Customer::latest()->get();


            return DataTables::of($data)
            ->addColumn('total_points', function ($sample) {
                return ''; // Initial empty value for total points
            })
            ->addColumn('used_points', function ($sample) {
                return ''; // Initial empty value for used points
            })
            ->addColumn('remaining_points', function ($sample) {
                return ''; // Initial empty value for remaining points
            })
            
                ->addColumn('actions', function ($sample) {
                    $editUrl = route('customers.edit', $sample->id);
                    $deleteUrl = route('customers.destroy', $sample->id);

                    $editButton = '<a href="' . $editUrl . '" class="btn btn-primary btn-sm">Edit</a>';
                    $deleteButton = '<form action="' . $deleteUrl . '" method="POST" style="display: inline-block;">' .
                        csrf_field() .
                        method_field('DELETE') .
                        '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')">Delete</button>' .
                        '</form>';

                    return $editButton . '  ' . $deleteButton;
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('customers.index');
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'surname' => 'required',
            'tel' => 'required',
            'address' => 'required',
            'birthdate' => 'required',
        ];

        $messages = [
            'name.required' => 'The name field is required.',
            'surname.required' => 'The surname field is required.',
            'tel.required' => 'The tel field is required.',
            'address.required' => 'The address field is required.',
            'birthdate.required' => 'The birthdate field is required.',
        ];

        $this->validate($request, $rules, $messages);

        Customer::create($request->all());

        return redirect()->route('customers.index')
            ->with('success', 'Customer added successfully.');
    }

    public function edit($customer_id)
    {
        $customer = Customer::find($customer_id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'tel' => 'required|numeric',
            'address' => 'required',
            'birthdate' => 'required|date',
        ]);


        $customer->update($request->all());


        return redirect()->route('customers.index')
            ->with('success', 'Customer updated successfully.');
    }

    public function destroy($customer_id)
    {
        return $customer_id;
        // $customer->delete();

        // return redirect()->route('customers.index')
        //     ->with('success', 'Customer deleted successfully.');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $customers = Customer::where('name', 'like', '%' . $search . '%')
            ->orWhere('surname', 'like', '%' . $search . '%')
            ->orWhere('tel', 'like', '%' . $search . '%')
            ->orWhere('address', 'like', '%' . $search . '%')
            ->orWhere('birthdate', 'like', '%' . $search . '%')
            ->get();

        return view('customers.index', compact('customers'));
    }
}
