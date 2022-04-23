<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ticket - answers</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.css" integrity="sha512-E+53kXnJyuZFSz75xSmTfCpUNj3gp9Bd80TeQQMTPJTVWDRHPOpEYczGwWtsZXvaiz27cqvhdH8U+g/NMYua3A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
</head>
<body>
    <nav class="navbar is-black px-6">
        <div class="is-size-4 m-2 is-flex">
            <a href="{{ route('user.home') }}" style="font-size: 0">
                <img style="height: 3rem" src="{{ asset('img/1NHTWy1Awh3Vpt-mztoP.png')}}" alt="">
            </a>
        </div>
      
        <div class="navbar-menu">
            <div class="navbar-end">
                <div class="navbar-item has-dropdown is-hoverable">
                    <i class="fa-solid fa-circle has-text-success navbar-item is-size-7 px-0"></i>
                    <a class="navbar-link pl-2">{{ auth()->user()->name }}</a>
                    <div class="navbar-dropdown">
                            <a class="navbar-item" href="{{ route('logout') }}">logout<i class="fas fa-sign-out-alt ml-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <section class="container is-justify-content-center is-max-desktop">
        <div class="mt-6">

            <div class="card">
                <div class="card-header-title">
                    {{$ticket->title}}
                </div>
                <div class="card-content">
                  <div class="content">
                    {{$ticket->content}}
                  </div>
                </div>
            </div>

            <div class="content mt-6">
                
                @foreach ($answers as $answer)
                    
                @if ($answer->is_admin == 'true')
                <p>
                    <strong>Support</strong>
                    <br>
                    {{ $answer->content }}
                  </p>
                  <hr>
                @else
                <p>
                    <strong>{{ auth()->user()->name }}</strong>
                    <br>
                    {{ $answer->content }}
                  </p>
                  <hr>
                @endif
                

                @endforeach

                {{-- Answering part --}}
                <div class="media-content">
                    <form action="{{ route('user.add_answer_db') }}" method="post">
                        @csrf
                        <div class="field">

                            <p class="control">
                                Answer
                                <textarea name="content" class="textarea" placeholder="Add an answer..."></textarea>
                                <input name="ticket_id" type="hidden" value="{{ $ticket->id }}">
                            </p>
                        </div>
                        <div class="level-left">
                            <div class="level-item">
                                <button type="submit" class="button is-info">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        
    </section>

</body>
</html>