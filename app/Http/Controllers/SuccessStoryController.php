<?php

namespace App\Http\Controllers;

use App\Models\SuccessStory;
use App\Models\Member; // Import Member model
use Illuminate\Http\Request;

class SuccessStoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'story' => 'required',
            'member_name' => 'required|exists:members,name', // Validate member name exists
        ]);

        // Find the member's ID using the provided name
        $member = Member::where('name', $request->member_name)->first();

        // Store the success story
        SuccessStory::create([
            'title' => $request->title,
            'story' => $request->story,
            'member_id' => $member->id,
        ]);

        return redirect()->route('successStories.index')->with('success', 'Story added successfully!');
    }

    public function create()
    {
        // Fetch all member names for the dropdown
        $members = Member::pluck('name');
        return view('successStories.create', compact('members'));
    }

    public function index()
    {
        // Fetch all success stories with related member info
        $successStories = SuccessStory::with('member')->paginate(10);
        return view('successStories.index', compact('successStories'));
    }

    public function edit($id)
    {
        $successStory = SuccessStory::findOrFail($id);
        $members = Member::pluck('name');
        return view('successStories.edit', compact('successStory', 'members'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'story' => 'required',
            'member_name' => 'required|exists:members,name',
        ]);

        $member = Member::where('name', $request->member_name)->first();

        $successStory = SuccessStory::findOrFail($id);
        $successStory->update([
            'title' => $request->title,
            'story' => $request->story,
            'member_id' => $member->id,
        ]);

        return redirect()->route('successStories.index')->with('success', 'Story updated successfully!');
    }
}
