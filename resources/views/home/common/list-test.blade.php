@extends('home.layout.master-layout')

@section('section-list-test')
<div class="site-section">
    <div class="container" style="background-color:#fafafa; margin-top:20px">
        <div class="row">
            @foreach ($exam as $ex)
            <div class="col-lg-12 col-md-12 mb-12">
                <a href="http://localhost/EnglishForFuture/test/{{$ex->id}}">{{$ex->exam_name}}</a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
