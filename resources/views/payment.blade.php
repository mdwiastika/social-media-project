<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
  <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="SB-Mid-client-tpYRzAqM1pmeORCI"></script>
</head>

<body>
  <button id="pay-button" style="display: none">Pay</button>
  <form action="/coin/transaction" method="POST">
    @csrf
    <input type="hidden" id="transaction_id" name="transaction_id">
    <input type="hidden" id="gross_amount" name="gross_amount">
    <input type="hidden" id="pdf_url" name="pdf_url">
    <input type="hidden" id="payment_code" name="payment_code">
    <input type="hidden" id="payment_type" name="payment_type">
    <input type="hidden" id="transaction_status" name="transaction_status">
    <input type="hidden" id="coin" name="coin" value="{{ $coin }}">
</form>
  <script>
    let payButton = document.getElementById('pay-button');
    const coin = document.getElementById('coin').value;
    payButton.addEventListener('click', function() {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
      window.snap.pay('{{ $snapToken }}', {
          onSuccess: function(result) {
            /* You may add your own implementation here */
            console.log(result);
            callCoinTransaction(result);
          },
          onPending: function(result) {
            /* You may add your own implementation here */
            console.log(result);
            callCoinTransaction(result);
          },
          onError: function(result) {
            /* You may add your own implementation here */
            alert("payment failed!");
            console.log(result);
          },
          onClose: function() {
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
          }
        }
      );
    // customer will be redirected after completing payment pop-up
    });
    function callCoinTransaction(data){
        let _token = $('input[name="_token"]').val();
        console.log(_token);
        $.ajax({
            type: "POST",
            url: "/coin/transaction",
            data: {
                _token:_token,
                transaction_id:data.transaction_id,
                gross_amount:data.gross_amount,
                pdf_url:data.pdf_url,
                payment_code:data.payment_code,
                payment_type:data.payment_type,
                transaction_status:data.transaction_status,
                coin:coin,
            },
            success: function (response) {
                window.location.href = '/profile/{{ auth()->user()->username }}'
            },
            error: function (err){
                console.log(err);
            }
        });
    }
    payButton.click();
  </script>
</body>

</html>
