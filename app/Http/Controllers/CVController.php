<?php

namespace App\Http\Controllers;

use App\Models\CV;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CVController extends Controller
{
    function index() : View {
        $cvs = CV::all();
        $array = ['cvs' => $cvs];
        return view ('cv.index', $array);
    }

    function create() {
        return view('cv.create');
    }

    public function store(Request $request): RedirectResponse {
        /*$request->validate([
            'name' => 'required|min:2|max:50|string',
            'surname' => 'required|min:2|max:70|string',
            'tel' => 'required|min:2|max:20|string',
            'email' => 'required|email|min:6|max:50|unique:cvs,email',
            'birthdate' => 'required|date',
            'avg_grade' => 'required|numeric',
            'experience' => 'required|min:40',
            'education' => 'required|min:40',
            'skills' => 'required|min:40',
            'image' => 'nullable|image',
        ]);*/

        $result = false;
        $cv = new CV($request->all());

        try {

            $result = $cv->save();
            $path = $this->upload($request, $cv->id);
            $cv->path = $path;
            $result = $cv->save();
            $message = 'The CV has been added!';
    

        } catch(UniqueConstraintViolationException $e) {
            $message = 'The email is already registerd.';
        } catch(QueryException $e) {
            $message = 'Any of the entries is null.';
        } catch(\Exception $e) {
            $message = 'Unexpected Error: Please contact the administrator';
        }

        $messageArray = [
            'general' => $message
        ];
        if($result) {
            return redirect()->route('main.index')->with($messageArray);
        } else {
            return back()->withInput()->withErrors($messageArray);
        }
    }

    private function upload(Request $request, $id) {
        $path = null;
        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $fileName = $id . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('images', $fileName, 'public');
        }
        return $path;
    }

    function show(CV $cv): View {
        $year = Carbon::now()->year;
        return view('cv.show', ['cv' => $cv, 'year' => $year]);
    }

    function edit(CV $cv): View {
        return view('cv.edit', ['cv' => $cv]);
    }

    function update(Request $request, CV $cv) {
        /*$validatedData = $request->validate([
            'name'       => 'required|min:4|max:50|string',
            'surname'    => 'required|min:4|max:70|string',
            'tel'        => 'required|min:6|max:20|string',
            'email'      => 'required|email|min:8|max:50|unique:cvs,email,' . $cv->id,
            'birthdate'  => 'required|date',
            'avg_grade'  => 'required|numeric',
            'experience' => 'required|min:40',
            'education'  => 'required|min:40',
            'skills'     => 'required|min:40',
            'image'      => 'nullable|image|max:1024',
        ]);*/
        $result = false;
        if ($request->deleteimage == 'delete') {
            Storage::disk('public')->delete('images/' . $cv->path);
            $cv->path = null;
        }

        try {

            $path = $this->upload($request, $cv->id);
            if ($path != null) {
                $cv->path = $path;
            }

            $result = $cv->update($request->all());
            $message = 'The new has been edited.';
        } catch (UniqueConstraintViolationException $e) {
            $message = 'The email is already registered.';
        } catch (QueryException $e) {
            $message = 'Any of the entries is null.';

        } catch (\Exception $e) {
            $message = 'Unexpected Error! Please contact the administrator.';
        }
        $messageArray = [
            'general' => $message
        ];

        if($result) {
            return redirect()->route('cv.edit', $cv->id)->with($messageArray);
        } else {
            return back()->withInput()->withErrors($messageArray);
        }
    }

    private function destroyImage($file) {
        Storage::delete($file);
    }

    function destroy(CV $cv) {
        try {
            $result = $cv->delete();
            $message = 'The CV has been deleted.';
        } catch(\Exception $e) {
            $result = false;
            $message = 'The CV has not been deleted.';
        }

        $messageArray = [
            'general' => $message
        ];
        if($result) {
            return redirect()->route('cv.index')->with($messageArray);
        } else {
            return back()->withInput()->withErrors($messageArray);
        }
    }
}
