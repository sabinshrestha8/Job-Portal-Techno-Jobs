@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center mt-3 ">
            <h1>Update a Job</h1>
        </div>
        <div class="row mb-5">
            <div class="col-lg-5 mx-auto">
                <div class="card mt-1 mx-auto p-1 bg-white">
                    <div class="card-body bg-white">
                        <div class="container">
                            <form id="jobs-edit-form" method="post" action="{{ route('jobs.update', $job->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="controls">
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form_title">Title *</label>
                                                <input id="form_title" type="text" name="title" class="form-control"
                                                       placeholder="Java Developer"
                                                       value="{{ $job->title }}">
                                                @if($errors->any())
                                                    <div class="text-danger">
                                                        {{$errors->first('title')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form_company">Company *</label>
                                                <input id="form_company" type="text" name="company"
                                                       class="form-control" placeholder="Leapfrog"
                                                       value="{{ $job->company }}">
                                                @if($errors->any())
                                                    <div class="text-danger">
                                                        {{$errors->first('company')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form_description">Description *</label>
                                                <textarea id="form_description" name="description" class="form-control"
                                                          placeholder="Write a job description here." rows="4">{{ $job->description }}</textarea>
                                                @if($errors->any())
                                                    <div class="text-danger">
                                                        {{$errors->first('description')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form_salary_range">Salary (Rs) *</label>
                                                <input id="form_salary_range" type="text" name="salary_range" class="form-control"
                                                       placeholder="1000-2000"
                                                       value="{{ (string) $job->salary_range }}">
                                                @if($errors->any())
                                                    <div class="text-danger">
                                                        {{$errors->first('salary_range')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form_location">Location *</label>
                                                <input id="form_location" type="text" name="location" class="form-control"
                                                       placeholder="Kathmandu"
                                                       value="{{ $job->location }}">
                                                @if($errors->any())
                                                    <div class="text-danger">
                                                        {{$errors->first('location')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form_tags">Tags *</label>
                                                <input id="form_tags" type="text" name="tags"
                                                       class="form-control" placeholder="Node js"
                                                       value="{{ implode(',', $job->tags) }}">
                                                @if($errors->any())
                                                    <div class="text-danger">
                                                        {{$errors->first('tags')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form_expires_at">Expires at *</label>
                                                <input id="form_expires_at" type="date" name="expires_at"
                                                       class="form-control" value="{{ $job->expires_at }}">
                                                @if($errors->any())
                                                    <div class="text-danger">
                                                        {{$errors->first('expires_at')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <input type="submit" class="btn btn-success btn-send py-2 mx-0 btn-block
                                            "value="Update" style="width: 100%">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.8 -->
            </div>
            <!-- /.row-->
        </div>
    </div>
@endsection
