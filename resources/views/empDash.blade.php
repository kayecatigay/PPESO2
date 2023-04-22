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
                        <div class="col">Position Desired</div>
                        <div class="col">Name</div>
                        <div class="col">Gender</div>
                        <div class="col">Address</div>
                        <div class="col">Telephone number</div>
                        <div class="col">Cellphone number</div>
                        <div class="col">Email Address</div>
                        <div class="col">Birthday</div>
                        <div class="col">Civil Status</div>
                        <div class="col">Spouse</div>
                        <div class="col">Weight</div>
                        <div class="col">Height</div>
                        <div class="col">Religion</div>
                        <div class="col">Language</div>
                        <div class="col">Elementary School</div>
                        <div class="col">High School</div>
                        <div class="col">College</div>
                        <div class="col">Degree</div>
                        <div class="col">Company name</div>
                        <div class="col">Company Position</div>
                        <div class="col">Character Reference Name</div>
                        <div class="col">Characted Reference Company</div>
                        <div class="col">Characted Reference Position</div>
                        <div class="col">Characted Reference Contactnum</div>
                     </div> <br>
                     <div class="row">
                     @foreach ($employee as $emp)
                        <div class="col">{{ $emp->posidesired }}</div>
                        <div class="col">{{ $emp->name }}</div>
                        <div class="col">{{ $emp->gender }}</div>
                        <div class="col">{{ $emp->address }}</div>
                        <div class="col">{{ $emp->telephone }}</div>
                        <div class="col">{{ $emp->cellphone }}</div>
                        <div class="col">{{ $emp->emailadd }}</div>
                        <div class="col">{{ $emp->birthday }}</div>
                        <div class="col">{{ $emp->Cstatus }}</div>
                        <div class="col">{{ $emp->spouse }}</div>
                        <div class="col">{{ $emp->height }}</div>
                        <div class="col">{{ $emp->weight }}</div>
                        <div class="col">{{ $emp->religion }}</div>
                        <div class="col">{{ $emp->language }}</div>
                        <div class="col">{{ $emp->elem }}</div>
                        <div class="col">{{ $emp->hschool }}</div>
                        <div class="col">{{ $emp->college }}</div>
                        <div class="col">{{ $emp->degree }}</div>
                        <div class="col">{{ $emp->cname }}</div>
                        <div class="col">{{ $emp->position }}</div>
                        <div class="col">{{ $emp->crname }}</div>
                        <div class="col">{{ $emp->crcompany }}</div>
                        <div class="col">{{ $emp->crposition }}</div>
                        <div class="col">{{ $emp->crcontact }}</div>
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
                        <div class="col">{{ $emp->address }}</div>
                        <div class="col">{{ $emp->name }}</div>
                        <div class="col">{{ $emp->emailadd }}</div>
                        <div class="col">{{ $emp->posidesired }}</div>
                        <div class="col">{{ $emp->birthday }}</div>
                     </div>
                  </div>
               </div>
         </div>
      </div>
@endsection

<!-- End of Page Wrapper -->
