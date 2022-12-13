@extends('home.layout.master-layout')

@section('section-lesson')
    @foreach ($lessons as $lesson)
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="course-1-item">
                        <figure class="thumnail">
                            <a href="#"><img src="{{$lesson->image}}" alt="Image" class="img-fluid"></a>
                            <div class="category"><h3>{{$lesson->lesson_name}}</h3></div>  
                        </figure>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection