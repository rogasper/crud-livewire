<?php

namespace App\Http\Livewire\Customer;

use App\Models\Customer;
use Livewire\Component;

class Edit extends Component
{
    public $first_name;
    public $middle_name;
    public $last_name;
    public $email;
    public $address;
    public $phone_number;
    public $CustomerId;

    public function mount($reference)
    {
        $data = Customer::where('id', $reference)->get();
        // dd($data->first_name);
        $this->CustomerId = $data[0]->id;
        $this->first_name = trim($data[0]->first_name);
        $this->middle_name = trim($data[0]->middle_name);
        $this->last_name = trim($data[0]->last_name);
        $this->email = $data[0]->email;
        $this->address = $data[0]->address;
        $this->phone_number = $data[0]->phone;
    }
    public function submit(){
        $this->validate([
            'first_name' => 'required|alpha',
            'middle_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'email' => 'required|email:rfc,dns',
            'address' => 'required',
            'phone_number' => 'required|numeric'
        ]);

        try {
            $data = Customer::find($this->CustomerId);
            // $data->create([
            //     'first_name' => $this->first_name,
            //     'middle_name' => $this->middle_name,
            //     'last_name' => $this->last_name,
            //     'email' => $this->email,
            //     'address' => $this->address,
            //     'phone' => $this->phone_number
            // ]);
            $data->first_name = $this->first_name;
            $data->middle_name = $this->middle_name;
            $data->last_name = $this->last_name;
            $data->email = $this->email;
            $data->address = $this->address;
            $data->phone = $this->phone_number;
            $data->save();

            session()->flash('success', __("Success to create data!"));
            return redirect()->route('customer-index');
        } catch (\Throwable $th) {
            // $message = __("Failed to create data!");

            session()->flash('failed', $th);
            return redirect()->route('customer-index');
        }
    }
    public function render()
    {
        return view('livewire.customer.edit');
    }
}
