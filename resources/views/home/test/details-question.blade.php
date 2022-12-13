@php
    $currentPage = 1;
@endphp
{{-- ************************************************************************ --}}

{{--         /***/                  PART 1                    /***/           --}}

{{-- ************************************************************************ --}}


@foreach ($listQuestionP1 as $itemP1)
    <div data-part='1' class="question fullest_page_{{ $currentPage }}" data-page="{{ $currentPage }}">
        <p class="lead">
            Look at the picture and listen to the sentences. Choose the sentence that best describes the
            picture:
        </p>
        <div class="row">
            <div class="col-5">
                <figure>
                    @if ($itemP1->image)
                        <img src="{{ $itemP1->image }}"
                            alt="Part 1: Question {{ $itemP1->number_for_exam }}" width="100%">
                    @endif
                </figure>
                <div>
                    @if ($itemP1->autdio)
                        <audio class="audio" data-src="{{ $itemP1->autdio }}" controls
                            onplay="stopEvent(this)" controlsList="nodownload noplaybackrate"></audio>
                    @endif
                </div>
            </div>
            <div class="col-7">
                {{-- id="testing_answer_number_for_exam_3" --}}
                <div class="myquestionarea" id="testing_answer_{{ $itemP1->id }}_{{ $itemP1->number_for_exam }}">
                    <p><b>Question {{ $itemP1->number_for_exam }}:</b></p>
                    <p>{{ $itemP1->question_name }}</p>
                    <div>
                        <label class="question-label" id="test_answer_label_A">
                            <input type="radio" data-iquestion="{{ $itemP1->number_for_exam }}"
                                data-question="{{ $itemP1->id }}" name="answer[{{ $itemP1->id }}]" value="A">
                            <strong>A</strong> <span id="tapescript_answer_A" class="answer_content">{{$itemP1->answer_a}}</span>
                        </label>
                        <label class="question-label" id="test_answer_label_B">
                            <input type="radio" data-iquestion="{{ $itemP1->number_for_exam }}"
                                data-question="{{ $itemP1->id }}" name="answer[{{ $itemP1->id }}]" value="B">
                            <strong>B</strong> <span id="tapescript_answer_B" class="answer_content">{{$itemP1->answer_b}}</span>
                        </label>
                        <label class="question-label" id="test_answer_label_C">
                            <input type="radio" data-iquestion="{{ $itemP1->number_for_exam }}"
                                data-question="{{ $itemP1->id }}" name="answer[{{ $itemP1->id }}]" value="C">
                            <strong>C</strong> <span id="tapescript_answer_C" class="answer_content">{{$itemP1->answer_c}}</span>
                        </label>
                        <label class="question-label" id="test_answer_label_D">
                            <input type="radio" data-iquestion="{{ $itemP1->number_for_exam }}"
                                data-question="{{ $itemP1->id }}" name="answer[{{ $itemP1->id }}]" value="D">
                            <strong>D</strong> <span id="tapescript_answer_D" class="answer_content">{{$itemP1->answer_d}}</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php
        $currentPage++;
    @endphp
@endforeach

{{-- ************************************************************************ --}}

{{--         /***/                  PART 2                    /***/           --}}

{{-- ************************************************************************ --}}

