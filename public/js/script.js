function numberOnly(event) {
  var charCode = event.which ? event.which : event.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    return false;
  }
  return true;
}

function previewImage() {
  const image = document.querySelector("#image");
  const imagePreview = document.querySelector(".img-preview");

  imagePreview.style.display = "block";

  const ambilData = new FileReader();
  ambilData.readAsDataURL(image.files[0]);

  ambilData.onload = function (oFREvent) {
    imagePreview.src = oFREvent.target.result;
  };
}
