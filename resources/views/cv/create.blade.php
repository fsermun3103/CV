@extends('template.base')

@section('content')
    <h1>ADD A NEW CURRICULUM</h1>
    <form action="{{ route('cv.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row g-3">
            <div class="col">
                <label for="name" class="form-label">Name:</label>
                <input type="text" required id="name" name="name" minlength="2" maxlength="50" class="form-control" placeholder="First name" value="{{ old('name') }}">
            </div>
            <div class="col">
                <label for="surname" class="form-label">Last Name:</label>
                <input type="text" required id="surname" name="surname" minlength="2" maxlength="70" class="form-control" placeholder="Last name" value="{{ old('surname') }}">
            </div>
            <div class="col">
                <label for="tel" class="form-label">Telephone:</label>
                <input type="text" required id="tel" name="tel" minlength="2" maxlength="20" class="form-control" placeholder="Telephone" value="{{ old('tel') }}">
            </div>
        </div>
        <div class="row g-3">
            <div class="col">
                <label for="email" class="form-label">Email:</label>
                <input type="email" required id="email" name="email" minlength="6" maxlength="50" class="form-control" placeholder="Email" value="{{ old('email') }}">
            </div>
            <div class="col">
                <label for="birthdate" class="form-label">Birth Date:</label>
                <input type="date" required id="birthdate" name="birthdate" class="form-control" placeholder="Birthdate" value="{{ old('birthdate') }}">
            </div>
            <div class="col">
                <label for="avg_grade" class="form-label">Average Grade:</label>
                <input type="number" step="0.01" required id="avg_grade" name="avg_grade" class="form-control" placeholder="Average grade" value="{{ old('avg_grade') }}">
            </div>
        </div>
        <div class="col">
            <label for="experience" class="form-label">Experience:</label>
            <textarea cols="60" rows="8" required id="experience" minlength="40" class="form-control" name="experience" placeholder="Insert your experience">{{old('experience')}}</textarea>
        </div>
        <div class="col">
            <label for="education" class="form-label">Education:</label>
            <textarea cols="60" rows="8" required id="education" minlength="40" class="form-control" name="education" placeholder="Insert your formation">{{old('education')}}</textarea>
        </div>
        <div class="col">
            <label for="skills" class="form-label">Your Skills:</label>
            <textarea cols="60" rows="8" required id="skills" minlength="40" class="form-control" name="skills" placeholder="Insert your skills">{{old('skills')}}</textarea>
        </div>

        <div class="col">
            <label for="image" class="form-label">Image:</label>
            <input class="form-control" id="image" type="file" name="image" accept="image/*">
        </div>
        
        <div class="upper-space" style="margin-top:20px">
            <button type="submit" class="btn btn-primary">Create CV</button>
        </div>
    </form>
@endsection