@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Klasemen Liga BRI') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Klub</th>
                                <th>Ma</th>
                                <th>Me</th>
                                <th>S</th>
                                <th>K</th>
                                <th>GM</th>
                                <th>GK</th>
                                <th>Point</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($klubs as $club)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $club->name }}</td>
                                <td>{{ $club->homeScores->count() + $club->awayScores->count() }}</td>
                                <td>{{ $club->homeScores->where('home_score', '>', 'away_score')->count() + $club->awayScores->where('home_score', '<', 'away_score')->count() }}</td>
                                <td>{{ $club->homeScores->where('home_score', '=', 'away_score')->count() + $club->awayScores->where('home_score', '=', 'away_score')->count() }}</td>
                                <td>{{ $club->homeScores->where('home_score', '<', 'away_score')->count() + $club->awayScores->where('home_score', '>', 'away_score')->count() }}</td>
                                <td>{{ $club->homeScores->sum('home_score') + $club->awayScores->sum('away_score') }}</td>
                                <td>{{ $club->homeScores->sum('away_score') + $club->awayScores->sum('home_score') }}</td>
                                <td>{{ $club->homeScores->where('home_score', '>', 'away_score')->count() * 3 + $club->awayScores->where('home_score', '<', 'away_score')->count() * 3 + $club->homeScores->where('home_score', '=', 'away_score')->count() + $club->awayScores->where('home_score', '=', 'away_score')->count() }}</td>
                            </tr>
                        @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
