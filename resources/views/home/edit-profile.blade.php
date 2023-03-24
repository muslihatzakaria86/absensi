<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ url('startmin-master/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ url('startmin-master/css/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ url('startmin-master/css/startmin.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ url('startmin-master/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            @cannot('admin')
                                <li class="breadcrumb-item"><a href="/profile/{{ auth()->user()->name }}/edit">edit
                                        profile</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="/profile">User Profile</a>
                                </li>
                            @endcannot
                            @can('admin')
                                <li class="breadcrumb-item active"><a href="/karyawan">data karyawan</a>
                                </li>
                            @endcan
                            <li class="breadcrumb-item active"><a href="/laporan">laporan</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row" style="height: 70vh; ">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="/img/PriludeStudio.jpg
                            " alt="avatar"
                                class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">Pt.Prilude Indonesia</h5>
                            <p class="text-muted mb-1">semangat mencari nafkah</p>

                            </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <form action="/profile/{{ auth()->user()->name }}" method="post">
                    @method('put')
                    @csrf
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Nama Lengkap</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" id="" class="bg-transparent"
                                            value="{{ auth()->user()->name }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" name="email" id="" class="bg-transparent"
                                            value="{{ auth()->user()->email }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Alamat</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" name="alamat" id="" class="bg-transparent"
                                            value="{{ auth()->user()->alamat }}">
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
    </section>


    <!-- jQuery -->
    <script src="{{ url('startmin-master/js/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ url('startmin-master/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ url('startmin-master/js/metisMenu.min.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ url('startmin-master/js/startmin.js') }}"></script>


</body>

</html>
