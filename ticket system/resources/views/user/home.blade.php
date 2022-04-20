{{-- <a href="{{route("login_form")}}">dashboard</a> --}}
<h1>user home</h1>
<h3>name : {{ auth()->user()->name }}</h3>
<h3>email : {{ auth()->user()->email }}</h3>
<a href="{{ route('logout') }}"><button>logout</button></a>
<br>
<br>
<br>
<br>
@foreach ($tickets as $ticket)
    <h2>ticket {{ $ticket->id }}</h2>
    <h4>{{ $ticket->title }}</h4>
    <h4>{{ $ticket->content }}</h4>
@endforeach

