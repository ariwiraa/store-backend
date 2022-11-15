<table class="table table-bordered">
     <tr>
          <th>Name</th>
          <td>{{ $item->name }}</td>
     </tr>
     <tr>
          <th>email</th>
          <td>{{ $item->email }}</td>
     </tr>
     <tr>
          <th>number</th>
          <td>{{ $item->number }}</td>
     </tr>
     <tr>
          <th>address</th>
          <td>{{ $item->address }}</td>
     </tr>
     <tr>
          <th>Total</th>
          <td>{{ $item->transaction_total }}</td>
     </tr>
     <tr>
          <th>Status</th>
          <td>{{ $item->transaction_status }}</td>
     </tr>
     <tr>
          <th>Pembelian Produk</th>
          <td>
               <table class="table table-bordered w-100">
                    <tr>
                         <th>Nama</th>
                         <th>Tipe</th>
                         <th>Harga</th>
                    </tr>
                    @foreach ($item->details as $detail)
                        <tr>
                         <td>{{ $detail->name }}</td>
                         <td>{{ $detail->type }}</td>
                         <td>{{ $detail->price }}</td>
                        </tr>
                    @endforeach
               </table>
          </td>
     </tr>
</table>
<div class="row">
     <div class="col-4">
          <a href="{{ route('transaction.status') }} ? status = SUCCESS" class="btn btn-success btn block">
               <i class="fa fa-check"></i> Set Sukses
          </a>
     </div>
     <div class="col-4">
          <a href="{{ route('transaction.status') }} ? status = FAILED" class="btn btn-warning btn block">
               <i class="fa fa-times"></i> Set Gagal
          </a>
     </div>
     <div class="col-4">
          <a href="{{ route('transaction.status') }} ? status = PENDING" class="btn btn-info btn block">
               <i class="fa fa-spinner"></i> Set Pending
          </a>
     </div>
</div>