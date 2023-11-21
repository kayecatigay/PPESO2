@extends('layouts.addefault')

@section('maincontent')        
    <div class="col-lg-12 mt-5 mt-lg-0" >

        <form action="sendeNotifMail" method="get" >
        @csrf <!-- Add CSRF token field -->
        <div class="row">
            <div class="col-md-6 form-group">
            <input type="text" name="name" readonly class="form-control" id="name" value="{{ $eData[0]->name}}" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
            <!-- <input type="email" class="form-control"  name="email" id="email" required> -->
            <input type="email" class="form-control"  readonly name="email" id="email" value="{{ $eData[0]->email}}" required>
            </div>
        </div>
        <div class="row">
            <div class="col-3 form-group mt-3">
                <input type="hidden" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                <select class="form-control" name="subject" id="subjectSelect">
                    <option value="" disabled selected >Select Subject</option>
                    <option value="Interview">Interview</option>
                </select>
            </div>
            <div class="col-6 form-group mt-3">
                <input type="text" class="form-control" name="location" id="location" placeholder="Location" required>
            </div>
            <div class="col-3 form-group mt-3">
                <input type="datetime-local" class="form-control" name="datetime" id="datetime" required>
            </div>
        </div>
        <div class="form-group mt-3">
            <textarea class="form-control" id="message" name="message" rows="5" placeholder="Message" required></textarea>
        </div>
        
        <div class="text-center"><input type="submit"></div>
        </form>

    </div>
    
<script>
    // const loc = "location"; 
    // Get a reference to the select element
    const subjectSelect = document.getElementById("subjectSelect");

    // Get a reference to the message element
    const messageElement = document.getElementById("message");

    // Add an event listener to the select element
    subjectSelect.addEventListener("change", function () {
        // Get the selected value
        const selectedValue = subjectSelect.value;

        // Display a message based on the selected value
         if (selectedValue === "Interview") {
            messageElement.textContent = "You are required to comply in an interview regarding your application in this program. Please bring atleast 3 copies of your resume, pen and paper and a list of references.";
            
        } else {
            messageElement.textContent = ""; // Clear the message if no option is selected
        }
    });
</script>
@endsection