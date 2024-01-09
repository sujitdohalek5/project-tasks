@extends('layouts.app')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h1>Edit Project</h1>

            <form method="post" action="{{ route('projects.update', $project->project_code) }}">
                @csrf
                @method('PUT')

                <input type="hidden" name="edit_project_id" value="{{ $project->project_code }}">

                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="active" for="project_code">Project Code</label>
                        <input id="project_code" name="project_code" type="text" class="form-control" placeholder="project_code" value="{{ $project->project_code }}">
                        @error('project_code')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="active" for="project_name">Project Name</label>
                        <input id="project_name" name="project_name" type="text" class="form-control" placeholder="project_name" value="{{ $project->project_name }}">
                        @error('project_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <span class=h2>Tasks</span>
                <button type="button" id="add-task" class="btn btn-primary float-right btns addtask addtaskpm mr-2">Add Task</button>

                <div class="col-sm-12" id="tasks-container" style="margin-top: 30px;">
                    @foreach($project->tasks as $index => $task)
                    <div class="task row border-bottom" style="margin-top: 5px; margin-bottom: 5px;">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="tasks[{{ $index }}][task_name]">Task Name</label>
                                <input name="tasks[{{ $index }}][task_name]" type="text" class="form-control task_name" value="{{ $task->task_name }}" required>
                            </div>
                        </div>

                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="tasks[0][task_hours]">Task hours</label>
                                <input name="tasks[0][task_hours]" type="text" class="form-control task_hours" value="{{ $task->task_hours }}" required>
                            </div>
                        </div>
                        @if (!($loop->first))
                        <div class="col-sm-2">
                            <button type="button" class="remove-task btn btn-danger float-right">Remove</button>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>

                <button type="submit">Update</button>
            </form>

            <script>
                document.getElementById('add-task').addEventListener('click', function() {
                    var tasksContainer = document.getElementById('tasks-container');
                    var taskTemplate = document.querySelector('.task');

                    var newTask = taskTemplate.cloneNode(true);
                    var index = tasksContainer.children.length;

                    newTask.innerHTML = newTask.innerHTML.replace(/\[0\]/g, '[' + index + ']');
                    // newTask.innerHTML = "<label for='tasks["+index+"][task_name]'>Task Name:</label>" +
                        // " <input type='text' name='tasks["+index+"][task_name]' required>" +
                        // " <label for='tasks["+index+"][task_hours]'>Task Hours:</label>" +
                        // " <input type='text' name='tasks["+index+"][task_hours]' required> ";

                    // Add a remove button to the new task
                    var removeButtonDiv = document.createElement('div');
                    removeButtonDiv.className = 'col-sm-2';
                    var removeButton = document.createElement('button');
                    removeButton.type = 'button';
                    removeButton.className = 'remove-task btn btn-danger float-right';
                    removeButton.textContent = "Remove";
                    removeButton.addEventListener('click', function() {
                        tasksContainer.removeChild(newTask);
                    });

                    removeButtonDiv.appendChild(removeButton);
                    newTask.querySelector('.task_name').value = '';
                    newTask.querySelector('.task_hours').value = '';
                    // console.log(newTask);
                    newTask.appendChild(removeButtonDiv);

                    tasksContainer.appendChild(newTask);
                });

                // Add event delegation for dynamically added remove buttons
                document.addEventListener('click', function(event) {
                    if (event.target.classList.contains('remove-task')) {
                        var taskToRemove = event.target.closest('.task');
                        taskToRemove.parentNode.removeChild(taskToRemove);
                    }
                });
            </script>
        </div>
    </div>
</div>
@endsection