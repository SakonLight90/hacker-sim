@extends('layouts.terminal')

@section('content')
    <h2>Software installati</h2>
    @if(session('success'))
        <div class="status-bar">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="status-bar" style="color:#ff3333">{{ session('error') }}</div>
    @endif
    <table>
        <tr>
            <th>Software</th>
            <th>Livello</th>
            <th>Punteggio Bonus</th>
            <th>Azione</th>
        </tr>
        @foreach($software as $sw)
            <tr>
                <td>{{ ucfirst($sw->type) }}</td>
                <td>{{ $sw->level }}</td>
                <td>
                    @php
                        $bonus = [
                            'sdk' => 5,
                            'spam' => 5,
                            'adware' => 4,
                            'firewall' => 3,
                            'antivirus' => 3,
                            'ip_spoofer' => 3,
                            'scanner' => 3,
                        ];
                    @endphp
                    +{{ $bonus[$sw->type] * $sw->level }}
                </td>
                <td>
                    <form method="POST" action="{{ route('software.upgrade', $sw->type) }}">
                        @csrf
                        <button type="submit">Upgrade ({{ $sw->level * 1000 }} $)</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
