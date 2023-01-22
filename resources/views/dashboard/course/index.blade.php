@extends('layouts.dashboard')

@section('content')
  <div class="w-100 d-flex align-items-center">
    <h3>Courses</h3>
    <a href="{{ route('dashboard.course.create') }}" class="btn btn-primary btn-sm ms-auto">Add Course + </a>
  </div>
  <div class="w-100">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Thumbnail</th>
            <th>Name</th>
            <th>Youtube Url</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($courses  as $course )
            <tr>
              <td>
                <img src="{{ $course->thumbnail }}" style="object-fit: cover" height="80px" width="80px" alt="">
              </td>
              <td>
                {{ $course->title }}
              </td>
              <td>
                {{ $course->video }}
              </td>
              <td>
                <div class="d-flex">
                  <a href="{{ route('dashboard.course.edit', $course->id) }}" class=" btn btn-info btn-sm">Edit</a>
                  <form action="{{ route('dashboard.course.destroy', $course->id) }}" class="ms-2" method="POST" onsubmit="return confirm('Are you sure to delete the course?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
                 
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="mt-3">
        {{ $courses->links() }}
      </div>
  </div>
@endsection