@extends('admin.layouts.app')

@section('title')
    Create Lesson
@endsection

@section('css')
    
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create Lesson</h1>
</div>

<form action="{{ url('admin/lessons/post') }}" method="POST" class="needs-validation" novalidate>
    @csrf
    <div class="row">

        <!-- Alert -->
        @if(session('success'))
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Successful!</strong> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @endif

        <div class="col-md-12">
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title" placeholder="Enter Title" required>
            </div>
        </div>

        <!-- Setting -->
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header bg-dark text-light">
                    Settings
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Select a Course</label>
                                <select class="form-control" name="course" required>
                                    <option value="">-- Choose Course --</option>
                                    @foreach($courses as $course)
                                        <option value="{{ $course->course_id }}">{{ $course->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Link Video</label>
                                <input type="text" class="form-control" placeholder="Link Video" name="link" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Duration (Minutes)</label>
                                <input type="text" class="form-control" placeholder="Duration" name="duration" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-4">
            <button type="submit" class="btn btn-dark">Create Lesson <span data-feather="arrow-right"></span></button>
        </div>
    </div>
</form>
@endsection

@section('js')
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
</script>
@endsection