@extends('layouts.app')

@section('content')
<div class="background-home">
	<div class="container d-flex align-items-center justify-content-center">
		<h2 class="text-white fw-bold display-5 mt-2">It's time to start living the life we've imagined.</h2>
	</div>
</div>
<div class="container">
    <div class="text-center my-5">
      <h3>Latest Jobs Openings</h3>
      <p class="lead">Make a difference with your technical skills</p>
    </div>
    @foreach ($jobs as $job)
    <div class="card mb-3">
      <div class="card-body">
        <div class="d-flex flex-column flex-lg-row">
          <span class="avatar avatar-text rounded-3 me-4 mb-2" style="background:{{ get_bg_color() }}">{{ get_avatar_text($job->title) }}</span>
          <div class="row flex-fill">
            <div class="col-sm-5">
              <h4 class="h5">{{ $job->title }}</h4>
              <span class="badge bg-secondary">{{ $job->location }}</span> <span class="badge bg-success">Rs {{ $job->salary_range }}</span>
            </div>
            <div class="col-sm-4 py-2">
                @foreach ($job->tags as $tag)
                  <span class="badge bg-secondary">{{ strtoupper($tag) }}</span>
                @endforeach
            </div>
            <div class="col-sm-3 text-lg-end">
              <a href="#" class="btn btn-primary stretched-link">Apply</a>
			        <h5 class="text-danger mt-3 mb-0 small"><span class="text-muted">Expires at: </span>{{ date('d M, Y', strtotime($job->expires_at)) }}</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
@endsection