@foreach ($listQuestionP2 as $itemP2)
    <div data-part='2' class="question fullest_page_{{ $currentPage }}" data-page="{{ $currentPage }}">
        <p class="lead">
            Listen to the question and the three responses. Choose the response that best answers the question:
        </p>
        <div class="row">
            <div class="col-5">
                <div>
                    @if ($itemP2->autdio)
                        <audio class="audio" data-src="{{ $itemP2->autdio }}" controls
                            onplay="stopEvent(this)" controlsList="nodownload noplaybackrate"></audio>
                    @endif
                </div>
            </div>
            <div class="col-7">
                <div class="myquestionarea" id="testing_answer_{{ $itemP2->id }}_{{ $itemP2->number_for_exam }}">
                    <p><b>Question {{ $itemP2->number_for_exam }}:</b></p>
                    <p>{{ $itemP2->question_name }}</p>
                    <div>
                        <label class="question-label" id="test_answer_label_A">
                            <input type="radio" data-iquestion="{{ $itemP2->number_for_exam }}"
                                data-question="{{ $itemP2->id }}" name="answer[{{ $itemP2->id }}]" value="A">
                            <strong>A</strong> <span id="tapescript_answer_A" class="answer_content">{{$itemP2->answer_a}}</span>
                        </label>
                        <label class="question-label" id="test_answer_label_B">
                            <input type="radio" data-iquestion="{{ $itemP2->number_for_exam }}"
                                data-question="{{ $itemP2->id }}" name="answer[{{ $itemP2->id }}]" value="B">
                            <strong>B</strong> <span id="tapescript_answer_B" class="answer_content">{{$itemP2->answer_b}}</span>
                        </label>
                        <label class="question-label" id="test_answer_label_C">
                            <input type="radio" data-iquestion="{{ $itemP2->number_for_exam }}"
                                data-question="{{ $itemP2->id }}" name="answer[{{ $itemP2->id }}]" value="C">
                            <strong>C</strong> <span id="tapescript_answer_C" class="answer_content">{{$itemP2->answer_c}}</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php
        $currentPage++;
    @endphp
@endforeach

{{-- ************************************************************************ --}}

{{--         /***/                  PART 3                    /***/           --}}

{{-- ************************************************************************ --}}


@for ($i = 0; $i < 39; $i += 3)
    <div data-part='3' class="question fullest_page_{{ $currentPage }}" data-page="{{ $currentPage }}">
        <p class="lead">
            Listen to the dialogue. Then read each question and choose the best answer:
        </p>
        <div class="row">
            @foreach ($listQuestionP3->slice($i, 3) as $itemP3)
                <div class="col-5">
                    @if ($itemP3->autdio)
                        <div>
                            <audio class="audio" data-src="{{ $itemP3->autdio }}" controls
                                onplay="stopEvent(this)" controlsList="nodownload noplaybackrate"></audio>
                        </div>
                    @endif
                    @if ($itemP3->paragraph)
                        <div class="d-flex justify-content-center mt-4" style="max-width: 100%;max-height: 100%;">
                            {!! $itemP3->paragraph !!}
                        </div>
                    @endif
                    @if ($itemP3->image)
                        <img src="{{ $itemP3->image }}"
                            alt="Part 1: Question {{ $itemP3->number_for_exam }}" width="100%">
                    @endif
                </div>
                <div class="col-7 mb-2">
                    <div class="myquestionarea">
                        <div id="testing_answer_{{ $itemP3->id }}_{{ $itemP3->number_for_exam }}">
                            <p><b>Question {{ $itemP3->number_for_exam }}:
                                    {{ $itemP3->question }}
                                </b></p>
                                <p>{{ $itemP3->question_name }}</p>
                            <div>
                                <label class="question-label" id="test_answer_label_A">
                                    <input type="radio" data-iquestion="{{ $itemP3->number_for_exam }}"
                                        data-question="{{ $itemP3->id }}" name="answer[{{ $itemP3->id }}]"
                                        value="A">
                                    <strong>A</strong> <span id="tapescript_answer_A" class="answer_content">
                                        {{ $itemP3->answer_a }}
                                    </span>
                                </label>
                                <label class="question-label" id="test_answer_label_B">
                                    <input type="radio" data-iquestion="{{ $itemP3->number_for_exam }}"
                                        data-question="{{ $itemP3->id }}" name="answer[{{ $itemP3->id }}]"
                                        value="B">
                                    <strong>B</strong> <span id="tapescript_answer_B" class="answer_content">
                                        {{ $itemP3->answer_b }}
                                    </span>
                                </label>
                                <label class="question-label" id="test_answer_label_C">
                                    <input type="radio" data-iquestion="{{ $itemP3->number_for_exam }}"
                                        data-question="{{ $itemP3->id }}" name="answer[{{ $itemP3->id }}]"
                                        value="C">
                                    <strong>C</strong> <span id="tapescript_answer_C" class="answer_content">
                                        {{ $itemP3->answer_c }}
                                    </span>
                                </label>
                                <label class="question-label" id="test_answer_label_D">
                                    <input type="radio" data-iquestion="{{ $itemP3->number_for_exam }}"
                                        data-question="{{ $itemP3->id }}" name="answer[{{ $itemP3->id }}]"
                                        value="D">
                                    <strong>D</strong> <span id="tapescript_answer_D" class="answer_content">
                                        {{ $itemP3->answer_d }}
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @php
        $currentPage++;
    @endphp
