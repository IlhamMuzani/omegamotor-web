@extends('layout.main')

@section('title', 'Hak Akses')

@section('content')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
        integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
        crossorigin=""></script>
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url({{ asset('falcon/public/assets/img/icons/spot-illustrations/corner-4.png') }});">
        </div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Hak Akses</h3>
                    <p class="mb-0">Lihat</p>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5>Hak Akses</h5>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/akses-access/' . $akses->id) }}" method="post" enctype="multipart/form-data"
                autocomplete="off">
                @csrf
                <div class="card-body">
                    <input type="checkbox" id="option-all" onchange="checkAll(this)">
                    <label for="option-all">Select All</label>
                    <br>
                    @foreach ($menus as $menu)
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="menu[]" value="{{ $menu }}"
                                {{ $akses->menu[$menu] ? 'checked' : '' }}>
                            <label class="form-check-label">{{ ucfirst($menu) }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        var checkboxes = document.querySelectorAll("input[type = 'checkbox']");

        function checkAll(myCheckbox) {
            if (myCheckbox.checked == true) {
                checkboxes.forEach(function(checkbox) {
                    checkbox.checked = true;
                });
            } else {
                checkboxes.forEach(function(checkbox) {
                    checkbox.checked = false;
                });
            }
        }
    </script>
@endsection
