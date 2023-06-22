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

                    <form action="{{ route('skor.store.multiple') }}" method="POST">
                        @csrf

                        <div id="score-fields">
                            <div class="score-field">
                                <div class="form-group">
                                    <label for="home_club_1">Klub 1</label>
                                    <select name="home_club[]" class="form-control" required>
                                        <option value="">Pilih Klub</option>
                                        @foreach($clubs as $club)
                                            <option value="{{ $club->id }}">{{ $club->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
            
                                <div class="form-group">
                                    <label for="away_club_1">Klub 2</label>
                                    <select name="away_club[]" class="form-control" required>
                                        <option value="">Pilih Klub</option>
                                        @foreach($clubs as $club)
                                            <option value="{{ $club->id }}">{{ $club->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
            
                                <div class="form-group">
                                    <label for="home_score_1">Skor Klub 1</label>
                                    <input type="number" name="home_score[]" class="form-control" required>
                                </div>
            
                                <div class="form-group">
                                    <label for="away_score_1">Skor Klub 2</label>
                                    <input type="number" name="away_score[]" class="form-control" required>
                                </div>
                            </div>
                        </div>
            
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" id="add-score-field">Tambah Pertandingan</button>
                        </div>
            
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                        <div class="form-group">
                            <a href="{{ route('skor.create') }}" class="btn btn-sm btn-danger">Kembali ke input satu / satu</a>
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
    $(document).ready(function() {
            let counter = 1;

            // Tambahkan field pertandingan baru
            $('#add-score-field').click(function() {
                counter++;
                let newField = `
                    <div class="score-field">
                        <div class="form-group">
                            <label for="home_club_${counter}">Klub 1</label>
                            <select name="home_club[]" class="form-control" required>
                                <option value="">Pilih Klub</option>
                                @foreach($clubs as $club)
                                    <option value="{{ $club->id }}">{{ $club->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="away_club_${counter}">Klub 2</label>
                            <select name="away_club[]" class="form-control" required>
                                <option value="">Pilih Klub</option>
                                @foreach($clubs as $club)
                                    <option value="{{ $club->id }}">{{ $club->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="home_score_${counter}">Skor Klub 1</label>
                            <input type="number" name="home_score[]" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="away_score_${counter}">Skor Klub 2</label>
                            <input type="number" name="away_score[]" class="form-control" required>
                        </div>
                    </div>
                `;

                $('#score-fields').append(newField);
            });
        });
</script>
@endpush



