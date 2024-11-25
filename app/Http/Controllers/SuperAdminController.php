<?php

namespace App\Http\Controllers;

use App\Models\Event;

use App\Models\Meeting;

use App\Models\CandidatePikrMember;

use App\Models\PikrMember;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class SuperAdminController extends Controller
{
    public function index()
    {
        return view('superadmin.index');
    }

    public function add_event()
    {
        $event =  Event::all();

        return view('superadmin.add_event',compact('event'));
    }

    public function store_event(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
        ]);
        Event::create($validated);

        toastr()->timeOut(5000)->closeButton()->addSuccess('Event added successfully.');

        return redirect()->back();
    }

    public function view_events()
    {
        $events = Event::all();

        return view('superadmin.view_event', compact('events'));
    }

    public function edit_event($id)
    {
        $data = Event::findOrFail($id);
        return view('superadmin.edit_event', compact('data'));
    }

    public function update_event(Request $request, $id)
    {
        $data = Event::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        $data->update($request->only(['title', 'description', 'date', 'location'
        ]));

        toastr()->timeOut(5000)->closeButton()->addSuccess('Event Updated Successfully');

        return redirect('/view_events');
    }

    public function delete_event($id)
    {
         $data = Event::find($id);

         $data->delete();

         toastr()->timeOut(5000)->closeButton()->addSuccess('Event Deleted Successsfully');

         return redirect()->back();
    }

    public function add_meeting()
    {
        $meetings = Meeting::all();

        return view('superadmin.add_meeting', compact('meetings'));
    }

    public function store_meeting(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        Meeting::create($validated);

        toastr()->timeOut(5000)->closeButton()->addSuccess('Meeting added successfully.');

        return redirect()->back();
    }

    public function view_meetings()
    {
        $meetings = Meeting::all();

        return view('superadmin.view_meeting', compact('meetings'));
    }


    public function edit_meeting($id)
    {
        $data = Meeting::findOrFail($id);
        return view('superadmin.edit_meeting', compact('data'));
    }

    public function update_meeting(Request $request, $id)
    {
        $data = Meeting::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $data->update($request->only([
            'title', 'description', 'date', 'location', 'start_time', 'end_time'
        ]));

        toastr()->timeOut(5000)->closeButton()->addSuccess('Meeting Updated Successfully');

        return redirect('/view_meetings');
    }

    public function delete_meeting($id)
    {
        $data = Meeting::findOrFail($id);

        $data->delete();

        toastr()->timeOut(5000)->closeButton()->addSuccess('Meeting Deleted Successfully');

        return redirect()->back();
    }

    public function viewCandidateMembers()
    {
        $candidates = CandidatePikrMember::all();
        return view('superadmin.candidate_member', compact('candidates'));
    }

    public function delete_candidate($id)
    {
         $data = CandidatePikrMember::find($id);

         $data->delete();

         toastr()->timeOut(5000)->closeButton()->addSuccess('Candidate Deleted Successsfully');

         return redirect()->back();
    }

    public function add_member(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:pikr_members,email',
            'phone' => 'required|string|max:15',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);
    
        PikrMember::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);
    
        toastr()->timeOut(5000)->closeButton()->addSuccess('Member Added Successsfully');

        return redirect()->back();
    
    }

    public function showAddMember()
    {
        return view('superadmin.add_member');
    }

    public function viewMembers()
    {
        $members = PikrMember::all();
        return view('superadmin.view_member', compact('members'));
    }

    public function edit_member($id)
    {
        $data = PikrMember::findOrFail($id);
        return view('superadmin.edit_member', compact('data'));
    }

    public function update_member(Request $request, $id)
    {
        $data = PikrMember::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:pikr_members,email,' . $id,
            'phone' => 'required|string|max:15',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);
    
        $data->update($request->only([
            'name', 'email', 'phone', 'jenis_kelamin'
        ]));

        toastr()->timeOut(5000)->closeButton()->addSuccess('Member Data Updated Successfully');

        return redirect('/view_members');
    }

    public function delete_member($id)
    {
        $data = PikrMember::findOrFail($id);

        $data->delete();

        toastr()->timeOut(5000)->closeButton()->addSuccess('Member Deleted Successfully');

        return redirect()->back();
    }

}

