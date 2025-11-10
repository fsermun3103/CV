@extends('template.base')

@section('content')
    <h1>EDIT THE CURRICULUM</h1>
    <form action="{{ route('cv.update', $cv->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row g-3">
            <div class="col">
                <label for="name" class="form-label">Name:</label>
                <input type="text" required id="name" name="name" minlength="4" maxlength="50" class="form-control" placeholder="First name" value="{{ old('name', $cv->name) }}">
            </div>
            <div class="col">
                <label for="surname" class="form-label">Last Name:</label>
                <input type="text" required id="surname" name="surname" minlength="8" maxlength="70" class="form-control" placeholder="Last name" value="{{ old('surname', $cv->surname) }}">
            </div>
            <div class="col">
                <label for="tel" class="form-label">Telephone:</label>
                <input type="text" required id="tel" name="tel" minlength="6" maxlength="20" class="form-control" placeholder="Telephone" value="{{ old('tel', $cv->tel) }}">
            </div>
        </div>
        <div class="row g-3">
            <div class="col">
                <label for="email" class="form-label">Email:</label>
                <input type="email" required id="email" name="email" minlength="8" maxlength="50" class="form-control" placeholder="Email" value="{{ old('email', $cv->email) }}">
            </div>
            <div class="col">
                <label for="birthdate" class="form-label">Birth Date:</label>
                <input type="date" required id="birthdate" name="birthdate" class="form-control" placeholder="Birthdate" value="{{ old('birthdate', $cv->birthdate) }}">
            </div>
            <div class="col">
                <label for="avg_grade" class="form-label">Average Grade:</label>
                <input type="number" step="0.01" required id="avg_grade" name="avg_grade" class="form-control" placeholder="Average grade" value="{{ old('avg_grade', $cv->avg_grade) }}">
            </div>
        </div>
        <div class="col">
            <label for="experience" class="form-label">Experience:</label>
            <textarea cols="60" rows="8" required id="experience" minlength="40" class="form-control" name="experience" placeholder="Insert your experience">{{old('experience', $cv->experience)}}</textarea>
        </div>
        <div class="col">
            <label for="education" class="form-label">Education:</label>
            <textarea cols="60" rows="8" required id="education" minlength="40" class="form-control" name="education" placeholder="Insert your formation">{{old('education', $cv->education)}}</textarea>
        </div>
        <div class="col">
            <label for="skills" class="form-label">Your Skills:</label>
            <textarea cols="60" rows="8" required id="skills" minlength="40" class="form-control" name="skills" placeholder="Insert your skills">{{old('skills', $cv->skills)}}</textarea>
        </div>

        <div class="col">
            <label for="image" class="form-label">Image:</label>
            <input class="form-control" id="image" type="file" name="image" accept="image/*">
        </div>
        <div class="form-check form-switch">
            <label for="deleteimage" class="form-check-label">Delete Image:</label>
            <input type="checkbox" class="form-check-input" id="deleteimage" name="deleteimage" value="delete">
            <img id="cv-image-preview" src="{{route('image.view', $cv->id)}}?r={{rand(1, 1000)}}" width="140px">
        
        <div class="upper-space" style="margin-top:20px">
            <button type="submit" class="btn btn-primary">Edit CV</button>
        </div>
    </form>

    @section('scripts')
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteImageCheckbox = document.getElementById('deleteimage');
            const imageInput = document.getElementById('image');
            const imagePreview = document.getElementById('cv-image-preview');

            deleteImageCheckbox.addEventListener('change', function(e) {
                if(this.checked) {
                    const confirmed = confirm("¿Are you sure you want to delete the image?");
                    if(!confirmed) {
                        this.checked = false;
                    } else {
                        imagePreview.src = "{{ asset('assets/img/noimage.jpg') }}";
                    }
                } else {
                    @if($cv->path)
                    imagePreview.src = "{{ route('image.view', $cv->id) }}";
                    @else
                    imagePreview.src = "{{ asset('assets/img/noimage.jpg') }}";
                    @endif
                }
            });

            imageInput.addEventListener('change', function() {
                if(this.files && this.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                    }
                    reader.readAsDataURL(this.files[0]);
                    deleteImageCheckbox.checked = false;
                }
            });
        });
        </script>
    @endsection
@endsection