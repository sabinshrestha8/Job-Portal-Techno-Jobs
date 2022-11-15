@extends('layouts.app')

@section('content')
<div class="container py-5">
  <div class="row mx-0 justify-content-center">
    <div class="col-md-7 col-lg-5 px-lg-2 col-md-4 px-xl-0 px-xxl-3">
      <form method="post" class="w-100 rounded-1 p-4 border bg-white"
        action="#" enctype="multipart/form-data">
        <label class="d-block mb-4">
          <span class="form-label d-block">Name</span>
          <input
            required
            name="name"
            type="text"
            class="form-control"
            placeholder="Joe Bloggs"
          />
        </label>

        <label class="d-block mb-4">
          <span class="form-label d-block">Email address</span>
          <input
            required
            name="email"
            type="email"
            class="form-control"
            placeholder="joe.bloggs@example.com"
          />
        </label>

        <label class="d-block mb-4">
          <span class="form-label d-block">Years of experience</span>
          <select required name="experience" class="form-select">
            <option>Less than a year</option>
            <option>1 - 2 years</option>
            <option>2 - 4 years</option>
            <option>4 - 7 years</option>
            <option>7 - 10 years</option>
            <option>10+ years</option>
          </select>
        </label>

        <label class="d-block mb-4">
          <span class="form-label d-block">Tell us more about yourself</span>
          <textarea
            name="message"
            class="form-control"
            rows="3"
            placeholder="What motivates you?"
          ></textarea>
        </label>

        <label class="d-block mb-4">
          <span class="form-label d-block">Your CV / Resume</span>
          <input required name="cv" type="file" class="form-control" />
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
                  checked
                />
                <span class="form-check-label"
                  >You'd like to work remotely</span
                >
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
              />
              <span class="form-check-label">You'd prefer to work onsite</span>
            </label>
          </div>
        </div>

        <div class="mb-3">
          <button type="submit" class="btn btn-primary px-3 rounded-3">
            Apply
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