@endfor

{{-- ************************************************************************ --}}

{{--         /***/                  PART 4                    /***/           --}}

{{-- ************************************************************************ --}}

@for ($i = 0; $i < 30; $i += 3)
    <div data-part='4' class="question fullest_page_{{ $currentPage }}" data-page="{{ $currentPage }}">
        <p class="lead">
            Listen to the talk. Then read each question and choose the best answer:
        </p>
        <div class="row">
            @foreach ($listQuestionP4->slice($i, 3) as $itemP4)
                <div class="col-5">
                    @if ($itemP4->image)
                        <img src="{{ $itemP4->image }}"
                            alt="Part 1: Question {{ $itemP4->number_for_exam }}" width="100%">
                    @endif
                    @if ($itemP4->autdio)
                        <audio class="audio" data-src="{{ $itemP4->autdio }}" controls
                            onplay="stopEvent(this)" controlsList="nodownload noplaybackrate"></audio>
                    @endif
                    @if ($itemP4->paragraph)
                        <div class="d-flex justify-content-center mt-4" style="max-width: 100%;max-height: 100%;">
                            {!! $itemP4->paragraph !!}
                        </div>
                    @endif
                </div>
                <div class="col-7 mb-2">
                    <div class="myquestionarea">
                        <div id="testing_answer_{{ $itemP4->id }}_{{ $itemP4->number_for_exam }}">
                            <p><b>Question {{ $itemP4->number_for_exam }}:
                                    {{ $itemP4->question }}
                                </b></p>
                                <p>{{ $itemP4->question_name }}</p>
                            <div>
                                <label class="question-label" id="test_answer_label_A">
                                    <input type="radio" data-iquestion="{{ $itemP4->number_for_exam }}"
                                        data-question="{{ $itemP4->id }}" name="answer[{{ $itemP4->id }}]"
                                        value="A">
                                    <strong>A</strong> <span id="tapescript_answer_A" class="answer_content">
                                        {{ $itemP4->answer_a }}
                                    </span>
                                </label>
                                <label class="question-label" id="test_answer_label_B">
                                    <input type="radio" data-iquestion="{{ $itemP4->number_for_exam }}"
                                        data-question="{{ $itemP4->id }}" name="answer[{{ $itemP4->id }}]"
                                        value="B">
                                    <strong>B</strong> <span id="tapescript_answer_B" class="answer_content">
                                        {{ $itemP4->answer_b }}
                                    </span>
                                </label>
                                <label class="question-label" id="test_answer_label_C">
                                    <input type="radio" data-iquestion="{{ $itemP4->number_for_exam }}"
                                        data-question="{{ $itemP4->id }}" name="answer[{{ $itemP4->id }}]"
                                        value="C">
                                    <strong>C</strong> <span id="tapescript_answer_C" class="answer_content">
                                        {{ $itemP4->answer_c }}
                                    </span>
                                </label>
                                <label class="question-label" id="test_answer_label_D">
                                    <input type="radio" data-iquestion="{{ $itemP4->number_for_exam }}"
                                        data-question="{{ $itemP4->id }}" name="answer[{{ $itemP4->id }}]"
                                        value="D">
                                    <strong>D</strong> <span id="tapescript_answer_D" class="answer_content">
                                        {{ $itemP4->answer_d }}
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @php
        $currentPage++;
    @endphp
