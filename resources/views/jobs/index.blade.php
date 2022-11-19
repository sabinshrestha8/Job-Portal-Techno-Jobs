@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center mt-3">
            <h1>view All Jobs List</h1>
        </div>
        @if(session()->has('msg'))
            <div class="col-md-4 my-0">
                <div class="alert alert-success alert-dismissible fade show" style="width:70%">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    {{ session()->get('msg') }}
                </div>
            </div>
        @endif

        @if(session()->has('errorMsg'))
            <div class="col-md-4 my-0">
                <div class="alert alert-danger alert-dismissible fade show" style="width:70%">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    {{ session()->get('errorMsg') }}
                </div>
            </div>
        @endif
        <div class="container text-center mt-5">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Company</th>
                    <th>Expires At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if($jobs)
                    @foreach($jobs as $job)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $job->title }}</td>
                            <td>{{ $job->company }}</td>
                            <td>{{ $job->expires_at }}</td>
                            <td width="20">
                                <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-primary">Edit</a>
                            </td>
                            <td width="20">
                                <form action="{{ route('jobs.destroy', $job->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">Jobs not added yet.</td>
                    </tr>
                @endif
                </tbody>
            </table>
            @if ($jobs->hasPages())
                <div class="d-flex justify-content-center">
                    {{ $jobs->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
