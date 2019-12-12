<div class="box-body row">
    <form action="{{ route('tasks.store') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group col-md-6">
            <input type="text" class="form-control" name="name" placeholder="Task Name" />
        </div>
        <div class="form-group col-md-6">
            <input type="date" name="task_date" class="form-control date" />
        </div>
        <div class="form-group col-md-12">
            <textarea name="description" class="form-control" placeholder="Description : "></textarea>
        </div>
        <div class="form-group col-md-12">
            <input type="submit" class="btn btn-success" value="Save" />
        </div>
    </form>
</div>
