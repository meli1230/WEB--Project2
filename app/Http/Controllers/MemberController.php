<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:members',
            'profession' => 'required',
            'linkedin_url' => 'nullable|url'
        ]);
        Member::create([$request->all()]);
        return redirect()->route('members.index')->with('success', 'Member added successfully!');
    }

    public function index()
    {
        $members = Member::paginate(10);
        return view('members.index', compact('members'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:members,email,' . $id,
            'profession' => 'required', 'linkedin_url' => 'nullable|url'
        ]);
        $member = Member::findOrFail($id);
        $member->update($request->all());
        return redirect()->route('members.index')->with('success', 'Member updated successfully!');
    }

    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member deleted successfully!');
    }
}
