@extends('layouts.default')
@section('content')
<style>
    .modal {
    display: none;
    position: fixed;
    bottom: 0;
    right: 0;
    height: 100%;
    opacity: 80%;
    color: black;
}

.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 10px;
    border: 1px solid #888;
    width: 20%;
    
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
input[type="file"]::file-selector-button {
  padding: 0.3em 0.4em;
  background-color: whitesmoke;
  transition: 1s;
  place-items: center;
  border-radius: 0.2em;
  border-color: none;
}

input[type="file"]::file-selector-button:hover {
  background-color: black;
  color: white;
}

</style>
    <section style="background-color: #0000; ">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-9 col-xl-9">
                <div class="card">
                    <div class="rounded-top text-white d-flex flex-row" style="background-image: url('/assets/images/bg.jpg'); height:200px;">
                        <div class="col" style="width: 200px; margin-top: 120px;">
                           <div class="mt-auto mb-auto" style="width: 150px;">
                                <input type="text" readonly style="background-color: transparent; border:0; color:white; font-size: 30px;"
                                    name="uname" id="uname" value= " &nbsp;{{ Auth::user()->name }}" > <br>
                                <input type="text"  readonly style="background-color: transparent; border:0; margin-left:0; width:160%; color:white; font-size: 15px;"
                                    name="email" id="email" value=" &emsp;{{ Auth::user()->email }}" >
                            </div>
                        </div>
                        <div class="col" style="width: 120px; margin-left: 550px; margin-top: 80px;">
                            <!-- <img width="80%" height="80%" style="border-radius: 50%;" src="{{ asset('assets/images/user2.jpg') }}" alt="Photo" onclick="openModal()"> -->
                            <img width="80%" height="80%" style="border-radius: 50%;"
                            src="{{ url('uploads/ . $pic[0]->filename') }}" alt="Photo" onclick="openModal()">
                        </div>

                        <!-- The Modal -->
                        <div id="myModal" class="modal">
                            <div class="modal-content">
                                <span class="close" onclick="closeModal()">&times;</span>
                                <form method="POST" action="/uploadpPic" enctype="multipart/form-data">
                                    @csrf
                                    <label for="file">Profile Picture</label>
                                    <input type="file" name="file" required>
                                    <input type="hidden" id="userid" name="userid" value="{{ Auth::user()->id }}"> <br>
                                    <button type="submit" class="btn btn-outline-dark">Change</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-0 text-black" style="background-color: #C1E1C1;">
                    <div class="d-flex">
                       <form action ="AddProfile" method="get">
                            <input type="hidden" id="userid" name="userid" value="{{ Auth::user()->id }}">
                            <input type="submit" class="btn btn-outline-dark" value="Edit Profile" name="submit" 
                            data-mdb-ripple-color="dark" style="padding: 0px 20px; margin-left:10px; margin-bottom:10px; margin-top: 10px;">
                        </form>
                    </div>
                </div>
                <div class="card-body p-4 text-black ">
                    <div class="mb-5 ">
                        <h2 class="lead fw-normal mb-1" style="text-align:center;"><b class="fs-4">AVAILABLE SERVICES</b></h2>
                        <div class="p-1" style="background-color: #f8f9fa;">
                            <div class="row">
                                <div class="col">
                                    <a href="scholarhomepage"><p class="font-italic mb-1 text-black">PEAP</p></a>
                                </div>
                                <div class="col">
                                    <a href="employmenthomepage"><p class="font-italic mb-1 text-black">Employment</p></a>
                                </div>
                                <div class="col">
                                    <a href="ofwhomepage"><p class="font-italic mb-1 text-black">Ofw Assistance Program</p></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<script>
    function openModal() {
    document.getElementById("myModal").style.display = "block";
}

function closeModal() {
    document.getElementById("myModal").style.display = "none";
}

// Close the modal if the user clicks outside of it
window.onclick = function (event) {
    var modal = document.getElementById("myModal");
    if (event.target == modal) {
        modal.style.display = "none";
    }
};

</script>
@endsection

