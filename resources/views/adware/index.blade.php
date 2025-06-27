@extends('layouts.terminal')

@section('content')
    <h2>Gestione AdWare</h2>
    @if(session('success'))
        <div class="status-bar">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="status-bar" style="color:#ff3333">{{ session('error') }}</div>
    @endif

    <h3>AdWare piazzati (su altri)</h3>
    <table>
        <tr>
            <th>Bersaglio</th>
            <th>Data piazzamento</th>
        </tr>
        @foreach($planted as $ad)
            <tr>
                <td>{{ $ad->target->username }}</td>
                <td>{{ $ad->planted_at }}</td>
            </tr>
        @endforeach
    </table>
    <br>

    <h3>AdWare ricevuti (sul tuo account)</h3>
    <table>
        <tr>
            <th>Chi ha piazzato</th>
            <th>Data piazzamento</th>
            <th>Azione</th>
        </tr>
        @foreach($received as $ad)
            <tr>
                <td>{{ $ad->planter->username }}</td>
                <td>{{ $ad->planted_at }}</td>
                <td>
                    <form method="POST" action="{{ route('adware.remove', $ad->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Rimuovi</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <br>
    <h3>Piazza un nuovo AdWare</h3>
    <form method="POST" action="{{ route('adware.plant') }}">
        @csrf
        <label>Username bersaglio: <input type="text" name="target" required></label>
        <button type="submit">Piazza AdWare</button>
    </form>
@endsection
