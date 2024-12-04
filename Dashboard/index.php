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
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav m-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#Daftar-Mobil">Daftar Mobil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Chat</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Iklan Saya</a>
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
  <div class="container text-start d-flex" style="height: 80vh;">
    <div class="row align-items-center my-auto w-100">
      <div class="col">
        <div style="max-width: 448px;">
          <p class=" m-0 py-2"><span class="text-black fs-1 fw-bold font-family-Poppins">Selamat Datang <br />di
            </span><span class="text-primary fs-1 fw-bold font-family-Poppins">SeconDrive</span></p>
          <p class="text-black fs-6 fw-bold font-family-Poppins  m-0 py-2">Tempatnya jual beli mobil bekas terlengkap,
            terjangkau, dan terpercaya</p>
          <a style="max-width: 260px;" class="m-0 btn login" href="#" role="button"><b>Lihat Selengkapnya</b></a>
        </div>
      </div>
      <div class="col">
        <div id="carouselExample" class="carousel slide">
          <div class="carousel-inner">
            <div class="carousel-item active" style="width: 600px;">
              <img src="image\mobil-offroad.webp" class="img-fluid d-block" style="width: 600px;" alt="...">
            </div>
            <div class="carousel-item" style="width: 600px;">
              <img src="image\ec400009-559c-4440-8ddf-0674762d7a6b.jpg" class="img-fluid d-block" style="width: 600px;"
                alt="...">
            </div>
            <div class="carousel-item" style="width: 600px;">
              <img src="image\download (1).jpeg" class="img-fluid d-block" style="width: 600px;" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>
  <div class="container d-flex">
    <a class="m-auto" href="#Daftar-Mobil">
      <svg  width="103" height="25" viewBox="0 0 103 25" fill="none"
        xmlns="http://www.w3.org/2000/svg">
        <path d="M6 6L51.3333 18.813L96.6667 6" stroke="#0D12F1" stroke-width="11.3333" stroke-linecap="round"
          stroke-linejoin="round" />
      </svg>
    </a>
  </div>
  <div class="container mt-5" id="Daftar-Mobil">
    <p class="text-center text-black fs-1 fw-bold font-family-Poppins  m-0 px-3 py-2">Daftar Mobil</p>
    <div class="d-flex gap-2">
      <div class="input-group mb-3" style="max-width: 357px;">
        <select id="disabledSelect" class="form-select">
          <option>Semarang</option>
        </select>
      </div>
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
    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <div class="col">
        <div class="card shadow-sm">
          <img class="bd-placeholder-img card-img-top" src="image\mobil-offroad.webp"
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
      <div class="col">
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
      <div class="col">
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
      <div class="col">
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

      <div class="col">
        <div class="card shadow-sm">
          <img class="bd-placeholder-img card-img-top" src="image\000000412444_50bc7de9_7a7c_4c49_a681_60d043bedea7.jpg"
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
      <div class="col">
        <div class="card shadow-sm">
          <img class="bd-placeholder-img card-img-top" src="image\ezgif.com-gif-maker-(16).jpg"
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