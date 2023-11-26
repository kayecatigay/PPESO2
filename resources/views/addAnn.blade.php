@extends('layouts.addefault')

@section('maincontent')
   <form action ="/insertAnn" method="get" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
         <label for="schedId"></label>
         <input type="hidden" class="form-control" id="schedId" name="schedId"  placeholder="Enter Name">
      </div>
      
      <div class="form-group">
         <p><h4>Announcements</h4></p>
         <div class="container">      
          
            <div class="row">
               <div class="col">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" id="title" name="title" >
               </div>
               <div class="col">
                  <label for="dateFrom">Date From</label>
                  <input type="date" required class="form-control" id="dateFrom" name="dateFrom">
               </div>
               <div class="col">
                  <label for="dateTo">Date To</label>
                  <input type="date" required class="form-control" id="dateTo" name="dateTo">
               </div>
               <div class="col">
                  <input type="hidden" value="{{$srv}}" id="service" name="service">
               </div>
            </div>
            <div class="row form-group">
               <div class="col">
                  <label for="body">Description</label>
                  @php
                     $content = "Regarding in this program, all applicants are required to comply.\nPlease bring the following:\n";
                     if(Auth::user()) {
                        if(in_array(Auth::user()->roles, [1])) {
                              $content .= "\n";
                              $content .= "Report card - if incoming 1st year/Cert of Grades (1st/2nd sem) or if higher year\n";
                              $content .= "Certificate of Good Moral Character from school\n";
                              $content .= "Certificate of Residency from Barangay\n";
                              $content .= "Birth Certificate\n";
                              $content .= "Certificate of Indigency (C/MSWDO)\n";
                              $content .= "One 1x1 picture\n";
                              $content .= "Certificate proving legitimacy as Mangyan issued by tribal leader and verified by NCIP (for IPs only)\n";
                        } elseif(in_array(Auth::user()->roles, [2])) {
                              $content .= "\n";
                              $content .= "Barangay Clearance\n";
                              $content .= "NBI Clearance\n";
                        } elseif(in_array(Auth::user()->roles, [3])) {
                              $content .= "\n";
                              $content .= "Request letter addressed to the governor\n";
                              $content .= "Passport or Travel Document\n";
                              $content .= "Seaman's Book (if sea-based)\n";
                              $content .= "Proof of Being an OFW (contract, id, certification from employer)\n";
                              $content .= "Birth Certificate/Marriage Contract of Family Members (for medical concern)\n";
                        } elseif(in_array(Auth::user()->roles, [4])) {
                              $content .= "\n";
                              $content .= "Request letter addressed to the governor\n";
                              $content .= "Passport or Travel Document\n";
                              $content .= "Seaman's Book (if sea-based)\n";
                              $content .= "Proof of Being an OFW (contract, id, certification from employer)\n";
                              $content .= "Birth Certificate/Marriage Contract of Family Members (for medical concern)\n";
                        } elseif(in_array(Auth::user()->roles, [5])) {
                              $content .= "\n";
                              $content .= "PESO Educational Assistance Program (requirements)\n";
                              $content .= "Report card - if incoming 1st year/Cert of Grades (1st/2nd sem) or if higher year\n";
                              $content .= "Certificate of Good Moral Character from school\n";
                              $content .= "Certificate of Residency from Barangay\n";
                              $content .= "Birth Certificate\n";
                              $content .= "Certificate of Indigency (C/MSWDO)\n";
                              $content .= "One 1x1 picture\n";
                              $content .= "Certificate proving legitimacy as Mangyan issued by tribal leader and verified by NCIP (for IPs only)\n";
                              $content .= "\n";
                              $content .= "Employment (requirements)\n";
                              $content .= "Barangay Clearance\n";
                              $content .= "NBI Clearance\n";
                              $content .= "\n";
                              $content .= "Overseas Filipino Worker Assistance Program (requirements)\n";
                              $content .= "Request letter addressed to the governor\n";
                              $content .= "Passport or Travel Document\n";
                              $content .= "Seaman's Book (if sea-based)\n";
                              $content .= "Proof of Being an OFW (contract, id, certification from employer)\n";
                              $content .= "Birth Certificate/Marriage Contract of Family Members (for medical concern)\n";
                        } else {
                              $content .= "Sorry you are not authorized.\n";
                        }
                     } else {
                        $content .= "Sorry you are not authorized.\n";
                     }
                  @endphp

                  <textarea class="form-control" id="body" name="body">{{ $content }}</textarea>

               </div>
            </div>
            <div class="row">
               <div class="col-5">&nbsp;</div>
               <div class="col">
                  <button type="submit" style="background-color:#5F9EA0; border:none; border-radius: 4px;" value="Submit">Submit</button>
               </div>
               <div class="col">&nbsp;</div>
            </div>
         </div>
      </div>
      
   </form>  
@endsection

<!-- End of Page Wrapper -->
