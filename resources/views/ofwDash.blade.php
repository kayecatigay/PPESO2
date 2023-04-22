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
                        <div class="col">Birthday</div>
                        <div class="col">Age</div>
                        <div class="col">Sex</div>
                        <div class="col">Contact Number</div>
                        <div class="col">Address</div>
                        <div class="col">Passport Number</div>
                        <div class="col">Email Address</div>
                        <div class="col">Facebook</div>
                        </div> <br>
                     <div class="row">
                     
                     @foreach ($data as $ofw)
                        <div class="col">{{ $ofw->name }}</div>
                        <div class="col">{{ $ofw->birthday }}</div>
                        <div class="col">{{ $ofw->age }}</div>
                        <div class="col">{{ $ofw->sex }}</div>
                        <div class="col">{{ $ofw->contactnum }}</div>
                        <div class="col">{{ $ofw->address }}</div>
                        <div class="col">{{ $ofw->passnum }}</div>
                        <div class="col">{{ $ofw->emailadd }}</div>
                        <div class="col">{{ $ofw->fbacc }}</div>
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
                        <div class="col">{{ $ofw->sex }}</div>
                        <div class="col">{{ $ofw->name }}</div>
                        <div class="col">{{ $ofw->emailadd }}</div>
                        <div class="col">{{ $ofw->contactnum }}</div>
                        <div class="col">{{ $ofw->birthday }}</div>
                     </div>
                  </div>
               </div>
         </div>
      </div>
@endsection

<!-- End of Page Wrapper -->