@endfor


{{-- ************************************************************************ --}}

{{--         /***/                  PART 5                    /***/           --}}

{{-- ************************************************************************ --}}

@foreach ($listQuestionP5 as $itemP5)
    <div data-part='5' class="question fullest_page_{{ $currentPage }}" data-page="{{ $currentPage }}">
        <p class="lead">
            Choose the word that best completes the sentence:
        </p>
        <div class="row">
            <div class="col-5">
                @if ($itemP5->image)
                    <img src="{{ $itemP5->image }}"
                        alt="Part 1: Question {{ $itemP5->number_for_exam }}" width="100%">
                @endif
                @if ($itemP5->paragraph)
                    <div class="d-flex justify-content-center mt-4" style="max-width: 100%;max-height: 100%;">
                        {!! $itemP5->paragraph !!}
                    </div>
                @endif
            </div>
            <div class="col-7">
                <div class="myquestionarea" id="testing_answer_{{ $itemP5->id }}_{{ $itemP5->number_for_exam }}">
                    <p><b>Question {{ $itemP5->number_for_exam }}:{{ $itemP5->question }}</b></p>
                    <p>{{ $itemP5->question_name }}</p>
                    <div>
                        <label class="question-label" id="test_answer_label_A">
                            <input type="radio" data-iquestion="{{ $itemP5->number_for_exam }}"
                                data-question="{{ $itemP5->id }}" name="answer[{{ $itemP5->id }}]"
                                value="A">
                            <strong>A</strong> <span id="tapescript_answer_A"
                                class="answer_content">{{ $itemP5->answer_a }}</span>
                        </label>
                        <label class="question-label" id="test_answer_label_B">
                            <input type="radio" data-iquestion="{{ $itemP5->number_for_exam }}"
                                data-question="{{ $itemP5->id }}" name="answer[{{ $itemP5->id }}]"
                                value="B">
                            <strong>B</strong> <span id="tapescript_answer_B"
                                class="answer_content">{{ $itemP5->answer_b }}</span>
                        </label>
                        <label class="question-label" id="test_answer_label_C">
                            <input type="radio" data-iquestion="{{ $itemP5->number_for_exam }}"
                                data-question="{{ $itemP5->id }}" name="answer[{{ $itemP5->id }}]"
                                value="C">
                            <strong>C</strong> <span id="tapescript_answer_C"
                                class="answer_content">{{ $itemP5->answer_c }}</span>
                        </label>
                        <label class="question-label" id="test_answer_label_D">
                            <input type="radio" data-iquestion="{{ $itemP5->number_for_exam }}"
                                data-question="{{ $itemP5->id }}" name="answer[{{ $itemP5->id }}]"
                                value="D">
                            <strong>D</strong> <span id="tapescript_answer_D"
                                class="answer_content">{{ $itemP5->answer_d }}</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php
        $currentPage++;
    @endphp
@endforeach

{{-- ************************************************************************ --}}

{{--         /***/                  PART 6                    /***/           --}}

{{-- ************************************************************************ --}}

