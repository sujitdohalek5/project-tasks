@extends('layouts.app')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h1>Create Project</h1>

            <form method="post" action="{{ route('projects.store') }}">
                @csrf @method('POST')

                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="active" for="project_code">Project Code</label>
                        <input id="project_code" name="project_code" type="text" class="form-control" placeholder="project_code">
                        @error('project_code')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="active" for="project_name">Project Name</label>
                        <input id="project_name" name="project_name" type="text" class="form-control" placeholder="project_name">
                        @error('project_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <span class=h2>Tasks</span>
                <button type="button" id="add-task" class="btn btn-primary float-right btns addtask addtaskpm mr-2">Add Task</button>

                <div class="col-sm-12" id="tasks-container" style="margin-top: 30px;">
                    <div class="task row border-bottom" style="margin-top: 5px; margin-bottom: 5px;">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="tasks[0][task_name]">Task Name</label>
                                <input name="tasks[0][task_name]" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="tasks[0][task_hours]">Task hours</label>
                                <input name="tasks[0][task_hours]" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit">Submit</button>
            </form>

            <script>
                document.getElementById('add-task').addEventListener('click', function() {
                    var tasksContainer = document.getElementById('tasks-container');
                    var taskTemplate = document.querySelector('.task');

                    var newTask = taskTemplate.cloneNode(true);
                    var index = tasksContainer.children.length;

                    newTask.innerHTML = newTask.innerHTML.replace(/\[0\]/g, '[' + index + ']');

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