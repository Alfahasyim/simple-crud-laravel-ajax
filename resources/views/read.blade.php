<table class="table">
    <tr>
      <th>No.</th>
      <th>Nama Karyawan</th>
      <th>Tanggal Lahir</th>
      <th>Gaji</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
    <?php $no = 1; ?>
    @if(!empty($data))
    @foreach ($data as $item)
      <tr>
        <td>{{ $no++ }}</td>
        <td>{{ $item->nama }}</td>
        <td>{{ $item->tanggal_lahir }}</td>
        <td>Rp.{{number_format($item->gaji)}}</td>
        @if($item->status_karyawan == true)
          <td>Aktif</td>
        @else
          <td>Tidak Aktif</td>
        @endif
        <td>
            <button class="btn btn-warning" onClick="show({{ $item->id }})">Edit</button>
            <button class="btn btn-danger" onClick="destroy({{ $item->id }})">Delete</button>
        </td>
      </tr>
    @endforeach
    @endif
</table>