@for ($i = 0; $i < 16; $i += 4)
    <div data-part='6' class="question fullest_page_{{ $currentPage }}" data-page="{{ $currentPage }}">
        <p class="lead">
            Choose the word or phrase that best completes the blanks:
        </p>
        <div class="row">
            @foreach ($listQuestionP6->slice($i, 4) as $itemP6)
                <div class="col-5">
                    @if ($itemP6->paragraph)
                        <div class="d-flex justify-content-center mt-4 flex-wrap"
                            style="max-width: 100%;max-height: 100%;">
                            {!! $itemP6->paragraph !!}
                        </div>
                    @endif
                    @if ($itemP6->image)
                        <div class="d-flex justify-content-center mt-4" style="max-width: 100%;max-height: 100%;">
                            <img src="{{ $itemP6->image }}"
                                alt="Part 1: Question {{ $itemP6->number_for_exam }}" width="100%">
                        </div>
                    @endif
                </div>
                <div class="col-7 mb-2">
                    <div class="myquestionarea">
                        <div id="testing_answer_{{ $itemP6->id }}_{{ $itemP6->number_for_exam }}">
                            <p><b>Question {{ $itemP6->number_for_exam }}:
                                    {{ $itemP6->question }}
                                </b></p>
                                <p>{{ $itemP6->question_name }}</p>
                            <div class="d-flex justify-content-center flex-wrap">
                                <label class="question-label" id="test_answer_label_A">
                                    <input type="radio" data-iquestion="{{ $itemP6->number_for_exam }}"
                                        data-question="{{ $itemP6->id }}" name="answer[{{ $itemP6->id }}]"
                                        value="A">
                                    <strong>A</strong> <span id="tapescript_answer_A" class="answer_content">
                                        {{ $itemP6->answer_a }}
                                    </span>
                                </label>
                                <label class="question-label" id="test_answer_label_B">
                                    <input type="radio" data-iquestion="{{ $itemP6->number_for_exam }}"
                                        data-question="{{ $itemP6->id }}" name="answer[{{ $itemP6->id }}]"
                                        value="B">
                                    <strong>B</strong> <span id="tapescript_answer_B" class="answer_content">
                                        {{ $itemP6->answer_b }}
                                    </span>
                                </label>
                                <label class="question-label" id="test_answer_label_C">
                                    <input type="radio" data-iquestion="{{ $itemP6->number_for_exam }}"
                                        data-question="{{ $itemP6->id }}" name="answer[{{ $itemP6->id }}]"
                                        value="C">
                                    <strong>C</strong> <span id="tapescript_answer_C" class="answer_content">
                                        {{ $itemP6->answer_c }}
                                    </span>
                                </label>
                                <label class="question-label" id="test_answer_label_D">
                                    <input type="radio" data-iquestion="{{ $itemP6->number_for_exam }}"
                                        data-question="{{ $itemP6->id }}" name="answer[{{ $itemP6->id }}]"
                                        value="D">
                                    <strong>D</strong> <span id="tapescript_answer_D" class="answer_content">
                                        {{ $itemP6->answer_d }}
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @php
        $currentPage++;
    @endphp
@endfor


{{-- ************************************************************************ --}}

{{--         /***/             PART 7    2 Question             /***/         --}}

{{-- ************************************************************************ --}}

