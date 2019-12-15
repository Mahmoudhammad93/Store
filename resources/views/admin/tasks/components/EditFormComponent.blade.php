<div class="box-body">
    <div class="form-group col-md-12">
        <input type="text" class="form-control" name="name" value="{{ $tasks->name }}" placeholder="Task Name" />
    </div>
    <div class="form-group col-md-12">
        <input type="date" name="task_date" value="{{ $tasks->task_date }}" class="form-control date" />
    </div>
    <div class="form-group col-md-12">
        <textarea name="description" class="form-control" placeholder="Description : ">{{ $tasks->description }}</textarea>
    </div>
    <div class="form-group col-md-12">
        <input type="submit" class="btn btn-success" value="Save" />
    </div>
</div>
