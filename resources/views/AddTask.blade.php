@extends('shared.layout')

@section('content')

<div class="card-header">Add task</div>

<div class="card-body">
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/tasks/add" method="post" enctype="multipart/form-data">
        @csrf
    <div class="form-group">
        <label for="">Title</label>
        <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="">
    </div>

    <div class="custom-control custom-radio">
        <input value="fileType" type="radio" class="custom-control-input" id="fileType" name="taskType" checked onchange="checkRadio(this)">
        <label class="custom-control-label" for="fileType">File</label>
    </div>

    <div class="custom-control custom-radio">
        <input value="textType" type="radio" class="custom-control-input" id="textType" name="taskType" onchange="checkRadio(this)">
        <label class="custom-control-label" for="textType">Text</label>
    </div>


    <div class="form-group" id="file_form">
        <input type="file" class="form-control-file" name="fileToUpload" id="inputFile" aria-describedby="fileHelp">
        <small id="fileHelp" class="form-text text-muted">Please upload a valid txt file.</small>
    </div>

    <div id="text_form" class="form-group">
        <textarea name="taskText"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


</div>
@endsection

@section('scripts')
<script>
    $("#text_form").hide();

    function checkRadio(radio) {
       if (radio.id === "textType"){
            $("#text_form").show();
            $("#file_form").hide();
       } else {
            $("#text_form").hide();
            $("#file_form").show();
       }
    }
</script>
@endsection