@for ($i = 0; $i < 8; $i += 2)
    <div data-part='7' class="question fullest_page_{{ $currentPage }}" data-page="{{ $currentPage }}">
        <p class="lead">
            Read the passage and choose the correct answer:
        </p>
        <div class="row">
            @foreach ($listQuestionP7_2->slice($i, 2) as $itemP7_2)
                <div class="col-5">
                    @if ($itemP7_2->image)
                        <img src="{{ $itemP7_2->image }}"
                            alt="Part 1: Question {{ $itemP7_2->number_for_exam }}" width="100%">
                    @endif
                    @if ($itemP7_2->paragraph)
                        <div class="mt-4" style="max-width: 100%;max-height: 100%;">
                            {!! $itemP7_2->paragraph !!}
                        </div>
                    @endif
                </div>
                <div class="col-7 mb-2">
                    <div class="myquestionarea">
                        <div id="testing_answer_{{ $itemP7_2->id }}_{{ $itemP7_2->number_for_exam }}">
                            <p><b>Question {{ $itemP7_2->number_for_exam }}:
                                    {{ $itemP7_2->question }}
                                </b></p>
                                <p>{{ $itemP7_2->question_name }}</p>
                            <div class="d-flex justify-content-center flex-wrap">
                                <label class="question-label" id="test_answer_label_A">
                                    <input type="radio" data-iquestion="{{ $itemP7_2->number_for_exam }}"
                                        data-question="{{ $itemP7_2->id }}" name="answer[{{ $itemP7_2->id }}]"
                                        value="A">
                                    <strong>A</strong> <span id="tapescript_answer_A" class="answer_content">
                                        {{ $itemP7_2->answer_a }}
                                    </span>
                                </label>
                                <label class="question-label" id="test_answer_label_B">
                                    <input type="radio" data-iquestion="{{ $itemP7_2->number_for_exam }}"
                                        data-question="{{ $itemP7_2->id }}" name="answer[{{ $itemP7_2->id }}]"
                                        value="B">
                                    <strong>B</strong> <span id="tapescript_answer_B" class="answer_content">
                                        {{ $itemP7_2->answer_b }}
                                    </span>
                                </label>
                                <label class="question-label" id="test_answer_label_C">
                                    <input type="radio" data-iquestion="{{ $itemP7_2->number_for_exam }}"
                                        data-question="{{ $itemP7_2->id }}" name="answer[{{ $itemP7_2->id }}]"
                                        value="C">
                                    <strong>C</strong> <span id="tapescript_answer_C" class="answer_content">
                                        {{ $itemP7_2->answer_c }}
                                    </span>
                                </label>
                                <label class="question-label" id="test_answer_label_D">
                                    <input type="radio" data-iquestion="{{ $itemP7_2->number_for_exam }}"
                                        data-question="{{ $itemP7_2->id }}" name="answer[{{ $itemP7_2->id }}]"
                                        value="D">
                                    <strong>D</strong> <span id="tapescript_answer_D" class="answer_content">
                                        {{ $itemP7_2->answer_d }}
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @php
        $currentPage++;
    @endphp
@endfor

{{-- ************************************************************************ --}}

{{--         /***/             PART 7    3 Question             /***/         --}}

{{-- ************************************************************************ --}}

@for ($i = 0; $i < 9; $i += 3)
    <div data-part='7' class="question fullest_page_{{ $currentPage }}" data-page="{{ $currentPage }}">
        <p class="lead">
            Read the passage and choose the correct answer:
        </p>
        <div class="row">
            @foreach ($listQuestionP7_3->slice($i, 3) as $itemP7_3)
                @if ($itemP7_3->image)
                    <div class="col-5">
                        <img src="{{ $itemP7_3->image }}"
                            alt="Part 1: Question {{ $itemP7_3->number_for_exam }}" width="100%">
                    </div>
                @elseif ($itemP7_3->paragraph)
                    <div class="col-5">
                        <div class="mt-4" style="max-width: 100%;max-height: 100%;">
                            {!! $itemP7_3->paragraph !!}
                        </div>
                    </div>
                @else
                    <div class="col-5">
                    </div>
                @endif
                <div class="col-7 mb-2">
                    <div class="myquestionarea">
                        <div id="testing_answer_{{ $itemP7_3->id }}_{{ $itemP7_3->number_for_exam }}">
                            <p><b>Question {{ $itemP7_3->number_for_exam }}:
                                    {{ $itemP7_3->question }}
                                </b></p>
                            <div class="d-flex justify-content-center flex-wrap">
                                <label class="question-label" id="test_answer_label_A">
                                    <input type="radio" data-iquestion="{{ $itemP7_3->number_for_exam }}"
                                        data-question="{{ $itemP7_3->id }}" name="answer[{{ $itemP7_3->id }}]"
                                        value="A">
                                    <strong>A</strong> <span id="tapescript_answer_A" class="answer_content">
                                        {{ $itemP7_3->option_1 }}
                                    </span>
                                </label>
                                <label class="question-label" id="test_answer_label_B">
                                    <input type="radio" data-iquestion="{{ $itemP7_3->number_for_exam }}"
                                        data-question="{{ $itemP7_3->id }}" name="answer[{{ $itemP7_3->id }}]"
                                        value="B">
                                    <strong>B</strong> <span id="tapescript_answer_B" class="answer_content">
                                        {{ $itemP7_3->option_2 }}
                                    </span>
                                </label>
                                <label class="question-label" id="test_answer_label_C">
                                    <input type="radio" data-iquestion="{{ $itemP7_3->number_for_exam }}"
                                        data-question="{{ $itemP7_3->id }}" name="answer[{{ $itemP7_3->id }}]"
                                        value="C">
                                    <strong>C</strong> <span id="tapescript_answer_C" class="answer_content">
                                        {{ $itemP7_3->option_3 }}
                                    </span>
                                </label>
                                <label class="question-label" id="test_answer_label_D">
                                    <input type="radio" data-iquestion="{{ $itemP7_3->number_for_exam }}"
                                        data-question="{{ $itemP7_3->id }}" name="answer[{{ $itemP7_3->id }}]"
                                        value="D">
                                    <strong>D</strong> <span id="tapescript_answer_D" class="answer_content">
                                        {{ $itemP7_3->option_4 }}
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @php
        $currentPage++;
    @endphp
