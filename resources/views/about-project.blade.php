@extends('layouts.master')
@section('containerHeader')
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>About The Project</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item active">About The Project</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">What is the QRLink Portal?</h3>
        </div>
        <div class="card-body">
            "Cuialy" is a forward-thinking tech company that has recently launched "QRLink Portal," an innovative project designed to streamline digital navigation and information sharing. This project offers a user-friendly platform for generating QR codes and shortening links, making it easier and more efficient for users to access and share online content.
            <br><br>
            The QRLink Portal stands out for its simplicity and effectiveness. Users can quickly convert long URLs into convenient QR codes or shortened links, which can then be easily shared and accessed on various digital platforms. This service is particularly useful in today's fast-paced digital environment, where quick access to information is essential.
            <br><br>
            Developed by Cuialy, a company committed to creating accessible and open-source software solutions, QRLink Portal reflects the company's dedication to enhancing the user experience in the digital world. This project is a testament to Cuialy's innovative approach to technology, offering practical, user-friendly solutions that cater to the everyday needs of individuals and businesses alike.
            <br><br>
            In summary, QRLink Portal is a prime example of Cuialy's vision to simplify and improve digital interaction, demonstrating the company's ongoing commitment to creating technologies that are both useful and accessible to a wide range of users.
        </div>
    </div>
    <br>
@endsection
