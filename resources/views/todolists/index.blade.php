@extends('layouts.main')
@section('title','Ajax Todo App')

@section('content')

  <!--header -->
<header>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="clearfix">
             <div class="pull-left">
              <h1 class="header-title">Todo List</h1>
             </div>
             <div class="pull-right">
                <a href="{{route('todolists.create')}}" class="btn btn-success show-todolist-modal">Create New Task</a>
             </div>
        </div>
       
      </div>
    </div>
  </div>
</header>
    <!-- main content -->
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
      @php($count=$todolists->count())
          <div class="alert alert-warning {{$count ?'hidden':''}}" id="no-record-alert">
            No Record Found
          </div>
            <div class="alert alert-success" id="add-new-alert" style="display:none;"></div> 
          
          <div class="panel panel-default  {{!$count ?'hidden':''}}">

            <ul class="list-group" id="todolist">
              @foreach($todolists as $data)
                  @include('todolists.item',compact('data'))
             @endforeach
            </ul>

            <div class="panel-footer">
              <small><span id="todolist-counter">{{$count}}</span> <span>{{$count>1 ? 'records' : 'record' }}</span></small>
            </div>
          </div>
        </div>
        
        @include('todolists.todolistsmodal')
      
          @include('todolists.taskmodal')
        
      </div>
    </div>


@endsection