@endfor

{{-- ************************************************************************ --}}

{{--         /***/             PART 7    4 Question             /***/         --}}

{{-- ************************************************************************ --}}

@for ($i = 0; $i < 12; $i += 4)
    <div data-part='7' class="question fullest_page_{{ $currentPage }}" data-page="{{ $currentPage }}">
        <p class="lead">
            Read the passage and choose the correct answer:
        </p>
        <div class="row">
            @foreach ($listQuestionP7_4->slice($i, 4) as $itemP7_4)
                @if ($itemP7_4->image)
                    <div class="col-5">
                        <img src="{{ $itemP7_4->image }}"
                            alt="Part 1: Question {{ $itemP7_4->number_for_exam }}" width="100%">
                    </div>
                @elseif ($itemP7_4->paragraph)
                    <div class="col-5">
                        <div class="mt-4" style="max-width: 100%;max-height: 100%;">
                            {!! $itemP7_4->paragraph !!}
                        </div>
                    </div>
                @else
                    <div class="col-5">
                    </div>
                @endif
                <div class="col-7 mb-2">
                    <div class="myquestionarea">
                        <div id="testing_answer_{{ $itemP7_4->id }}_{{ $itemP7_4->number_for_exam }}">
                            <p><b>Question {{ $itemP7_4->number_for_exam }}:
                                    {{ $itemP7_4->question }}
                                </b></p>
                            <div class="d-flex justify-content-center flex-wrap">
                                <label class="question-label" id="test_answer_label_A">
                                    <input type="radio" data-iquestion="{{ $itemP7_4->number_for_exam }}"
                                        data-question="{{ $itemP7_4->id }}" name="answer[{{ $itemP7_4->id }}]"
                                        value="A">
                                    <strong>A</strong> <span id="tapescript_answer_A" class="answer_content">
                                        {{ $itemP7_4->option_1 }}
                                    </span>
                                </label>
                                <label class="question-label" id="test_answer_label_B">
                                    <input type="radio" data-iquestion="{{ $itemP7_4->number_for_exam }}"
                                        data-question="{{ $itemP7_4->id }}" name="answer[{{ $itemP7_4->id }}]"
                                        value="B">
                                    <strong>B</strong> <span id="tapescript_answer_B" class="answer_content">
                                        {{ $itemP7_4->option_2 }}
                                    </span>
                                </label>
                                <label class="question-label" id="test_answer_label_C">
                                    <input type="radio" data-iquestion="{{ $itemP7_4->number_for_exam }}"
                                        data-question="{{ $itemP7_4->id }}" name="answer[{{ $itemP7_4->id }}]"
                                        value="C">
                                    <strong>C</strong> <span id="tapescript_answer_C" class="answer_content">
                                        {{ $itemP7_4->option_3 }}
                                    </span>
                                </label>
                                <label class="question-label" id="test_answer_label_D">
                                    <input type="radio" data-iquestion="{{ $itemP7_4->number_for_exam }}"
                                        data-question="{{ $itemP7_4->id }}" name="answer[{{ $itemP7_4->id }}]"
                                        value="D">
                                    <strong>D</strong> <span id="tapescript_answer_D" class="answer_content">
                                        {{ $itemP7_4->option_4 }}
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @php
        $currentPage++;
    @endphp
