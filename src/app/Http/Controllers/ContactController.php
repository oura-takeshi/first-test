<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(Request $request)
    {
        $contact = $request->only(['first-name', 'last-name', 'gender', 'email', 'first-tel', 'second-tel', 'third-tel', 'address', 'building', 'content', 'detail']);
        $contact['name'] = $contact['first-name'] . '　' . $contact['last-name'];
        $contact['tel'] = $contact['first-tel'] . $contact['second-tel'] . $contact['third-tel'];
        return view('confirm', compact('contact'));
    }

    public function store(Request $request)
    {
        $contact = $request->only(['first-name', 'last-name', 'gender', 'email', 'first-tel', 'second-tel', 'third-tel', 'address', 'building', 'content', 'detail', 'name', 'tel']);
        Contact::create($contact);
        return view('thanks');
    }
}
