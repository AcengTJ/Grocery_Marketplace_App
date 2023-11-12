function checkout(cart_id, snapToken) {
  $.ajax({
    type: "GET",
    url: "/AppPenjualan/controller/checkoutController.php?cart_id=".cart_id,
    data: {
      _token: snapToken,
    },
    success: function (data) {
      makePayment(data);
    },
    error: function (xhr) {
      if (xhr.responseJSON.errors !== undefined) {
        window.scroll(0, 0);
      } else {
        alert("Sistem sedang sibuk, silahkan coba lagi nanti!");
      }
    },
  });
}

function makePayment(data) {
  window.snap.pay(data, {
    onSuccess: function (result) {
      alert("success");
      console.log(result);

      // sendSnapCallback(result);
    },
    onPending: function (result) {
      alert("Pending");
      console.log(result);
      // $("#snapToken").val(data);
      // sendSnapCallback(result);
    },
    onError: function (result) {
      alert("Error");
      console.log(result);
      // sendSnapCallback(result);
    },
    onClose: function (result) {
      alert("Anda belum menyelesaikan pembayaran!");
    },
    language: "id",
  });
}

function sendSnapCallback(result) {
  var redirectUrl = result.finish_redirect_url;
  $("#snapCallback").val(JSON.stringify(result));
  $("#snapCallbackForm").attr("action", redirectUrl);
  $("#snapCallbackForm").submit();
}
