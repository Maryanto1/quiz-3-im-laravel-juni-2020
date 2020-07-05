@extends('master')
@section('judul', 'Articles Table')
@section('mainContent')
<div class="row">
    <table class="table table-bordered">
      <thead class="bg-success">                  
        <tr>
          <th style="width: 10px">No.</th>
          <th>Judul</th>
          <th>Slug</th>
          <th>Isi</th>
          <th>Dibuat Pada</th>
          <th>Diperbaharui Pada</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($datas as $data => $item)
        <tr>
         <td>{{ $data+1 }}</td>
         <td>{{ $item->judul }}</td>
         <td>{{ $item->slug }}</td>
         <td>{{ $item->isi }}</td>
         <td>{{ $item->created_at }}</td>
         <td>{{ $item->updated_at }}</td>
         <td>
          <a href="/jawaban/{{ $item->id }}" class="btn btn-secondary">Detail</a>
          <a href="/jawaban/{{ $item->id }}/edit" class="btn btn-primary">Ubah</a>
          <form action="/jawaban/{{ $item->id }}" method="POST" style="display: inline">
            @csrf
            @method('DELETE')
              <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
          </form>
         </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection