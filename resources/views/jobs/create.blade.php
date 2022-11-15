@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="text-center mt-3 ">
            <h1>Create a Job</h1>
        </div>
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <div class="card mt-1 mx-auto p-1 bg-light">
                    <div class="card-body bg-light">
                        <div class="container">
                            <form id="jobs-create-form" method="post" action="{{ route('jobs.store') }}">
                                @csrf
                                <div class="controls">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form_title">Title *</label>
                                                <input id="form_title" type="text" name="title" class="form-control"
                                                       placeholder="Java Developer"
                                                       value="{{ old('title') }}">
                                                @if($errors->any())
                                                    <div class="text-danger">
                                                        {{$errors->first('title')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form_company">Company *</label>
                                                <input id="form_company" type="text" name="company"
                                                       class="form-control" placeholder="Leapfrog"
                                                       value="{{ old('company') }}">
                                                @if($errors->any())
                                                    <div class="text-danger">
                                                        {{$errors->first('company')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form_description">Description *</label>
                                                <textarea id="form_description" name="description" class="form-control"
                                                          placeholder="Write a job description here." rows="4">{{old('description') }}</textarea>
                                                @if($errors->any())
                                                    <div class="text-danger">
                                                        {{$errors->first('description')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form_salary_range">Salary (Rs) *</label>
                                                <input id="form_salary_range" type="text" name="salary_range" class="form-control"
                                                       placeholder="1000-2000"
                                                       value="{{ old('salary_range') }}">
                                                @if($errors->any())
                                                    <div class="text-danger">
                                                        {{$errors->first('salary_range')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form_location">Location *</label>
                                                <input id="form_location" type="text" name="location" class="form-control"
                                                       placeholder="Kathmandu"
                                                       value="{{ old('location') }}">
                                                @if($errors->any())
                                                    <div class="text-danger">
                                                        {{$errors->first('location')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form_tags">Tags *</label>
                                                <input id="form_tags" type="text" name="tags"
                                                       class="form-control" placeholder="Node js"
                                                       value="{{ old('tags') }}">
                                                @if($errors->any())
                                                    <div class="text-danger">
                                                        {{$errors->first('tags')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form_expires_at">Expires at *</label>
                                                <input id="form_expires_at" type="date" name="expires_at"
                                                       class="form-control" value="{{ old('expires_at') }}">
                                                @if($errors->any())
                                                    <div class="text-danger">
                                                        {{$errors->first('expires_at')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="submit" class="btn btn-success btn-send  pt-2 btn-block
                                            "value="Save">
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
