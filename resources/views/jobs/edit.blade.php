@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="text-center mt-3 ">
            <h1>Update a Job</h1>
        </div>
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <div class="card mt-1 mx-auto p-1 bg-light">
                    <div class="card-body bg-light">
                        <div class="container">
                            <form id="jobs-edit-form" method="post" action="{{ route('jobs.update', $job->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="controls">
                                    <div class="row">
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
                                    <div class="row">
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

                                    <div class="row">
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
                                    <div class="row">
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
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="submit" class="btn btn-success btn-send  pt-2 btn-block
                                            "value="Update">
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
