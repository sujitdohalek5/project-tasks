@extends('layouts.app')
@include('layouts.headers')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header" style="background: none !important;">
            <span class="h1">Project List</span>
        </div>
        <div class="card-body">
                <form class="row" action="{{ route('projects.index') }}" method="get">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" type="text" name="filter" value="{{ request('filter') }}" placeholder="Filter by Project Name or Project Code">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-primary" href="{{ route('projects.create') }}" style="float: right;">+ Add Config</a>
                        <button class="btn btn-primary" type="submit">Filter</button>
                    </div>
                </form>

            <!-- <div class="col-sm-12">
                <div class="form-group text-right">
                    <a class="btn btn-primary" style="margin-top: 20px;" href="{{ route('projects.create') }}">+ Add Config</a>
                </div>
            </div> -->
            <div class="table-responsive" style="margin-top: 15px;">
                <table class="table table-bordered">
                    <tr>
                        <th>Project Code</th>
                        <th>Project Name</th>
                        <th>Action</th>
                    </tr>

                    @foreach($projects as $project)
                    <tr>
                        <?php $rowspan = (count($project->tasks) + 1); ?>
                        <td rowspan="{{$rowspan}}">{{ $project->project_code }}</td>
                        <td>{{ $project->project_name }}
                        </td>
                        <td rowspan="{{$rowspan}}">
                            <form method="post" action="{{ route('projects.destroy', $project->project_code) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <div class="btn-group">
                                    <a class="btn btn-warning" href="{{ route('projects.edit', $project->project_code) }}">Edit</a>
                                    <button class="btn btn-danger statusupdate" type="submit" onclick="return confirm('Are you sure you want to delete this project?')">delete</button>
                                </div>
                            </form>
                        </td>
                        @foreach($project->tasks as $task)
                    <tr>
                        <td>{{ $task->task_name }} - {{ $task->task_hours }} hours</td>
                    </tr>
                    @endforeach
                    </tr>
                    @endforeach
                </table>
            </div>
            @endsection
        </div>
    </div>
</div>