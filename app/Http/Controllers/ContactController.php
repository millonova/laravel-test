<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('contact', [
            'title' => 'Contact',
            'items' => $contacts
        ]);
    }
    public function create()
    {
        return view('home');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|min:5',
            'message' => 'required|min:5',
        ]);

        Contact::create([
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ]);

        return redirect()->route('contacts.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * edit
     *
     * @param  string $id
     * @return View
     */
    public function edit(string $id): View
    {
        // Get post by ID
        $contact = Contact::findOrFail($id);

        // Render view with post
        return view('contactcrud.edit', compact('contact'));
    }
    

    /**
     * update
     *
     * @param  Request $request
     * @param  string $id
     * @return RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        // Validate form
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'required|min:5',
            'message' => 'required|min:5',
        ]);

        // Get contact by ID
        $contact = Contact::findOrFail($id);

        // Update contact
        $contact->update([
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ]);

        // Redirect to index
        return redirect()->route('contacts.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        // Get post by ID
        $contact = Contact::findOrFail($id);

        // Delete post
        $contact->delete();

        // Redirect to index
        return redirect()->route('contacts.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}