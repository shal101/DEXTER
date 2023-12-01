<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\StoreContactRequest;
use App\Http\Requests\Contact\UpdateContactRequest;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('contact.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        // store date
        $data = $request->validated();

        $contact = new Contact;
        $contact->first_name    = $data['first_name'];
        $contact->middle_name   = $data['middle_name'];
        $contact->last_name     = $data['last_name'];
        $contact->email_address = $data['email_address'];
        $contact->save();

        return redirect()->route('contacts.index')->with('status', 'Contact has been added successfully.');

    }

    /**
     * Display the spe                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          cified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //$contact = Contact::findOrFail($id);
        return view('contact.edit',compact('contact'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        
        $data = $request->validated();

        
        $contact->first_name    = $data['first_name'];
        $contact->middle_name   = $data['middle_name'];
        $contact->last_name     = $data['last_name'];
        $contact->email_address = $data['email_address'];
        $contact->save();

        return redirect()->route('contacts.index')->with('status', 'Contact has been successfully updated.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact): RedirectResponse
    	{
		// delete User
		$contact->delete();
        return redirect()->route('contacts.index')->with('status', 'Contact has been successfully deleted.');
        //
    }
}
