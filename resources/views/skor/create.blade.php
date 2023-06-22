@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Input Skor Pertandingan') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('skor.store') }}" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="home_club_id" class="col-md-4 col-form-label text-md-right">Klub Tuan Rumah</label>

                            <div class="col-md-6">
                                <select name="home_club_id" id="home_club_id" class="form-control" required>
                                    <option value="">Pilih Klub</option>
                                    @foreach ($klubs as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                                @error('home_club_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                          
                        </div>

                        <div class="form-group row">
                            <label for="away_club_id" class="col-md-4 col-form-label text-md-right">Klub Tamu</label>

                            <div class="col-md-6">
                                <select name="away_club_id" id="away_club_id" class="form-control" required>
                                    <option value="">Pilih Klub</option>
                                        @foreach ($klubs as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                    @error('away_club_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                          
                        </div>

                        <div class="form-group row">
                            <label for="score1" class="col-md-4 col-form-label text-md-right">{{ __('Score Tuan Rumah') }}</label>

                            <div class="col-md-6">
                                <input type="number" name="home_score" id="home_score" class="form-control" required>
                                @error('home_score')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                          
                        </div>

                        <div class="form-group row">
                            <label for="score2" class="col-md-4 col-form-label text-md-right">{{ __('Score Tamu') }}</label>

                            <div class="col-md-6">
                                <input type="number" name="away_score" id="away_score" class="form-control" required>
                                @error('away_score')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                          
                        </div>
                       

                      
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                               <a href="{{ route('skor.create.mult') }}" class="btn btn-primary btn-sm">Input skor pertandingan banyak</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        $('.klubs_ids').select2();
    })
</script>
@endpush



