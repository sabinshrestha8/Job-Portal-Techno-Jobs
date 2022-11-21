@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row my-5">
        <div class="col-md-8 col-sm-12 col-xs-12">
            <div class="rounded p-4 bg-white shadow-sm">
                <div class="mb-3">
                    <fieldset class="mb-3">
                        <h2 class="text-primary fw-bold">{{ strtoupper($job->title) }}</h2>
                    </fieldset>
                    <h6>
                        Date Posted:
                        <span class="text-sm text-danger">{{ date('d M, Y', strtotime($job->created_at)) }}
                        </span>
                    </h6>
                </div>
                <h4>Job Description</h4>
                <p>
                    LemonKids LLC. In marketing communications, we dream it and
                    create it. All of the company’s promotional and
                    communication needs are completed in-house by these
                    “creatives” in an advertising agency-based set-up. This
                    includes everything from advertising, promotions and print
                    production to media relations, exhibition coordination and
                    website maintenance. Everyone from artists, writers,
                    designers, media buyers, event coordinators, video
                    producers/editors and public relations specialists work
                    together to bring campaigns and product-centric promotions
                    to life.

                    {{ $job->description }}
                </p>
                <p>
                    If you’re a dreamer, gather up your portfolio and show us
                    your vision. Garmin is adding one more enthusiastic
                    individual to our in-house Communications expert team.
                </p>
                <h4>Qualification</h4>
                <p>
                    Minimum of 5 years creative experience in a graphic design
                    studio or advertising ad agency environment is required.
                    Qualified candidates for this role will possess the
                    following education, experience and skills:
                </p>
                <ul>
                    <li>
                        <i class="ti-check-box"></i>Demonstrated strong and
                        effective verbal, written, and interpersonal
                        communication skills
                    </li>
                    <li>
                        <i class="ti-check-box"></i>Must be team-oriented,
                        possess a positive attitude and work well with others
                    </li>
                    <li>
                        <i class="ti-check-box"></i>Ability to prioritize and
                        multi-task in a flexible, fast paced and challenging
                        environment
                    </li>
                </ul>
                <h4>Key responsibilities also include</h4>
                <ul>
                    <li>
                        <i class="ti-check-box"></i>Provide technical health
                        advice to Head of Country Programmes and field advisors
                        at all key stages of the project management cycle
                        including needs assessment.
                    </li>
                    <li>
                        <i class="ti-check-box"></i>Technical strategy and
                        design, implementation as well as sector specific
                        monitoring and evaluation.
                    </li>
                    <li>
                        <i class="ti-check-box"></i>This includes travel to
                        field programmes as well as review of proposals, key
                        reports and surveys prior to external submission.
                    </li>
                </ul>
                <h4>Requirements</h4>
                <ul>
                    <li>
                        <i class="ti-check-box"></i>Must have minimum of 3 years
                        experience running, maneuvering, driving, and navigating
                        equipment such as bulldozer, excavators, rollers, and
                        front-end loaders.
                    </li>
                    <li>
                        <i class="ti-check-box"></i>Must have minimum of 3 years
                        experience running, maneuvering, driving, and navigating
                        equipment such as bulldozer, excavators, rollers, and
                        front-end loaders. Strongly prefer candidates with High
                        School Diploma
                    </li>
                </ul>
                <h4>Benefits</h4>
                <ul>
                    <li>
                        <i class="ti-check-box"></i>Must have minimum of 3 years
                        experience running, maneuvering, driving, and navigating
                        equipment such as bulldozer, excavators, rollers, and
                        front-end loaders.
                    </li>
                    <li>
                        <i class="ti-check-box"></i>Strongly prefer candidates
                        with High School Diploma
                    </li>
                </ul>
                <div class="col-sm-4">
                    @if (auth()->user())
                    <a href="{{ route('jobs.apply', $job->id) }}" class="btn btn-primary mt-2 text-start" style="width:80%">
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
                        {{ 'Re-apply fro this Job Now' }}
                        @else
                        {{ 'Apply for this Job Now' }}
                        @endif
                    </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary mt-2 text-start" style="width:80%">Apply for this Job Now</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
            <aside class="sidebar rounded bg-white shadow-sm">
                <h2 class="pt-4 ps-4">Tags</h2>
                <div class="col-sm-10 py-2 px-4">
                  @foreach ($job->tags as $tag)
                    <span class="badge bg-secondary p-2 mb-2">{{ strtoupper($tag) }}</span>
                  @endforeach
                </div>
                    <div class="box p-4">
                        <h2 class="small-title">Job Details</h2>
                        <ul class="detail-list list-group">
                            <li class="d-flex justify-content-between">
                                <h5 class="text-muted py-2">Job Id</h5>
                                <span class="type-posts py-2">{{ $job->id }}</span> 
                                {{-- <span class="type-posts py-2">Jb1246789</span> --}}
                            </li>
                            <li class="d-flex justify-content-between">
                                <h5 class="text-muted py-2">Location</h5>
                                <span class="type-posts py-2">{{ $job->location }}</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <h5 class="text-muted py-2">Company</h5>
                                <span class="type-posts py-2">{{ $job->company }}</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <h5 class="text-muted py-2">Salary</h5>
                                <span class="type-posts py-2">Rs {{ $job->salary_range }}</span>
                            </li>
                            <li class="d-flex justify-content-between">
                               <h5 class="text-muted py-2">Employment Status</h5>
                                <span class="type-posts py-2">Permanent</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <h5 class="text-muted py-2">Employee Type</h5>
                                <span class="type-posts py-2">Manager</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <h5 class="text-muted py-2">Positions</h5>
                                <span class="type-posts py-2">5</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <h5 class="text-muted py-2">Career Level</h5>
                                <span class="type-posts py-2">Experience</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <h5 class="text-muted py-2">Experience</h5>
                                <span class="type-posts py-2">3 Years</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <h5 class="text-muted py-2">Gender</h5>
                                <span class="type-posts py-2">Male / Female</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <h5 class="text-muted py-2">Expires At</h5>
                                <span class="type-posts py-2">{{ date('d M, Y', strtotime($job->expires_at)) }}</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <h5 class="text-muted py-2">Degree</h5>
                                <span class="type-posts py-2">Masters</span>
                            </li>
                        </ul>
                    </div>
            </aside>
        </div>
    </div>
</div>
@endsection
