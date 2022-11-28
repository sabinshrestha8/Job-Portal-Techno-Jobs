@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card">
        <div class="card-body">
            <div class="card-header bg-white d-flex justify-content-between">
                <fieldset>
                    <h2 class="fw-bold text-primary">View All Posted Jobs</h2>
                </fieldset>
                <div>
                    <a href="{{ url('admin/jobs/create') }}" class="btn btn-success"><i class="far fa-plus"></i> Post a Job</a>
                </div>
            </div>
        </div>
            <div class="container">
                @if(session()->has('msg'))
                    <div class="col-md-4 my-0">
                        <div class="alert alert-success alert-dismissible fade show" >
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <h5><Strong><i class="far fa-check-circle"></i></Strong> {{ session()->get('msg') }}</h5>
                        </div>
                    </div>
                @endif

                @if(session()->has('errorMsg'))
                    <div class="col-md-4 my-0">
                        <div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <h5><Strong><i class="far fa-times-circle"></i></Strong> {{ session()->get('errorMsg') }}<h5>
                        </div>
                    </div>
                @endif
                <div class="col-md-12">
                    <table class="table table-striped no-top-border">
                        <thead>
                            <tr>
                                <th scope="col" style="width:10%">Id</th>
                                <th scope="col" style="width:25%">Title</th>
                                <th scope="col" style="width:30%">Company</th>
                                <th scope="col" style="width:15%">Expires At</th>
                                <th scope="col" style="width:25%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($jobs)
                                @foreach($jobs as $job)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $job->title }}</td>
                                        <td>{{ $job->company }}</td>
                                        <td>{{ $job->expires_at }}</td>
                                        <td>
                                            <a href="{{ route('jobs.show',$job->id) }}" class="btn btn-secondary text-white btn-sm"><i class="far fa-eye"></i></a>
                                            <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>
                                            <form action="{{ route('jobs.destroy', $job->id) }}" method="post" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')"><i class="far fa-trash"></i></button>
                                            </form>
                                            <a href="{{ route('admin.application-view', $job->id) }}" class="btn btn-info text-white btn-sm"><i class="far fa-tasks"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">
                                        <h5>Jobs not added yet.
                                    </h5></td>
                                </tr>
                            @endisset
                        </tbody>
                    </table>
                </div>
            </div>
            @if ($jobs->hasPages())
                <div class="d-flex justify-content-center">
                    {{ $jobs->links() }}
                </div>
            @endif
    </div>
</div>
@endsection
