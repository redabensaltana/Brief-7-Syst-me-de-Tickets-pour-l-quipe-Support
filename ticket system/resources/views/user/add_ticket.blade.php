<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<form action="{{route('user.add_ticket_db')}}" method="post">
    @csrf
   
         <div class="container py-5 h-100">
           <div class="row d-flex justify-content-center align-items-center h-100">
             <div class="col-12 col-md-8 col-lg-6 col-xl-5">
               <div class="card shadow-2-strong" style="border-radius: 1rem;">
                 <div class="card-body p-5">
   
                   <h3 class="mb-5">add ticket</h3>
   
                   <div class="form-outline mb-4">
                     <label class="form-label" for="title">title</label>
                     <input type="text" id="title" class="form-control form-control-lg" name="title" />
                   </div>
   
                   <div class="form-outline mb-4">
                     <label class="form-label" for="content">content</label>
                     <textarea type="text" id="content" class="form-control form-control-lg" name="content"></textarea>
                   </div>

                   <div class="form-outline mb-5">
                    <label class="form-label" for="service">service</label>
                    <select id="service" class="form-control form-control-lg" name="service">
                    <option value="1">achat</option>
                    <option value="2">production</option>
                    <option value="3">logistique</option>
                    </select>
                  </div>

                   <div class="d-flex flex-column">
                     <button class="btn btn-lg btn-primary btn-block" type="submit">add</button>
   
                     {{-- <a href="" class="mb-0 mt-4">register here</a> --}}
   
                   </div>
   
                 </div>
               </div>
             </div>
           </div>
         </div>
   
     </form>