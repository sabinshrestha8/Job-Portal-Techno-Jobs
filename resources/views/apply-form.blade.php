@extends('layouts.app')

@section('content')
<div class="container py-5">
  <div class="row mx-0 justify-content-center">
    <div class="col-md-7 col-lg-5 px-lg-2 col-md-4 px-xl-0 px-xxl-3">
      <form method="POST" class="w-100 rounded-1 p-4 border bg-white"
        action="{{ url('/jobs/apply') }}" enctype="multipart/form-data">
        <input type="hidden" value="{{ old('job_id') ?? request()->id }}" name="job_id">
        @csrf
        <label class="d-block mb-4">
          <span class="form-label d-block">Name</span>
          <input
            name="name"
            type="text"
            class="form-control"
            placeholder="Joe Bloggs"
            value="{{ old('name') }}"
          />
          @if($errors->any())
            <div class="text-danger">
              {{$errors->first('name')}}
            </div>
          @endif
        </label>

        <label class="d-block mb-4">
          <span class="form-label d-block">Email address</span>
          <input
            name="email"
            type="email"
            class="form-control"
            placeholder="joe.bloggs@example.com"
            value="{{ old('email') }}"
          />
          @if($errors->any())
            <div class="text-danger">
              {{$errors->first('email')}}
            </div>
          @endif
        </label>

        <label class="d-block mb-4">
          <span class="form-label d-block">Years of experience</span>
          <select name="experience" class="form-select" value="{{ old('experience') }}">
            <option value="" {{!old('experience') ? 'selected' : ''}} disabled>Select your experience</option>
            @foreach ($experiences as $experience)
              <option value="{{ $experience }}" {{old('experience') == $experience ? 'selected' : ''}}>
                {{ $experience }}
              </option>
            @endforeach
          </select>
          @if($errors->any())
            <div class="text-danger">
              {{$errors->first('experience')}}
            </div>
          @endif
        </label>

        <label class="d-block mb-4">
          <span class="form-label d-block">Tell us more about yourself</span>
          <textarea
            name="message"
            class="form-control"
            rows="3"
            placeholder="What motivates you?"
          >{{ old('message') }}</textarea>
          @if($errors->any())
            <div class="text-danger">
              {{$errors->first('message')}}
            </div>
          @endif
        </label>

        <label class="d-block mb-4">
          <span class="form-label d-block">Your CV / Resume</span>
          <input name="cv" type="file" accept="application/pdf" class="form-control" />
          @if($errors->any())
            <div class="text-danger">
              {{$errors->first('cv')}}
            </div>
          @endif
        </label>

        <div class="mb-4">
          <div>
            <div class="form-check">
              <label class="d-block">
                <input
                  type="radio"
                  class="form-check-input"
                  name="remote"
                  value="yes"
                  {{ old('remote') == 'yes' ? 'checked' : ''}}
                />
                <span class="form-check-label">
                  You'd like to work remotely
                </span>
              </label>
            </div>
          </div>
          <div>
            <label class="form-check">
              <input
                type="radio"
                class="form-check-input"
                name="remote"
                value="no"
                {{ old('remote') == 'no' ? 'checked' : ''}}
              />
              <span class="form-check-label">You'd prefer to work onsite</span>
            </label>
          </div>
          @if($errors->any())
            <div class="text-danger">
              {{$errors->first('remote')}}
            </div>
          @endif
        </div>

        <div class="mb-3 d-flex flex-row-reverse">
          <button type="submit" class="btn btn-primary px-3 rounded-3">
            Apply
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
