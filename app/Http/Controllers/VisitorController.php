<?php

namespace App\Http\Controllers;
use App\Models\Visitor;
use Illuminate\Http\Request;
use App\Mail\VisitorReplyMail;
use Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;


class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $visitorsArr = Visitor::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
        })->latest()->get();

        return view('admin.index', compact('visitorsArr'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            'title' => 'required|min:2|max:2',
            'name' => 'required|min:2|max:30',
            'email' => 'required|email',
            'desc' => 'required|min:2|max:250',
            'app_date' => 'required',
            'app_timefrom' => 'required',
            'app_timeTo' => 'required',
            'topic' => 'required'
        ]);

        Visitor::create($validated); // assuming fillable is set

        return view('formsubmitted', [
            "fullname" => $validated["title"] . "." . $validated["name"],
            "email" => $validated["email"]
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Visitor $visitor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visitor $admin)
    {
        return view('admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visitor $admin)
    {
        $request->validate([
            'title' => 'required|min:2|max:5',
            'name' => 'required|min:2|max:50',
            'email' => 'required|email',
            'desc' => 'required|min:5|max:255',
        ]);

        $admin->update([
            'title' => $request->input('title'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'desc' => $request->input('desc'),
        ]);

        return redirect()->route('admin.index')->with('success', 'Visitor updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(Visitor $visitor)
    {
        try{
            $deleted = $visitor->delete();

            if($deleted){
                return redirect()->route('admin.index')->with('success', 'Visitor deleted successfully.');
            }else{
                return redirect()->route('admin.index')->with('error', 'Failed to deleted the record but not exception.');
            }
           
        }catch(\Exception $e){
            Log::error("Failed to delete record {$visitor->id}. Error: " . $e->getMessage());
            return redirect()->route('admin.index')->with('error', 'Failed to deleted successfully.');
        }        
        
    }

    public function sendEmail(Visitor $visitor)
    {
        try {
            Mail::to($visitor->email)->send(new VisitorReplyMail($visitor));

            return redirect()->route('admin.index')->with('success', 'Email sent to ' . $visitor->email);
        } catch (\Exception $e) {
            Log::error("Email failed to send to {$visitor->email}. Error: " . $e->getMessage());

            return redirect()->route('admin.index')->with('error', 'Failed to send email to ' . $visitor->email);
        }
    }
}
