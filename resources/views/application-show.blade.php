@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card">
        <div class="card-body">
            <div class="card-header bg-white d-flex justify-content-center">
                <fieldset class="d-flex justify-content-center">
                    <h2 class="fw-bold text-primary">View Job Applications</h2>
                </fieldset>
            </div>
        </div>
            <div class="container">
                <div class="col-md-12">
                    <table class="table table-striped no-top-border">
                        <thead>
                            <tr>
                                <th scope="col" style="width:5%">Id</th>
                                <th scope="col" style="width:5%">UserId</th>
                                <th scope="col" style="width:10%">Name</th>
                                <th scope="col" style="width:20%">Email</th>
                                <th scope="col" style="width:10%">Experience</th>
                                <th scope="col" style="width:20%">Message</th>
                                <th scope="col" style="width:15%">CV</th>
                                <th scope="col" style="width:10%">Remote</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($job->applications)
                                @foreach ($job->applications as $application)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $application['user_id'] }}</td>
                                        <td>{{ $application['name'] }}</td>
                                        <td>{{ $application['email'] }}</td>
                                        <td>{{ $application['experience'] }}</td>
                                        <td>{{ $application['message'] }}</td>
                                        <td>
                                            <a href="{{url(Storage::url($application['cv']))}}" class="btn btn-primary btn-sm" target="_blank">Open/Download</a>
                                        </td>
                                        <td>{{ $application['remote']}}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" class="text-center">
                                        <h5>No job applications yet.
                                    </h5></td>
                                </tr>
                            @endisset
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- @if ($job->applications->hasPages())
                <div class="d-flex justify-content-center">
                    {{ $job->applications->links() }}
                </div>
            @endif --}}
    </div>
</div>
@endsection
