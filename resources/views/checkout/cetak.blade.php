<!doctype html>
<html lang="en">
  <head>
    <title>Bukti Pemesanan</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
            border: 2px;
		}
	</style>

                <h4>Pemesanan Sukses</h4>
                <h6>Pemesanan anda sukses selanjutnya untuk melakukan pembayaran melalui transfer
                    <br>
                    di rekening <strong>Bank BRI Nomer Rekening : 31212-7533545-200</strong>
                    dengan nominal <strong>Rp. {{ number_format($order->total_price + $order->code,0,",",".") }}</strong>
                </h6>
                <hr>
                <br><br>
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Total Harga</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($order_detail as $order_detail)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $order_detail->product['name'] }}</td>
                            <td>{{ $order_detail->total }} unit</td>
                            <td>Rp. {{ number_format($order_detail->product['price'],0,",",".") }}</td>
                            <td><strong>Rp. {{ number_format($order_detail->total_price,0,",",".") }}</strong></td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="5" class="text-right"><Strong>Total Harga</Strong></td>
                            <td><strong>Rp. {{ number_format($order->total_price,0,",",".") }}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-right"><Strong>Kode Unik</Strong></td>
                            <td><strong>Rp. {{ number_format($order->code,0,",",".") }}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-right"><Strong>Total yang harus ditransfer</Strong></td>
                            <td><strong>Rp. {{ number_format($order->total_price + $order->code,0,",",".") }}</strong></td>
                        </tr>
                    </tbody>
                  </table>
  </body>
</html>
