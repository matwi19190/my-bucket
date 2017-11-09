@extends('layouts.app')
@section('content')
<div class="col-sm-9 col-md-9 col-lg-9 pull-left">
    <div class="row" style="background-color: #FFF; padding: 10px">
        <h1>Edit Company</h1>
        <form method="post" action="{{ route('companies.update', [$company->id]) }}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put" />
            <div class="form-group">
                <label for="company-name">Name<span class="required">*</span></label>
                <input
                    placeholder="Enter Name"
                    id="company-name"
                    required
                    name="name"
                    spellcheck="false"
                    class="form-control"
                    value="{{$company->name}}"
                    />
            </div>
            <div class="form-group">
                <label for="company-content">Description</label>
                <textarea
                    placeholder="Enter Description"
                    style="resize: vertical"
                    id="company-content"
                    name="description"
                    spellcheck="false"
                    rows="5"
                    class="form-control autosize-target text-left">{{$company->description}}</textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-primary"/>
            </div>
        </form>
    </div>
</div>
<div class="col-sm-3 col-md-3 col-lg-3 pull-right blog-sidebar">
    <div class="sidebar-module">
        <h4>Actions</h4>
        <ol class="list-unstyled">
            <li><a href="/companies/{{$company->id}}">View Company</a></li>
            <li><a href="/companies">All Companies</a></li>
        </ol>
    </div>
</div>
@endsection