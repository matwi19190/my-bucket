@extends('layouts.app')
@section('content')
<div class="col-sm-9 col-md-9 col-lg-9 pull-left">
    <div class="jumbotron">
        <h1>{{$company->name}}</h1>
        <p class="lead">{{$company->description}}</p>
    </div>
    <div class="row" style="background-color: #FFF">
        <a class="btn btn-default btn-sm pull-right" href="/projects/create/{{$company->id}}">Add New Project</a>
        @foreach($company->projects as $project)
        <div class="col-lg-4">
            <h2>{{$project->name}}</h2>
            <p class="text-danger">{{$project->description}}</p>
            <p><a class="btn btn-primary" href="/projects/{{$project->id}}" role="button">View details »</a></p>
        </div>
        @endforeach
    </div>
</div>
<div class="col-sm-3 col-md-3 col-lg-3 pull-right blog-sidebar">
    <div class="sidebar-module">
        <h4>Actions</h4>
        <ol class="list-unstyled">
            <li><a href="/projects/create/{{$company->id}}">Add New Project</a></li>
            <li><a href="/companies">Companies List</a></li>
            <li><a href="/companies/create">Add New Company</a></li>
            <li><a href="/companies/{{$company->id}}/edit">Edit</a></li>
            <br/>
            <li>
                <a   
                    href="#"
                    onclick="
                            var result = confirm('Are you sure you wish to delete this Company?');
                            if (result) {
                                event.preventDefault();
                                document.getElementById('delete-form').submit();
                            }
                    "
                    >
                    Delete
                </a>

                <form id="delete-form" action="{{ route('companies.destroy',[$company->id]) }}" 
                      method="POST" style="display: none;">
                    <input type="hidden" name="_method" value="delete">
                    {{ csrf_field() }}
                </form>
            </li>
        </ol>
    </div>
</div>
@endsection