<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

<style>
    .container .popup {
        height: 50%;
        width: 52%;
        top: 180px;
        right: 380px;
        justify-content: center;
        align-items: center;
        position: absolute;
        display: none;
        z-index: 7;
    }

    .container .popup:after {
        height: 50%;
        width: 52%;
        top: 180px;
        right: 380px;
        justify-content: center;
        align-items: center;
        position: absolute;
        display: block;
        z-index: 7;
    }

    .container .popup .popupcontent {
        height: 650px;
        width: 500px;
        background: white;
        padding: 20px;
        border-radius: 5px;
        position: relative;
        border: 3px solid black;
    }

    .close-btn {
        position: absolute;
        right: 20px;
        top: 15px;
        font-size: 18px;
        cursor: pointer;
    }

    .top-container {
        width: 100vw;
        height: 83.4vh;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 15.2rem;
        padding: 0 2rem;
        overflow: hidden;
        position: absolute;
    }

    .img {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        z-index: 6;
        padding-top: 40px;
    }

    .img img {
        width: 500px;
    }

    .left-container {
        position: absolute;
        top: 45%;
        transform: translate(-50%, -50%);
        left: 70%;
        width: 50%;
        transition: 1s 0.7s ease-in-out;
        display: grid;
        grid-template-columns: 1fr;
        z-index: 5;
    }

    .left-form {
        display: flex;
        align-items: left;
        justify-content: left;
        flex-direction: column;
        padding: 0rem 5rem;
        transition: all 0.2s 0.7s;
        overflow: hidden;
        grid-column: 1 / 2;
        grid-row: 1 / 2;
    }

    .row {
        display: flex;
        align-items: left;
        justify-content: left;
        font-size: 1.1rem;
        margin-bottom: 3px;
    }

    .top-container:before {
        content: "";
        position: absolute;
        height: 1900px;
        width: 2000px;
        top: 43%;
        right: 57%;
        transform: translateY(-50%);
        background-color: #65B0BD;
        transition: 1.8s ease-in-out;
        border-radius: 10%;
        z-index: 6;
    }

    h2 {
        margin: 1px 0;
        color: #1C2833;
        font-size: 2rem;
    }

    .btn {
        background-color: blue;
        color: white;
        margin-left: 10px;
        width: 153px;
        height: 30px;
    }

    .btn:hover {
        background-color: #1988D1;
    }

    .input-box {
        margin-bottom: 2px;
        width: 650px;
        height: 40px;
    }

    .details {
        display: block;
        font-weight: 900;
        margin-bottom: 3px;
        font-size: 1rem;
    }

    .name {
        margin: 1px 0;
        color: #1C2833;
        font-size: 1.7rem;
        justify-content: flex-end;
        align-items: center;
        font-weight: 900;
        margin-bottom: 5px;
    }
</style>

<x-app-layout>

    <x-slot name="header">
        
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Visitor Request') }}
                    </h2>
               
                
               {{ Breadcrumbs::render('visitorRequest') }} 
         




    </x-slot>

    <body class="antialiased">

        <div class="top-container">
            <div class="img">
                <img src="images/bg.png">
            </div>

            <div class="forms-container">
                <div class="left-container">
                    <div class="left-form">
                        <br><br><br>

                        {{-- User Info --}}
                        <h2 class="name">Visitor Request Form</h2>
                        {{-- <div class="row">
            Name : {{ Auth::user()->fname }}
                        {{ Auth::user()->mname }}
                        {{ Auth::user()->lname }}
                    </div>
                    <div class="row">
                        Email : {{ Auth::user()->email }}
                    </div>
                    <div class="row">
                        Address : {{ Auth::user()->city }}
                    </div>
                    <div class="row">
                        Gender : {{ Auth::user()->gender }}
                    </div>
                    <div class="row">
                        Contact Number : {{ Auth::user()->contactNumber }}
                    </div> --}}


                    <form method="POST" action="{{ route('visitorRequest.post') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-4">
                            <x-jet-label for="nameOfVisitor" class="details" value="{{ __('Name of Visitor') }}" />
                            <x-jet-input id="nameOfVisitor" class="input-box" type="text" name="nameOfVisitor" :value="old('nameOfVisitor')" required />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="dateOfVisit" class="details" value="{{ __('Date of Visit') }}" />
                            <x-jet-input id="dateOfVisit" class="input-box" type="date" name="dateOfVisit" required />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="purposeOfVisit" class="details" value="{{ __('Purpose of Visit') }}" />
                            <x-jet-input id="purposeOfVisit" class="input-box" type="text" name="purposeOfVisit" :value="old('purposeOfVisit')" required />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="roomToVisit" class="details" value="{{ __('Room Number of Visit') }}" />
                            <x-jet-input id="roomToVisit" class="input-box" type="text" name="roomToVisit" :value="old('roomToVisit')" required />
                        </div>

                        <div class="flex items-center justify-center mt-4">
                            <x-jet-button class="btn" id="generate">
                                {{ __('Request Visitor') }}
                            </x-jet-button>
                        </div>
                    </form>

                </div>

                @if(session()->has('visitorcreation'))

                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Visitor Created',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>
                @endif

</x-app-layout>