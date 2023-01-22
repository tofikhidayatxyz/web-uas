<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index() {
        $courses = Course::paginate(20);

        return view('dashboard.course.index')->with('courses', $courses);
    }

    public function create() {
        return view('dashboard.course.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'like' => 'required',
            'video' => 'required',
            'thumbnail' => 'required|file',
            'description' => 'required'
        ]);
        
        $file= $request->file('thumbnail');
        $fileName = $file->hashName();
        $file->storeAs('/public/courses', $fileName);
        $fileDir = "/courses/{$fileName}";

        Course::create(array_merge(
            $request->all(), 
            [
                'thumbnail' => $fileDir
            ]
        ));
        return redirect()->route('dashboard.course.index')->withSuccess('Source created');
    }

    public function edit($id) {
        $course = Course::findOrFail($id);
        return view('dashboard.course.edit')->with('course', $course);
    }

    public function update($id, Request $request) {
        $course = Course::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'like' => 'required',
            'video' => 'required',
            'description' => 'required'
        ]);

        $thumbnail = $course->thumbnail;
        
        if($request->hasFile('thumbnail')) {
            $file= $request->file('thumbnail');
            $fileName = $file->hashName();
            $file->storeAs('/public/courses', $fileName);
            $thumbnail = "/courses/{$fileName}";
        }

        $course->update(array_merge(
            $request->all(), 
            [
                'thumbnail' => $thumbnail
            ]
        ));
        return redirect()->route('dashboard.course.index')->withSuccess('Source updated');
    }

    public function destroy($id) {
        Course::findOrFail($id)->delete();
        return redirect()->route('dashboard.course.index')->withSuccess('Source deleted');
    }
}
