@extends('layouts.app')

@section('content')
<div class="container">
            <div id="myTasks">
                <div>
                    <h1>Моите задачи</h1>

                </div>

                <div>
                    <span id="prev" data-js="1" class="btn btn-outline-danger">Назад</span>
                    <div id="date">
                        <span>{{$dayToDisplay}}</span>
                        @if(\Illuminate\Support\Carbon::parse($currentDay) <= \Illuminate\Support\Carbon::parse($dayToDisplay))
                        <span id="openModal">+ Добави </span>
                            @endif
                    </div>
                    <span id="next" data-js="-1" class="btn btn-outline-danger">Напред</span>
                </div>

                @if(count($tasksArray) == 0)
                    <h1>Няма добавени задачи за този ден</h1>
                    @else
                <table>
                    <thead>
                        <th>№</th>
                        <th>Задача</th>
                        <th>Статус</th>
                        <th>Действия</th>
                    </thead>
                    <tbody>

                    @foreach($tasksArray  as $task)

                        <tr id="{{$task['id']}}">
                            <td>{{$loop->index + 1}}</td>
                            <td>{{$task['text']}}</td>
                            @if($task['status'] == 'notCompleted')
                                <td>Не завършена</td>
                            @else
                                <td>Завършена</td>
                            @endif
                            <td>
                                @if(\Illuminate\Support\Carbon::parse($currentDay) > \Illuminate\Support\Carbon::parse($dayToDisplay))
                                     <button data-js="edit" disabled  class="btn btn-success" >Завърши</button>
                                    <button data-js="remove" disabled class="btn btn-danger">Премахни</button>

                                @else
                                    <button data-js="edit" class="btn btn-success" >Завърши</button>
                                    <button data-js="remove" class="btn btn-danger">Премахни</button>
                                @endif
                            </td>
                        </tr>
                       @endforeach
                    </tbody>
                </table>
                    @endif
            </div>
        </div>

<div id="modal" class="modal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Добави задача</h5>

            </div>
            <div class="modal-body">
                <form  action="{{route('task.store')}}" method="POST">
                            @csrf

                    <div>
                        <input type="text" id="tasksText" name="taskText" placeholder="Веведи своята задача">

                    </div>
                    <div>
                        <input type="text" placeholder="Избери дата" id="datepicker" autocomplete="off" name="taskDate">
                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-outline-success" type="submit" value="Добави">
                        <button id="close" type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


@endsection
