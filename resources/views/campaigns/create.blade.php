@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    Create a New Campaign
                </div>

                <div class="card-body">
                    <form action="{{url('/campaigns')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <select class="form-control" name="type" id="type" required>
                               <option>Choose Campaign Type</option>
                               @foreach ($types as $id => $type)
                               @if (old('type') == $id)
                                    <option value="{{$id}}" selected>{{$type}}</option>
                               @else
                                    <option value="{{$id}}">{{$type}}</option>
                                @endif
                               @endforeach
                            </select>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="name">Campaign Name</label>
                            <input class="form-control" name="name" value="{{ old('name') }}" type="text" required>
                        </div>

                        <div class="form-group">
                            <label for="startDate">Schedule Date and Time (CST)</label>
                            <input class="form-control" name="startDate" type="datetime-local" id="startDate" value="{{ old('startDate') }}" required>
                        </div>

                        <div  class="form-group" id="recurring" style="display:none;">
                            <label for="specify">Recurring Frequency</label>
                            <select class="form-control" id="recurring" name="recurring">
                                <option>Choose Recurring Frequency</option>
                                @foreach ($recurring as $id => $message)
                                @if (old('recurring') == $id)
                                    <option value="{{$id}}" selected>
                                        {{$message}}
                                    </option>
                                @else
                                    <option value="{{$id}}">
                                        {{$message}}
                                    </option>
                                @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            @if(empty($lists))
                            <label for="lists">You currently do not have any lists. <a href="https://activecamper.activehosted.com/admin/main.php?action=list&new">Create a list first.</a></label> 
                            <select class="form-control" id="lists" multiple name="lists[]" disabled>
                            @else
                            <label for="lists">Select one or more lists <a href="https://activecamper.activehosted.com/app/contacts?create=true&listid=1&status=1" target="_blank">Add a new contact</a></label> 
                            <select class="form-control" id="lists" multiple name="lists[]" required>
                            @endif
                                @foreach ($lists as $list)
                                    <option value="{{$list->id}}">
                                        {{$list->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            @if (empty($messages))
                            <label for="lists">You currently do not have any messages. <a href="https://activecamper.activehosted.com/template/">Create a message first.</a></label> 
                            <select class="form-control" id="messages" name="messages" disabled>
                            @else
                            <label for="messages">Select a Message</label> 
                            <select class="form-control" id="messages" name="messages" required>
                            @endif
                                @foreach ($messages as $message)
                                @if (old('messages') == $message->id)
                                    <option value="{{$message->id}}" selected>
                                        {{$message->subject}}
                                    </option>
                                @else
                                    <option value="{{$message->id}}">
                                        {{$message->subject}}
                                    </option>
                                @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" id="public" name="public" type="radio" value="0">
                            <label class="form-check-label" for="public">Public</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" id="private" name="public" type="radio" value="1">
                            <label class="form-check-label" for="private">Private</label>
                        </div>
                        <hr>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" id="draft" name="status" type="radio" value="0">
                            <label class="form-check-label" for="draft">Draft</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" id="schedule" name="status" type="radio" value="1">
                            <label class="form-check-label" for="schedule">Schedule</label>
                        </div>
{{--                         <label for="messages">Example multiple select</label> <label class="switch"><input name=
                        "public" type="checkbox"> <span class="slider round"></span></label> --}}
                        <hr>
                        <button class="btn btn-primary btn-block" type="submit">Create</button>
                    </form>
                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection