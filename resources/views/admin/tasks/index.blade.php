@extends('admin.shared.master')
@section('content')

<div class="overlay popup task">
    <div class="popup-form task-form">
        <div class="cart">
            <div class="cart-header">
                <h5 class="title">
                    Add Task
                    <i class="fa fa-close"></i>
                </h5>
            </div>
            <div class="cart-body">
                <form action="{{ route($buttonsRoutsname.'.store') }}" method="post">
                    {{ csrf_field() }}
                    @include('Admin.'.$buttonsRoutsname.'.create')
                </form>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <button class="btn btn-success" id="add-task">Add Task</button>
</div>
<div id='calendar'></div>
<script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        var today_date = moment().format('YYYY-MM-DD');
        console.log(today_date);
        // $('#calendar').fullCalendar('gotoDate', today_date);
        $('#calendar').fullCalendar({
            events : [
                    @foreach($tasks as $task)
                        {
                            title : '{{ $task->name }}',
                            body : '{{ $task->description }}',
                            id: '{{ $task->id }}',
                            start : '{{ $task->task_date }}',
                            url : '{{ route('tasks.edit', $task->id) }}'
                        },
                    @endforeach
            ],
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek'
                // right: 'month,basicWeek,basicDay'
            }
        });

        console.log(header);

        $('.fc-day.fc-widget-content').append('<div>'+events.id+'</div>');
    });

    $(document).on('click', '#add-task', function () {
        console.log('clicked');
        $('body').addClass('no-scroll');
        $('.overlay.popup.task').addClass('popup-show');
        return false;
    });

    // $(document).on('click','.fc-day-grid-event.fc-h-event.fc-event.fc-start.fc-end', function () {
    //     $('.task-edit').addClass('popup-show');
    //     return false;
    // });
</script>
@stop
