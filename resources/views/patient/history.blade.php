@extends('patient.layout')

@section('content')
    <div class="container-fluid red-background size signin-section donor-history">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-12">
                <h2 class="h2 text-center mb-5">History Page ({{ count($history) }})</h2>
                @php
                    $data = 0;
                    $i = 1;
                @endphp
                <table class="table table-bordered table-striped">
                    @foreach ($history as $record)
                        @php
                            $data += 1;
                        @endphp
                        <tr>
                            <th>No</th>
                            <th>Hospital</th>
                            <th>Donor</th>
                            <th>Donated Date</th>
                        </tr>
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $record->hospital_name }}</td>
                            <td>{{ $record->donor_name }}</td>
                            <td>{{ \Carbon\Carbon::parse($record->created_at)->toDateString() }}</td>
                        </tr>
                    @endforeach
                    @if ($data == 0)
                        <tr>
                            <td>No Donation Record Found!</td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection
