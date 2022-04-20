<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
{{-- <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    @if (Session::has('error'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{ session::get('error')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif --}}

<form action="{{route('admin.login')}}" method="post">
 @csrf

      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
              <div class="card-body p-5">

                <h3 class="mb-5">Login</h3>

                <div class="form-outline mb-4">
                  <label class="form-label" for="email">Email</label>
                  <input type="text" id="email" class="form-control form-control-lg" name="email" />
                </div>

                <div class="form-outline mb-5">
                  <label class="form-label" for="password">Password</label>
                  <input type="password" id="password" class="form-control form-control-lg" name="password" />
                </div>
                <div class="d-flex flex-column">
                  <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>

                  {{-- <a href="" class="mb-0 mt-4">register here</a> --}}

                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

  </form>