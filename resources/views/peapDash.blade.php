@extends('layouts.addefault')

@section('maincontent')

      <div class="col-xl-16">
         <div class="card shadow mb-4">
            <div
               class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h6 class="m-0 font-weight-bold text-dark">New Application Forms</h6>
            </div>
               <!-- Card Body -->
               <div class="card-body">
                  <div class="container">
                     <div class="row ">
                        <div class="col">Name</div>
                        <div class="col">Sex</div>
                        <div class="col">Address</div>
                        <div class="col">Email Address</div>
                        <div class="col">Contact number</div>
                        <div class="col">Birth date</div>
                        <div class="col">Birth place</div>
                        <div class="col">Age</div>
                        <div class="col">Height</div>
                        <div class="col">Weight</div>
                        <div class="col">Bloodtype</div>
                        <div class="col">Religion</div>
                        <div class="col">Guardian</div>
                        <div class="col">Relation</div>
                     </div> <br>
                     <div class="row">
                     @foreach ($data as $old)
                        <div class="col">{{ $old->name }}</div>
                        <div class="col">{{ $old->sex }}</div>
                        <div class="col">{{ $old->address }}</div>
                        <div class="col">{{ $old->emailadd }}</div>
                        <div class="col">{{ $old->contactnum }}</div>
                        <div class="col">{{ $old->birthday }}</div>
                        <div class="col">{{ $old->placeofbirth }}</div>
                        <div class="col">{{ $old->age }}</div>
                        <div class="col">{{ $old->height }}</div>
                        <div class="col">{{ $old->weight }}</div>
                        <div class="col">{{ $old->bloodtype }}</div>
                        <div class="col">{{ $old->religion }}</div>
                        <div class="col">{{ $old->guardian }}</div>
                        <div class="col">{{ $old->relation }}</div>
                     @endforeach
                     </div>
                  </div>
               </div>
         </div>
      </div>

      <div class="col-xl-8 col-lg-7">
         <div class="card shadow mb-4">
               <!-- Card Header - Dropdown -->
               <div
                  class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-dark">Updated Application Forms</h6>
               </div>
               <!-- Card Body -->
               <div class="card-body">
                  <div class="container">
                     <div class="row">
                        <div class="col">Name</div>
                        <div class="col">srgsg</div>
                        <div class="col">th</div>
                        <div class="col">sth</div>
                        <div class="col">aeth</div>
                     </div>
                     <div class="row">
                        <div class="col">{{ $data[0]->address }}</div>
                        <div class="col">{{ $data[0]->name }}</div>
                        <div class="col">{{ $data[0]->emailadd }}</div>
                        <div class="col">{{ $data[0]->contactnum }}</div>
                        <div class="col">{{ $data[0]->birthday }}</div>
                     </div>
                  </div>
               </div>
         </div>
      </div>
   
@endsection

<!-- End of Page Wrapper -->
