@extends('layouts.main')
@section('content')
    <main>
        <div class="circle"></div>
        <div class="container">
            <h2>{{ $quiz->getTitle() }}</h2>
            <form action="{{ route('result') }}" method="post">
                @csrf
                @foreach($quiz->getQuestions() as $question)
                    <div class="elem @if ($loop->first)visible @endif">
                        <label for="{{ $question->getUUID() }}">
                            <h1 class="form-title"> {{$question->getText()}} </h1>
                        </label>

                        @foreach($question->getChoices() as $choice)
                            <div class="checkbox">
                                <input type="checkbox" class="form-check-input" id="{{ $choice->getUUID() }}"
                                       name="{{ $question->getUUID() }}[]" value="{{ $choice->getUUID() }}">
                                <label class="form-check-label" for="{{ $choice->getUUID() }}">
                                    {{ $choice->getText() }}
                                </label>
                            </div>
                        @endforeach

                    </div>
                @endforeach

                <div class="warning hidden">Please, select at least one answer</div>

                <div class="form-buttons">
                    <button type="submit" class="showresult button hidden">Show the result</button>
                    <a href="#" class="button next">Next question</a>
                    <a href="#" class="button prev hidden">Previous question</a>
                </div>
            </form>

        </div>
    </main>

    <script type="module" src="{{ url('js/main.js') }}"></script>
@endsection

