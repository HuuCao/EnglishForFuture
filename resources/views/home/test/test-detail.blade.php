@php
    $title = 'Exam ' . $id;
@endphp
@extends('home.layout.layout-test')

@section('css')
    <link rel="stylesheet" href="{{ asset('public/home/css/exam.css') }}">
@stop

@section('content')
    <div class="testReading" id="testReading">
        <div class="navbar fixed-top navbar-light bg-light">
            <p>
                {{-- <a href="{{ route('home') }}" id="backhome" style="display: inline;">← --}}
                {{-- Home</a> --}}
                {{-- <span style="padding-left: 40px;">{{ $infoExam }}</span> --}}
            </p>
        </div>
        <div id="content" class="container-fluid fill">
            <form action="{{ route('test.result', ['id' => $id]) }}" id="submitForm" name="submitForm" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $id }}">
                <div class="row">
                    <div id="navigation" class="col-md-3">
                        <div class="fix-scrolling">
                            <div class="d-flex justify-content-center pt-3">
                                <span id="time">2:00:00</span>
                            </div>
                            <hr class="hr hr-blurry">
                            <div class="d-flex justify-content-start flex-wrap overflow-scroll" id="list-question">
                                @include('home.test.list-question')
                            </div>
                            <hr class="hr hr-blurry">
                            <div class="pageing" id="fulltest_page" data-page="1" data-limit="102">
                                <a href="javascript:void(0)" data-type="-1" class="button_page back">BACK</a>
                                <a href="javascript:void(0)" class="button_page next" data-type="1">NEXT</a>
                                <button class="btn btn-danger">Chấm điểm</button>
                                {{-- onclick="if (!window.__cfRLUnblockHandlers) return false; return mshoatoeic.send_answer_fulltest()"
                                data-cf-modified-1ce80f210daa0304f7c52798-="" --}}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 ">
                    </div>

                    <!--Nội dung bài test -->
                    <div id="main" class="col-md-9 web-font ">
                        @include('home.test.list-parts')
                        <div class="container" id="fulltest_content">
                            @include('home.test.details-question')
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection

@section('js')
    <script>
        function stopEvent(e) {
            e.style.pointerEvents = "none";
        }

        function fulltest_change_page(page) {
            var limit = parseInt($("#fulltest_page").attr("data-limit"));
            $("#fulltest_content").find(".question").hide();
            $("#fulltest_content").find(".fullest_page_" + page).show();
            var part = parseInt($("#fulltest_content").find(".fullest_page_" + page).attr("data-part"));
            /// part 
            $("#fulltest_part_head").find(".fulltest_part").find("a").removeClass("active");
            $("#fulltest_part_head").find('.fulltest_part[data-part="' + part + '"]').find("a").addClass("active");
            $("#fulltest_page").attr("data-page", page);
            // shortcut
            if (page == limit - 1) {
                $("#fulltest_page").find(".next").hide();
            } else {
                $("#fulltest_page").find(".next").show();
            }
            if (page == 1) {
                $("#fulltest_page").find(".back").hide();
            } else {
                $("#fulltest_page").find(".back").show();
            }
            // console.log(page);
            $("#list-question").find(".viewing").removeClass("viewing");
            $("#list-question").find('.numberCircle[data-page="' + page + '"]').addClass("viewing");
            //Allow src
            $("div[data-part=" + part + "] [data-src]").each(function() {
                var srcdata = $(this).data('src');
                $(this).attr("src", srcdata);
                $(this).removeAttr("data-src");
            });
            //////////////// UNSET SOUND ////////////
            // mshoatoeic.stop_audio_html5();
        }

        $(document).ready(function() {
            fulltest_change_page(1);
            var hours = 00;
            var minutes = 00;
            var seconds = 05;
            var timeLeft = setInterval(() => {

                if (hours == 0 && minutes == 0 && seconds == 0) {
                    clearInterval(timeLeft);
                }

                if (seconds <= 0) {
                    minutes--;
                    seconds = 59;
                }
                if (minutes <= 0 && hours != 0) {
                    hours--;
                    minutes = 59;
                    seconds = 59;
                }

                let tmpHours = hours.toString().length > 1 ? hours : '0' + hours;
                let tmpMinutes = minutes.toString().length > 1 ? minutes : '0' + minutes;
                let tmpSeconds = seconds.toString().length > 1 ? seconds : '0' + seconds;

                $("#time").text(tmpHours + ':' + tmpMinutes + ':' + tmpSeconds + "s");
                seconds--;
            }, 1000);

            $("#fulltest_page").find(".button_page").bind("click", function() {
                var current_page = parseInt($("#fulltest_page").attr("data-page"));
                var type = parseInt($(this).attr("data-type"));
                current_page = current_page + type;
                fulltest_change_page(current_page);
            });
            $("#list-question").find(".numberCircle").bind("click", function() {
                var page = parseInt($(this).attr("data-page"));
                fulltest_change_page(page);
            });
            $("#fulltest_part_head").find(".fulltest_part").bind("click", function() {
                var part = $(this).attr("data-part");
                var page = $("#fulltest_content").find('.question[data-part="' + part + '"]').first().attr(
                    "data-page");
                fulltest_change_page(page);
            })

            $('input[type=radio][name^="answer"]').change(function() {
                var question_id = $(this).data('question');
                var iquestion_id = $(this).data('iquestion'); //Thá»© tá»± cÃ¢u há»i / 200 cÃ¢u
                var name = $(this).attr('name');
                // console.log(question_id, iquestion_id);
                //remove active & active
                $("#testing_answer_" + question_id + "_" + iquestion_id).find(".question-label")
                    .removeClass("active");
                //$("#test_answer_label_" +question_id).addClass("active")
                $(this).parent().addClass("active");
                // add class to box result
                if ($("#list-question").length) {
                    $("#list-question").find("#question" + iquestion_id).addClass(
                        "border border-success text-success").text('✔');
                }
            });

        });
    </script>
@stop
