@extends('layouts.terminal')

@section('content')
    <h2>Software installati</h2>
    <table>
        <tr>
            <th>Software</th>
            <th>Livello</th>
            <th>Azione</th>
        </tr>
        @foreach($software as $sw)
            <tr>
                <td>{{ ucfirst($sw->type) }}</td>
                <td>{{ $sw->level }}</td>
                <td>
                    <form method="POST" action="{{ route('software.upgrade', $sw->type) }}">
                        @csrf
                        <button type="submit">Upgrade</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
