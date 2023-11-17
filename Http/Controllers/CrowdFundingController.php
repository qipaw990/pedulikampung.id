<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CrowdFunding;

class CrowdFundingController extends Controller
{
    public function index()
    {
        $title = "Crowd Funding";
        $crowdFunding = CrowdFunding::all();
        return view('admin.crowd_funding.index', compact('crowdFunding', 'title'));
    }

    public function create()
    {
        $data["title"] = "Tambah Crowd Funding";
        return view('admin.crowd_funding.addCrowdFunding', $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'type' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif', // Adjust the validation rules as needed
            'goal_amount' => 'required|numeric',
            'type' => 'required',
            'current_amount' => 'numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imagePath = 'crowd_fundings/' . time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('crowd_fundings'), $imagePath);

            // Save the image path to the 'image' column in the database
            $validatedData['image'] = $imagePath;
        }


        CrowdFunding::create($validatedData);
        alert()->success('Berhasil', 'Data Crowd Funding Berhasil Di Tambah !');

        return redirect()->route('crowd_funding.index');
    }

    public function show($id)
    {
        $crowdFunding = CrowdFunding::find($id);
        return view('crowd_funding.show', compact('crowdFunding'));
    }

    public function edit($id)
    {
        $title = "Edit Crowd Funding";
        $crowdfunding = CrowdFunding::find($id);
        return view('admin.crowd_funding.editCrowdFunding', compact('crowdfunding', 'title'));
    }

public function update(Request $request, $id)
{
    // Validate the form data
$validatedData = $request->validate([
    'title' => 'required|string',
    'description' => 'required|string',
    'type' => 'required|string',
    'image' => 'image|mimes:jpeg,png,jpg,gif',
    'type' => 'required',
    'goal_amount' => 'required|numeric',
    'current_amount' => 'numeric',
    'start_date' => 'required|date',
    'end_date' => 'required|date',
    'status' => 'required',
]);


// Find the crowd funding record to update
$crowdFunding = CrowdFunding::find($id);

if (!$crowdFunding) {
    return redirect()->route('crowd_funding.index')->with('error', 'Crowd Funding not found.');
}

// Handle file upload and update the 'image' column if a new image is provided
if ($request->hasFile('image')) {
    $file = $request->file('image');
    $imagePath = 'crowd_fundings/' . time() . '_' . $file->getClientOriginalName();
    $file->move(public_path('crowd_fundings'), $imagePath);

    // Delete the old image file if it exists
    if (!empty($crowdFunding->image)) {
        $oldImagePath = public_path($crowdFunding->image);
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }
    }

    // Update the 'image' column with the new image path
    $validatedData["image"] = $imagePath;
} else {
    // If no new image is uploaded, remove 'image' from the validated data
    unset($validatedData["image"]);
}

// Update the crowd funding record with the validated data
$crowdFunding->update($validatedData);
alert()->success('Berhasil', 'Data Crowd Funding Berhasil Di Update!');

return redirect()->route('crowd_funding.index')->with('success', 'Crowd Funding updated successfully.');

}



    public function destroy($id)
    {
        $crowdFunding = CrowdFunding::find($id);
        if (!$crowdFunding) {
            return redirect()->route('crowd_funding.index')->with('error', 'Crowd Funding not found.');
        }

        if (!empty($crowdFunding->image)) {
            $imagePath = public_path($crowdFunding->image);

            if (file_exists($imagePath)) {
                unlink($imagePath); // Delete the image file from the server
            }
        }

        $crowdFunding->delete();
        alert()->success('Berhasil', 'Data Crowd Funding Berhasil Di Hapus !');

        return redirect()->route('crowd_funding.index')->with('success', 'Crowd Funding deleted successfully.');
    }
}
