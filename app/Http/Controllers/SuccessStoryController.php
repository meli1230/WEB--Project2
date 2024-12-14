<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuccessStory;

class SuccessStoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'story' => 'required',
            'member_id' => 'required|exists:member,id',
        ]);
        SuccessStory::create([$request->all()]);
        return redirect()->route('successStories.index')->with('success', 'Story added successfully!');
    }

    public function index()
    {
        $successStories = SuccessStory::paginate(10);
        return view('successStories.index', compact('successStories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'story' => 'required,',
            'member_id' => 'required|exists:member,id'
        ]);
        $successStory = SuccessStory::findOrFail($id);
        $successStory->update($request->all());
        return redirect()->route('successStories.index')->with('success', 'Story updated successfully!');
    }

    public function destroy($id)
    {
        $successStory = SuccessStory::findOrFail($id);
        $successStory->delete();
        return redirect()->route('successStories.index')->with('success', 'Story deleted successfully!');
    }
}
