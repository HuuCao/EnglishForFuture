@php
    $page = 0;
@endphp

{{-- PART 1 PART 2 --}}

@for ($i = 1; $i <= 31; $i++)
    <div class="numberCircle" id="question{{ $i }}" data-iquestion="{{ $i }}"
        data-page="{{ ++$page }}">
        <a href="javascript:void(0)" class="text-dark">
            {{ $i }}
        </a>
    </div>
@endfor

{{-- PART 3 PART 4 --}}
@for ($i = 32; $i <= 100; $i++)
    <div class="numberCircle" id="question{{ $i }}" data-iquestion="{{ $i }}"
        data-page="{{ $i % 3 == 2 ? ++$page : $page }}">
        <a href="javascript:void(0)" class="text-dark">
            {{ $i }}
        </a>
    </div>
@endfor

{{-- PART 5  --}}
@for ($i = 101; $i <= 130; $i++)
    <div class="numberCircle" id="question{{ $i }}" data-iquestion="{{ $i }}"
        data-page="{{ ++$page }}">
        <a href="javascript:void(0)" class="text-dark">
            {{ $i }}
        </a>
    </div>
@endfor

{{-- PART 6  --}}
@for ($i = 131; $i <= 146; $i++)
    <div class="numberCircle" id="question{{ $i }}" data-iquestion="{{ $i }}"
        data-page="{{ $i % 4 == 3 ? ++$page : $page }}">
        <a href="javascript:void(0)" class="text-dark">
            {{ $i }}
        </a>
    </div>
@endfor

{{-- PART 7_2  --}}
@for ($i = 147; $i <= 154; $i++)
    <div class="numberCircle" id="question{{ $i }}" data-iquestion="{{ $i }}"
        data-page="{{ $i % 2 == 1 ? ++$page : $page }}">
        <a href="javascript:void(0)" class="text-dark">
            {{ $i }}
        </a>
    </div>
@endfor

{{-- PART 7_3  --}}
@for ($i = 155; $i <= 163; $i++)
    <div class="numberCircle" id="question{{ $i }}" data-iquestion="{{ $i }}"
        data-page="{{ $i % 3 == 2 ? ++$page : $page }}">
        <a href="javascript:void(0)" class="text-dark">
            {{ $i }}
        </a>
    </div>
@endfor

{{-- PART 7_4  --}}
@for ($i = 164; $i <= 175; $i++)
    <div class="numberCircle" id="question{{ $i }}" data-iquestion="{{ $i }}"
        data-page="{{ $i % 4 == 0 ? ++$page : $page }}">
        <a href="javascript:void(0)" class="text-dark">
            {{ $i }}
        </a>
    </div>
@endfor

{{-- PART 7_5  --}}
@for ($i = 176; $i <= 200; $i++)
    <div class="numberCircle" id="question{{ $i }}" data-iquestion="{{ $i }}"
        data-page="{{ $i % 5 == 1 ? ++$page : $page }}">
        <a href="javascript:void(0)" class="text-dark">
            {{ $i }}
        </a>
    </div>
@endfor
