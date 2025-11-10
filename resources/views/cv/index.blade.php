@extends('template.base')

@section('content')

<div class="modal" id="deleteModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you do sure you want to delete de CV <span id="modal-cv-name">XXX</span>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button form="form-delete" type="submit" class="btn btn-danger">Delete CV</button>
      </div>
    </div>
  </div>
</div>

<table class="table table-hover">

    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Last Name</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($cvs as $cv)
        <tr>
            <td>{{ $cv->id }}</td>
            <td>{{ $cv->name }}</td>
            <td>{{ $cv->surname }}</td>
            <td>
                <a href="{{ route('cv.show', $cv->id) }}" class="btn btn-success">View</a>
                <a href="{{ route('cv.edit', $cv->id) }}" class="btn btn-warning">Edit</a>
                <a
                  href="#"
                  data-bs-toggle="modal"
                  data-bs-target="#deleteModal"
                  data-name="{{ $cv->name }}"
                  data-href="{{ route('cv.destroy', $cv->id) }}"
                  class="btn btn-danger btn-delete">
                  Delete
                </a>

                
            </td>
        </tr>
        @endforeach
    </tbody>

    <tfoot>
        <tr>
            <th colspan="3">Number of CVs:</th>
            <th>{{ count($cvs) }}</th>
        </tr>
    </tfoot>
</table>

<form id="form-delete" action="" method="post">
    @csrf
    @method('delete')
</form>

<hr>

@endsection