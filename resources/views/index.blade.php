<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD APJ TEST RECRUITMENT</title>

    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>
  <div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <h1>CRUD TEST REQUIREMENT </h1>
            <button class="btn btn-primary" onClick="create()">+ Tambah Data</button>
            <div id="read" class="mt-3"></div>
        </div>
    </div>
  </div>
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="page" class="p-2"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function() {
            read()
        });
        // Read Database
        function read() {
            $.get("{{ url('read') }}", {}, function(data, status) {
                $("#read").html(data);
            });
        }
        // Untuk modal halaman create
        function create() {
            $.get("{{ url('create') }}", {}, function(data, status) {
                $("#exampleModalLabel").html('Create Karyawan')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }
        // untuk proses create data
        function store() {
            var nama = $("#nama").val();
            var tanggal_lahir = $("#tanggal_lahir").val();
            var gaji = $("#gaji").val();
            var status_karyawan = $("#status_karyawan").val(); 
            $.ajax({
                type: "get",
                url: "{{ url('store') }}",
                data: {
                  "nama" : nama,
                  "tanggal_lahir" : tanggal_lahir,
                  "gaji" : gaji,
                  "status_karyawan" :status_karyawan,
                  "_token": "{{ csrf_token() }}",
                },
                success: function(data) {
                    $(".btn-close").click();
                    read()
                    Swal.fire({
                      position: 'top',
                      icon: 'success',
                      title: 'Your work has been saved',
                      showConfirmButton: false,
                      timer: 1500
                    })
                },
                error: function(data){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!'
                      })                
                }
            });
        }
        // Untuk modal halaman edit show
        function show(id) {
            $.get("{{ url('show') }}/" + id, {}, function(data, status) {
                $("#exampleModalLabel").html('Edit Karyawan')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }
        // untuk proses update data
        function update(id) {
            var nama = $("#nama").val();
            var tanggal_lahir = $("#tanggal_lahir").val();
            var gaji = $("#gaji").val();
            var status_karyawan = $("#status_karyawan").val();
            $.ajax({
                type: "get",
                url: "{{ url('update') }}/" + id,
                data: {
                  "nama" : nama,
                  "tanggal_lahir" : tanggal_lahir,
                  "gaji" : gaji,
                  "status_karyawan" :status_karyawan,
                  "_token": "{{ csrf_token() }}",
                },
                success: function(data) {
                    $(".btn-close").click();
                    read()
                    Swal.fire({
                      position: 'top',
                      icon: 'success',
                      title: 'Your work has been saved',
                      showConfirmButton: false,
                      timer: 1500
                    })
                },
                error: function(data){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!'
                      })                
                }
            });
        }
        // untuk delete atau destroy data
        function destroy(id) {
          Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                    type: "get",
                    url: "{{ url('destroy') }}/" + id,
                    data: {
                      "_token": "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        $(".btn-close").click();
                        read()
                    }
                });
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
              }
            })
        }
    </script>
</body>
</html>