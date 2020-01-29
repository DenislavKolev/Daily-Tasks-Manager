@extends('layouts.app')

@section('content')
<div class="container">
            <div id="myTasks">
               <h1>Моите задачи</h1>
                <div>
                    <span id="prev">Назад</span>
                    <span id="date">21.01.2020г.</span>
                    <span id="next">Напред</span>
                </div>
                <table>
                    <thead>
                        <th>№</th>
                        <th>Задача</th>
                        <th>Статус</th>
                        <th>Действия</th>
                    </thead>
                    <tbody>

                    @foreach($tasksArray  as $task)

                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>{{$task['text']}}</td>
                            @if($task['status'] == 'notCompleted')
                            <td>Не завършена</td>
                            @else
                                <td>Завършена</td>
                            @endif
                            <td>
                                <span>Edit</span>
                                <span>Remove</span>
                            </td>
                        </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <form action="{{route('task.store')}}" method="POST">

            @csrf
            <input type="text" id="tasksText" name="taskText" placeholder="Веведи своята задача">
            <input type="date" name="taskDate">
            <input type="submit">
        </form>
    </div>
</div>
@endsection
