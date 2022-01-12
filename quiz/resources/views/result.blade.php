@extends('layouts.main')
@section('content')
    <main>
        <div class="circle"></div>

        <div class="container ctr">
            <h2>Your result:</h2>
            <h1>{{ $result*100 }}%</h1>
            <div class="form-buttons">
                <a href="{{ route('quiz') }}" class="button">Try again</a>
            </div>
        </div>
    </main>
@endsection

