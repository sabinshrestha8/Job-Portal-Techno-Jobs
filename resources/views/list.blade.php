@extends('layouts.app')

@section('content')
<div class="background-home">
	<div class="container d-flex align-items-center justify-content-center">
		<h2 class="text-white fw-bold display-5 mt-2 user-select-none">It's time to start living the life we've imagined.</h2>
	</div>
</div>
<div class="container my-5">
    <div class="text-center">
      <h3>Latest Jobs Openings</h3>
      <p class="lead">Create change with your technical expertise</p>
    </div>

    <div class="my-4">
      <form action="{{ route('jobs.search') }}" class="d-flex justify-content-center">
        <div class="d-flex form-outline search-container w-50">
          <input type="text" class="form-control search text-muted fw-bold" name="name" value="{{ request()->name }}" placeholder="Search">
          <button type="submit" class="btn btn-primary btn-search"><i class="fas fa-search"></i></button>
        </div>
      </form>
    </div>

    @foreach ($jobs as $job)
      <div class="card mb-3">
        <div class="card-body">
          <div class="d-flex flex-column flex-lg-row">
            <span class="avatar avatar-text rounded-3 me-4 mb-2" style="background:{{ get_bg_color() }}">{{ get_avatar_text($job->title) }}</span>
            <div class="row flex-fill">
              <div class="col-sm-5">
                <h4 class="h5 text-muted"><i class="fas fa-briefcase"></i> <a href="{{ url('/jobs') . '/' . $job->id}}" class="text-decoration-none link-secondary fw-bold">{{ $job->title }}</a></h4>
                <span class="badge bg-secondary"><i class="fas fa-location"></i> {{ $job->location }}</span> <span class="badge bg-success"><i class="fas fa-rupee-sign"></i> Rs {{ $job->salary_range }}</span>
              </div>
              <div class="col-sm-4 py-2">
                  @foreach ($job->tags as $tag)
                    <span class="badge bg-secondary"><i class="fas fa-tag"></i> {{ strtoupper($tag) }}</span>
                  @endforeach
              </div>
              <div class="col-sm-3 text-lg-end">
                @if (auth()->user())
                  @if(strtotime($job->expires_at) >= time())
                    <a href="{{ route('jobs.apply', $job->id) }}" class="btn btn-primary" style="width:50%">
                    @php
                    $applicationUserIds = [];
                    @endphp

                    @isset($job->applications)
                        @foreach ($job->applications as $application)
                          @php
                            array_push($applicationUserIds, $application['user_id']);
                          @endphp
                        @endforeach
                    @endisset

                    @if(in_array(auth()->user()->id, $applicationUserIds))
                      {{ 'Re-apply' }}
                    @else
                      {{ 'Apply' }}
                    @endif
                  </a>
                  @else
                  @endif
                @else
                  @if(strtotime($job->expires_at) >= time())
                    <a href="{{ route('login') }}" class="btn btn-primary" style="width:50%">Apply</a>
                  @else
                  @endif
                @endif
                <h5 class="text-danger mt-3 mb-0 small">
                    @if(strtotime($job->expires_at) >= time())
                        <span class="text-muted">Expires at: </span>
                        {{ date('d M, Y', strtotime($job->expires_at)) }}
                    @else
                       {{ "Expired" }}
                    @endif
                </h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
@endsection
