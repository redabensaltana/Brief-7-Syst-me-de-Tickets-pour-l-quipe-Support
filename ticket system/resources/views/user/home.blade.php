<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.css" integrity="sha512-E+53kXnJyuZFSz75xSmTfCpUNj3gp9Bd80TeQQMTPJTVWDRHPOpEYczGwWtsZXvaiz27cqvhdH8U+g/NMYua3A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    </head>
    <body style="background-color: rgb(240, 240, 240);height:100%;">
        
        <nav class="navbar is-black px-6">
            <div class="is-size-4 m-2 is-flex">
              <img style="height: 3rem" src="{{ asset('img/1NHTWy1Awh3Vpt-mztoP.png')}}" alt="">
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
        
        <section class="content">
            <div class="container is-flex is-justify-content-center" style="position: sticky;top: 0px;z-index : 9;">
                
                     <a class="button is-primary is-large is-rounded my-6" style="border: 5px solid rgb(255, 255, 255)" href="{{ route('user.add_ticket') }}">add ticket</a>
                
            </div>
            
            <div class="container is-max-desktop">
        
                @foreach ($tickets as $ticket)
                    <div class="card mb-6 has-background-white-ter">
                        <header class="card-header">
                        <p class="card-header-title">
                            ticket {{ $ticket->id }}
                        </p>
                        </header>
                        <div class="card-content">
                        <div class="content">
                            <h5>{{ $ticket->title }}</h5>
                            <p>{{ $ticket->content }}</p>
                            <br>
                            <time>{{ $ticket->created_at }}</time>
                        </div>
                        </div>
                        <footer class="card-footer">
                        <a href="#" class="card-footer-item">set as solved</a>
                        <a href="#" class="card-footer-item">add answer</a>
                        </footer>
                    </div>
                @endforeach
        
            </div>
        
        </section>
    
    </body>
</html>