@endfor


{{-- ************************************************************************ --}}

{{--         /***/             PART 7    5 Question             /***/         --}}

{{-- ************************************************************************ --}}

@for ($i = 0; $i < 25; $i += 5)
    <div data-part='7' class="question fullest_page_{{ $currentPage }}" data-page="{{ $currentPage }}">
        <p class="lead">
            Read the passage and choose the correct answer:
        </p>
        <div class="row">
            @foreach ($listQuestionP7_5->slice($i, 5) as $itemP7_5)
                @if ($itemP7_5->image)
                    <div class="col-5">
                        <img src="{{ $itemP7_5->image }}"
                            alt="Part 1: Question {{ $itemP7_5->number_for_exam }}" width="100%">
                    </div>
                @elseif ($itemP7_5->paragraph)
                    <div class="col-5">
                        <div class="mt-4" style="max-width: 100%;max-height: 100%;">
                            {!! $itemP7_5->paragraph !!}
                        </div>
                    </div>
                @else
                    <div class="col-5">
                    </div>
                @endif
                <div class="col-7 mb-2">
                    <div class="myquestionarea">
                        <div id="testing_answer_{{ $itemP7_5->id }}_{{ $itemP7_5->number_for_exam }}">
                            <p><b>Question {{ $itemP7_5->number_for_exam }}:
                                    {{ $itemP7_5->question }}
                                </b></p>
                            <div class="d-flex justify-content-center flex-wrap">
                                <label class="question-label" id="test_answer_label_A">
                                    <input type="radio" data-iquestion="{{ $itemP7_5->number_for_exam }}"
                                        data-question="{{ $itemP7_5->id }}" name="answer[{{ $itemP7_5->id }}]"
                                        value="A">
                                    <strong>A</strong> <span id="tapescript_answer_A" class="answer_content">
                                        {{ $itemP7_5->option_1 }}
                                    </span>
                                </label>
                                <label class="question-label" id="test_answer_label_B">
                                    <input type="radio" data-iquestion="{{ $itemP7_5->number_for_exam }}"
                                        data-question="{{ $itemP7_5->id }}" name="answer[{{ $itemP7_5->id }}]"
                                        value="B">
                                    <strong>B</strong> <span id="tapescript_answer_B" class="answer_content">
                                        {{ $itemP7_5->option_2 }}
                                    </span>
                                </label>
                                <label class="question-label" id="test_answer_label_C">
                                    <input type="radio" data-iquestion="{{ $itemP7_5->number_for_exam }}"
                                        data-question="{{ $itemP7_5->id }}" name="answer[{{ $itemP7_5->id }}]"
                                        value="C">
                                    <strong>C</strong> <span id="tapescript_answer_C" class="answer_content">
                                        {{ $itemP7_5->option_3 }}
                                    </span>
                                </label>
                                <label class="question-label" id="test_answer_label_D">
                                    <input type="radio" data-iquestion="{{ $itemP7_5->number_for_exam }}"
                                        data-question="{{ $itemP7_5->id }}" name="answer[{{ $itemP7_5->id }}]"
                                        value="D">
                                    <strong>D</strong> <span id="tapescript_answer_D" class="answer_content">
                                        {{ $itemP7_5->option_4 }}
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @php
        $currentPage++;
    @endphp
@endfor
