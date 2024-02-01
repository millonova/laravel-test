@extends('layouts.app')

@section('content')

<table class="table">
  <tbody>
    <tr>
      <th scope="row">Name</th>
      <td>Rizky</td>
      <td rowspan="3"><img src="{{ asset('/storage/posts/mVr7pXEgBFzGVaKFopVe4936rskYvulu4vy8ac88.jpg') }}" class="rounded" style="width: 150px"></td>
    </tr>
    <tr>
      <th scope="row">Umur</th>
      <td>12</td>
    </tr>
    <tr>
      <th scope="row">Tanggal Lahir</th>
      <td>08/12/2004</td>
    </tr>
  </tbody>
</table>

@endsection