<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SeconDrive</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <style>
    table,
    th,
    td {
      border: 1px solid black;
      border-collapse: collapse;
    }
  </style>
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
    <p class="text-center text-black fs-1 fw-bold font-family-Poppins  m-0 px-3 py-2">Komparasi</p>
    <p class="text-center text-black fs-3 fw-bold font-family-Poppins  m-0 px-3 py-2">SeconDrive Perbandingan Mobil</p>
    <p class="text-center text-black fs-5 font-family-Poppins  m-0 px-3 py-2">Bingung Mobil apa yang harus dibeli? Manfaatkan komparasi Mobil baru di SeconDrive untuk membandingkan Mobil-Mobil bekas. Bandingkan 2 Mobil dengan beberapa parameter untuk menemukan pilihan yang tepat bagi Anda.
    </p>
  </div>
  <div class="container">
    <div class="justify-content-center row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-5">
      <div class="col">
        <div class="gap-3 card shadow-sm px-1 py-4 bg-white rounded-3 border border-1 border-secondary-subtle d-flex align-items-center h-100 justify-content-between flex-column">
          <div class="px-1 py-1 bg-white rounded-3 border border-1 border-primary col-10 align-items-center d-flex" style="height: 315px;">
            <svg class="m-auto" width="67" height="67" viewBox="0 0 67 67" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M4.5 33.5H62.8333M33.6667 4.33333V62.6667" stroke="#000CFF" stroke-width="8"
                stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
          <button type="button" class="text-decoration-none py-2 bg-primary rounded-3 col-8 justify-content-center align-items-center text-center text-white fs-5 fw-bold font-family-Poppins col-9 m-0" style="background-color: #000CFF !important;" data-bs-toggle="modal" data-bs-target="#exampleModal">Pilih Mobil
          </button>
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Pilih Mobil</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Temukan Mobil" aria-label="Recipient's username"
                      aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M18.031 16.617L22.314 20.899L20.899 22.314L16.617 18.031C15.0237 19.3082 13.042 20.0029 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20.0029 13.042 19.3082 15.0237 18.031 16.617ZM16.025 15.875C17.2938 14.5697 18.0025 12.8204 18 11C18 7.133 14.867 4 11 4C7.133 4 4 7.133 4 11C4 14.867 7.133 18 11 18C12.8204 18.0025 14.5697 17.2938 15.875 16.025L16.025 15.875Z"
                          fill="#000CFF" />
                      </svg>
                    </span>
                  </div>
                  <div class="row row-gap-3">
                    <div class="col-6">
                      <div class="card shadow-sm">
                        <img class="bd-placeholder-img card-img-top" src="image\ec400009-559c-4440-8ddf-0674762d7a6b.jpg"
                          style="max-height: 194px; object-fit: cover;" alt="">
                        <div class="card-body">
                          <div class=" row">
                            <p class="text-black fs-3 fw-semibold font-family-Poppins col-12 m-0 px-3 py-2">BMW M3</p>
                            <div class="col-12 row align-items-center">
                              <p class="text-secondary fs-6 fw-semibold font-family-Poppins col-5 m-0 px-3 py-2">Merk : BMW</p>
                              <p class="text-secondary fs-6 fw-semibold font-family-Poppins col-5 m-0 px-3 py-2">Tahun : 2020</p>
                            </div>
                            <p class="text-black fs-4 fw-bold font-family-Poppins col-12 m-0 px-3 py-2">Rp 1.350.000.000</p>
                            <p class="text-secondary fs-6 fw-semibold font-family-Poppins col-12 m-0 px-3 py-2">Lokasi : Semarang</p>
                            <div class="d-flex justify-content-end align-items-end">
                              <a href=""
                                class="text-decoration-none text-end text-black fs-6 fw-bold font-family-Poppins col-12 m-0 px-3 py-2">Lihat
                                Detail -></a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="card shadow-sm">
                        <img class="bd-placeholder-img card-img-top" src="image\download (1).jpeg"
                          style="max-height: 194px; object-fit: cover;" alt="">
                        <div class="card-body">
                          <div class=" row">
                            <p class="text-black fs-3 fw-semibold font-family-Poppins col-12 m-0 px-3 py-2">BMW M3</p>
                            <div class="col-12 row align-items-center">
                              <p class="text-secondary fs-6 fw-semibold font-family-Poppins col-5 m-0 px-3 py-2">Merk : BMW</p>
                              <p class="text-secondary fs-6 fw-semibold font-family-Poppins col-5 m-0 px-3 py-2">Tahun : 2020</p>
                            </div>
                            <p class="text-black fs-4 fw-bold font-family-Poppins col-12 m-0 px-3 py-2">Rp 1.350.000.000</p>
                            <p class="text-secondary fs-6 fw-semibold font-family-Poppins col-12 m-0 px-3 py-2">Lokasi : Semarang</p>
                            <div class="d-flex justify-content-end align-items-end">
                              <a href=""
                                class="text-decoration-none text-end text-black fs-6 fw-bold font-family-Poppins col-12 m-0 px-3 py-2">Lihat
                                Detail -></a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="card shadow-sm">
                        <img class="bd-placeholder-img card-img-top" src="image\20240924155406cover212iXVEw.webp"
                          style="max-height: 194px; object-fit: cover;" alt="">
                        <div class="card-body">
                          <div class=" row">
                            <p class="text-black fs-3 fw-semibold font-family-Poppins col-12 m-0 px-3 py-2">BMW M3</p>
                            <div class="col-12 row align-items-center">
                              <p class="text-secondary fs-6 fw-semibold font-family-Poppins col-5 m-0 px-3 py-2">Merk : BMW</p>
                              <p class="text-secondary fs-6 fw-semibold font-family-Poppins col-5 m-0 px-3 py-2">Tahun : 2020</p>
                            </div>
                            <p class="text-black fs-4 fw-bold font-family-Poppins col-12 m-0 px-3 py-2">Rp 1.350.000.000</p>
                            <p class="text-secondary fs-6 fw-semibold font-family-Poppins col-12 m-0 px-3 py-2">Lokasi : Semarang</p>
                            <div class="d-flex justify-content-end align-items-end">
                              <a href=""
                                class="text-decoration-none text-end text-black fs-6 fw-bold font-family-Poppins col-12 m-0 px-3 py-2">Lihat
                                Detail -></a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="gap-3 card shadow-sm px-1 py-4 bg-white rounded-3 border border-1 border-secondary-subtle d-flex align-items-center h-100 justify-content-between flex-column">
          <div class="px-1 py-1 bg-white rounded-3 border border-1 border-primary col-10 align-items-center d-flex" style="height: 315px;">
            <svg class="m-auto" width="67" height="67" viewBox="0 0 67 67" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M4.5 33.5H62.8333M33.6667 4.33333V62.6667" stroke="#000CFF" stroke-width="8"
                stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
          <button type="button" class="text-decoration-none py-2 bg-primary rounded-3 col-8 justify-content-center align-items-center text-center text-white fs-5 fw-bold font-family-Poppins col-9 m-0" style="background-color: #000CFF !important;" data-bs-toggle="modal" data-bs-target="#exampleModal2">Pilih Mobil
          </button>
          <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModal2Label">Pilih Mobil</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="modal-body">
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Temukan Mobil" aria-label="Recipient's username"
                        aria-describedby="basic-addon2">
                      <span class="input-group-text" id="basic-addon2"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                          xmlns="http://www.w3.org/2000/svg">
                          <path
                            d="M18.031 16.617L22.314 20.899L20.899 22.314L16.617 18.031C15.0237 19.3082 13.042 20.0029 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20.0029 13.042 19.3082 15.0237 18.031 16.617ZM16.025 15.875C17.2938 14.5697 18.0025 12.8204 18 11C18 7.133 14.867 4 11 4C7.133 4 4 7.133 4 11C4 14.867 7.133 18 11 18C12.8204 18.0025 14.5697 17.2938 15.875 16.025L16.025 15.875Z"
                            fill="#000CFF" />
                        </svg>
                      </span>
                    </div>
                    <div class="row row-gap-3">
                      <div class="col-6">
                        <div class="card shadow-sm">
                          <img class="bd-placeholder-img card-img-top" src="image\ec400009-559c-4440-8ddf-0674762d7a6b.jpg"
                            style="max-height: 194px; object-fit: cover;" alt="">
                          <div class="card-body">
                            <div class=" row">
                              <p class="text-black fs-3 fw-semibold font-family-Poppins col-12 m-0 px-3 py-2">BMW M3</p>
                              <div class="col-12 row align-items-center">
                                <p class="text-secondary fs-6 fw-semibold font-family-Poppins col-5 m-0 px-3 py-2">Merk : BMW</p>
                                <p class="text-secondary fs-6 fw-semibold font-family-Poppins col-5 m-0 px-3 py-2">Tahun : 2020</p>
                              </div>
                              <p class="text-black fs-4 fw-bold font-family-Poppins col-12 m-0 px-3 py-2">Rp 1.350.000.000</p>
                              <p class="text-secondary fs-6 fw-semibold font-family-Poppins col-12 m-0 px-3 py-2">Lokasi : Semarang</p>
                              <div class="d-flex justify-content-end align-items-end">
                                <a href=""
                                  class="text-decoration-none text-end text-black fs-6 fw-bold font-family-Poppins col-12 m-0 px-3 py-2">Lihat
                                  Detail -></a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="card shadow-sm">
                          <img class="bd-placeholder-img card-img-top" src="image\download (1).jpeg"
                            style="max-height: 194px; object-fit: cover;" alt="">
                          <div class="card-body">
                            <div class=" row">
                              <p class="text-black fs-3 fw-semibold font-family-Poppins col-12 m-0 px-3 py-2">BMW M3</p>
                              <div class="col-12 row align-items-center">
                                <p class="text-secondary fs-6 fw-semibold font-family-Poppins col-5 m-0 px-3 py-2">Merk : BMW</p>
                                <p class="text-secondary fs-6 fw-semibold font-family-Poppins col-5 m-0 px-3 py-2">Tahun : 2020</p>
                              </div>
                              <p class="text-black fs-4 fw-bold font-family-Poppins col-12 m-0 px-3 py-2">Rp 1.350.000.000</p>
                              <p class="text-secondary fs-6 fw-semibold font-family-Poppins col-12 m-0 px-3 py-2">Lokasi : Semarang</p>
                              <div class="d-flex justify-content-end align-items-end">
                                <a href=""
                                  class="text-decoration-none text-end text-black fs-6 fw-bold font-family-Poppins col-12 m-0 px-3 py-2">Lihat
                                  Detail -></a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="card shadow-sm">
                          <img class="bd-placeholder-img card-img-top" src="image\20240924155406cover212iXVEw.webp"
                            style="max-height: 194px; object-fit: cover;" alt="">
                          <div class="card-body">
                            <div class=" row">
                              <p class="text-black fs-3 fw-semibold font-family-Poppins col-12 m-0 px-3 py-2">BMW M3</p>
                              <div class="col-12 row align-items-center">
                                <p class="text-secondary fs-6 fw-semibold font-family-Poppins col-5 m-0 px-3 py-2">Merk : BMW</p>
                                <p class="text-secondary fs-6 fw-semibold font-family-Poppins col-5 m-0 px-3 py-2">Tahun : 2020</p>
                              </div>
                              <p class="text-black fs-4 fw-bold font-family-Poppins col-12 m-0 px-3 py-2">Rp 1.350.000.000</p>
                              <p class="text-secondary fs-6 fw-semibold font-family-Poppins col-12 m-0 px-3 py-2">Lokasi : Semarang</p>
                              <div class="d-flex justify-content-end align-items-end">
                                <a href=""
                                  class="text-decoration-none text-end text-black fs-6 fw-bold font-family-Poppins col-12 m-0 px-3 py-2">Lihat
                                  Detail -></a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container d-flex mt-5">
    <a href="" class="m-auto text-decoration-none py-2 bg-primary rounded-3 col-8 justify-content-center align-items-center text-center text-white fs-5 fw-bold font-family-Poppins col-9 m-0" style="background-color: #000CFF !important; width: 420px">Komparasi
    </a>
  </div>
  <div class="container mt-5">
    <div class="w-100 py-3" style="background-color: #000CFF !important;">
      <p class="text-center text-light fs-2 fw-bold font-poppins  m-0 px-3 py-2">Merek</p>
    </div>
    <table>
      <tr>
        <td colspan="2">tes1</td>
      </tr>
      <tr>
        <td>tes3</td>
        <td>tes4</td>
      </tr>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>