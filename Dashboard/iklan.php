<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SeconDrive</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="image\secondrive logo br 1.png" alt="Bootstrap" width="260">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Daftar Mobil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Chat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#Iklan-Saya">Iklan Saya</a>
                    </li>
                </ul>
                <div class="d-flex" style="gap: 5px;">
                    <a class="group-18 text-decoration-none" href="">
                        <div class="jual"> + Jual </div>
                    </a>
                    <a class="btn login" href="#" role="button">Login</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mt-5" id="Iklan-Saya">
        <p class="text-center text-black fs-1 fw-bold font-family-Poppins  m-0 px-3 py-2">Iklan Saya</p>
    </div>
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-5">
            <div class="col">
                <div class="card shadow-sm">
                    <img class="bd-placeholder-img card-img-top" src="image\mobil-offroad.webp"
                        style="max-height: 194px; object-fit: cover;" alt="">
                    <div class="card-body">
                        <div class=" row">
                            <p class="text-black fs-3 fw-semibold font-family-Poppins col-12 m-0 px-3 py-2">BMW M3</p>
                            <div class="col-12 row align-items-center">
                                <p class="text-secondary fs-6 fw-semibold font-family-Poppins col-5 m-0 px-3 py-2">Merk
                                    :
                                    BMW</p>
                                <p class="text-secondary fs-6 fw-semibold font-family-Poppins col-5 m-0 px-3 py-2">Tahun
                                    :
                                    2020</p>
                            </div>
                            <p class="text-black fs-4 fw-bold font-family-Poppins col-12 m-0 px-3 py-2">Rp 1.350.000.000
                            </p>
                            <p class="text-secondary fs-6 fw-semibold font-family-Poppins col-12 m-0 px-3 py-2">Lokasi :
                                Semarang</p>
                            <div class="d-flex justify-content-end align-items-end">
                                <a href=""
                                    class="text-decoration-none text-end text-black fs-6 fw-bold font-family-Poppins col-12 m-0 px-3 py-2">Lihat
                                    Detail -></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-sm px-1 py-4 bg-white rounded-3 border border-1 border-secondary-subtle d-flex align-items-center h-100 justify-content-between flex-column">
                    <div class="px-1 py-1 bg-white rounded-3 border border-1 border-primary col-10 align-items-center d-flex" style="height: 315px;">
                        <svg class="m-auto" width="67" height="67" viewBox="0 0 67 67" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.5 33.5H62.8333M33.6667 4.33333V62.6667" stroke="#000CFF" stroke-width="8"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <a href="" class="text-decoration-none py-2 bg-primary rounded-3 col-8 justify-content-center align-items-center text-center text-white fs-5 fw-bold font-family-Poppins col-9 m-0" style="background-color: #000CFF !important;" >Pasang Iklan
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container d-flex justify-content-center align-items-center mt-5 flex-column">
        <img src="image\secondrive logo br 1.png" width="260" alt="">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#Daftar-Mobil">1</a></li>
                <li class="page-item"><a class="page-link" href="#Daftar-Mobil">2</a></li>
                <li class="page-item"><a class="page-link" href="#Daftar-Mobil">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>